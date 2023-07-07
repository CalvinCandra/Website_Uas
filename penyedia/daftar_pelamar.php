<?php
    include('../koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DATA PELAMAR | Penyedia</title>
    <?php
      require("../penyedia/bahan/link_css.php");
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
          require("../penyedia/bahan/sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    require("../penyedia/bahan/header.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Data Pelamar</h1>
                    </div>
                    <?php 
                        @$success = $_GET['success'];
                        @$error = $_GET['error'];
                        if($success)
                        {             
                            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> '.$success.' 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                        }
                        if($error)
                        {             
                            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> '.$error.' 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                        }
                    ?>
                    <!-- table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <!-- form search -->
                            <!-- mengirim yang diinput user pada url dengan method get dan action pada file yang ingin data di search -->
                            <form class="d-flex float-right" role="search" method="get" action="../penyedia/daftar_pelamar.php">
                              <input class="form-control mx-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama Pelamar</th>
                                            <th>Posisi Yang Dilamar</th>
                                            <th>Cv</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                       // menentukan batasan
                                       $batas = 5;
                                       // mengambil pesan halama dari url menggunakan method GET
                                       $halaman = @$_GET['halaman'];
                                       // berfungsi untuk meentukan halamanan awal dari data, jika 1 maka akan di buat 0, jika halaman lebih dari 1
                                       // maka $halaman akan di kali batas dan dikurang batas
                                       $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                                       // pengecekan jika $halaman kosong maka $posisi akan 0
                                       if(empty($halaman)){
                                           $posisi = 0;
                                           $halaman = 1;
                                       // jika ada maka halaman $poisis akan bertambah
                                       }else{
                                           $posisi = ($halaman - 1)*$batas;
                                       }
                                       
                                       // query tb admin untuk mengecek data
                                       $query = mysqli_query($conn, "SELECT * FROM pengajuan WHERE pengajuan.id_penyedia = ".$_SESSION['id']);
                                       $jmldata = mysqli_num_rows($query);
 
                                       //melakukan pembagian antara $jmldata dengan $batas, dan nanti akan dibulatkan menggunakan fungsi ceil() 
                                       $jmlhalaman = ceil($jmldata/$batas);

                                      //  menyimpan session id_penyedia ke dalam variable
                                      $perusahaan = $_SESSION['id'];
                                      // mengambil data cari dari url yang dikirim sebelumnya
                                      // jika ada yang dicari ada, maka akan menampilkan data sesuai inputan user, jika inputan == NULL maka akan menampilkan hal yang sama seperti sebelumnya
                                      if(isset($_GET['cari'])){
                                        $cari=$_GET['cari'];
                                        $ambildata=mysqli_query($conn,"SELECT * FROM pengajuan 
                                                                    INNER JOIN pelamar ON pengajuan.id_pelamar = pelamar.id_pelamar
                                                                    INNER JOIN users On pelamar.id_users = users.id_users
                                                                    INNER JOIN penyedia ON pengajuan.id_penyedia = penyedia.id_penyedia
                                                                    INNER JOIN iklan ON pengajuan.id_iklan = iklan.id_iklan
                                                                    WHERE email OR nama_lengkap LIKE '%".$cari."%' AND pengajuan.id_penyedia = $perusahaan LIMIT $posisi, $batas");
                                      }else{
                                        // jika inputan tidak dikirim, akan menampilkan berikut
                                        $ambildata=mysqli_query($conn,"SELECT * FROM pengajuan 
                                                                    INNER JOIN pelamar ON pengajuan.id_pelamar = pelamar.id_pelamar
                                                                    INNER JOIN users On pelamar.id_users = users.id_users
                                                                    INNER JOIN penyedia ON pengajuan.id_penyedia = penyedia.id_penyedia
                                                                    INNER JOIN iklan ON pengajuan.id_iklan = iklan.id_iklan
                                                                    WHERE pengajuan.id_penyedia = $perusahaan LIMIT $posisi, $batas");
                                      }

                                      
                                      $i=$halaman_awal+1;
                                      while($data=mysqli_fetch_array($ambildata)){
                                
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <td><?php echo $data['email']?></td>
                                            <td><?php echo $data['nama_lengkap']?></td>
                                            <td><?php echo $data['jabatan']?></td>
                                            <td>
                                              <a href="../storage/cv/<?php echo $data['cv']?>" target="__blank">
                                                <?php echo $data['cv']?>
                                              </a>
                                            </td>
                                            <td>
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['id_pengajuan']?>">
                                                Hilangkan
                                              </button>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <!-- DELETE Modal -->
                                    <div class="modal fade" id="delete<?=$data['id_pengajuan']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel"> <b>Hilangkan Dari Daftar Pelamar?</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="../penyedia/sistem_penyedia.php" method="post">
                                              <div class="form-group text-dark">
                                                  Semoga Keputusan Anda adalah Keputusan Yang Membawa Keberuntungan
                                                <br><br>
                                                <input type="hidden" name="id_pengajuan" value=<?php echo $data['id_pengajuan']?>>
                                                <button type="submit" class="btn btn-danger" name="hilang">Submit</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  <?php
                                  }
                                  ?>
                                </table>

                                <!-- Tampilan Pagination -->
                                <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end">
                                    <?php
                                    // melakukan perulangan
                                      for($h = 1; $h <= $jmlhalaman; $h++){

                                        if($h != $halaman){
                                          echo ("<li class='page-item'><a class='page-link cus-font' href='../admin/akun_admin.php?halaman=$h'>$h</a></li> ");
                                        }else{
                                          echo ("<li class='page-item'><a class='page-link cus-font' href='#'>$h</a></li> ");
                                        }
                                      }
                                    ?>
                                  </ul>
                                </nav>
                                
                            </div>
                        </div>
                    </div>
                    <!-- end table -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
                require("../penyedia/bahan/footer.php");
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php
      require("../penyedia/bahan/link_js.php");
    ?>

</body>
</html>


<?php

?>