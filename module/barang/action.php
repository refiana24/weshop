<?php
    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");

    $kategori_id = $_POST['kategori_id'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $updategambar = "";

    if(!empty ($_FILES["file"]["name"])){
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/".$nama_file);

        $updategambar = ", gambar='$nama_file'";
    }
    if ($button == "Add") {
        mysqli_query($connect, "INSERT INTO barang(nama_barang, kategori_id, spesifikasi, stok, gambar, harga, status)
                                            VALUES('$nama_barang','$kategori_id','$spesifikasi','$stok','$nama_file','$harga','$status')");
    }
    elseif($button == "Update"){
        $barang_id = $_GET['barang_id'];
        mysqli_query($connect,"UPDATE barang SET kategori_id='$kategori_id',
                                                 nama_barang='$nama_barang',
                                                 spesifikasi='$spesifikasi',
                                                 stok='$stok',
                                                 harga='$harga',
                                                 status='$status'
                                                 $updategambar
                                                 WHERE barang_id='$barang_id'");
    } 
    
    header("location:".BASE_URL."index.php?page=myprofile&module=barang&action=list");
?>