<?php
	 
	 session_start();
	 session_destroy();
	 
	 session_start();
	$_SESSION['bilgi'][0] = "Çıkış yapıldı.";
	$_SESSION['bilgi'][1] = 1;
	header("Location: giris.php");
	exit();
?>