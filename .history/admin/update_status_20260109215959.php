<?php
include '../koneksi.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    mysqli_query($koneksi, "UPDATE tb_projek SET status='$status' WHERE id=$id");
    header("Location: index.php");
}
?>