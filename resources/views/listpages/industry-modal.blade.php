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
    height: auto;
    width: 900px;
}

.blue-box-section{
    background-color: gray;
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
                <input type="checkbox" id="selectRingyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Ringyou')">林業<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="nougyouCheckbox" class="industry-checkbox Ringyou" name="region" value="農業" onclick="updateSelectedIndustry()">
                    <label for="nougyouCheckbox">農業</label><br>
                    <input type="checkbox" id="ringyouCheckbox" class="industry-checkbox Ringyou" name="region" value="林業" onclick="updateSelectedIndustry()">
                    <label for="ringyouCheckbox">林業</label>
                </div>
            </div>

            <div class="white-box-section">
                <input type="checkbox" id="selectGyogyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Gyogyou')">漁業<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="gyogyouCheckbox" class="industry-checkbox Gyogyou" name="region" value="漁業" onclick="updateSelectedIndustry()">
                    <label for="gyogyouCheckbox">漁業（水産養殖業を除く）</label><br>
                    <input type="checkbox" id="suisanyoushokugyouCheckbox" class="industry-checkbox Gyogyou" name="region" value="水産養殖業" onclick="updateSelectedIndustry()">
                    <label for="saitamaCheckbox">水産養殖業</label>
                </div>
            </div>


            <div class="blue-box-section">
                <input type="checkbox" id="selectKougyouCheckbox" class="wrap-checkbox" onclick="toggleCheckboxes('Kougyou')">鉱業、採石業、砂利採取業<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="kougyouCheckbox" class="industry-checkbox Kougyou" name="region" value="鉱業" onclick="updateSelectedIndustry()">
                    <label for="kougyouCheckbox">鉱業</label><br>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>









