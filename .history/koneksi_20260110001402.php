<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_client_brief");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>