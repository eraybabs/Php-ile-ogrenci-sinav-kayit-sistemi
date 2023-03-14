<?php

include 'fonksiyon.php';



if (isset($_POST['giris-yap']))
{
 


    if ($_POST['kullanici_tip'] == 1) {
        $kullanici_ad = $_POST['kullanici_ad'];
        $kullanici_sifre = shasifrele($_POST['kullanici_sifre']);
    
        $kullanicisor = $db->prepare("SELECT * FROM yonetici WHERE kullanici_ad=:kullanici_ad AND kullanici_sifre=:kullanici_sifre");
        $kullanicisor->execute(array(
            'kullanici_ad' => $kullanici_ad,
            'kullanici_sifre' => $kullanici_sifre
        ));

        $say = $kullanicisor->RowCount();
        if ($say == 1)
        {
            $_SESSION['kullanici_ad'] = $kullanici_ad;
            header("Location:../index.php");
            exit;
        }
        else
        {
            $_SESSION['bilgi'][0] = "Kullanıcı adı veya şifre yanlış!";
            $_SESSION['bilgi'][1] = "2";
    
            header("Location:../giris.php");
            exit;
        }
    }elseif ($_POST['kullanici_tip'] == 2) {
        $kullanici_ad = $_POST['kullanici_ad'];
        $kullanici_sifre = shasifrele($_POST['kullanici_sifre']);
    
        $kullanicisor = $db->prepare("SELECT * FROM ogrenci WHERE ogrenci_no=:ogrenci_no");
        $kullanicisor->execute(array(
            'ogrenci_no' => $kullanici_ad
        ));

        $say = $kullanicisor->RowCount();
        if ($say == 1)
        {
            $_SESSION['ogrenci_no'] = $kullanici_ad;
            header("Location:../ogrenci.php");
            exit;
        }
        else
        {
            $_SESSION['bilgi'][0] = "Kullanıcı adı veya şifre yanlış!";
            $_SESSION['bilgi'][1] = "2";
    
            header("Location:../giris.php");
            exit;
        }
    }

    
}


if ($_POST['ogrenci-aktar']) {
    $randosay = mt_rand(11111111, 999999999);
    $currentDirectory = getcwd();
    $uploadDirectory = "./uploads/";

    $errors = []; // Store errors here 
    $fileName = $randosay . $_FILES['the_file']['name']; 
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));
    $fileName = seo($fileName);
    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
 
   

    if (empty($errors))
    {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload)
        {
            echo "The file " . basename($fileName) . " has been uploaded";
            header("Location:ice-aktar-ogrenci.php?dosya_ad=" . basename($fileName));
        }
        else
        {
            echo "An error occurred. Please contact the administrator.";
        }
    }
    else
    {
        foreach ($errors as $error)
        {
            echo $error . "These are the errors" . "\n";
        }
    }

}


if ($_POST['sinif-aktar']) {
    $randosay = mt_rand(11111111, 999999999);
    $currentDirectory = getcwd();
    $uploadDirectory = "./uploads/";

    $errors = []; // Store errors here 
    $fileName = $randosay . $_FILES['the_file']['name']; 
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));
    $fileName = seo($fileName);
    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
 
   

    if (empty($errors))
    {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload)
        {
            echo "The file " . basename($fileName) . " has been uploaded";
            header("Location:ice-aktar-sinif.php?dosya_ad=" . basename($fileName));
        }
        else
        {
            echo "An error occurred. Please contact the administrator.";
        }
    }
    else
    {
        foreach ($errors as $error)
        {
            echo $error . "These are the errors" . "\n";
        }
    }

}


if (strlen($_GET['sinif_dagit']) > 9) {
    $siniflar = explode( ",",$_GET['sinif_dagit']);
    //echo "<pre>";
    $dagit = $db->query('SELECT id FROM ogrenci');
    $ogrenciler = $dagit->fetchAll(PDO::FETCH_COLUMN);
    shuffle($ogrenciler);
   
    $siniflar[0] = substr($siniflar[0],9, 12 );
    $sinav_sor=$db->prepare("SELECT * FROM sinav order by id DESC LIMIT 0, 1");
    $sinav_sor->execute();
   
    while ($sinav_cek = $sinav_sor->fetch(PDO::FETCH_ASSOC)) {
        $sinav_id = $sinav_cek['id'];
    }
    $say = 0;
   foreach ($siniflar as $sinif_no) {
        if (!empty($sinif_no)) {
           
            $sinifsor = $db->prepare("SELECT * FROM sinif where sinif_no = $sinif_no");
            $sinifsor->execute();
            $sinifcek = $sinifsor->fetch(PDO::FETCH_ASSOC);
            $kapasite = $sinifcek['sinif_kapasite'];
            $sinif_id = $sinifcek['id'];
            $saydir = 0;
            for ($i=0; $i < $kapasite; $i++) {
              
                if ($ogrenciler[$i] != "") {
                     
               
                     
               
                if ($saydir == $kapasite - 1) {
                    shuffle($ogrenciler);
                    $saydir = 0;
                }
                  
                   
                  
                    
                        $kullanici_sor=$db->prepare("SELECT * FROM sinav_dagitim where ogrenci_id = ".$ogrenciler[$i]);
                        $kullanici_sor->execute();
                        $kullanici_cek2 = $kullanici_sor->fetch(PDO::FETCH_ASSOC);
                            if ($kullanici_cek2['id'] > 0) {
                                  
                            }else{
                                $ayarkaydet = $db->prepare("INSERT INTO sinav_dagitim SET 
                                sinav_id=:sinav_id, 
                                ogrenci_id=:ogrenci_id, 
                                sinif_id=:sinif_id
                                "); 
                                $update = $ayarkaydet->execute(array(
                                'sinav_id' =>  $sinav_id,
                                'ogrenci_id'=> $ogrenciler[$i],
                                'sinif_id' =>  $sinif_id 
                                ));
                            }
                        
                            unset($ogrenciler[$i]);
                   
                     $saydir++;
                    $say++;
                }
            }  

        }
      
    }
    $_SESSION['bilgi'][1] = 1;
    $_SESSION['bilgi'][0] = "Öğrenciler Başarıyla Dağıtıldı";
    header('Location:../sinav-dagitim.php');
 
}

?>