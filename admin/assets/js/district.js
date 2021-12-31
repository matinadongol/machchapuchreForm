const district_selected = document.querySelector(".district-selected");
const district_optionsContainer = document.querySelector(".district-options-container");
const district_searchBox = document.querySelector(".district-search-box input");
const district_optionsList = document.querySelectorAll(".district-options");
district_selected.addEventListener("click", () => {
    district_optionsContainer.classList.toggle("active");
});

district_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        district_selected.value = o.querySelector("label").innerHTML;
        district_optionsContainer.classList.remove("active");
    });
});

district_searchBox.addEventListener("keyup", function(e) {
    district_filterList(e.target.value);
});

const district_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    district_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};