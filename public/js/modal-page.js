
    // Make openModal function
    function openModal(){
        document.getElementById("myModal").style.display = "block";
    }

    // Make closeModal function
    function closeModal(){
        document.getElementById("myModal").style.display = "none";
    }

    // Make window clickable and disappear the modal window if other place is selected
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if(event.target == modal) {
            modal.style.display = "none";
        }
    }
// Initialize selectedRegion as an empty array
var selectedRegion = [];

// Make updateSelectedRegion() to pass the check box value to the nested-div-choice
// get hokkaido and aomori check box value, make an array, store values there and then submit
function updateSelectedRegion() {
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");

    selectedRegion = [];

    if(hokkaidoCheckbox.checked)
    {
        selectedRegion.push(hokkaidoCheckbox.value);
    }
    // even if you are not pressing at that time, if the state is check this if statement is executed.
    if(aomoriCheckbox.checked)
    {
        selectedRegion.push(aomoriCheckbox.value);
    }

    document.querySelector(".nested-div-choice").innerText = selectedRegion.join(",");

    document.getElementById("selectedRegionInput").value = JSON.stringify(selectedRegion);
}

// function submitForm()
//     {
//         document.getElementById("regionForm").submit();
//     }
