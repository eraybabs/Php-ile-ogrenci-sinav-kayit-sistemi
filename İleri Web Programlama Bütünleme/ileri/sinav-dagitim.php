<?php

$hangisayfa = "Sınav Listesi";
include 'header.php';

$kullanici_sor = $db->prepare("SELECT * FROM sinif order by sinif_no asc");
$kullanici_sor->execute();


//Öğrenci sayısının veritabanından çekilmesi

$sql = "SELECT count(*) FROM `ogrenci`";

$result = $db->prepare($sql);
$result->execute();

$ogrenci = $result->fetchColumn();



if (($_SESSION['kullanici_ad'] != "admin")) {
    header('Location:giris.php');
    exit;
}



?>

<!-- Sınıfların listelenmesi -->

<div class="container-fluid pt-2 px-2">

    <div class="col-12">

        <div class="bg-secondary rounded h-100 p-4">

            <h6 class="mb-4">Sınıf Seçimi</h6>
            <?php UyariVer(); ?>
            <div class="table-responsive">

                <table class="table" id="Table">

                    <thead>

                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sınıf Numarası</th>
                            <th scope="col">Sınıf Kapasitesi</th>
                            <th scope="col">Eklenme Tarihi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        while ($kullanici_cek = $kullanici_sor->fetch(PDO::FETCH_ASSOC)) {
                            $sinifno = $kullanici_cek['sinif_no'];
                            $sinifkapasite = $kullanici_cek['sinif_kapasite'];
                        ?>

                            <tr>
                                <th> <input onchange="SeciliKontrol(<?php echo $sinifno . ',' . $sinifkapasite; ?>)" type="checkbox" class="sinifclass<?php echo $sinifno; ?> form-check-input " id="exampleCheck1" scope="row"></th>
                                <td><?php echo $kullanici_cek['sinif_no']; ?></td>
                                <td><?php echo $kullanici_cek['sinif_kapasite']; ?></td>
                                <td><?php echo $kullanici_cek['eklenme_tarih']; ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

            <!-- Öğrenci sayı değeri -->



            <!-- Checkboxlardan değer alma ve toplam kapasiteyi bulma -->


            <input type="button" class="btn btn-success m-2" value="Dağıt" onclick="SonDagitim()" />


            <script type="text/javascript">
                var deger;
                var sinifno;
                var sinifkapasite;
                var siniflar;
                var sinifsay = 0;
                var ogrencisay = <?php echo $ogrenci; ?>;

                function SeciliKontrol(sinifno, sinifkapasite) {
                    deger = document.querySelector('.sinifclass' + sinifno).checked;
                    if (deger) {
                        sinifsay += sinifkapasite;

                        if (sinifsay >= ogrencisay) {
                            alert("Öğrencileri dağıtmak için yeterli sınıf kapasitesine ulaştınız.")
                        }

                        siniflar += sinifno + ",";
                    } else {
                        sinifsay -= sinifkapasite;
                    }



                }


                function SonDagitim() {

                    if (sinifsay < ogrencisay) {

                        window.alert("Toplam kontenjan öğrenci sayısından az. Lütfen daha fazla sınıf seçin.");

                    } else {
                        alert("Öğrenciler Sınıflara Dağıtılıyor.")
                        setTimeout(function() {
                            window.location.assign("islem/islem.php?sinif_dagit=" + siniflar);
                            //3 saniye sonra yönlenecek
                        }, 1000);
                    }

                }
            </script>


        </div>

    </div>

</div>
<!-- Blank End -->



<?php include 'footer.php'; ?>