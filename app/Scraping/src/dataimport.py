from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import time
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.select import Select
import os
import os.path
import sys
from sqlalchemy import create_engine, MetaData, Table
import pandas as pd

remote_url = 'http://selenium:4444/wd/hub'
DB_USER = os.getenv("DB_USER", "root")
DB_PASSWORD = os.getenv("DB_PASSWORD", "your_password")
DB_HOST = os.getenv("DB_HOST", "mysql")  # Docker Composeファイルで定義されたMySQLサービス名を使用
DB_PORT = os.getenv("DB_PORT", "3306")
DB_DATABASE = os.getenv("DB_DATABASE", "autosales")


sfinfo_path = os.getcwd() + '/logindata/info_salesforce.txt' #salesforceのログイン情報のパス
downloaddir = os.getcwd() + '/dataimport_csv/data.csv' #アップロードするファイルのパス
changed_columns = ['id', 'listtypeid', 'F_法人番号', '会社名', '都道府県', '市区郡', '郵便番号', '町名・番地', 'その他の電話', 'Fax', '従業員数', '資本金（千円）', '上場区分', '年間売上', '代表取締役', 'Webサイト', '日本標準産業分類_大分類名称', '業種', '日本標準産業分類_小分類名称', '日本標準産業分類_細分類名称', 'リスト名', '名前']


def pre_db():
    engine = create_engine(f"mysql+mysqlconnector://{DB_USER}:{DB_PASSWORD}@{DB_HOST}:{DB_PORT}/{DB_DATABASE}?charset=utf8")
    metadata = MetaData()
    metadata.reflect(bind=engine)  # データベースからテーブルのメタデータを取得

    table_listinfo = Table('listinfo', metadata, autoload=True, autoload_with=engine)
    table_listtype = Table('listtype', metadata, autoload=True, autoload_with=engine)
    table_listerror = Table('listerror', metadata, autoload=True, autoload_with=engine)

    return engine, table_listinfo, table_listtype, table_listerror

def create_csv(engine, table_listinfo, table_listtype):
    dict = {}

    # テーブルのヘッダー（列名）を取得
    columns = table_listinfo.columns.keys()

    for n in range(len(changed_columns)):
        dict[changed_columns[n]] = []

    # table_listtypeテーブルの中で、attemptが0のものを取得
    with engine.connect() as connection:
        query = table_listtype.select().where(table_listtype.c.attempt == 0)
        result = connection.execute(query)
        row = result.fetchone()
        listtypeid = row._asdict()['id']
        recordtype = row._asdict()['recordtype']
        listname = row._asdict()['listname']
        
    # テーブルの値を取得
    with engine.connect() as connection:
        #listinfoテーブルの中で、listtypeidがlisttypeidであるものをすべて取得
        query = table_listinfo.select().where(table_listinfo.c.listtypeid == listtypeid)
        result = connection.execute(query)
        n = 0
        for row in result:
            n += 1
            # 列名と値の対応を表示する
            for column_name, changed_column in zip(columns, changed_columns):
                dict[changed_column].append(str(row._asdict()[column_name]).replace('\u3000', '　'))

    size = len(dict['id'])

    for n in range(size):
        dict['年間売上'][n] = dict['年間売上'][n] + '0000000'
    dict['名前'] = ['ご担当者']*size
    dict['リスト名'] = [listname]*size

    dc = {k: v for k, v in dict.items() if k != 'id' and k != 'listtypeid'}

    df = pd.DataFrame(dc)
    df.to_csv(downloaddir, index=False, encoding='utf-8-sig')

    return dict, listtypeid, recordtype, listname


def create_driver(remote_url):
    # Chromeのオプションを設定する
    options = webdriver.ChromeOptions()
    prefs = {"profile.default_content_setting_values.notifications" : 2}
    options.add_experimental_option("prefs",prefs)

    # ブラウザを起動する
    driver = webdriver.Remote(
    command_executor=remote_url,
    options=options,
    )

    driver.maximize_window()

    return driver


def wait_and_click(driver, by_type, path):
    wait = WebDriverWait(driver, 60)
    element = wait.until(EC.element_to_be_clickable((by_type, path)))
    element.click()

def wait_and_send(driver, by_type, path, text):
    wait = WebDriverWait(driver, 60)
    element = wait.until(EC.visibility_of_element_located((by_type, path)))
    element.clear()
    element.send_keys(text)

def sf_login(driver, sfinfo_path):
    info_list = []
    with open(sfinfo_path, 'r') as f:
        lines = f.readlines()
        for line in lines:
            line = line.replace('\n', '')
            line = line.split(' =')[1].lstrip()
            info_list.append(line)
    login_url = info_list[0]
    id = info_list[1]
    password = info_list[2]

    # salesforceのログインページにアクセス
    driver.get(login_url)

    # id, passwordを入力
    wait_and_send(driver, By.ID, 'username', id)
    wait_and_send(driver, By.ID, 'password', password)

    # ログイン
    wait_and_click(driver, By.ID, 'Login')



