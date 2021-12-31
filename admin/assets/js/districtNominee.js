const nomineeDistrict_selected = document.querySelector(".nomineeDistrict-selected");
const nomineeDistrict_optionsContainer = document.querySelector(".nomineeDistrict-options-container");
const nomineeDistrict_searchBox = document.querySelector(".nomineeDistrict-search-box input");
const nomineeDistrict_optionsList = document.querySelectorAll(".nomineeDistrict-options");
nomineeDistrict_selected.addEventListener("click", () => {
    nomineeDistrict_optionsContainer.classList.toggle("active");
});

nomineeDistrict_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        nomineeDistrict_selected.value = o.querySelector("label").innerHTML;
        nomineeDistrict_optionsContainer.classList.remove("active");
    });
});

nomineeDistrict_searchBox.addEventListener("keyup", function(e) {
    nomineeDistrict_filterList(e.target.value);
});

const nomineeDistrict_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    nomineeDistrict_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};