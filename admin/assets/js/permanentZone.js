const permanentZone_selected = document.querySelector(".permanentZone-selected");
const permanentZone_optionsContainer = document.querySelector(".permanentZone-options-container");
const permanentZone_searchBox = document.querySelector(".permanentZone-search-box input");
const permanentZone_optionsList = document.querySelectorAll(".permanentZone-options");
permanentZone_selected.addEventListener("click", () => {
    permanentZone_optionsContainer.classList.toggle("active");
});

permanentZone_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        permanentZone_selected.value = o.querySelector("label").innerHTML;
        permanentZone_optionsContainer.classList.remove("active");
    });
});

permanentZone_searchBox.addEventListener("keyup", function(e) {
    permanentZone_filterList(e.target.value);
});

const permanentZone_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    permanentZone_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};