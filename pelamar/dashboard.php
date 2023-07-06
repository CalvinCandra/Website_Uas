<?php
  include("../koneksi/koneksi.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Job Finder</title>
    <!-- file Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="../pelamar/css/style2.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" >
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
              <a class="nav-link" href="#Tips">Tips</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Lowongan">Lowongan</a>
            </li>
           <li>
           <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user-tie" style="color: #00000;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                  <li>
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile<?php echo $_SESSION['id_pelamar']?>">
                      <?php echo $_SESSION['pelamar']?>
                    </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../login/logout.php">Log Out</a></li>
                </ul>
          </li>
        </ul>
      </div>
  </div>
</nav>
<script>
  window.addEventListener('scroll', function() {
  var navbar = document.querySelector('.navbar');
  var bannerHeight = document.querySelector('.banner').offsetHeight;

  if (window.pageYOffset > bannerHeight) {
    navbar.classList.add('navbar-scrolled');
    navbar.classList.remove('navbar-transparent');
  } else {
    navbar.classList.remove('navbar-scrolled');
    navbar.classList.add('navbar-transparent');
  }
});
</script>

<!-- Banner -->
<div class="container-fluid banner" id="Home">
  <div class="text-container">
    <h4 class="display-6">Welcome to</h4>
    <h3 class="display-1 fw-bold">Bali Job Finder</h3>
    <h5 class="display-6">Website Lowongan Yang Membantu <br>Pelamar Mencari Pekerjaan</h5>
  </div>
  <div class="image-container">
    <img src="img/banner-img.png" alt="" class="img-fluid">
  </div>
</div>

<!-- Tips Section -->
<div class="container-fluid tips" id="Tips">
  <div class="container-fluid">
   <div class="row align-items-center">
     <div class="col-md-6 mb-4">
      <a href="#" class="tips_logo">
        <img src="img/tips-img.png" alt="" height="400px">
      </a>
     </div>
     <div class="col-md-6">
       <h3 class="display-4 text-center">Tips Melamar</h3>
       <p class="">Berikut adalah tips singkat untuk melamar pekerjaan dari kami. Riset dan persiapkan diri dengan baik, perbarui resume dan surat lamaran sesuai dengan pekerjaan yang dilamar, tampilkan keahlian dan portofolio yang relevan, persiapkan diri dengan baik untuk wawancara, dan tunjukkan sikap profesional sepanjang proses melamar. Dengan menerapkan tips-tips ini, Anda dapat meningkatkan peluang sukses dalam melamar pekerjaan.</p>
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
        <h2>Teknologi Informasi</h2>
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

<!-- Lowongan Pekerjaan 3 Biji -->
<section id="Lowongan">
  <div class="judul">
    <h3 class="section-title text-center">lowongan Pekerjaan</h3>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <?php
        $batas = 3;
        $ambildata = mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia ORDER BY id_iklan DESC LIMIT $batas");
        while($data=mysqli_fetch_array($ambildata)){
      ?>
    
      <div class="col-md-3 m-1">
        <div class="card h-100">
          <div class="card-image align-items-center">
            <img src="../storage/logo/<?php echo $data['logo']?>" alt="Test" width="50%">
          </div>
          <div class="card-body">
            <h5 class="card-title font-weight-bold fw-bold"><?php echo $data['jabatan']?></h5>
            <h4 class="card-subtitle font-weight-light mb-3"><?php echo $data['nama_perusahaan']?></h4>
            <p class="text-primary fs-5"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #0D6EFD;"></i><?php echo $data['kota']?></p>
            <p>Cek Detail Untuk Lihat Syarat & Salary</p>
            <div class="d-flex justify-content-center">
              <?php 
                $cek = mysqli_query($conn, "SELECT * FROM pelamar WHERE pelamar.id_pelamar = ".$_SESSION['id_pelamar']);
                $cek_kolom = mysqli_fetch_array($cek);
                if ($cek_kolom['pengalaman'] == NULL){
                  echo("
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#stop'>
                          Cek Details
                    </button>
                  "); 
                }else{

                
              ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?php echo $data['id_iklan']?>">
                  Cek Details
                </button>
              <?php 
                }
              ?>
              
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
    </div> 
  </div>
</section>

<!-- Modal Pemberitahuan Untuk Pelamar-->
<div class="modal fade" id="stop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-3" id="exampleModalLabel">Opssss</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h1 class="fs-5">Silakan Lengkapin Data Diri Pada Profil Anda</h1>
        </div>
            
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>


<?php
  $ambildata = mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia");
  while($data=mysqli_fetch_array($ambildata)){
?>
  <!-- Modal Uplaod Cv-->
  <div class="modal fade" id="detail<?php echo $data['id_iklan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Lowongan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- image and judul -->
          <div class="row mb-3">
            <div class="col-md-6">
              <img src="../storage/logo/<?php echo $data['logo']?>" alt="test" width="100%">
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
              <h1 class="fs-2 ms-4 fw-bold"><?php echo $data['nama_perusahaan']?></h1>
            </div>
          </div>
          
          <div class="form-group my-3">
            <label for="" class="text-dark"><b> Posisi Yang Di Tawarkan</b></label>
            <input type="text" class="form-control" value="<?php echo $data['jabatan']?>" disabled>
          </div>
          
          <div class="form-group my-3">
            <label for="" class="text-dark"><b> Syarat</b></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" disabled><?php echo $data['syarat']?></textarea>
          </div>
          
            <div class="form-group my-3">
              <label for="" class="text-dark"><b> Alamat Kantor </b></label>
              <input type="text" class="form-control" value="<?php echo $data['alamat']?>" disabled>
            </div>
            
            <div class="form-group my-3">
              <label for="" class="text-dark"><b> Salary </b></label>
              <input type="number" class="form-control" value="<?php echo $data['salary']?>" disabled>
            </div>
            
          </div>
          <form action="../pelamar/sistem_pelamar.php" method="post" class="my-3" enctype="multipart/form-data">
            <input type="hidden" name="id_iklan" value="<?php echo $data['id_iklan']?>">
            <input type="hidden" name="id_penyedia" value="<?php echo $data['id_penyedia']?>">
            <input type="hidden" name="id_pelamar" value="<?php echo $_SESSION['id_pelamar']?>">
            <!-- mengambil nama pelamar -->
            <input type="hidden" name="nama_pelamar" value="<?php echo $_SESSION['pelamar']?>">
            
            <div class="input-group mb-3">
              <input type="file" name="cv" class="form-control" id="inputGroupFile02" required>
              <label class="input-group-text fw-bold" for="inputGroupFile02">Upload CV</label>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="upload_cv" class="btn btn-primary">Kirim Cv</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php
  }
?>


<!-- tombol Lihat Lebih Banyak -->
<?php 
  $cek = mysqli_query($conn, "SELECT * FROM pelamar WHERE pelamar.id_pelamar = ".$_SESSION['id_pelamar']);
  $cek_kolom = mysqli_fetch_array($cek);
  if ($cek_kolom['pengalaman'] == NULL){
    echo("
      <div class='m-4 d-flex justify-content-center'>
        <a href='#' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#stop'>Cari Lebih Banyak</a>
      </div>            
    "); 
  }else{
?>
  <div class=" m-4 d-flex justify-content-center">
    <a href="../pelamar/detail_lowongan.php" class="btn btn-primary">Cari Lebih Banyak</a>
  </div>
<?php 
  }
?>


<!-- footer -->
<footer class="mt-3 text-white pt-5 pb-4" style="background-color : #0D6EFD ;">
  <div class="container text-md-left">
    < class="row text-md-left">
    <div class="col-5 me-5" >
        <h3>BALI JOB FINDER</h3>
        <p>Sebuah website yang menyediakan informasi lowongan pekerjaan dan sekaligus berfungsi sebagai perantara antara pelamar kerja dengan perusahan, sehingga akan memudahan pelamar untuk mencari pekerjaan dan memudahkan perusahaan dalam mencari tenaga kerja yang tepat</p>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-upercase mb-4 font-weight-bold text-light">Kontak Kami</h5>
          <p> <i class="fa-brands fa-whatsapp pe-2"></i>081353847864 </p>
          <p><i class="fa-solid fa-phone pe-2"></i>(0361) 23123</p>
          <p><i class="fa-solid fa-envelope pe-2"></i>balijobfinder@gmail.com</p>
          <p><i class="fa-solid fa-location-dot pe-3"></i>Kampus Bukit Jimbaran, South Kuta, Badung Regenecy, Bali 80364 </p>
           
          
      </div>
      <hr class="mb-4">
      <div class="row align-items-center">
        <div class="col-md-7 col lg-8">
        <p>Copyright @2023 All rights reserved by:
          <a href="#" style="text-decoration: none">
            <strong class=" text-warning">Bali Job Finder</strong>
          </a></p>
        </div>
    <div class="col-md-5 col-lg-4">
      <div class="text-center text-md-right">

        <ul class="list-unstyled list-inline">
          <li class="list-inline-item">
            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-instagram"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
          </li>
        </ul>

      </div>

    </div>

  </div>
</footer>


<?php 
  $ambildata = mysqli_query($conn, "SELECT * FROM pelamar INNER JOIN users ON pelamar.id_users = users.id_users WHERE pelamar.id_pelamar = ".$_SESSION['id_pelamar']);
  while($data=mysqli_fetch_array($ambildata)){
?>
<!-- Modal Edit Profile -->
<div class="modal fade" id="profile<?php echo $data['id_pelamar']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Profile <?php echo $_SESSION['pelamar']?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../pelamar/sistem_pelamar.php" method="post">
            <input type="hidden" name="id_pelamar" value="<?php echo $data['id_pelamar']?>">
            <input type="hidden" name="id_users" value="<?php echo $data['id_users']?>">

            <div class="form-group my-3">
              <label for="" class="text-dark"><b> Email</b></label>
              <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" required>
            </div>

            <div class="form-group my-3">
              <label for="" class="text-dark"><b> Nama Pelamar</b></label>
              <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data['nama_lengkap']?>" required>
            </div>

            <div class="form-group my-3">
              <label for="" class="text-dark"><b>Lulusan Dari</b></label>
              <input type="text" class="form-control" name="lulusan" value="<?php echo $data['lulusan']?>" required>
            </div>

            <div class="form-group my-3">
              <label for="" class="text-dark"><b>No Whatsapp</b></label>
              <input type="text" class="form-control" name="no_wa" value="<?php echo $data['no_wa']?>" required>
            </div>
            
            <div class="form-group my-3">
              <label for="" class="text-dark"><b> Alamat Tinggal</b></label>
              <textarea class="form-control" name="tempat_tinggal" id="exampleFormControlTextarea1" rows="4" required><?php echo $data['tempat_tinggal']?></textarea>
            </div>

            <div class="form-group my-3">
              <label for="" class="text-dark"><b> Pengalaman</b></label>
              <textarea class="form-control" name="pengalaman" id="exampleFormControlTextarea1" rows="4" required><?php echo $data['pengalaman']?></textarea>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="update_profile" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

  <?php
  }
  ?>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>