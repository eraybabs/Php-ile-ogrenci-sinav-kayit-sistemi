<?php
include 'islem/fonksiyon.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SınavBİS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="ogrenci.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SınavBİS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['ogrenci_no']; ?></h6>
                         
                    </div>
                </div>
             </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
           
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['ogrenci_no']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                             
                            <a href="cikis.php" class="dropdown-item">Çıkış</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <button id="btn">Sınava Giriş Dosyasını İndir</button>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
    function capture() {
  const captureElement = document.querySelector('#capture')
  html2canvas(captureElement)
    .then(canvas => {
      canvas.style.display = 'none'
      document.body.appendChild(canvas)
      return canvas
    })
    .then(canvas => {
      const image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream')
      const a = document.createElement('a')
      a.setAttribute('download', 'sinav-giris.png')
      a.setAttribute('href', image)
      a.click()
      canvas.remove()
    })
}

const btn = document.querySelector('#btn')
btn.addEventListener('click', capture)
btn.onclick();
</script>  

<?php 

$kullanici_sor=$db->prepare("SELECT * FROM ogrenci where ogrenci_no = ".$_SESSION['ogrenci_no']);
$kullanici_sor->execute();
$kullanici_cek = $kullanici_sor->fetch(PDO::FETCH_ASSOC);

$sinavsor=$db->prepare("SELECT * FROM sinav_dagitim where ogrenci_id = ".$kullanici_cek['id']);
$sinavsor->execute();
$sinavcek = $sinavsor->fetch(PDO::FETCH_ASSOC);

$sinavsor1=$db->prepare("SELECT * FROM sinav where id = ".$sinavcek['sinav_id']);
$sinavsor1->execute();
$sinavcek1 = $sinavsor1->fetch(PDO::FETCH_ASSOC);



?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <div id="capture" class="card" style="width: 18rem;">
                        <img class="card-img-top" src="islem/klu.png"   alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="color:black;">Kırklareli Üniversitesi <small><br> Sınava Giriş Kartı</small></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">No: <?php echo $kullanici_cek['ogrenci_no']; ?></li>
                            <li class="list-group-item">Ad Soyad: <?php echo $kullanici_cek['ogrenci_adsoyad']; ?></li>
                            <li class="list-group-item">Ders Adı: <?php echo $sinavcek1['ders_ad']; ?></li>
                            <li class="list-group-item">Sınav Tipi: <?php echo $sinavcek1['sinav_tipi']; ?></li>
                            <li class="list-group-item">Tarih Saat: <?php echo $sinavcek1['sinav_tarih']; ?></li> 
                        </ul> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


             <!-- Footer Start -->
   <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Sınav Bilgi Sistemi</a>, All Right Reserved. 
                        </div>
                         
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->      


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>