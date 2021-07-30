<?php
    include("../../function/helper.php");
    include("../../function/koneksi.php");

    $user_id = $_GET['user_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $level = $_POST['level'];

    mysqli_query($connect, "UPDATE user SET nama='$nama',
                                            email='$email',
                                            phone='$email',
                                            alamat='$alamat',
                                            status='$status',
                                            level='$level' WHERE user_id='$user_id'");
    
    header("location:".BASE_URL."index.php?page=myprofile&module=user&action=list");

?>