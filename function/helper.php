<?php
	define("BASE_URL", "http://localhost/weshop/");

	$ArraystatusPesanan[0] = 'Menunggu Pembayaran';
	$ArraystatusPesanan[1] = 'Menunggu di Validasi';
	$ArraystatusPesanan[2] = 'Lunas';
	$ArraystatusPesanan[3] = 'Pembayaran di Tolak';

	function rupiah ($string = 0){
		$string = "Rp.".number_format($string);
		return $string;
	}

	function kategori($kategori_id = false){
		global $connect;

		$string ="<div id='menu-kategori'>";
        	$string .= "<ul>";

               	 $query = mysqli_query($connect, "SELECT *FROM kategori WHERE status='on'");
                	while($row = mysqli_fetch_assoc($query)){
                   		if($kategori_id == $row['kategori_id']){
                        $string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
                   		}else{
                        $string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
                    }         
                }
        	$string .= "</ul>";
    	$string .= "</div>";
		return $string;
	}