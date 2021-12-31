const placeOfIssue_selected = document.querySelector(".placeOfIssue-selected");
const placeOfIssue_optionsContainer = document.querySelector(".placeOfIssue-options-container");
const placeOfIssue_searchBox = document.querySelector(".placeOfIssue-search-box input");
const placeOfIssue_optionsList = document.querySelectorAll(".placeOfIssue-options");
placeOfIssue_selected.addEventListener("click", () => {
    placeOfIssue_optionsContainer.classList.toggle("active");
});

placeOfIssue_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        placeOfIssue_selected.value = o.querySelector("label").innerHTML;
        placeOfIssue_optionsContainer.classList.remove("active");
    });
});

placeOfIssue_searchBox.addEventListener("keyup", function(e) {
    placeOfIssue_filterList(e.target.value);
});

const placeOfIssue_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    placeOfIssue_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};