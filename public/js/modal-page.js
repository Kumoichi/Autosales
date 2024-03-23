//個々のリピートしているところの省略する方法知っておいたほうがいいから、復習する。
// 今ある形とgithubにある形を比較してみる。


// Function to toggle all checkboxes
function toggleAllCheckboxes() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var checkboxes = document.querySelectorAll(".region-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
    updateSelectedRegion();
}

// Function to deselect all checkboxes
function deselectAll() {
    var checkboxes = document.querySelectorAll(".region-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    updateSelectedRegion();
}

    
    function openModal(){
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal(){
        document.getElementById("myModal").style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if(event.target == modal) {
            modal.style.display = "none";
        }
    }
var selectedRegion = [];

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

// function submitForm()
//     {
//         document.getElementById("regionForm").submit();
//     }
