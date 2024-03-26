from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import time
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.select import Select
from sqlalchemy import create_engine, MetaData, Table
import os
import os.path
import datetime
import traceback

remote_url = 'http://selenium:4444/wd/hub'
DB_USER = os.getenv("DB_USER", "user")
DB_PASSWORD = os.getenv("DB_PASSWORD", "root")
DB_HOST = os.getenv("DB_HOST", "mysql")  # Docker Composeファイルで定義されたMySQLサービス名を使用
DB_PORT = os.getenv("DB_PORT", "3306")
DB_DATABASE = os.getenv("DB_DATABASE", "autosales")


sfinfo_path = os.getcwd() + '/logindata/info_salesforce.txt' #salesforceのログイン情報のパス
reaction_dict = {1:"１：開封", 2:"２：クリック"}
targetid_dict = {1:'ターゲットA', 2:'ターゲットB', 3:'ターゲットC', 4:'ターゲットD'}
contentid_dict = {1:'コンテンツA', 2:'コンテンツB', 3:'コンテンツC', 4:'コンテンツD'}
templateid_dict = {1:'テンプレート1', 2:'テンプレート2', 3:'テンプレート3', 4:'テンプレート4', 5:'テンプレート5', 6:'テンプレート6', 7:'テンプレート7'}




def pre_db():
    engine = create_engine(f"mysql+mysqlconnector://{DB_USER}:{DB_PASSWORD}@{DB_HOST}:{DB_PORT}/{DB_DATABASE}?charset=utf8")
    metadata = MetaData()
    metadata.reflect(bind=engine)  # データベースからテーブルのメタデータを取得

    table_mailreaction = Table('mailreaction', metadata, autoload=True, autoload_with=engine)
    table_mailtype = Table('mailtype', metadata, autoload=True, autoload_with=engine)
    table_reactionerror = Table('reactionerror', metadata, autoload=True, autoload_with=engine)

    return engine, table_mailreaction, table_mailtype, table_reactionerror

