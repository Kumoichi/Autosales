<div id="myModal" class="modal">

<!-- 都道府県Modal画面 -->
<div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="prefecture-modal-title">地域を選択してください。</div>
    <div class="prefecture-modal-title-underline"></div>

    <div class="all-nothing">
        <input type="checkbox" id="selectAllCheckbox" onclick="toggleAllCheckboxes()">全て<br>
        <input type="checkbox" id="noneCheckbox" onclick="deselectAll()" style="margin-left:40px;">選択しない
    </div>
    <div class="whole-prefectures">
        <div class="flex-prefectures leftmost">
            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="hokkaidoCheckbox" name="region" value="北海道" onclick="updateSelectedRegion()">
                <label for="hokkaidoCheckbox">北海道</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="aomoriCheckbox" name="region" value="青森県" onclick="updateSelectedRegion()">
                <label for="aomoriCheckbox">青森県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="iwateCheckbox" name="region" value="岩手県" onclick="updateSelectedRegion()">
                <label for="iwateCheckbox">岩手県</label><br>
            </div>

            <!-- Repeat for other prefectures -->
            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="miyagiCheckbox" name="region" value="宮城県" onclick="updateSelectedRegion()">
                <label for="miyagiCheckbox">宮城県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="akitaCheckbox" name="region" value="秋田県" onclick="updateSelectedRegion()">
                <label for="akitaCheckbox">秋田県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="yamagataCheckbox" name="region" value="山形県" onclick="updateSelectedRegion()">
                <label for="yamagataCheckbox">山形県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="fukushimaCheckbox" name="region" value="福島県" onclick="updateSelectedRegion()">
                <label for="fukushimaCheckbox">福島県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="ibarakiCheckbox" name="region" value="茨城県" onclick="updateSelectedRegion()">
                <label for="ibarakiCheckbox">茨城県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="tochigiCheckbox" name="region" value="栃木県" onclick="updateSelectedRegion()">
                <label for="tochigiCheckbox">栃木県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="gunmaCheckbox" name="region" value="群馬県" onclick="updateSelectedRegion()">
                <label for="gunmaCheckbox">群馬県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="saitamaCheckbox" name="region" value="埼玉県" onclick="updateSelectedRegion()">
                <label for="saitamaCheckbox">埼玉県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="chibaCheckbox" name="region" value="千葉県" onclick="updateSelectedRegion()">
                <label for="chibaCheckbox">千葉県</label><br>
            </div>
        </div>

        <div class="flex-prefectures">
            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="tokyoCheckbox" name="region" value="東京都" onclick="updateSelectedRegion()">
                <label for="tokyoCheckbox">東京都</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="kanagawaCheckbox" name="region" value="神奈川県" onclick="updateSelectedRegion()">
                <label for="kanagawaCheckbox">神奈川県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="niigataCheckbox" name="region" value="新潟県" onclick="updateSelectedRegion()">
                <label for="niigataCheckbox">新潟県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="toyamaCheckbox" name="region" value="富山県" onclick="updateSelectedRegion()">
                <label for="toyamaCheckbox">富山県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="ishikawaCheckbox" name="region" value="石川県" onclick="updateSelectedRegion()">
                <label for="ishikawaCheckbox">石川県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="fukuiCheckbox" name="region" value="福井県" onclick="updateSelectedRegion()">
                <label for="fukuiCheckbox">福井県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="yamanashiCheckbox" name="region" value="山梨県" onclick="updateSelectedRegion()">
                <label for="yamanashiCheckbox">山梨県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="naganoCheckbox" name="region" value="長野県" onclick="updateSelectedRegion()">
                <label for="naganoCheckbox">長野県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="gifuCheckbox" name="region" value="岐阜県" onclick="updateSelectedRegion()">
                <label for="gifuCheckbox">岐阜県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="shizuokaCheckbox" name="region" value="静岡県" onclick="updateSelectedRegion()">
                <label for="shizuokaCheckbox">静岡県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="aichiCheckbox" name="region" value="愛知県" onclick="updateSelectedRegion()">
                <label for="aichiCheckbox">愛知県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="mieCheckbox" name="region" value="三重県" onclick="updateSelectedRegion()">
                <label for="mieCheckbox">三重県</label><br>
            </div>
        </div>

        <div class="flex-prefectures">
        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="shigaCheckbox" name="region" value="滋賀県" onclick="updateSelectedRegion()">
            <label for="shigaCheckbox">滋賀県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="kyotoCheckbox" name="region" value="京都府" onclick="updateSelectedRegion()">
            <label for="kyotoCheckbox">京都府</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="osakaCheckbox" name="region" value="大阪府" onclick="updateSelectedRegion()">
            <label for="osakaCheckbox">大阪府</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="hyogoCheckbox" name="region" value="兵庫県" onclick="updateSelectedRegion()">
            <label for="hyogoCheckbox">兵庫県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="naraCheckbox" name="region" value="奈良県" onclick="updateSelectedRegion()">
            <label for="naraCheckbox">奈良県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="wakayamaCheckbox" name="region" value="和歌山県" onclick="updateSelectedRegion()">
            <label for="wakayamaCheckbox">和歌山県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="tottoriCheckbox" name="region" value="鳥取県" onclick="updateSelectedRegion()">
            <label for="tottoriCheckbox">鳥取県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="shimaneCheckbox" name="region" value="島根県" onclick="updateSelectedRegion()">
            <label for="shimaneCheckbox">島根県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="okayamaCheckbox" name="region" value="岡山県" onclick="updateSelectedRegion()">
            <label for="okayamaCheckbox">岡山県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="hiroshimaCheckbox" name="region" value="広島県" onclick="updateSelectedRegion()">
            <label for="hiroshimaCheckbox">広島県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="yamaguchiCheckbox" name="region" value="山口県" onclick="updateSelectedRegion()">
            <label for="yamaguchiCheckbox">山口県</label><br>
        </div>

        <div class="input-prefecture-adjustment">
            <input type="checkbox" id="tokushimaCheckbox" name="region" value="徳島県" onclick="updateSelectedRegion()">
            <label for="tokushimaCheckbox">徳島県</label><br>
        </div>

        </div>

        <div class="flex-prefectures">
            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="kagawaCheckbox" name="region" value="香川県" onclick="updateSelectedRegion()">
                <label for="kagawaCheckbox">香川県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="ehimeCheckbox" name="region" value="愛媛県" onclick="updateSelectedRegion()">
                <label for="ehimeCheckbox">愛媛県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="kochiCheckbox" name="region" value="高知県" onclick="updateSelectedRegion()">
                <label for="kochiCheckbox">高知県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="fukuokaCheckbox" name="region" value="福岡県" onclick="updateSelectedRegion()">
                <label for="fukuokaCheckbox">福岡県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="sagaCheckbox" name="region" value="佐賀県" onclick="updateSelectedRegion()">
                <label for="sagaCheckbox">佐賀県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="nagasakiCheckbox" name="region" value="長崎県" onclick="updateSelectedRegion()">
                <label for="nagasakiCheckbox">長崎県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="kumamotoCheckbox" name="region" value="熊本県" onclick="updateSelectedRegion()">
                <label for="kumamotoCheckbox">熊本県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="oitaCheckbox" name="region" value="大分県" onclick="updateSelectedRegion()">
                <label for="oitaCheckbox">大分県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="miyazakiCheckbox" name="region" value="宮崎県" onclick="updateSelectedRegion()">
                <label for="miyazakiCheckbox">宮崎県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="kagoshimaCheckbox" name="region" value="鹿児島県" onclick="updateSelectedRegion()">
                <label for="kagoshimaCheckbox">鹿児島県</label><br>
            </div>

            <div class="input-prefecture-adjustment">
                <input type="checkbox" id="okinawaCheckbox" name="region" value="沖縄県" onclick="updateSelectedRegion()">
                <label for="okinawaCheckbox">沖縄県</label><br>
            </div>

        </div>
    </div>
    </div>
</div>