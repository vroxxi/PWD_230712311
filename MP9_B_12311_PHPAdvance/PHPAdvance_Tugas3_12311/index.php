<?php
    require 'koneksi.php'; 

    echo "<h1>Daftar Buku</h1>";

    $result = mysqli_query($conn, "SELECT judul, penulis, tahun FROM Buku ORDER BY judul");

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>No</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Aksi</th></tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['penulis'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['tahun'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>";
        echo "<form action='hapus.php' method='post' onsubmit=\"return confirm('Hapus buku ini?');\">";
        echo "<input type='hidden' name='judul' value='" . htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8') . "'>";
        echo "<input type='hidden' name='penulis' value='" . htmlspecialchars($row['penulis'], ENT_QUOTES, 'UTF-8') . "'>";
        echo "<input type='hidden' name='tahun' value='" . htmlspecialchars($row['tahun'], ENT_QUOTES, 'UTF-8') . "'>";
        echo "<button type='submit'>Hapus</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo '<p>Jumlah data: ' . mysqli_num_rows($result) . '</p>';

?>