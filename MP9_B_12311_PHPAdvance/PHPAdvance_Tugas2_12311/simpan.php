<?php
    require 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $judul = trim($_POST['judul'] ?? '');
        $penulis = trim($_POST['penulis'] ?? '');
        $tahun = trim($_POST['tahun'] ?? '');

        if($judul === '' || $penulis === '' || $tahun === '') {
            echo '<p style="color: red;">!! Harap Lengkapi semua data.</p>';
        }elseif(!preg_match('/^[0-9]{4}$/', $tahun)) {
            echo '<p style="color: red;">!! Tahun harus berupa angka 4 digit.</p>';
        } else {
            $stmt = mysqli_prepare($conn, "INSERT INTO buku (judul, penulis, tahun) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $judul, $penulis, $tahun);
            mysqli_stmt_execute($stmt);

            echo '<p>Data berhasil disimpan (' . mysqli_stmt_affected_rows($stmt) . ' baris)</p>';
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    } else {
        echo "Metode permintaan tidak valid.";
    }
?>