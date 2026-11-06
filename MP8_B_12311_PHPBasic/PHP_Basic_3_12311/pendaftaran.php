<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $npm = trim($_POST['npm'] ?? '');
    $staff = trim($_POST['staff'] ?? '');

    if ($nama === '') {
        $errors[] = 'Nama tidak boleh kosong.';
    } elseif (!preg_match('/^[A-Za-z ]+$/', $nama)) {
        $errors[] = 'Nama hanya boleh mengandung huruf dan spasi.';
    }

    if ($npm === '') {
        $errors[] = 'NPM tidak boleh kosong.';
    } elseif (!preg_match('/^[0-9]+$/', $npm)) {
        $errors[] = 'NPM hanya boleh mengandung angka.';
    }

    if ($staff === '') {
        $errors[] = 'Pilihan staff tidak boleh kosong.';
    }

    if (empty($errors)) {
        if ($staff === 'kasir') {
            $jadwalWawancara = 'besok pukul 10.00 WIB di market';
        } elseif ($staff === 'merchandiser') {
            $jadwalWawancara = 'lusa pukul 12.00 WIB di market';
        }
    }
}
?>

<h1>Pendaftaran Staff</h1>

<form method="POST" action="">
    <p>Nama : <br /><input type="text" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" /></p>
    <p>NPM : <br /><input type="text" name="npm" value="<?php echo htmlspecialchars($_POST['npm'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" /></p>
    <p>Pilihan Staff : <br />
        <select name="staff">
            <option value="">-- Pilih Staff --</option>
            <option value="kasir" <?php echo (($_POST['staff'] ?? '') === 'kasir') ? 'selected' : ''; ?>>kasir</option>
            <option value="merchandiser" <?php echo (($_POST['staff'] ?? '') === 'merchandiser') ? 'selected' : ''; ?>>merchandiser</option>
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
        echo '<h2>Informasi Pendaftaran</h2>';
        echo '<p>Nama: ' . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>NPM: ' . htmlspecialchars($npm, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Pilihan Staff: ' . htmlspecialchars($staff, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Jadwal Wawancara: ' . htmlspecialchars($jadwalWawancara, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Anda mendaftar sebagai ' . htmlspecialchars($staff, ENT_QUOTES, 'UTF-8') . '. Selanjutnya, Anda dapat hadir ' . htmlspecialchars($jadwalWawancara, ENT_QUOTES, 'UTF-8') . ' untuk wawancara.</p>';
    }
} else {
    echo 'Silahkan lengkapi formulir di atas.';
}
?>