def get_db(engine, table_mailreaction, table_mailtype):
    info_dict={}
    type_dict={}
    # テーブルの値を取得
    with engine.connect() as connection:
        #teble_mailreactionで、attemptの値が0のもののみを取得
        query = table_mailreaction.select().where(table_mailreaction.c.attempt == 0)
        result = connection.execute(query)
        for row in result:
            if row._asdict()['attempt'] == 0:
                info_dict[row._asdict()['id']]={}
                info_dict[row._asdict()['id']]['mailtypeid'] = row._asdict()['mailtypeid']
                info_dict[row._asdict()['id']]['email'] = row._asdict()['email']
                info_dict[row._asdict()['id']]['subject'] = row._asdict()['subject']
                info_dict[row._asdict()['id']]['reaction'] = row._asdict()['reaction']
                info_dict[row._asdict()['id']]['company'] = row._asdict()['company']

        query = table_mailtype.select()
        result = connection.execute(query)
        for row in result:
            type_dict[row._asdict()['id']]={}
            type_dict[row._asdict()['id']]['target'] = targetid_dict[row._asdict()['targetid']]
            type_dict[row._asdict()['id']]['content'] = contentid_dict[row._asdict()['contentid']]
            type_dict[row._asdict()['id']]['template'] = templateid_dict[row._asdict()['templateid']]
            type_dict[row._asdict()['id']]['recordtype'] = row._asdict()['recordtype']
            type_dict[row._asdict()['id']]['dt'] = row._asdict()['dt']
        
    return info_dict, type_dict    



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
    element = wait.until(EC.presence_of_element_located((by_type, path)))
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
        driver = create_driver(remote_url)

        #データベースの準備
        engine, table_mailreaction, table_mailtype, table_reactionerror = pre_db()

        #データベースから情報を取得
        info_dict, type_dict = get_db(engine, table_mailreaction, table_mailtype)

        #SFにログイン
        sf_login(driver, sfinfo_path)
        wait = WebDriverWait(driver, 60)

        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/section/div[1]/div[1]/one-appnav/div/div/div/div/one-app-launcher-header/button')
        wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[2]/div/div[1]/div[2]/one-app-launcher-menu/div/div/one-app-launcher-menu-item[7]')

        get_url = driver.current_url

        for k in info_dict.keys():
            try:
                email = info_dict[k]['email']
                comment = info_dict[k]['subject']
                reaction = info_dict[k]['reaction']
                company = info_dict[k]['company']
                target = type_dict[info_dict[k]['mailtypeid']]['target']
                content = type_dict[info_dict[k]['mailtypeid']]['content']
                template = type_dict[info_dict[k]['mailtypeid']]['template']
                recordtype = type_dict[info_dict[k]['mailtypeid']]['recordtype']
                dt = type_dict[info_dict[k]['mailtypeid']]['dt']
                date_mailtitle = dt.strftime('%Y%m%d')[2:]
                date = dt.strftime('%Y/%m/%d')
                
                time.sleep(10)
                #iframeの切り替え
                iframe_parent_element = wait.until(EC.presence_of_element_located((By.XPATH, "//div[contains(@class, 'iframe-parent')][contains(@class, 'slds-template_iframe')][contains(@class, 'slds-card')]")))
                iframe_element = iframe_parent_element.find_element(By.TAG_NAME, "iframe")
                driver.switch_to.frame(iframe_element)

                wait_and_click(driver, By.XPATH, '//*[@id="j_id1"]/div/aside/section/div[3]/div[2]/div/ul/li[2]')
                
                #title属性がレコードタイプ:名前の要素を取得
                #その要素の親の親の要素の子である/div/span/buttonをクリック
                element = wait.until(EC.visibility_of_element_located((By.XPATH, '//*[@title="レコードタイプ:名前"]')))
                element_c = element.find_element(By.XPATH, '../..').find_element(By.XPATH, 'div/span/button')
                driver.execute_script('arguments[0].click();', element_c)
                time.sleep(5)

                li_elements = wait.until(EC.visibility_of_all_elements_located((By.CSS_SELECTOR, "ul.slds-dropdown__list li")))
                
                # フィルタをクリック
                for li in li_elements:
                    if li.text == "フィルタ":
                        li.click()
                        break

                wait_and_send(driver, By.XPATH, '//*[@id="j_id1"]/div/div[3]/div/div[1]/div/div[2]/div[2]/div[2]/span/textarea', recordtype)

                wait_and_click(driver, By.XPATH, '//*[@id="j_id1"]/div/div[3]/div/div[1]/div/div[3]/button[3]')
                #
                wait_and_click(driver, By.XPATH, '//*[@id="j_id1"]/div/div[1]/div[2]/div[2]/div/div/div/div/div[2]/div/div/div/div[2]/div[2]/div/div[2]/div[1]/div/div[3]/div')

                wait_and_click(driver, By.XPATH, '/html/body/div/div/div/div/ul/li[3]/a')

                wait_and_send(driver, By.XPATH, '//*[@id="j_id1"]/div/div[3]/div/div[1]/div/div[2]/div[2]/div[2]/span/textarea', email)

                wait_and_click(driver, By.XPATH, '//*[@id="j_id1"]/div/div[3]/div/div[1]/div/div[3]/button[3]')

                wait_and_click(driver, By.XPATH, '//*[@id="j_id1"]/div/div[1]/div[2]/div[2]/div/div/div/div/div[2]/div/div/div/div[2]/div[2]/div/div[2]/div[2]/div[1]/div/div/div[1]/div/div[1]/div/div/a')

                driver.switch_to.default_content()

                wait_and_click(driver, By.XPATH, '//slot/flexipage-component2/slot/flexipage-aura-wrapper/div/div/runtime_sales_activities-activity-panel-composer/lightning-button-group/div/slot/button')
                time.sleep(10)

                wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/section/div[2]/div[1]/div[3]/div/div/div/div[1]/div/div[2]/span[2]/button')

                #件名
                wait_and_send(driver, By.XPATH, "//input[contains(@class, 'slds-combobox__input')]", f"MA送信メール_{target}/{content}/{template}_{date_mailtitle}")

                #期日
                wait_and_send(wait.until(EC.visibility_of_element_located((By.XPATH, "//span[text()='期日']"))), By.XPATH, "../following-sibling::lightning-input//input", date)

                #種別
                wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/section/div[2]/div[1]/div[3]/div/div/div/div[2]/div/div[2]/div/div[1]/section/div/section/div/div/div/div/div/div[3]/div[1]/div/div/div/div/div/div/div/a')
                wait_and_click(driver, By.XPATH, "//a[@title='メール']")

                #メール反応状況
                if reaction!=0:
                    wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/section/div[2]/div[1]/div[3]/div/div/div/div[2]/div/div[2]/div/div[1]/section/div/section/div/div/div/div/div/div[4]/div[1]/div/div/div/div/div/div/div')
                    wait_and_click(driver, By.XPATH, f"//a[text()='{reaction_dict[reaction]}']")
                else:
                    pass

                #コメント
                wait_and_send(driver, By.CSS_SELECTOR, "textarea[class*='textarea']", comment)

                #保存ボタンをクリック
                wait_and_click(driver, By.XPATH, '/html/body/div[4]/div[1]/section/div[2]/div[1]/div[3]/div/div/div/div[2]/div/div[2]/div/div[2]/div[2]/button')

                success_message = wait.until(
                    EC.visibility_of_element_located((By.XPATH, '//div[@class="forceToastManager--default forceToastManager navexDesktopLayoutContainer lafAppLayoutHost forceAccess forceStyle oneOne"]//span[@class="slds-assistive-text"]'))
                )
                # テキストを取得して出力
                if (success_message.text == "成功"):
                    error = 0
                else:
                    error = 1
            except TimeoutException:
                error = 1
            finally:
                reactionid = k
                #errorの処理
                with engine.connect() as connection:
                    trans = connection.begin()
                    try:
                        #成功した場合は、mailreactionのその行を消去する
                        if error == 0:
                            connection.execute(table_mailreaction.delete().where(table_mailreaction.c.mailtypeid == reactionid))
                            error_data = {
                                'error': error
                            }
                        #失敗した場合は、mailreactionのattemptを1にする
                        if error == 1:
                            connection.execute(table_mailreaction.update().where(table_mailreaction.c.mailtypeid == reactionid).values(attempt=1))
                            # 挿入するデータを準備
                            error_data = {
                                'reactionid': reactionid,
                                'error': error,
                                'errortime': datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
                            }
                        # reactionerror テーブルにデータを挿入
                        connection.execute(table_reactionerror.insert(), error_data)
                        # トランザクションをコミット
                        trans.commit()
                    except Exception as e:
                        # エラーが発生した場合はロールバック
                        trans.rollback()
                driver.get(get_url)
                        
    except TimeoutException:
        error = 1
    finally:
        if driver:
            driver.quit()