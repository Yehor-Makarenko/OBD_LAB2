const menuButton = document.getElementById("menu-button");
const mainMenu = document.getElementById("main-menu");

menuButton.onclick = () => {
  mainMenu.classList.toggle("active");
  menuButton.innerHTML = menuButton.innerHTML == "Меню" ? "Закрити" : "Меню";
};