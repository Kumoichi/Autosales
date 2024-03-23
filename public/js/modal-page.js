// 全てがチェックされた場合
function toggleAllCheckboxes() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");
    var iwateCheckbox = document.getElementById("iwateCheckbox");


    if (selectAllCheckbox.checked) {
        hokkaidoCheckbox.checked = true;
        aomoriCheckbox.checked = true;
        iwateCheckbox.checked = true;
    } else {
        hokkaidoCheckbox.checked = false;
        aomoriCheckbox.checked = false;
        iwateCheckbox.checked = false;
    }

    updateSelectedRegion();
}


//　選択しないが選択された場合
function deselectAll() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");
    var iwateCheckbox = document.getElementById("iwateCheckbox");
    var noneCheckbox = document.getElementById("noneCheckbox");

    hokkaidoCheckbox.checked = false;
    aomoriCheckbox.checked = false;
    iwateCheckbox.checked = false;
    selectAllCheckbox.checked = false;

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
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");
    var iwateCheckbox = document.getElementById("iwateCheckbox");

    selectedRegion = [];

    if(hokkaidoCheckbox.checked)
    {
        selectedRegion.push(hokkaidoCheckbox.value);
    }

    if(aomoriCheckbox.checked)
    {
        selectedRegion.push(aomoriCheckbox.value);
    }
    if(iwateCheckbox.checked)
    {
        selectedRegion.push(iwateCheckbox.value);
    }

    document.querySelector(".nested-div-choice").innerText = selectedRegion.join(",");

    document.getElementById("selectedRegionInput").value = JSON.stringify(selectedRegion);
}

// function submitForm()
//     {
//         document.getElementById("regionForm").submit();
//     }
