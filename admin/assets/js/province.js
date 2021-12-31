const province_selected = document.querySelector(".province-selected");
const province_optionsContainer = document.querySelector(".province-options-container");
const province_searchBox = document.querySelector(".province-search-box input");
const province_optionsList = document.querySelectorAll(".province-options");
province_selected.addEventListener("click", () => {
    province_optionsContainer.classList.toggle("active");
});

province_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        province_selected.value = o.querySelector("label").innerHTML;
        province_optionsContainer.classList.remove("active");
    });
});

province_searchBox.addEventListener("keyup", function(e) {
    province_filterList(e.target.value);
});

const province_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    province_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};