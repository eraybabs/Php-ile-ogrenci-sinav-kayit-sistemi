<?php

$hangisayfa = "Sınıf Listesi";
include 'header.php'; 
 
$kullanici_sor=$db->prepare("SELECT * FROM sinif order by sinif_no asc");
$kullanici_sor->execute();
 
if (($_SESSION['kullanici_ad'] != "admin")) {
    header('Location:giris.php');
    exit;
}

?>



 <div class="container-fluid pt-2 px-2">
          
                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Sınıflar</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sınıf Numarası</th>
                                            <th scope="col">Sınıf Kapasitesi</th>  
                                            <th scope="col">Eklenme Tarihi</th>  
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
                                    $say = 1;
                                    while ($kullanici_cek = $kullanici_sor->fetch(PDO::FETCH_ASSOC)) {   ?>
                                         <tr>
                                            <th scope="row"><?php echo $say; ?></th>
                                            <td><?php echo $kullanici_cek['sinif_no']; ?></td>
                                            <td><?php echo $kullanici_cek['sinif_kapasite']; ?></td> 
                                            <td><?php echo $kullanici_cek['eklenme_tarih']; ?></td> 
                                        </tr> 
                                    <?php $say++;}?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
             
            </div>
            <!-- Blank End -->



<?php include 'footer.php'; ?>