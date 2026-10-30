function fn_ValForm() {
    
    var nama = document.getElementById("nama").value.trim();
    var email = document.getElementById("email").value.trim();
    var umurStr = document.getElementById("umur").value.trim();
    var kategori = document.getElementById("kategori").value;

    var pesanError = "";
    var isValid = true;

    if (nama === "") {
        pesanError += "- Nama tidak boleh kosong\n";
        isValid = false;
    }

    if (email === "") {
        pesanError += "- Email tidak boleh kosong\n";
        isValid = false;
    } else {
        var polaEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
        if (!polaEmail.test(email)) {
            pesanError += "- Format email tidak valid (harus huruf kecil dan sesuai pola)\n";
            isValid = false;
        }
    }

    var info = "";
    if (umurStr === "") {
        pesanError += "- Umur tidak boleh kosong\n";
        isValid = false;
    } else {
        var umur = Number(umurStr);
        if (isNaN(umur) || umur < 17 || umur > 65) {
            pesanError += "- Umur harus berupa angka antara 17 sampai 65 tahun\n";
            isValid = false;
        } else {
            if (umur <= 25) {
                info = "Paket Pelajar";
            } else {
                info = "Paket Umum";
            }
        }
    }

    if (kategori === "") {
        pesanError += "- Paket member harus dipilih\n";
        isValid = false;
    }

    if (!isValid) {
        alert("Mohon perbaiki kesalahan berikut:\n\n" + pesanError);
        return false;
    }

    var pilihan = "";
    switch (kategori) {
        case "S":
            pilihan = "Silver";
            break;
        case "G":
            pilihan = "Gold";
            break;
        case "P":
            pilihan = "Platinum";
            break;
        default:
            pilihan = "Tidak diketahui";
    }

    alert("Terima kasih " + nama + " ! Anda terdaftar di paket " + pilihan + " (" + info + ").");
    
    return true;
}