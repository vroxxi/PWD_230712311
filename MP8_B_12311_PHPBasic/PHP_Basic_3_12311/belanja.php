<?php
function dapatDiskon($totalBayar) {
    if ($totalBayar >= 10000) {
        return 0.05;
    }
    return 0;
}

function totalHarga($diskon, $totalBayar) {
    return $totalBayar - ($totalBayar * $diskon);
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makanan = trim($_POST['makanan'] ?? '');
    $alatTulis = trim($_POST['alat_tulis'] ?? '');

    if ($makanan === '') {
        $errors[] = 'Makanan dan minuman tidak boleh kosong.';
    }

    if ($alatTulis === '') {
        $errors[] = 'Alat tulis tidak boleh kosong.';
    }

    if (empty($errors)) {
        if ($makanan === 'pop mie') {
            $hargaMakanan = 5000;
        } elseif ($makanan === 'air mineral') {
            $hargaMakanan = 4000;
        }

        if ($alatTulis === 'pulpen') {
            $hargaAlatTulis = 2000;
        } elseif ($alatTulis === 'tipe-x') {
            $hargaAlatTulis = 8000;
        }

        $totalBayar = $hargaMakanan + $hargaAlatTulis;
        $diskon = dapatDiskon($totalBayar);
        $totalAkhir = totalHarga($diskon, $totalBayar);
    }
} else {
    echo 'Silahkan pilih produk yang ingin dibeli.';
}
?>

<h1>Belanja</h1>
<h2>Daftar Kategori:</h2>

<form method="POST" action="">
    <p>Makanan dan Minuman : <br />
        <select name="makanan">
            <option value="">-- Pilih --</option>
            <option value="pop mie" <?php echo (($_POST['makanan'] ?? '') === 'pop mie') ? 'selected' : ''; ?>>pop mie</option>
            <option value="air mineral" <?php echo (($_POST['makanan'] ?? '') === 'air mineral') ? 'selected' : ''; ?>>air mineral</option>
        </select>
    </p>

    <p>Alat Tulis : <br />
        <select name="alat_tulis">
            <option value="">-- Pilih --</option>
            <option value="pulpen" <?php echo (($_POST['alat_tulis'] ?? '') === 'pulpen') ? 'selected' : ''; ?>>pulpen</option>
            <option value="tipe-x" <?php echo (($_POST['alat_tulis'] ?? '') === 'tipe-x') ? 'selected' : ''; ?>>tipe-x</option>
        </select>
    </p>

    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<p>' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
        }
    } else {
        echo '<h2>Informasi Belanja</h2>';
        echo '<p>Makanan dan Minuman: ' . htmlspecialchars($makanan, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Alat Tulis: ' . htmlspecialchars($alatTulis, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Total Harga: ' . htmlspecialchars($totalAkhir, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Diskon: ' . htmlspecialchars((string) $diskon, ENT_QUOTES, 'UTF-8') . '</p>';

        if ($diskon == 0) {
            echo '<p>Maaf tidak ada diskon yang diberikan.</p>';
        } else {
            echo '<p>Selamat! Anda mendapatkan diskon ' . htmlspecialchars((string) ($diskon * 100)) . '%.</p>';
        }
    }
}
?>
