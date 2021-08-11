<?php

    include_once("function/helper.php");
    include_once("function/koneksi.php");

    session_start();

    $nama_penerima = $_POST["nama_penerima"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];

    $user_id = $_SESSION['user_id'];
    $waktu = date("Y-m-d H:i:s");

    $query = mysqli_query($connect, "INSERT INTO pesanan(nama_penerima, user_id, nomor_telepon, alamat, kota_id, tanggal_pemesanan, status) VALUES('$nama_penerima','$user_id','$nomor_telepon','$alamat','$kota','$waktu','0')");

        if($query){
            $last_pesanan_id = mysqli_insert_id($connect);

            $keranjang = $_SESSION['keranjang'];
            $array = '';
            $counter = 0;
            foreach($keranjang AS $key => $value){
                ++$counter;
                $barang_id = $key;
                $quantity = $value['quantity'];
                $harga = $value['harga'];
                if($counter == count($keranjang)){
                    $array .= "('$last_pesanan_id','$barang_id','$quantity','$harga')";
                }else{
                    $array .= "('$last_pesanan_id','$barang_id','$quantity','$harga'),";
                }

            }
            mysqli_query($connect, "INSERT INTO pesanan_detail(pesanan_id, barang_id, quantity, harga) VALUES ".$array);

            unset($_SESSION["keranjang"]);
            
            header("location:".BASE_URL."index.php?page=myprofile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
        }
                                                    
?>