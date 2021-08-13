<?php

    include_once("../../function/helper.php");
    include_once("../../function/koneksi.php");

    session_start();
    
    $pesanan_id = $_GET['pesanan_id'];
    $button = $_POST['button'];

    if($button == "konfirmasi"){
        $user_id = $_SESSION["user_id"];
        $nomor_rekening = $_POST['nomor_rekening'];
        $nama_account = $_POST['nama_account'];
        $tanggal_transfer = $_POST['tanggal_transfer'];

        $queryPembayaran = mysqli_query($connect, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer)VALUES('$pesanan_id','$nomor_rekening','$nama_account','$tanggal_transfer')");

        if($queryPembayaran){
            mysqli_query($connect, "UPDATE pesanan SET status='1' WHERE pesanan_id='$pesanan_id'");
        }
            header("location:".BASE_URL."index.php?page=myprofile&module=pesanan&action=list");
    }
?>