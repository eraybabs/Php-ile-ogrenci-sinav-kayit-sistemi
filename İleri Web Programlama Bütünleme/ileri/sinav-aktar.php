<?php

$hangisayfa = "Öğrenci Aktar";
include 'header.php';


?>
<div class="container-fluid pt-2 px-2">

    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Dağılım</h6>

            <div class="table-responsive">
                <?php
                //Sınıf dağıtım tablosundan sinif_id sütununda bulunan sınıfları çekiyoruz

                $sinif_sorgusu = $db->query("SELECT DISTINCT sinif_id FROM sinav_dagitim");
                $siniflar = $sinif_sorgusu->fetchAll(PDO::FETCH_ASSOC);


                foreach ($siniflar as $sinif) {
                    // Her sınıf için tablo oluştur
                    echo "<table class='table' id='table''>";
                    // sınıf adını çek
                    $sinif_no_sorgusu = $db->query("SELECT sinif_no FROM sinif WHERE id = " . $sinif['sinif_id']);
                    $sinif_no = $sinif_no_sorgusu->fetch(PDO::FETCH_ASSOC);
                    echo "<tr><th colspan='2' scope='col'><center>" . $sinif_no['sinif_no'] . ' Numaralı Sınıf' . "</center></th></tr>";
                    echo "<tr><th scope='col'>Ad Soyad</th></tr>";
                    echo "<br><br>";
                    // Sınıf dağıtımını çek
                    $ogrenci_sorgusu = $db->query("SELECT ogrenci_id FROM sinav_dagitim WHERE sinif_id = " . $sinif['sinif_id']);
                    $ogrenciler = $ogrenci_sorgusu->fetchAll(PDO::FETCH_ASSOC);
                    // öğrenci ad ve soyadlarını çek
                    foreach ($ogrenciler as $ogrenci) {
                        $ogrenci_sorgusu = $db->query("SELECT ogrenci_adsoyad FROM ogrenci WHERE id = " . $ogrenci['ogrenci_id']);
                        $ogrenci_detay = $ogrenci_sorgusu->fetch(PDO::FETCH_ASSOC);
                        echo "<tr><td>" . $ogrenci_detay['ogrenci_adsoyad'] . "</td></tr>";
                    }
                    echo "</table>";
                }

                ?>

            </div>


        </div>
    </div>

</div>


<!-- Blank End -->



<?php include 'footer.php'; ?>