<div id="corporateStatusModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCorporateStatusModal()">&times;</span>
        <div class="prefecture-modal-title">法人格を選択してください</div>
        <div class="prefecture-modal-title-underline"></div>

        <div class="all-nothing">
            <input type="checkbox" id="selectAllCorporateStatusCheckbox" onclick="toggleAllCorporateStatusCheckboxes()">全て<br>
            <input type="checkbox" id="noneCheckbox" onclick="deselectAllCorporateStatus()" style="margin-left:40px;">選択しない
        </div>
        <div class="whole-corporateStatus">
            <div class="flex-prefectures leftmost">
                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="kabusikigaishaCheckbox" name="corporation" class="corporateStatus-checkbox" value="株式会社" onclick="updateSelectedCorporateStatus()">
                    <label for="kabusikigaishaCheckbox">株式会社</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="goumeigaishaCheckbox" name="coporation" class="corporateStatus-checkbox" value="合名会社" onclick="updateSelectedCorporateStatus()">
                    <label for="goumeigaishaCheckbox">合名会社</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="tokuteihieigyoudouhoujinCheckbox" name="corporation" class="corporateStatus-checkbox" value="特定非営利活動法人" onclick="updateSelectedCorporateStatus()">
                    <label for="tokuteihieigyoudouhoujinCheckbox">特定非営利活動法人</label><br>
                </div>
            </div>

            <div class="flex-prefectures">
                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="yuugengaishaCheckbox" name="corporation" class="corporateStatus-checkbox" value="有限会社" onclick="updateSelectedCorporateStatus()">
                    <label for="yuugengaishaCheckbox">有限会社</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="shakaifukushiCheckbox" name="corporation" class="corporateStatus-checkbox" value="社会福祉法人" onclick="updateSelectedCorporateStatus()">
                    <label for="shakaifukushiCheckbox">社会福祉法人</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="gakkouhoujinCheckbox" name="corporation" class="corporateStatus-checkbox" value="学校法人" onclick="updateSelectedCorporateStatus()">
                    <label for="gakkouhoujinCheckbox">学校法人</label><br>
                </div>
            </div>
            <div class="flex-prefectures">
                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="godougaishaCheckbox" name="corporation" class="corporateStatus-checkbox" value="合同会社" onclick="updateSelectedCorporateStatus()">
                    <label for="godougaishaCheckbox">合同会社</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="shadanhoujinCheckbox" name="corporation" class="corporateStatus-checkbox" value="社団法人" onclick="updateSelectedCorporateStatus()">
                    <label for="shadanhoujinCheckbox">社団法人</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="zaidanhoujinCheckbox" name="corporation" class="corporateStatus-checkbox" value="財団法人" onclick="updateSelectedCorporateStatus()">
                    <label for="zaidanhoujinCheckbox">財団法人</label><br>
                </div>
            </div>

            <div class="flex-prefectures">
                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="goushigaishaCheckbox" name="corporation" class="corporateStatus-checkbox" value="合資会社" onclick="updateSelectedCorporateStatus()">
                    <label for="goushigaishaCheckbox">合資会社</label><br>
                </div>

                <div class="input-prefecture-adjustment">
                    <input type="checkbox" id="sonotaCheckbox" name="corporation" class="corporateStatus-checkbox" value="その他" onclick="updateSelectedCorporateStatus()">
                    <label for="sonotaCheckbox">その他</label><br>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>