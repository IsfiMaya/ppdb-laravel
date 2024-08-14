function onToggleMenu(e) {
    document
        .getElementById("toggleNavbar")
        .addEventListener("click", function () {
            document.querySelector(".nav-links").classList.toggle("hidden");
        });
}

function toggleDropdown() {
    const dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("hidden");
}
