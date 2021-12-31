const guardianZone_selected = document.querySelector(".guardianZone-selected");
const guardianZone_optionsContainer = document.querySelector(".guardianZone-options-container");
const guardianZone_searchBox = document.querySelector(".guardianZone-search-box input");
const guardianZone_optionsList = document.querySelectorAll(".guardianZone-options");
guardianZone_selected.addEventListener("click", () => {
    guardianZone_optionsContainer.classList.toggle("active");
});

guardianZone_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        guardianZone_selected.value = o.querySelector("label").innerHTML;
        guardianZone_optionsContainer.classList.remove("active");
    });
});

guardianZone_searchBox.addEventListener("keyup", function(e) {
    guardianZone_filterList(e.target.value);
});

const guardianZone_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    guardianZone_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};