const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");
const containerCategoria = document.querySelector("#container-categoria");
const searchBox = document.querySelector(".search-box input");
const searchBtn = document.querySelector("#search-btn");
const optionsList = document.querySelectorAll(".option");
var selectedOption = null;
const especialidade = document.getElementById("#especialidade");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
  
  searchBox.value = "";
  filterList("");

  if (optionsContainer.classList.contains("active")) {
    searchBox.focus();
  }
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    selectedOption = selected.innerHTML;
    if(selectedOption == especialidade){
        containerCategoria.innerHTML = "adsds";
    }
    optionsContainer.classList.remove("active");
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

function filtrarMedicos(){
  document.location = '../menu-cliente/agendamento-medicos.php?especialidade=' + selectedOption;
}