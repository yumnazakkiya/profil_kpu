// Fitur pencarian sederhana
document.getElementById("pencarian").addEventListener("keyup", function () {
    const nilaiCari = this.value.toLowerCase();
    const baris = document.querySelectorAll("#isiTabel tr");

    baris.forEach(function (tr) {
        const teks = tr.innerText.toLowerCase();
        tr.style.display = teks.includes(nilaiCari) ? "" : "none";
    });
});

// Tombol logout (contoh)
document.querySelector(".btn-logout").addEventListener("click", function () {
    alert("Anda berhasil logout");
});