if __name__ == "__main__":
    try:
        #スクレイピングの準備
        driver = create_driver(remote_url)

        #データベースの準備とcsvの作成
        engine, table_listinfo, table_listtype, table_listerror = pre_db()
        dict, listtypeid, recordtype, listname = create_csv(engine, table_listinfo, table_listtype)

        #SFへのログイン
        sf_login(driver, sfinfo_path)
        wait = WebDriverWait(driver, 60)

        #データインポートウィザードのページへ遷移
        wait_and_click(driver, By.CLASS_NAME, "menuTriggerLink")
        wait_and_click(driver, By.ID, 'related_setup_app_home')

        driver.switch_to.window(driver.window_handles[-1])

        time.sleep(5)
        wait_and_send(driver, By.XPATH, "//input[@placeholder='クイック検索']", "データインポートウィザード")
        wait_and_click(driver, By.XPATH, "//div[@title='データインポートウィザード']/a")
        time.sleep(10)

        #iframeの切り替え
        wait = WebDriverWait(driver, 60)
        iframe = wait.until(EC.presence_of_element_located((By.XPATH, '//*[@id="setupComponent"]/div/div/div/force-aloha-page/div/iframe')))
        driver.switch_to.frame(iframe)
        
        #ウィザードを起動
        wait_and_click(driver, By.CLASS_NAME, "landing-steps-start")

        #データの種類としてリードを選択
        driver.execute_script('window.scrollTo(0, document.body.scrollHeight);')
        time.sleep(10)
        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/div[2]/div[1]/div/div[2]/table/tbody/tr[3]/td/a')

        #新規レコードを追加を選択
        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/div[2]/div[2]/div/div[2]/table/tbody/tr[1]/td/a')

        #レコードタイプの指定
        time.sleep(5)
        select = Select(driver.find_element(By.XPATH, '//*[@id="910:0"]'))
        select.select_by_visible_text(recordtype)
        time.sleep(5)

        #csvの選択
        driver.execute_script("window.scrollTo(0, 0)")
        time.sleep(10)

        #ファイルを選択ボタンをクリック
        link = wait.until(EC.presence_of_element_located((By.XPATH, '/html/body/div[4]/div[1]/div[2]/div[3]/div/div[1]/span')))
        driver.execute_script("arguments[0].scrollIntoView();", link)
        element = wait.until(EC.presence_of_element_located((By.CLASS_NAME, "dataImporterDiCsvFileSelector")))
        driver.execute_script('arguments[0].click();', element) 

        #ファイルのアップロード
        wait_and_send(driver, By.XPATH, '/html/body/div[4]/div[1]/div[2]/div[3]/div/div[3]/a/div/div[2]/form/input', downloaddir)

        #次へボタンをクリック
        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[2]/div[2]/a[3]')

        #次へボタンをクリック
        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[2]/div[2]/a[3]')

        #インポートを開始ボタンをクリック
        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[2]/div[2]/a[3]')

        wait_and_click(driver, By.XPATH,'/html/body/div[5]/div/div[2]/div/a')

        driver.switch_to.default_content()

        time.sleep(10)
        iframe = wait.until(EC.presence_of_element_located((By.XPATH, '//*[@id="setupComponent"]/div[2]/div/div/force-aloha-page/div/iframe')))
        driver.switch_to.frame(iframe)

        #レコードの失敗
        link = wait.until(EC.visibility_of_element_located((By.XPATH,'//*[@id="j_id0:theForm:thePageBlock:thePageBlockSection:recordsFailedSection:recordsFailed"]')))
        if (link.text == '0'):
            #成功
            error = 0
        else:
            #失敗
            error = 1
        
        #iframeから戻る
        driver.switch_to.default_content()
        
    except TimeoutException:
        error = 1

    finally:
        if driver:
            driver.quit()
        #errorの処理
        with engine.connect() as connection:
            if error == 0:
                # 挿入するデータを準備
                error_data = {
                    'error': error
                }
                trans = connection.begin()
                try:
                    #listtypeテーブルのidがlisttypeidであるものを削除
                    connection.execute(table_listtype.delete().where(table_listtype.c.id == listtypeid))
                    #listinfoテーブルの中で、listtypeidがlisttypeidであるものを削除
                    connection.execute(table_listinfo.delete().where(table_listinfo.c.listtypeid == listtypeid))
                    # トランザクションをコミット
                    trans.commit()

                except Exception as e:
                    # エラーが発生した場合はロールバック
                    trans.rollback()
                
            #失敗した場合
            else:
                # 挿入するデータを準備
                error_data = {
                    'error': error,
                    'listtypeid': listtypeid
                }
                trans = connection.begin()
                try:
                    #listtypeテーブルのattemptを1に変更
                    connection.execute(table_listtype.update().values(attempt=1).where(table_listtype.c.id == listtypeid))
                    # トランザクションをコミット
                    trans.commit()
                except Exception as e:
                    # エラーが発生した場合はロールバック
                    trans.rollback

            trans = connection.begin()
            try:
                # listerror テーブルにデータを挿入
                connection.execute(table_listerror.insert(), error_data)
                # トランザクションをコミット
                trans.commit()
            except Exception as e:
                # エラーが発生した場合はロールバック
                trans.rollback()