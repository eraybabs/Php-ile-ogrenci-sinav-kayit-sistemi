<?php

$hangisayfa = "Anasayfa";
include 'header.php'; 

$kullanici_sor=$db->prepare("SELECT ogrenci_no, ogrenci_adsoyad, eklenme_tarih FROM ogrenci order by ogrenci_no DESC LIMIT 0, 5");
$kullanici_sor->execute();

?>



            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Öğrenci Sayısı</p>
                                <h6 class="mb-0"><?php
                                $sql = "SELECT count(*) FROM `ogrenci`"; 

                                $result = $db->prepare($sql);

                                $result->execute();

                                $ogrenci = $result->fetchColumn();

                                echo $ogrenci;
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-plus fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Öğretim Üyesi</p>
                                <h6 class="mb-0" ><?php
                                $sql = "SELECT count(akademisyen) FROM `sinav` GROUP BY akademisyen"; 

                                $result = $db->prepare($sql);

                                $result->execute();

                                $akademisyen = $result->fetchColumn();
                                
                                printf($akademisyen);
                                ?></h6>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-landmark fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Sınıflar</p>
                                <h6 class="mb-0"><?php
                                $sql = "SELECT count(*) FROM `sinif`"; 

                                $result = $db->prepare($sql);

                                $result->execute();

                                $sinif = $result->fetchColumn();
                                
                                printf($sinif);
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-pen fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Sınavlar</p>
                                <h6 class="mb-0"><?php
                                $sql = "SELECT count(akademisyen) FROM `sinav`"; 

                                $result = $db->prepare($sql);

                                $result->execute();

                                $ders = $result->fetchColumn();
                                
                                printf($ders);
                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


       


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Son Eklenen Öğrenciler</h6> 
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Öğrenci Numarası</th>
                                    <th scope="col">Ad Soyad</th>
                                    <th scope="col">Eklenme Tarihi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                    $say = 1;
                                    while ($kullanici_cek = $kullanici_sor->fetch(PDO::FETCH_ASSOC)) {   ?>
                                         <tr>
                                            <th scope="row"><?php echo $say; ?></th>
                                            <td><?php echo $kullanici_cek['ogrenci_no']; ?></td>
                                            <td><?php echo $kullanici_cek['ogrenci_adsoyad']; ?></td>
                                            <td><?php echo $kullanici_cek['eklenme_tarih']; ?></td>
                                        </tr> 
                                    <?php $say++;}?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
 

<?php include 'footer.php'; ?>