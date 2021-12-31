const guardianIssuedDistrict_selected = document.querySelector(".guardianIssuedDistrict-selected");
const guardianIssuedDistrict_optionsContainer = document.querySelector(".guardianIssuedDistrict-options-container");
const guardianIssuedDistrict_searchBox = document.querySelector(".guardianIssuedDistrict-search-box input");
const guardianIssuedDistrict_optionsList = document.querySelectorAll(".guardianIssuedDistrict-options");
guardianIssuedDistrict_selected.addEventListener("click", () => {
    guardianIssuedDistrict_optionsContainer.classList.toggle("active");
});

guardianIssuedDistrict_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        guardianIssuedDistrict_selected.value = o.querySelector("label").innerHTML;
        guardianIssuedDistrict_optionsContainer.classList.remove("active");
    });
});

guardianIssuedDistrict_searchBox.addEventListener("keyup", function(e) {
    guardianIssuedDistrict_filterList(e.target.value);
});

const guardianIssuedDistrict_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    guardianIssuedDistrict_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};