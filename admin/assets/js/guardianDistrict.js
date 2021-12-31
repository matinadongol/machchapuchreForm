const guardianDistrict_selected = document.querySelector(".guardianDistrict-selected");
const guardianDistrict_optionsContainer = document.querySelector(".guardianDistrict-options-container");
const guardianDistrict_searchBox = document.querySelector(".guardianDistrict-search-box input");
const guardianDistrict_optionsList = document.querySelectorAll(".guardianDistrict-options");
guardianDistrict_selected.addEventListener("click", () => {
    guardianDistrict_optionsContainer.classList.toggle("active");
});

guardianDistrict_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        guardianDistrict_selected.value = o.querySelector("label").innerHTML;
        guardianDistrict_optionsContainer.classList.remove("active");
    });
});

guardianDistrict_searchBox.addEventListener("keyup", function(e) {
    guardianDistrict_filterList(e.target.value);
});

const guardianDistrict_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    guardianDistrict_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};