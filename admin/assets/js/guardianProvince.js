const guardianProvince_selected = document.querySelector(".guardianProvince-selected");
const guardianProvince_optionsContainer = document.querySelector(".guardianProvince-options-container");
const guardianProvince_searchBox = document.querySelector(".guardianProvince-search-box input");
const guardianProvince_optionsList = document.querySelectorAll(".guardianProvince-options");
guardianProvince_selected.addEventListener("click", () => {
    guardianProvince_optionsContainer.classList.toggle("active");
});

guardianProvince_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        guardianProvince_selected.value = o.querySelector("label").innerHTML;
        guardianProvince_optionsContainer.classList.remove("active");
    });
});

guardianProvince_searchBox.addEventListener("keyup", function(e) {
    guardianProvince_filterList(e.target.value);
});

const guardianProvince_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    guardianProvince_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};