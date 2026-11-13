<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||
    !isset($_POST['judul'], $_POST['penulis'], $_POST['tahun'])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

$stmt = mysqli_prepare($conn, "DELETE FROM Buku WHERE judul = ? AND penulis = ? AND tahun = ? LIMIT 1");
if (!$stmt) {
    die("Gagal menyiapkan penghapusan: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sss", $_POST['judul'], $_POST['penulis'], $_POST['tahun']);
if (!mysqli_stmt_execute($stmt)) {
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    die("Gagal menghapus data: " . $error);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
header("Location: index.php");
exit;
?>
