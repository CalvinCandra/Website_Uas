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

    <title>DAFTAR LOWONGAN</title>
    <?php
      require("../admin/bahan/link_css.php");
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
          require("../admin/bahan/sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    require("../admin/bahan/header.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Lowongan</h1>
                    </div>
                    <?php 
                        // @$success = $_GET['success'];
                        // @$error = $_GET['error'];
                        // if($success)
                        // {             
                        //     echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //             <strong>Success!</strong> '.$success.' 
                        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        //                 <span aria-hidden="true">&times;</span>
                        //             </button>
                        //         </div>');
                        // }
                        // if($error)
                        // {             
                        //     echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        //             <strong>Error!</strong> '.$error.' 
                        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        //             <span aria-hidden="true">&times;</span>
                        //             </button>
                        //         </div>');
                        // }
                    ?>

                    <!-- table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Logo</th>
                                            <th>Jabatan</th>
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
                                      $query = mysqli_query($conn, "SELECT * FROM iklan");
                                      $jmldata = mysqli_num_rows($query);

                                      //melakukan pembagian antara $jmldata dengan $batas, dan nanti akan dibulatkan menggunakan fungsi ceil() 
                                      $jmlhalaman = ceil($jmldata/$batas);

                                      $ambildata=mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia ORDER by id_iklan DESC LIMIT $posisi, $batas");
                                      $i=1;
                                      while($data=mysqli_fetch_array($ambildata)){
                                
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <td><?php echo $data['nama_perusahaan']?></td>
                                            <td><img src="../storage/logo/<?php echo $data['logo']?>" alt="" width="110px" height="110px"></td>
                                            <td><?php echo $data['jabatan']?></td>
                                            <td>
                                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail<?=$data['id_iklan']?>">
                                                Detail
                                              </button>
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['id_iklan']?>">
                                                Delete
                                              </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                     <!-- DETAIL Modal -->
                                     <div class="modal fade" id="detail<?=$data['id_iklan']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Lowongan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Nama Perusahaan</b></label>
                                              <input type="email" class="form-control" value="<?php echo $data['nama_perusahaan']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Logo Perusahaan</b></label>
                                              <img src="../storage/logo/<?php echo $data['logo']?>" alt="" width ="110px" heigth="110px">
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Jabatan</b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['jabatan']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Syarat</b></label>
                                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" disabled><?php echo $data['syarat']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Alamat</b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['alamat']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Gaji</b></label>
                                              <input type="text" class="form-control" value="<?php echo tambahrp($data['salary'])?>" disabled>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- DELETE Modal -->
                                    <div class="modal fade" id="delete<?=$data['id_iklan']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel"> <b>Hapus Lowongan?</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="../admin/sistem_admin.php" method="post">
                                              <div class="form-group text-dark">
                                                Apakah Anda Yakin Ingin Menghapus Lowongan <b><?php echo $data['jabatan']?></b> dari Perusahaan <b><?php echo $data['nama_perusahaan']?></b>
                                                <br><br>
                                                <input type="hidden" name="id_iklan" value=<?php echo $data['id_iklan']?>>
                                                <button type="submit" class="btn btn-danger" name="deletelowongan">Hapus</button>
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
                                          echo ("<li class='page-item'><a class='page-link cus-font' href='../admin/data_iklan.php?halaman=$h'>$h</a></li> ");
                                        }else{
                                          echo ("<li class='page-item'><a class='page-link cus-font'>$h</a></li> ");
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
                require("../admin/bahan/footer.php");
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php
      require("../admin/bahan/link_js.php");
    ?>

</body>
</html>


<?php
  // ======================================================== FUNCTION UNTUK RUPIAH =======================================================
function tambahrp($angka){
  $rupiah ='Rp. '.number_format($angka,0,',','.');
  return $rupiah;
}
?>