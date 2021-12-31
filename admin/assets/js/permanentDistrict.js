const permanentDistrict_selected = document.querySelector(".permanentDistrict-selected");
const permanentDistrict_optionsContainer = document.querySelector(".permanentDistrict-options-container");
const permanentDistrict_searchBox = document.querySelector(".permanentDistrict-search-box input");
const permanentDistrict_optionsList = document.querySelectorAll(".permanentDistrict-options");
permanentDistrict_selected.addEventListener("click", () => {
    permanentDistrict_optionsContainer.classList.toggle("active");
});

permanentDistrict_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        permanentDistrict_selected.value = o.querySelector("label").innerHTML;
        permanentDistrict_optionsContainer.classList.remove("active");
    });
});

permanentDistrict_searchBox.addEventListener("keyup", function(e) {
    permanentDistrict_filterList(e.target.value);
});

const permanentDistrict_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    permanentDistrict_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};