<?php
include 'baglan.php';
require 'vendor/autoload.php';
 
## Spreadsheet kütüphanesini sayfaya çağırıyoruz. ##
use PhpOffice\PhpSpreadsheet\Spreadsheet;

## Xlsx dosya okuma kütüphanemizi çağırıyoruz. (Diğer uzantılar için => https://phpspreadsheet.readthedocs.io/en/latest/topics/reading-and-writing-to-file/) ##
use PhpOffice\PhpSpreadsheet\Reader\Xls;
$dosya_ad = '/uploads/'.$_GET['dosya_ad'];
## Dosya yolumuzu değişkene depoluyoruz. ##
$inputFileName = __DIR__ . $dosya_ad;

## "Xlsx" formatındaki dosyayı okumak için ilk olarak sınıfımızı çağırıyoruz. ##
$reader = new Xls();

## Dosyayı okumak için açıyoruz. ##
$spreadsheet = $reader->load($inputFileName);

## Aktif çalışma sayfasını seçip, verileri dizi formatında alıyoruz. ##
$products = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
$products2 = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
## İç içe dizinin ilk elemanı başlık verilerinden oluşuyor. O yüzden ilk elemanı bir değişkene depolayıp diziden çıkarıyoruz. ##
$header = $products[1];


## Başlık dizisini ürünleri tuttuğumuz diziden çıkarıyoruz. ##
unset($products[1]);
 

echo "<pre>";

//print_r($products[2]['C']);

// sinav verileri
$ders_ad = $header['G'];
$akademisyen = $products[2]['G'];
$sinav_tip = $products[3]['G'];
$sinav_tarih = $products[4]['G'];
$sinav_saat = $products[5]['G'];


$sinav_tarihi_ayar = explode("/",$sinav_tarih);
$sinav_saat_ayar = explode(":", $sinav_saat);
 
$timestamp = mktime($sinav_saat_ayar[0], $sinav_saat_ayar[1], 00, $sinav_tarihi_ayar[0], $sinav_tarihi_ayar[1], $sinav_tarihi_ayar[2]);
$sinav_tarihi_son = date('Y/m/d H:i:s', $timestamp);


// veritabanındaki öğrenci numaralarını çekme işlemi
$kullanici_sor=$db->prepare("SELECT * FROM ogrenci");
$kullanici_sor->execute();
unset($ogrenci_no_liste);
$ogrenci_no_liste = [];

while ($kullanici_cek = $kullanici_sor->fetch(PDO::FETCH_ASSOC)) { 

 
	array_push($ogrenci_no_liste , $kullanici_cek['ogrenci_no']);
}


unset($_SESSION['varolan_ogrenciler']['no']);
$_SESSION['varolan_ogrenciler']['no'] = [];
$say = 2;

foreach ($products as $prod) {
	//echo $prod['C']."   ".$prod['B']."<br>"; 
	
	if (!in_array($prod['B'], $ogrenci_no_liste)) {
		
		$ayarkaydet = $db->prepare("INSERT INTO ogrenci SET 
		ogrenci_no=:ogrenci_no,
		ogrenci_adsoyad=:ogrenci_adsoyad
		"); 
		$update = $ayarkaydet->execute(array(
		'ogrenci_no' => $products2[$say]['B'],
		'ogrenci_adsoyad' => $products2[$say]['C']
		));
		
		
		echo "veritabanında olmayan kullanıcılar:".$products2[$say]['B']."-".$products2[$say]['C']."<br>";
	 
	 }else{
		array_push($_SESSION['varolan_ogrenciler']['no'] , $prod['B']); 
		//echo "veritabanında olan kullanıcılar:".$prod['B']."<br>";
		
	 }
	$say++;

}
 
$query = $db->prepare("SELECT * FROM sinav WHERE ders_ad =:ders_ad and sinav_tipi=:sinav_tipi and sinav_tarih=:sinav_tarih and akademisyen=:akademisyen "); 
$query->execute(array( 
	'ders_ad' => $ders_ad,
	'sinav_tipi' => $sinav_tip,
	'sinav_tarih' => $sinav_tarihi_son,
	'akademisyen' => $akademisyen

));
if ($query->rowCount() < 1) {
	$ayarkaydet = $db->prepare("INSERT INTO sinav SET 
	ders_ad=:ders_ad,
	sinav_tipi=:sinav_tipi,
	sinav_tarih=:sinav_tarih, 
	akademisyen=:akademisyen
	"); 
	$update = $ayarkaydet->execute(array(
	'ders_ad' =>  $ders_ad,
	'sinav_tipi' =>  $sinav_tip,
	'sinav_tarih' => $sinav_tarihi_son, 
	'akademisyen' => $akademisyen
	));
}



$_SESSION['bilgi'][1] = 1;
$_SESSION['bilgi'][0] = "Excel Başarıyla İçe Aktarıldı";
header("Location:../ogrenci-aktar.php");
 
 
?>