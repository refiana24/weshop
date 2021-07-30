<?php
    include("../../function/helper.php");
    include("../../function/koneksi.php");

    $banner = $_POST['banner'];
    $link = $_POST['link'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $edit_gambar = "";

    if($_FILES["file"]["name"] != ""){
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["name"],"../../images/slide/".$nama_file);

        $edit_gambar = ",gmabar='$nama_file'";
    }
    if($button == "Add"){
        mysqli_query($connect, "INSERT INTO banner (banner, link, status, gambar) VALUES ('$banner','$link','$status','$nama_file')");
    }
    elseif($button == "Update"){
        $banner_id = $_GET['banner_id'];
        mysqli_query($connect, "UPDATE banner SET banner='$banner',
                                              link= '$link' $edit_gambar
                                              status= '$status' $edit_gambar WHERE
                                              banner_id= $banner_id");
    }
    
        header("location:".BASE_URL."index.php?page=myprofile&module=banner&action=list");
    
    
?>