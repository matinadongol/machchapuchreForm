const citizenshipIssueDistrict_selected = document.querySelector(".citizenshipIssueDistrict-selected");
const citizenshipIssueDistrict_optionsContainer = document.querySelector(".citizenshipIssueDistrict-options-container");
const citizenshipIssueDistrict_searchBox = document.querySelector(".citizenshipIssueDistrict-search-box input");
const citizenshipIssueDistrict_optionsList = document.querySelectorAll(".citizenshipIssueDistrict-options");
citizenshipIssueDistrict_selected.addEventListener("click", () => {
    citizenshipIssueDistrict_optionsContainer.classList.toggle("active");
});

citizenshipIssueDistrict_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        citizenshipIssueDistrict_selected.value = o.querySelector("label").innerHTML;
        citizenshipIssueDistrict_optionsContainer.classList.remove("active");
    });
});

citizenshipIssueDistrict_searchBox.addEventListener("keyup", function(e) {
    citizenshipIssueDistrict_filterList(e.target.value);
});

const citizenshipIssueDistrict_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    citizenshipIssueDistrict_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};