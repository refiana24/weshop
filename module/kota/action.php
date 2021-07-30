<?php
    include("../../function/helper.php");
    include("../../function/koneksi.php");

    $kota = $_POST['kota'];
    $tarif = $_POST['tarif'];
    $status = $_POST['status'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($connect, "INSERT INTO kota (kota, tarif, status)VALUES ('$kota','$tarif','$status')");
    }
    else if($button == "Update"){
            $kota_id = $_GET['kota_id'];
            mysqli_query($connect, "UPDATE kota SET kota='$kota', tarif='$tarif', status='$status' WHERE kota_id='$kota_id'");
    }

        header("location:" .BASE_URL."index.php?page=myprofile&module=kota&action=list");
?>