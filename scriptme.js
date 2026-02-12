// Fitur pencarian sederhana
// document.getElementById("pencarian").addEventListener("keyup", function () {
//     const nilaiCari = this.value.toLowerCase();
//     const baris = document.querySelectorAll("#isiTabel tr");

//     baris.forEach(function (tr) {
//         const teks = tr.innerText.toLowerCase();
//         tr.style.display = teks.includes(nilaiCari) ? "" : "none";
//     });
// });

const inputCari = document.getElementById("pencarian");

if (inputCari) {
    inputCari.addEventListener("keyup", function () {
        const nilaiCari = this.value.toLowerCase();
        const baris = document.querySelectorAll("#isiTabel tr");

        baris.forEach(function (tr) {
            const teks = tr.innerText.toLowerCase();
            tr.style.display = teks.includes(nilaiCari) ? "" : "none";
        });
    });
}


// Tombol logout (contoh)
// document.querySelector(".btn-logout").addEventListener("click", function () {
//     alert("Anda berhasil logout");
// });
const tombolLogout = document.querySelector(".btn-logout");

if (tombolLogout) {
    tombolLogout.addEventListener("click", function () {
        alert("Anda berhasil logout");
    });
}
//--------------------------------
// Fungsi kembali
function kembali() {
    window.history.back();
}

// Contoh aksi tombol
document.querySelector(".btn-ubah")?.addEventListener("click", function () {
    alert("Data pegawai berhasil diubah");
});

document.querySelector(".btn-hapus")?.addEventListener("click", function () {
    if (confirm("Yakin ingin menghapus data pegawai ini?")) {
        alert("Data pegawai dihapus");
    }
});

//--------------------------------
// Toggle sidebar
const sidebar = document.getElementById("sidebar");
const btnToggle = document.getElementById("btnToggle");

if (sidebar && btnToggle) {
    btnToggle.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
        btnToggle.textContent =
            sidebar.classList.contains("collapsed") ? "<" : "✕";
    });
}

        // Ganti arah panah
        // if (sidebar.classList.contains("sidebar-kecil")) {
        //     tombolSidebar.innerHTML = "→";
        // } else {
        //     tombolSidebar.innerHTML = "←";
        // }
//         tombolSidebar.innerHTML = 
//             sidebar.classList.contains("sidebar-kecil") ? "→" : "←";
//     });
// }

//AKTIFKAN PINDAH TAB SECARA INTERAKTIF

// const tabs = document.querySelectorAll(".tab-menu .tab");

// tabs.forEach(tab => {
//     tab.addEventListener("click", function () {
//         tabs.forEach(t => t.classList.remove("aktif"));
//         this.classList.add("aktif");
//     });
// });

// const sidebar = document.getElementById("sidebar");
// const btnToggle = document.getElementById("btnToggle");

// btnToggle.addEventListener("click", () => {
//     sidebar.classList.toggle("collapsed");
//     btnToggle.textContent = sidebar.classList.contains("collapsed") ? "<" : "✕";
// });
