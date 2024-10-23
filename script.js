//Función de la barra lateral de la pestaña "home.php"
document.addEventListener("DOMContentLoaded", function() {
    const menuBtn = document.querySelector(".menu-btn");
    const menuItems = document.querySelector(".menu-items");

    let menuOpen = false;

    menuBtn.addEventListener("click", function() {
        if (!menuOpen) {
            openMenu();
        } else {
            closeMenu();
        }
    });

    function openMenu() {
        menuBtn.classList.add("open");
        menuItems.style.width = "250px"; // Establecer el ancho deseado de la barra lateral
        menuOpen = true;
    }

    function closeMenu() {
        menuBtn.classList.remove("open");
        menuItems.style.width = "0"; // Retraer la barra lateral estableciendo el ancho a 0
        menuOpen = false;
    }
});