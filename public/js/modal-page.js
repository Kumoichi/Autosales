
// 地域を選択するが押されたとき
function openModal(){
    document.getElementById("myModal").style.display = "block";
}

// ×が押されたとき
function closeModal(){
    document.getElementById("myModal").style.display = "none";
}

// モーダルの外側が押されたとき
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if(event.target == modal) {
        modal.style.display = "none";
    }
}

// 全てが選択されたとき
function toggleAllCheckboxes() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var checkboxes = document.querySelectorAll(".region-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
    updateSelectedRegion();
}

// 選択しないが選択されたとき
function deselectAll() {
    var checkboxes = document.querySelectorAll(".region-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    updateSelectedRegion();
}

var selectedRegion = [];

// チェックマーク、すべて、選択しないが選択されたとき
function updateSelectedRegion() {
    var checkboxes = document.querySelectorAll(".region-checkbox");
    var selectedRegion = [];

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedRegion.push(checkbox.value);
        }
    });

    document.querySelector(".nested-div-choice").innerText = selectedRegion.join(",");
    document.getElementById("selectedRegionInput").value = JSON.stringify(selectedRegion);
}



// ーーーーーーーーーーここから法人格ーーーーーーーーーーーーーーー
function openCorporateStatusModal(){
    document.getElementById("corporateStatusModal").style.display = "block";
}


function closeCorporateStatusModal(){
    document.getElementById("corporateStatusModal").style.display = "none";
}


// 全てが選択されたとき
function toggleAllCorporateStatusCheckboxes() {
    var selectAllCheckbox = document.getElementById("selectAllCorporateStatusCheckbox");
    var checkboxes = document.querySelectorAll(".corporateStatus-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
    updateSelectedCorporateStatus();
}

// 選択しないが選択されたとき
function deselectAllCorporateStatus() {
    var checkboxes = document.querySelectorAll(".corporateStatus-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    updateSelectedCorporateStatus();
}

var selectedCorporateStatus = [];

// チェックマーク、すべて、選択しないが選択されたとき
function updateSelectedCorporateStatus(){
    var checkboxes = document.querySelectorAll(".corporateStatus-checkbox");
    var selectedCorporateStatus = [];

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedCorporateStatus.push(checkbox.value);
        }
    });

    document.querySelector(".nested-div-choice.corporateStatus").innerText = selectedCorporateStatus.join(",");
    document.getElementById("selectedCorporateStatus").value = JSON.stringify(selectedCorporateStatus);
}