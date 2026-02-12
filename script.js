// SIDEBAR BUKA / TUTUP
const sidebar = document.getElementById("sidebar");
const tombolMenu = document.getElementById("tombolMenu");

tombolMenu.addEventListener("click", () => {
    sidebar.classList.toggle("tertutup");

    if (sidebar.classList.contains("tertutup")) {
        tombolMenu.textContent = "<";
    } else {
        tombolMenu.textContent = "✕";
    }
});


// SUBMENU EDIT DATA 
const menuEditData = document.getElementById("menuEditData");
const submenuEditData = document.getElementById("submenuEditData");
const panahEditData = document.getElementById("panahEditData");

// kondisi awal: submenu tampil
submenuEditData.style.display = "block";
panahEditData.textContent = "▼";

menuEditData.addEventListener("click", () => {
    if (submenuEditData.style.display === "none") {
        submenuEditData.style.display = "block";
        panahEditData.textContent = "▼";
    } else {
        submenuEditData.style.display = "none";
        panahEditData.textContent = "▶";
    }
});


// TOMBOL LOG OUT 
const tombolKeluar = document.querySelector(".tombol-keluar");

tombolKeluar.addEventListener("click", () => {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
        window.location.href = "Login.html";
    }
});
