<?php
    require 'koneksi.php'; 

    echo "<h1>Daftar Buku</h1>";

    $result = mysqli_query($conn, "SELECT * FROM buku ORDER BY judul");

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>No</th><th>Judul</th><th>Penulis</th><th>Tahun</th></tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['judul'] . "</td>";
        echo "<td>" . $row['penulis'] . "</td>";
        echo "<td>" . $row['tahun'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo '<p>Jumlah data: ' . mysqli_num_rows($result) . '</p>';

?>