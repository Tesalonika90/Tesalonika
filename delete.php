<?php
include 'koneksi.php';
// vip nama tabel database dan id kolomnya
    $delete = mysqli_query($conn, "DELETE FROM vip WHERE id = '".$_GET['id']."'");

    if ($delete) {
        header('location: index.php');
    } else {
        echo 'Gagal Hapus';
    }
?>