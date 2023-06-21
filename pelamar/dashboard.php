<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Job Finder</title>
    <!-- file Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top" style="background-color: #2B1B56;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../bootsraps/img/BJF_sb.png" alt="Bali Job Finder" height="40px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse text-right" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#Home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#About">About</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="#Tips">Tips</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Lowongan">Lowongan</a>
            </li>
           <li>
           <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="#">Profil</a></li>
                  <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Keluar</a></li>
                </ul>
          </li>
        </ul>
      </div>
  </div>
</nav>
<!-- Banner -->
<div class="container-fluid banner text-left">
   <h4 class="display-6">Welcome</h4>
   <h3 class="display-1">Bali Job Finder</h3>
   <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora voluptates corrupti quia possimus, sit beatae?</p>
</div>
<!-- Tips Section -->
<div class="container-fluid tips" id="tips">
  <div class="container-fluid">
   <div class="row align-items-center">
     <div class="col-md-6">
      <a href="#" class="logo">
        <img src="../bootsraps/img/Logo-tips.png" alt="" height="500px">
      </a>
     </div>
     <div class="col-md-6">
       <h3 class="display-4 text-center">Tips Melamar</h3>
       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit est, esse facere provident aliquam numquam laboriosam fugiat totam, dolor, quia porro quos itaque alias distinctio perspiciatis deleniti voluptatem molestias magnam sed reiciendis rem eos quae. Error temporibus quaerat assumenda numquam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita repellendus rerum culpa facilis eum non? Molestiae asperiores minima, recusandae voluptatem dolores eveniet voluptatibus necessitatibus minus incidunt, id non error corporis.</p>
     </div>
    </div>
  </div>
</div>

<!-- rekomendasi Perusahaan -->
<div class="container">
  <div class="judul">
    <h3 class="section-title text-center">Rekomendasi Perusahaan Dari kami</h3>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col-md-2">
     <div class="square">
      <img src="img/blesing.png" alt="Logo 1" class="logo">
     </div>
    </div>
    <div class="col-md-2">
     <div class="square">
      <img src="img/gosha.png" alt="Logo 2" class="logo">
     </div>
    </div>
    <div class="col-md-2">
     <div class="square">
      <img src="img/astra motor.png" alt="Logo 3" class="logo">
     </div>
    </div>
    <div class="col-md-2">
     <div class="square">
      <img src="img/gogo.png" alt="Logo 4" class="logo">
     </div>
    </div>
    <div class="col-md-2">
     <div class="square">
      <img src="img/pln.png" alt="Logo 5" class="logo">
     </div>
    </div>
   </div>
  <div class="row justify-content-center align-items-center">
   <div class="col-md-2">
     <div class="square">
      <img src="img/urban.png" alt="Logo 6" class="logo">
     </div>
   </div>
   <div class="col-md-2">
    <div class="square">
     <img src="img/atlas.png" alt="Logo 7" class="logo">
    </div>
   </div>
   <div class="col-md-2">
    <div class="square">
     <img src="img/keranjang.png" alt="Logo 8" class="logo">
    </div>
   </div>
   <div class="col-md-2">
    <div class="square">
      <img src="img/unique.png" alt="Logo 9" class="logo">
    </div>
   </div>
   <div class="col-md-2">
    <div class="square">
     <img src="img/khrisna.png" alt="Logo 10" class="logo">
    </div>
   </div>
  </div>
</div>
<!-- perkerjaan terlaris -->
<div class="container">
  <div class="judul">
    <h3 class="section-title text-center">Pekerjaan Yang Banyak Dicari</h3>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col-md-4">
     <div class="square-new">
      <img src="img/teknologi.jpg" alt="">
      <div class="overlay">
       <div class="overlay-content">
        <h2>Teknologi</h2>
       </div>
      </div>
     </div>
    </div>
    <div class="col-md-4">
      <div class="square-new">
       <img src="img/penjul.jpg" alt="">
       <div class="overlay">
        <div class="overlay-content">
         <h2>Penjualan</h2>
        </div>
       </div>
      </div>
    </div>
    <div class="col-md-4">
     <div class="square-new">
       <img src="img/pemasar.jpg" alt="">
       <div class="overlay">
        <div class="overlay-content">
         <h2>Pemasaran</h2>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>

<!-- Lowongan Pekerjaan -->
<div class="judul">
  <h3 class="section-title text-center">lowongan Pekerjaan</h3>
</div>
<div class="d-flex align-items-center flex-nowrap overflow-auto">
      
  <div class="mx-2">
    <div class="card h-100">
      <div class="card-image">
        <img src="img/keranjang.png" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Staf Administrasi</h5>
        <h4 class="card-subtitle font-weight-light">PT PLN PERSERO</h4>
        <p class="card-text">Pendidikan minimal S1 S2&D3/D4 
          semua jurusan (1,4,5)</p>
        <p><i class="fa-sharp fa-solid fa-location-dot" style="color: #2b1b56;"> Denpasar</i></p>
        <p>Rp.3.000.000,00</p>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">Button</button>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>