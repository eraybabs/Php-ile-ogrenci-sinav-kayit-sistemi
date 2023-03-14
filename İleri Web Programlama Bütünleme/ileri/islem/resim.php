<?php
error_reporting(0);
 
?>
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<button id="btn">Capture</button>
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
      a.setAttribute('download', 'my-image.png')
      a.setAttribute('href', image)
      a.click()
      canvas.remove()
    })
}

const btn = document.querySelector('#btn')
btn.addEventListener('click', capture)
btn.onclick();
</script>  

<div id="capture" class="card" style="width: 18rem;">
  <img class="card-img-top" src="klu.png" style="width: 200px;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Kırklareli Üniversitesi <small><br> Sınava Giriş Kartı</small></h5>
   </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">No: <?php echo $_SESSION['no']; ?></li>
    <li class="list-group-item">Ad Soyad: <?php echo $_SESSION['adsoyad']; ?></li>
    <li class="list-group-item">Ders Adı: <?php echo $_SESSION['dersad']; ?></li>
    <li class="list-group-item">Sınav Tipi: <?php echo $_SESSION['sinavtip']; ?></li>
    <li class="list-group-item">Tarih Saat: <?php echo $_SESSION['tarih']; ?></li>
  </ul> 
</div>
    
 
 


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>