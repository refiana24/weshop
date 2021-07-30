<?php
	define("BASE_URL", "http://localhost/weshop/");

	function rupiah ($string = 0){
		$string = "Rp.".number_format($string);
		return $string;
	}