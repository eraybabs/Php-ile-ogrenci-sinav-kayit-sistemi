<?php 
include 'baglan.php';
function UyariVer(){ 
    $uyaritip = $_SESSION['bilgi'][1];
    $uyari = $_SESSION['bilgi'][0];
    switch ($uyaritip) {
        case 1:
             echo "<div class='alert alert-success' role='alert'>".$uyari."</div>";
             unset($_SESSION['bilgi']);
             break; 
        case 2: 
            echo "<div class='alert alert-danger' role='alert'>".$uyari."</div>";
            unset($_SESSION['bilgi']);
            break;
        case 3: 
            echo "<div class='alert alert-warning' role='alert'>".$uyari."</div>";
            unset($_SESSION['bilgi']);
            break;
        case 4: 
            echo "<div class='alert alert-info' role='alert'>".$uyari."</div>";
            unset($_SESSION['bilgi']);
            break;
        default: break;
    }
   
    
}
function shasifrele($sifre)
{
    $shasifre = hash('sha512', $sifre);
    $kullanici_password = crypt($shasifre, '$6$ileri' . $shasifre);
    return $kullanici_password;
}


?>