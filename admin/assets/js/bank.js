const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");
const searchBox = document.querySelector(".search-box input");
const optionsList = document.querySelectorAll(".options");
selected.addEventListener("click", () => {
    optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
    o.addEventListener("click", () => {
        //selected.innerHTML = o.querySelector("label").innerHTML;
        selected.value = o.querySelector("label").innerHTML;
        //document.getElementByClass("selected").value = o.querySelector("label").innerHTML;
        optionsContainer.classList.remove("active");
        document.getElementById('branch').disabled = false;
        var bankname = selected.value;
        console.log(bankname);
        $.ajax({
            url: "branch_by_bank.php",
            type: "POST",
            data: {
                bankname: bankname
            },
            cache: false,
            success: function(result) {
                $("#branch").html(result);
                console.log(result);
            }
        });
    });
});

searchBox.addEventListener("keyup", function(e) {
    filterList(e.target.value);
});

const filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    optionsList.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
};