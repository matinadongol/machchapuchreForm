const nomineeZone_selected = document.querySelector(".nomineeZone-selected");
const nomineeZone_optionsContainer = document.querySelector(".nomineeZone-options-container");
const nomineeZone_searchBox = document.querySelector(".nomineeZone-search-box input");
const nomineeZone_optionsList = document.querySelectorAll(".nomineeZone-options");
nomineeZone_selected.addEventListener("click", () => {
    nomineeZone_optionsContainer.classList.toggle("active");
});

nomineeZone_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        nomineeZone_selected.value = o.querySelector("label").innerHTML;
        nomineeZone_optionsContainer.classList.remove("active");
    });
});

nomineeZone_searchBox.addEventListener("keyup", function(e) {
    nomineeZone_filterList(e.target.value);
});

const nomineeZone_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    nomineeZone_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};