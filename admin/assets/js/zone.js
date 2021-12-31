const zone_selected = document.querySelector(".zone-selected");
const zone_optionsContainer = document.querySelector(".zone-options-container");
const zone_searchBox = document.querySelector(".zone-search-box input");
const zone_optionsList = document.querySelectorAll(".zone-options");
zone_selected.addEventListener("click", () => {
    zone_optionsContainer.classList.toggle("active");
});

zone_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        zone_selected.value = o.querySelector("label").innerHTML;
        zone_optionsContainer.classList.remove("active");
    });
});

zone_searchBox.addEventListener("keyup", function(e) {
    zone_filterList(e.target.value);
});

const zone_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    zone_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};