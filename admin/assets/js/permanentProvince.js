const permanentProvince_selected = document.querySelector(".permanentProvince-selected");
const permanentProvince_optionsContainer = document.querySelector(".permanentProvince-options-container");
const permanentProvince_searchBox = document.querySelector(".permanentProvince-search-box input");
const permanentProvince_optionsList = document.querySelectorAll(".permanentProvince-options");
permanentProvince_selected.addEventListener("click", () => {
    permanentProvince_optionsContainer.classList.toggle("active");
});

permanentProvince_optionsList.forEach(o => {
    o.addEventListener("click", () => {
        permanentProvince_selected.value = o.querySelector("label").innerHTML;
        permanentProvince_optionsContainer.classList.remove("active");
    });
});

permanentProvince_searchBox.addEventListener("keyup", function(e) {
    permanentProvince_filterList(e.target.value);
});

const permanentProvince_filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    permanentProvince_optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};