<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan</title>
    <!-- file Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color: #fff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../bootsraps/img/blue_logo.png" alt="Bali Job Finder" height="40px">
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
                    <i class="fa-solid fa-user-tie" style="color: #00000;"></i>
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
<!-- lowongan -->
<div class="judul">
    <h3 class="section-title text-center">Lowongan Pekerjaan</h3>
</div>
<div class="container">
<div class="row">
    <div class="col-md-3 mb-3">
    <div class="card h-100">
      <div class="card-image">
        <img src="../bootsraps/img/pln.png" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title font-weight-bold fw-bold">Staf Administrasi</h5>
        <h4 class="card-subtitle font-weight-light">PT PLN PERSERO</h4>
        <p class="card-text">Pendidikan minimal S1 S2&D3/D4 
          semua jurusan (1,4,5)</p>
        <p><i class="fa-sharp fa-solid fa-location-dot" style="color: #0D6EFD;"> Denpasar</i></p>
        <p>cek detail untuk lihat syarat dan salary</p>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">Cek Details</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="d-flex justify-content-center mt-4" style="margin-bottom: 20px;">
    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary" type="button">Kembali</button>
      </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>