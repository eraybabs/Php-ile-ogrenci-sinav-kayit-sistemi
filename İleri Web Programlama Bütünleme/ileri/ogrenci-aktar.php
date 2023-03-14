<?php

$hangisayfa = "Öğrenci Aktar";
include 'header.php'; 
 

?>



 <div class="container-fluid pt-2 px-2">
                <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                 
                 
                    <?php
                    UyariVer();
                    
                    if(!empty($_SESSION['varolan_ogrenciler']['no'])){ ?> <div class='alert alert-danger' role='alert'>
                        Mükerrer kayıtlar veritabanına eklenemedi.
                        <pre>
                        <?php
                        $say = 1;
                        foreach ( $_SESSION['varolan_ogrenciler']['no'] as $mukerrer_kayit) {
                            
                            echo $mukerrer_kayit."-";
                            if ($say == 5) {
                                echo "<br>";
                                $say = 1;
                            }
                            $say++;
                        };
                        unset($_SESSION['varolan_ogrenciler']['no']);
                        ?>
                        </pre>
                     </div>";
                    <?php } ?>
                    <form action="islem/islem.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                        <div>
                            <label>Excel Dosyasını Seçiniz</label> 
                            <input type="file" name="the_file"
                                id="file" accept=".xls">
                            <input name="ogrenci-aktar" value="İçe Aktar" type="submit"   >
                    
                        </div>
                    
                    </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->



<?php include 'footer.php'; ?>