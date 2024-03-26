<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="{{ asset('js/modal-page.js') }}"></script> -->
    <style>
        
.inner-box {
    width: 350px; 
    height: 50px;
    background-color: white;
    margin: 10px;
}

.nested-div-description {
    margin-bottom: 5px;
}

.nested-div-choice {
    border: solid 1px gray;
    width: 100%;
    position: relative; 
    height: 40px;
    padding: 10px;
    box-sizing: border-box;
    cursor: pointer;
    background-color: white;
}

.down-arrow {
    position: absolute; 
    right: 10px; 
    top: 50%; 
    transform: translateY(-50%); 
}



.modal-content-insidebox
{
    border: 1px solid black;
    height: 400px;
    width: 900px;
    overflow: auto;
}

.blue-box-section{
    background-color:rgb(235, 248, 254);

}

.box-section-inside{
    margin-left: 50px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
    </style>
   
</head>
<body>


<!-- make modal window here -->
<div id="industryModal" class="modal">
    <div class="modal-content">

    <span class="close" onclick="closeIndustryModal()">&times;</span>
    <div class="prefecture-modal-title">業種を選択してください</div>
    <div class="prefecture-modal-title-underline"></div>

        <input type="checkbox" id="selectAllIndustryCheckbox" onclick="toggleAllIndustryCheckboxes()">全て<br>
        <input type="checkbox" id="noneCheckbox" onclick="deselectAllIndustry()">選択しない

        <div class="modal-content-insidebox">
            <div class="blue-box-section">
                <input type="checkbox" id="selectRingyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Ringyou')">林業 (A)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="nougyouCheckbox" class="industry-checkbox Ringyou" name="region" value="農業" onclick="updateSelectedIndustry()">
                    <label for="nougyouCheckbox">農業 (01)</label><br>
                    <input type="checkbox" id="ringyouCheckbox" class="industry-checkbox Ringyou" name="region" value="林業" onclick="updateSelectedIndustry()">
                    <label for="ringyouCheckbox">林業(02)</label>
                </div>
            </div>

            <div class="white-box-section">
                <input type="checkbox" id="selectGyogyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Gyogyou')">漁業 (B)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="gyogyouCheckbox" class="industry-checkbox Gyogyou" name="region" value="漁業" onclick="updateSelectedIndustry()">
                    <label for="gyogyouCheckbox">漁業（水産養殖業を除く） (03)</label><br>
                    <input type="checkbox" id="suisanyoushokugyouCheckbox" class="industry-checkbox Gyogyou" name="region" value="水産養殖業" onclick="updateSelectedIndustry()">
                    <label for="saitamaCheckbox">水産養殖業 (04)</label>
                </div>
            </div>


            <div class="blue-box-section">
                <input type="checkbox" id="selectKougyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Kougyou')">鉱業、採石業、砂利採取業 (C)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="kougyouSeizougyouCheckbox" class="industry-checkbox Kougyou" name="region" value="鉱業、採石業、砂利採取業" onclick="updateSelectedIndustry()">
                    <label for="kougyouSeizougyouCheckbox">鉱業、採石業、砂利採取業 (05)</label><br>
                </div>
            </div>

            <div class="white-box-section">
                <input type="checkbox" id="selectKensetsugyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Kensetsugyou')">建設業 (D)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="sougouKougyouCheckbox" class="industry-checkbox Kensetsugyou" name="region" value="総合工事業" onclick="updateSelectedIndustry()">
                    <label for="sougouKougyouCheckbox">総合工事業 (06)</label><br>
                    <input type="checkbox" id="shokubetsuKougyouCheckbox" class="industry-checkbox Kensetsugyou" name="region" value="職別工事業（設備工事業を除く） " onclick="updateSelectedIndustry()">
                    <label for="shokubetsuKougyouCheckbox">職別工事業（設備工事業を除く） (07)</label><br>
                    <input type="checkbox" id="setsubiKougyouCheckbox" class="industry-checkbox Kensetsugyou" name="region" value="設備工事業" onclick="updateSelectedIndustry()">
                    <label for="setsubiKougyouCheckbox">設備工事業 (08)</label><br>
                </div>
            </div>

            <div class="blue-box-section">
            <input type="checkbox" id="selectSeizougyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Seizougyou')">製造業 (E)<br>
            <div class="box-section-inside">
                <input type="checkbox" id="shokuryouhinSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="食料品製造業" onclick="updateSelectedIndustry()">
                <label for="shokuryouhinSeizougyouCheckbox">食料品製造業 (09)</label><br>
                <input type="checkbox" id="inryouTobaccoSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="飲料・たばこ・飼料製造業" onclick="updateSelectedIndustry()">
                <label for="inryouTobaccoSeizougyouCheckbox">飲料・たばこ・飼料製造業 (10)</label><br>
                <input type="checkbox" id="seniKougyouSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="繊維工業" onclick="updateSelectedIndustry()">
                <label for="seniKougyouSeizougyouCheckbox">繊維工業 (11)</label><br>
                <input type="checkbox" id="mokuzaiSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="木材・木製品製造業（家具を除く）" onclick="updateSelectedIndustry()">
                <label for="mokuzaiSeizougyouCheckbox">木材・木製品製造業（家具を除く） (12)</label><br>
                <input type="checkbox" id="kaguSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="家具・装備品製造業" onclick="updateSelectedIndustry()">
                <label for="kaguSeizougyouCheckbox">家具・装備品製造業 (13)</label><br>
                <input type="checkbox" id="parupuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="パルプ・紙・紙加工品製造業" onclick="updateSelectedIndustry()">
                <label for="parupuSeizougyouCheckbox">パルプ・紙・紙加工品製造業 (14)</label><br>
                <input type="checkbox" id="insatsuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="印刷・同関連業" onclick="updateSelectedIndustry()">
                <label for="insatsuSeizougyouCheckbox">印刷・同関連業 (15)</label><br>
                <input type="checkbox" id="kagakuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="化学工業" onclick="updateSelectedIndustry()">
                <label for="kagakuSeizougyouCheckbox">化学工業 (16)</label><br>
                <input type="checkbox" id="sekiyuyouhinSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="石油製品・石炭製品製造業" onclick="updateSelectedIndustry()">
                <label for="sekiyuyouhinSeizougyouCheckbox">石油製品・石炭製品製造業 (17)</label><br>
                <input type="checkbox" id="purasuchikkuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="プラスチック製品製造業（別掲を除く）" onclick="updateSelectedIndustry()">
                <label for="purasuchikkuSeizougyouCheckbox">プラスチック製品製造業（別掲を除く） (18)</label><br>
                <input type="checkbox" id="gomuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="ゴム製品製造業" onclick="updateSelectedIndustry()">
                <label for="gomuSeizougyouCheckbox">ゴム製品製造業 (19)</label><br>
                <input type="checkbox" id="namegawaSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="なめし革・同製品・毛皮製造業" onclick="updateSelectedIndustry()">
                <label for="namegawaSeizougyouCheckbox">なめし革・同製品・毛皮製造業 (20)</label><br>
                <input type="checkbox" id="kamaSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="窯業・土石製品製造業" onclick="updateSelectedIndustry()">
                <label for="kamaSeizougyouCheckbox">窯業・土石製品製造業 (21)</label><br>
                <input type="checkbox" id="tekkoSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="鉄鋼業" onclick="updateSelectedIndustry()">
                <label for="tekkoSeizougyouCheckbox">鉄鋼業 (22)</label><br>
                <input type="checkbox" id="hitekkkinzokuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="非鉄金属製造業" onclick="updateSelectedIndustry()">
                <label for="hitekkkinzokuSeizougyouCheckbox">非鉄金属製造業 (23)</label><br>
                <input type="checkbox" id="kinzokuseihinSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="金属製品製造業" onclick="updateSelectedIndustry()">
                <label for="kinzokuseihinSeizougyouCheckbox">金属製品製造業 (24)</label><br>
                <input type="checkbox" id="hanyouSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="はん用機械器具製造業" onclick="updateSelectedIndustry()">
                <label for="hanyouSeizougyouCheckbox">はん用機械器具製造業 (25)</label><br>
                <input type="checkbox" id="seisanSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="生産用機械器具製造業" onclick="updateSelectedIndustry()">
                <label for="seisanSeizougyouCheckbox">生産用機械器具製造業 (26)</label><br>
                <input type="checkbox" id="gyoumuSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="業務用機械器具製造業" onclick="updateSelectedIndustry()">
                <label for="gyoumuSeizougyouCheckbox">業務用機械器具製造業 (27)</label><br>
                <input type="checkbox" id="denshiSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="電子部品・デバイス・電子回路製造業" onclick="updateSelectedIndustry()">
                <label for="denshiSeizougyouCheckbox">電子部品・デバイス・電子回路製造業 (28)</label><br>
                <input type="checkbox" id="denkiSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="電気機械器具製造業" onclick="updateSelectedIndustry()">
                <label for="denkiSeizougyouCheckbox">電気機械器具製造業 (29)</label><br>
                <input type="checkbox" id="jouhouSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="情報通信機械器具製造業" onclick="updateSelectedIndustry()">
                <label for="jouhouSeizougyouCheckbox">情報通信機械器具製造業 (30)</label><br>
                <input type="checkbox" id="yusouSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="輸送用機械器具製造業" onclick="updateSelectedIndustry()">
                <label for="yusouSeizougyouCheckbox">輸送用機械器具製造業 (31)</label><br>
                <input type="checkbox" id="sonotaSeizougyouCheckbox" class="industry-checkbox Seizougyou" name="region" value="その他の製造業" onclick="updateSelectedIndustry()">
                <label for="sonotaSeizougyouCheckbox">その他の製造業 (32)</label><br>
                </div>
            </div>

            <div class="white-box-section">
                <input type="checkbox" id="selectDenkiGasuCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('DenkiGasu')">電気・ガス・熱供給・水道業 (F)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="denkiCheckbox" class="industry-checkbox DenkiGasu" name="region" value="電気業" onclick="updateSelectedIndustry()">
                    <label for="denkiCheckbox">電気業 (33)</label><br>
                    <input type="checkbox" id="gasuCheckbox" class="industry-checkbox DenkiGasu" name="region" value="ガス業" onclick="updateSelectedIndustry()">
                    <label for="gasuCheckbox">ガス業 (34)</label><br>
                    <input type="checkbox" id="netsukyokyuCheckbox" class="industry-checkbox DenkiGasu" name="region" value="熱供給業" onclick="updateSelectedIndustry()">
                    <label for="netsukyokyuCheckbox">熱供給業 (35)</label><br>
                    <input type="checkbox" id="suidoCheckbox" class="industry-checkbox DenkiGasu" name="region" value="水道業" onclick="updateSelectedIndustry()">
                    <label for="suidoCheckbox">水道業 (36)</label><br>
                </div>
            </div>

            <div class="blue-box-section">
                <input type="checkbox" id="selectJouhouTsushinCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('JouhouTsushin')">情報通信業 (G)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="tsushinCheckbox" class="industry-checkbox JouhouTsushin" name="region" value="通信業" onclick="updateSelectedIndustry()">
                    <label for="tsushinCheckbox">通信業 (37)</label><br>
                    <input type="checkbox" id="housouCheckbox" class="industry-checkbox JouhouTsushin" name="region" value="放送業" onclick="updateSelectedIndustry()">
                    <label for="housouCheckbox">放送業 (38)</label><br>
                    <input type="checkbox" id="jouhouServiceCheckbox" class="industry-checkbox JouhouTsushin" name="region" value="情報サービス業" onclick="updateSelectedIndustry()">
                    <label for="jouhouServiceCheckbox">情報サービス業 (39)</label><br>
                    <input type="checkbox" id="internetServiceCheckbox" class="industry-checkbox JouhouTsushin" name="region" value="インターネット附随サービス業" onclick="updateSelectedIndustry()">
                    <label for="internetServiceCheckbox">インターネット附随サービス業 (40)</label><br>
                    <input type="checkbox" id="eizouCheckbox" class="industry-checkbox JouhouTsushin" name="region" value="映像・音声・文字情報制作業" onclick="updateSelectedIndustry()">
                    <label for="eizouCheckbox">映像・音声・文字情報制作業 (41)</label><br>
                </div>
            </div>

            <div class="white-box-section">
                <input type="checkbox" id="selectUnyuYubinCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('UnyuYubin')">運輸業、郵便業 (H)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="tetsudoCheckbox" class="industry-checkbox UnyuYubin" name="region" value="鉄道業" onclick="updateSelectedIndustry()">
                    <label for="tetsudoCheckbox">鉄道業 (42)</label><br>
                    <input type="checkbox" id="douroRyokakuCheckbox" class="industry-checkbox UnyuYubin" name="region" value="道路旅客運送業" onclick="updateSelectedIndustry()">
                    <label for="douroRyokakuCheckbox">道路旅客運送業 (43)</label><br>
                    <input type="checkbox" id="douroKamotsuCheckbox" class="industry-checkbox UnyuYubin" name="region" value="道路貨物運送業" onclick="updateSelectedIndustry()">
                    <label for="douroKamotsuCheckbox">道路貨物運送業 (44)</label><br>
                    <input type="checkbox" id="suiryokuCheckbox" class="industry-checkbox UnyuYubin" name="region" value="水運業" onclick="updateSelectedIndustry()">
                    <label for="suiryokuCheckbox">水運業 (45)</label><br>
                    <input type="checkbox" id="koukuUnyuCheckbox" class="industry-checkbox UnyuYubin" name="region" value="航空運輸業" onclick="updateSelectedIndustry()">
                    <label for="koukuUnyuCheckbox">航空運輸業 (46)</label><br>
                    <input type="checkbox" id="soukoGyouCheckbox" class="industry-checkbox UnyuYubin" name="region" value="倉庫業" onclick="updateSelectedIndustry()">
                    <label for="soukoGyouCheckbox">倉庫業 (47)</label><br>
                    <input type="checkbox" id="unyuServiceCheckbox" class="industry-checkbox UnyuYubin" name="region" value="運輸に附帯するサービス業" onclick="updateSelectedIndustry()">
                    <label for="unyuServiceCheckbox">運輸に附帯するサービス業 (48)</label><br>
                    <input type="checkbox" id="yuubinCheckbox" class="industry-checkbox UnyuYubin" name="region" value="郵便業（信書便事業を含む）" onclick="updateSelectedIndustry()">
                    <label for="yuubinCheckbox">郵便業（信書便事業を含む） (49)</label><br>
                </div>
            </div>



            <div class="blue-box-section">
                <input type="checkbox" id="selectOrosiKouriCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('OrosiKouri')">卸売業、小売業 (I)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="kakushuOrosiCheckbox" class="industry-checkbox OrosiKouri" name="region" value="各種商品卸売業" onclick="updateSelectedIndustry()">
                    <label for="kakushuOrosiCheckbox">各種商品卸売業 (50)</label><br>
                    <input type="checkbox" id="seniOrosiCheckbox" class="industry-checkbox OrosiKouri" name="region" value="繊維・衣服等卸売業" onclick="updateSelectedIndustry()">
                    <label for="seniOrosiCheckbox">繊維・衣服等卸売業 (51)</label><br>
                    <input type="checkbox" id="drinkOrosiCheckbox" class="industry-checkbox OrosiKouri" name="region" value="飲食料品卸売業" onclick="updateSelectedIndustry()">
                    <label for="drinkOrosiCheckbox">飲食料品卸売業 (52)</label><br>
                    <input type="checkbox" id="kenzaiOrosiCheckbox" class="industry-checkbox OrosiKouri" name="region" value="建築材料、鉱物・金属材料等卸売業" onclick="updateSelectedIndustry()">
                    <label for="kenzaiOrosiCheckbox">建築材料、鉱物・金属材料等卸売業 (53)</label><br>
                    <input type="checkbox" id="kikaiOrosiCheckbox" class="industry-checkbox OrosiKouri" name="region" value="機械器具卸売業" onclick="updateSelectedIndustry()">
                    <label for="kikaiOrosiCheckbox">機械器具卸売業 (54)</label><br>
                    <input type="checkbox" id="sonotaOrosiCheckbox" class="industry-checkbox OrosiKouri" name="region" value="その他の卸売業" onclick="updateSelectedIndustry()">
                    <label for="sonotaOrosiCheckbox">その他の卸売業 (55)</label><br>
                    <input type="checkbox" id="kakushuShoriCheckbox" class="industry-checkbox OrosiKouri" name="region" value="各種商品小売業" onclick="updateSelectedIndustry()">
                    <label for="kakushuShoriCheckbox">各種商品小売業 (56)</label><br>
                    <input type="checkbox" id="oriShoriCheckbox" class="industry-checkbox OrosiKouri" name="region" value="織物・衣服・身の回り品小売業" onclick="updateSelectedIndustry()">
                    <label for="oriShoriCheckbox">織物・衣服・身の回り品小売業 (57)</label><br>
                    <input type="checkbox" id="drinkShoriCheckbox" class="industry-checkbox OrosiKouri" name="region" value="飲食料品小売業" onclick="updateSelectedIndustry()">
                    <label for="drinkShoriCheckbox">飲食料品小売業 (58)</label><br>
                    <input type="checkbox" id="kikaiShoriCheckbox" class="industry-checkbox OrosiKouri" name="region" value="機械器具小売業" onclick="updateSelectedIndustry()">
                    <label for="kikaiShoriCheckbox">機械器具小売業 (59)</label><br>
                    <input type="checkbox" id="sonotaShoriCheckbox" class="industry-checkbox OrosiKouri" name="region" value="その他の小売業" onclick="updateSelectedIndustry()">
                    <label for="sonotaShoriCheckbox">その他の小売業 (60)</label><br>
                    <input type="checkbox" id="muteShopShoriCheckbox" class="industry-checkbox OrosiKouri" name="region" value="無店舗小売業" onclick="updateSelectedIndustry()">
                    <label for="muteShopShoriCheckbox">無店舗小売業 (61)</label><br>
                </div>
            </div>


            <div class="white-box-section">
                <input type="checkbox" id="selectKinriHokenCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('KinriHoken')">金融業、保険業 (J)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="ginkouGyouCheckbox" class="industry-checkbox KinriHoken" name="region" value="銀行業" onclick="updateSelectedIndustry()">
                    <label for="ginkouGyouCheckbox">銀行業 (62)</label><br>
                    <input type="checkbox" id="kyoudouGinkouGyouCheckbox" class="industry-checkbox KinriHoken" name="region" value="協同組織金融業" onclick="updateSelectedIndustry()">
                    <label for="kyoudouGinkouGyouCheckbox">協同組織金融業 (63)</label><br>
                    <input type="checkbox" id="kashikinGyouCheckbox" class="industry-checkbox KinriHoken" name="region" value="貸金業、クレジットカード業等非預金信用機関" onclick="updateSelectedIndustry()">
                    <label for="kashikinGyouCheckbox">貸金業、クレジットカード業等非預金信用機関 (64)</label><br>
                    <input type="checkbox" id="kinriShouhinGyouCheckbox" class="industry-checkbox KinriHoken" name="region" value="金融商品取引業、商品先物取引業" onclick="updateSelectedIndustry()">
                    <label for="kinriShouhinGyouCheckbox">金融商品取引業、商品先物取引業 (65)</label><br>
                    <input type="checkbox" id="hochitekiKinriGyouCheckbox" class="industry-checkbox KinriHoken" name="region" value="補助的金融業等" onclick="updateSelectedIndustry()">
                    <label for="hochitekiKinriGyouCheckbox">補助的金融業等 (66)</label><br>
                    <input type="checkbox" id="hokenGyouCheckbox" class="industry-checkbox KinriHoken" name="region" value="保険業（保険媒介代理業、保険サービス業を含む）" onclick="updateSelectedIndustry()">
                    <label for="hokenGyouCheckbox">保険業（保険媒介代理業、保険サービス業を含む） (67)</label><br>
                </div>
            </div>

            <div class="blue-box-section">
                <input type="checkbox" id="selectFudousanChintaiCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('FudousanChintai')">不動産業、物品賃貸業 (K)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="fudousanTorihikiGyouCheckbox" class="industry-checkbox FudousanChintai" name="region" value="不動産取引業" onclick="updateSelectedIndustry()">
                    <label for="fudousanTorihikiGyouCheckbox">不動産取引業 (68)</label><br>
                    <input type="checkbox" id="fudousanChintaiKanriGyouCheckbox" class="industry-checkbox FudousanChintai" name="region" value="不動産賃貸業・管理業" onclick="updateSelectedIndustry()">
                    <label for="fudousanChintaiKanriGyouCheckbox">不動産賃貸業・管理業 (69)</label><br>
                    <input type="checkbox" id="busshinChintaiGyouCheckbox" class="industry-checkbox FudousanChintai" name="region" value="物品賃貸業" onclick="updateSelectedIndustry()">
                    <label for="busshinChintaiGyouCheckbox">物品賃貸業 (70)</label><br>
                </div>
            </div>


            <div class="white-box-section">
                <input type="checkbox" id="selectGakujutuSenmonGijutsuCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('GakujutuSenmonGijutsu')">学術研究、専門・技術サービス業 (L)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="gakujutsuKenkyuuKikanCheckbox" class="industry-checkbox GakujutuSenmonGijutsu" name="region" value="学術・開発研究機関" onclick="updateSelectedIndustry()">
                    <label for="gakujutsuKenkyuuKikanCheckbox">学術・開発研究機関 (71)</label><br>
                    <input type="checkbox" id="senmonServiceCheckbox" class="industry-checkbox GakujutuSenmonGijutsu" name="region" value="専門サービス業（他に分類されないもの）" onclick="updateSelectedIndustry()">
                    <label for="senmonServiceCheckbox">専門サービス業（他に分類されないもの） (72)</label><br>
                    <input type="checkbox" id="koukokugyouCheckbox" class="industry-checkbox GakujutuSenmonGijutsu" name="region" value="広告業" onclick="updateSelectedIndustry()">
                    <label for="koukokugyouCheckbox">広告業 (73)</label><br>
                    <input type="checkbox" id="gijutsuServiceCheckbox" class="industry-checkbox GakujutuSenmonGijutsu" name="region" value="技術サービス業（他に分類されないもの）" onclick="updateSelectedIndustry()">
                    <label for="gijutsuServiceCheckbox">技術サービス業（他に分類されないもの） (74)</label><br>
                </div>
            </div>



            <div class="blue-box-section">
                <input type="checkbox" id="selectShukuhakuInshokuServiceCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('ShukuhakuInshokuService')">宿泊業、飲食サービス業 (M)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="shukuhakuGyouCheckbox" class="industry-checkbox ShukuhakuInshokuService" name="region" value="宿泊業" onclick="updateSelectedIndustry()">
                    <label for="shukuhakuGyouCheckbox">宿泊業 (75)</label><br>
                    <input type="checkbox" id="inshokuCheckbox" class="industry-checkbox ShukuhakuInshokuService" name="region" value="飲食店" onclick="updateSelectedIndustry()">
                    <label for="inshokuCheckbox">飲食店 (76)</label><br>
                    <input type="checkbox" id="mochikaeriInshokuServiceCheckbox" class="industry-checkbox ShukuhakuInshokuService" name="region" value="持ち帰り・配達飲食サービス業" onclick="updateSelectedIndustry()">
                    <label for="mochikaeriInshokuServiceCheckbox">持ち帰り・配達飲食サービス業 (77)</label><br>
                </div>
            </div>


            <div class="white-box-section">
                <input type="checkbox" id="selectSeikatsuKanrenGorakuGyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('SeikatsuKanrenGorakuGyou')">生活関連サービス業、娯楽業 (N)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="sentakuRiyouCheckbox" class="industry-checkbox SeikatsuKanrenGorakuGyou" name="region" value="洗濯・理容・美容・浴場業" onclick="updateSelectedIndustry()">
                    <label for="sentakuRiyouCheckbox">洗濯・理容・美容・浴場業 (78)</label><br>
                    <input type="checkbox" id="sonoTaSeikatsuKanrenGyouCheckbox" class="industry-checkbox SeikatsuKanrenGorakuGyou" name="region" value="その他の生活関連サービス業" onclick="updateSelectedIndustry()">
                    <label for="sonoTaSeikatsuKanrenGyouCheckbox">その他の生活関連サービス業 (79)</label><br>
                    <input type="checkbox" id="gorakuGyouCheckbox" class="industry-checkbox SeikatsuKanrenGorakuGyou" name="region" value="娯楽業" onclick="updateSelectedIndustry()">
                    <label for="gorakuGyouCheckbox">娯楽業 (80)</label><br>
                </div>
            </div>



            <div class="blue-box-section">
                <input type="checkbox" id="selectKyōikuGakushūShienGyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('KyōikuGakushūShienGyou')">教育、学習支援業 (O)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="gakkouKyōikuCheckbox" class="industry-checkbox KyōikuGakushūShienGyou" name="region" value="学校教育" onclick="updateSelectedIndustry()">
                    <label for="gakkouKyōikuCheckbox">学校教育 (81)</label><br>
                    <input type="checkbox" id="sonoTaKyōikuCheckbox" class="industry-checkbox KyōikuGakushūShienGyou" name="region" value="その他の教育、学習支援業" onclick="updateSelectedIndustry()">
                    <label for="sonoTaKyōikuCheckbox">その他の教育、学習支援業 (82)</label><br>
                </div>
            </div>


            <div class="white-box-section">
                <input type="checkbox" id="selectIryouFukushiCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('IryouFukushi')">医療、福祉 (P)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="iryouGyouCheckbox" class="industry-checkbox IryouFukushi" name="region" value="医療業" onclick="updateSelectedIndustry()">
                    <label for="iryouGyouCheckbox">医療業 (83)</label><br>
                    <input type="checkbox" id="hokenEiseiCheckbox" class="industry-checkbox IryouFukushi" name="region" value="保健衛生" onclick="updateSelectedIndustry()">
                    <label for="hokenEiseiCheckbox">保健衛生 (84)</label><br>
                    <input type="checkbox" id="shakaiHokenFukushiKaiCheckbox" class="industry-checkbox IryouFukushi" name="region" value="社会保険・社会福祉・介護事業" onclick="updateSelectedIndustry()">
                    <label for="shakaiHokenFukushiKaiCheckbox">社会保険・社会福祉・介護事業 (85)</label><br>
                </div>
            </div>


            <div class="blue-box-section">
                <input type="checkbox" id="selectFukugouServiceCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('FukugouService')">複合サービス事業 (Q)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="yuubinkyokuCheckbox" class="industry-checkbox FukugouService" name="region" value="郵便局" onclick="updateSelectedIndustry()">
                    <label for="yuubinkyokuCheckbox">郵便局 (86)</label><br>
                    <input type="checkbox" id="kyoudouKumiaiCheckbox" class="industry-checkbox FukugouService" name="region" value="協同組合（他に分類されないもの）" onclick="updateSelectedIndustry()">
                    <label for="kyoudouKumiaiCheckbox">協同組合（他に分類されないもの） (87)</label><br>
                </div>
            </div>



            <div class="white-box-section">
            <div class="blue-box-section">
                <input type="checkbox" id="selectServiceCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Service')">サービス業（他に分類されないもの） (R)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="haikibutsuCheckbox" class="industry-checkbox Service" name="region" value="廃棄物処理業" onclick="updateSelectedIndustry()">
                    <label for="haikibutsuCheckbox">廃棄物処理業 (88)</label><br>
                    <input type="checkbox" id="jidoushaSeibiCheckbox" class="industry-checkbox Service" name="region" value="自動車整備業" onclick="updateSelectedIndustry()">
                    <label for="jidoushaSeibiCheckbox">自動車整備業 (89)</label><br>
                    <input type="checkbox" id="kikaiShuuriCheckbox" class="industry-checkbox Service" name="region" value="機械等修理業（別掲を除く）" onclick="updateSelectedIndustry()">
                    <label for="kikaiShuuriCheckbox">機械等修理業（別掲を除く） (90)</label><br>
                    <input type="checkbox" id="shokushoukaiCheckbox" class="industry-checkbox Service" name="region" value="職業紹介・労働者派遣業" onclick="updateSelectedIndustry()">
                    <label for="shokushoukaiCheckbox">職業紹介・労働者派遣業 (91)</label><br>
                    <input type="checkbox" id="sonotaJigyoCheckbox" class="industry-checkbox Service" name="region" value="その他の事業サービス業" onclick="updateSelectedIndustry()">
                    <label for="sonotaJigyoCheckbox">その他の事業サービス業 (92)</label><br>
                    <input type="checkbox" id="seijikeizaiCheckbox" class="industry-checkbox Service" name="region" value="政治・経済・文化団体" onclick="updateSelectedIndustry()">
                    <label for="seijikeizaiCheckbox">政治・経済・文化団体 (93)</label><br>
                    <input type="checkbox" id="shuukyouCheckbox" class="industry-checkbox Service" name="region" value="宗教" onclick="updateSelectedIndustry()">
                    <label for="shuukyouCheckbox">宗教 (94)</label><br>
                    <input type="checkbox" id="sonotaServiceCheckbox" class="industry-checkbox Service" name="region" value="その他のサービス業" onclick="updateSelectedIndustry()">
                    <label for="sonotaServiceCheckbox">その他のサービス業 (95)</label><br>
                    <input type="checkbox" id="gaikokukoumuCheckbox" class="industry-checkbox Service" name="region" value="外国公務" onclick="updateSelectedIndustry()">
                    <label for="gaikokukoumuCheckbox">外国公務 (96)</label><br>
                </div>
            </div>    
            </div>


            <div class="white-box-section">
                <input type="checkbox" id="selectKoumuCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Koumu')">公務（他に分類されるものを除く） (S)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="kokkaKoumuCheckbox" class="industry-checkbox Koumu" name="region" value="国家公務" onclick="updateSelectedIndustry()">
                    <label for="kokkaKoumuCheckbox">国家公務 (97)</label><br>
                    <input type="checkbox" id="chihouKoumuCheckbox" class="industry-checkbox Koumu" name="region" value="地方公務" onclick="updateSelectedIndustry()">
                    <label for="chihouKoumuCheckbox">地方公務 (98)</label><br>
                </div>
            </div>


            <div class="blue-box-section">
                <input type="checkbox" id="selectBunruiFunouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('BunruiFunou')">分類不能の産業 (T)<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="bunruiFunouGyouCheckbox" class="industry-checkbox BunruiFunou" name="region" value="分類不能の産業" onclick="updateSelectedIndustry()">
                    <label for="bunruiFunouGyouCheckbox">分類不能の産業 (99)</label><br>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>