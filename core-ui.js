document.addEventListener("DOMContentLoaded", function () {

    // ===============================
    // SIDEBAR BUKA / TUTUP
    // ===============================

    const sidebar = document.getElementById("sidebar");
    const tombolMenu = document.getElementById("tombolMenu");

    if (sidebar && tombolMenu) {
        tombolMenu.addEventListener("click", function () {
            sidebar.classList.toggle("tertutup");

            tombolMenu.textContent =
                sidebar.classList.contains("tertutup") ? "<" : "✕";
        });
    }

    // ===============================
    // DROPDOWN DATA MASTER
    // ===============================

    const menuDataMaster = document.getElementById("menuDataMaster");
    const submenuDataMaster = document.getElementById("submenuDataMaster");
    const panahDataMaster = document.getElementById("panahDataMaster");

    if (menuDataMaster && submenuDataMaster && panahDataMaster) {

        submenuDataMaster.style.display = "none";
        panahDataMaster.textContent = "▶";

        menuDataMaster.addEventListener("click", function () {

            const terbuka = submenuDataMaster.style.display === "block";

            submenuDataMaster.style.display = terbuka ? "none" : "block";
            panahDataMaster.textContent = terbuka ? "▶" : "▼";

        });
    }

    // ===============================
    // LOG OUT
    // ===============================

    const tombolKeluar = document.querySelector(".tombol-keluar");

    if (tombolKeluar) {
        tombolKeluar.addEventListener("click", function () {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                window.location.href = "Login.html";
            }
        });
    }

    // ===============================
    // CHECK ALL TABLE
    // ===============================

    const checkAll = document.getElementById("checkAll");

    if (checkAll) {
        checkAll.addEventListener("change", function () {

            const checkboxes = document.querySelectorAll(".row-checkbox");

            checkboxes.forEach(function (cb) {
                cb.checked = checkAll.checked;
            });

        });
    }

});
