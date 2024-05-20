import './bootstrap';

const sidebar = document.querySelector("#sidebar");
const sidebarOpenButton = document.querySelector("#sidebar-open");
const sidebarCloseButton = document.querySelector("#sidebar-close");

sidebarOpenButton.addEventListener('click', () => {
    sidebar.classList.add("sidebar-container-active");
});

sidebarCloseButton.addEventListener('click', () => {
    sidebar.classList.remove("sidebar-container-active");
});