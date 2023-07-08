<?php
    include("../koneksi/koneksi.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan</title>
    <!-- Link AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- file Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="../pelamar/css/style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../pelamar/img/blue_logo.png" alt="Bali Job Finder" height="40px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse text-right" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../pelamar/dashboard.php#Home">Home</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="../pelamar/dashboard.php#Tips">Tips</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pelamar/dashboard.php#Lowongan">Lowongan</a>
            </li>
           <li>
           <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user-tie" style="color: #00000;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                  <li>
                    <a class="dropdown-item" href="#">
                      <?php 
                        $ambilnama = mysqli_query($conn, "SELECT * FROM pelamar");
                        $nama = mysqli_fetch_array($ambilnama);
                        if($_SESSION['id_pelamar']){
                            echo $nama['nama_lengkap'];
                        }
                      ?>
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


<!-- lowongan -->
<section class="mt-5">
  <div class="container">
    <div class="judul" data-aos="fade-right" data-aos-duration="1500">
        <h3 class="section-title text-center">Lowongan Pekerjaan</h3>
      </div>
      
      
      <div class="row justify-content-center">
          <!-- form search -->
          <!-- mengirim yang diinput user pada url dengan method get dan action pada file yang ingin data di search -->
            <form class="d-flex" role="search" method="get" action="../pelamar/detail_lowongan.php" data-aos="flip-left" data-aos-duration="950">
                <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php
                // menentukan batasan
                $batas = 16;
                // mengambil pesan halama dari url menggunakan method GET
                $halaman = @$_GET['halaman'];

                // pengecekan jika $halaman kosong maka $posisi akan 0
                if(empty($halaman)){
                    $posisi = 0;
                    $halaman = 1;
                // jika ada maka halaman $poisis akan bertambah
                }else{
                    $posisi = ($halaman - 1)*$batas;
                }
                
                // query tb admin untuk mengecek data
                $query = mysqli_query($conn, "SELECT * FROM iklan");
                $jmldata = mysqli_num_rows($query);

                //melakukan pembagian antara $jmldata dengan $batas, dan nanti akan dibulatkan menggunakan fungsi ceil() 
                $jmlhalaman = ceil($jmldata/$batas);

                // mengambil data cari dari url yang dikirim sebelumnya
                // jika ada yang dicari ada, maka akan menampilkan data sesuai inputan user, jika inputan == NULL maka akan menampilkan hal yang sama seperti sebelumnya
                if(isset($_GET['cari'])){
                  $cari=$_GET['cari'];
                  $ambildata=mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia WHERE jabatan LIKE '%".$cari."%' OR nama_perusahaan LIKE '%".$cari."%' ORDER BY id_iklan DESC LIMIT $batas");
                }else{
                  // jika inputan tidak dikirim, akan menampilkan berikut
                  $ambildata = mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia ORDER BY id_iklan DESC LIMIT $batas");
                }

                while($data=mysqli_fetch_array($ambildata)){
            ?>
            <div class="col-md-3 my-4" data-aos="flip-left" data-aos-duration="950">
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?php echo $data['id_iklan']?>">
                        Cek Details
                    </button>
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

<?php
  $ambildata = mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia");
  while($data=mysqli_fetch_array($ambildata)){
?>
  <!-- Modal Upload Cv-->
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

<!-- Tampilan Pagination -->
<div class="container mt-5" data-aos="flip-left" data-aos-duration="950">
    <nav aria-label="Page navigation example">
        <h1 class="fs-4">Jumlah Halaman :</h1>
        <ul class="pagination justify-content-start">
            <?php
                // melakukan perulangan
                for($h = 1; $h <= $jmlhalaman; $h++){
                    if($h != $halaman){
                        echo ("<li class='page-item'><a class='page-link cus-font shadow' href='../pelamar/detail_lowongan.php?halaman=$h'>$h</a></li> ");
                    }else{
                        echo ("<li class='page-item'><a class='page-link cus-font'>$h</a></li> ");
                    }
                }
            ?>
        </ul>
    </nav>
</div>

<div class=" m-4 d-flex justify-content-center"  data-aos="flip-left" data-aos-duration="950">
  <a href="../pelamar/dashboard.php" class="btn btn-primary w-50">Kembali</a>
</div>

<!-- footer -->
<footer class="mt-3 text-white pt-5 pb-4" style="background-color : #0D6EFD ;" data-aos="fade-up" data-aos-duration="1000">
  <div class="container text-md-left">
    <div class="row text-md-left">
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
  </div>
</footer>




<!-- Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Init AOS -->
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>