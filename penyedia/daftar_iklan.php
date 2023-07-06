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

    <title>DATA LOWONGAN | Data Pengguna</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Data Lowongan</h1>
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Tambah Lowongan
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Gaji Yang Ditawarkan</th>
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
                                       $query = mysqli_query($conn, "SELECT * FROM iklan WHERE iklan.id_penyedia = ".$_SESSION['id']);
                                       $jmldata = mysqli_num_rows($query);
 
                                       //melakukan pembagian antara $jmldata dengan $batas, dan nanti akan dibulatkan menggunakan fungsi ceil() 
                                       $jmlhalaman = ceil($jmldata/$batas);
                                       $perusahaan = $_SESSION['id'];
                                      $ambildata=mysqli_query($conn, "SELECT * FROM iklan INNER JOIN penyedia ON iklan.id_penyedia = penyedia.id_penyedia 
                                                            WHERE iklan.id_penyedia = $perusahaan ORDER BY id_iklan DESC  LIMIT $posisi, $batas ");
                                      $i=$halaman_awal+1;
                                      while($data=mysqli_fetch_array($ambildata)){
                                
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <td><?php echo $data['jabatan']?></td>
                                            <td><?php echo tambahrp($data['salary'])?></td>
                                            <td>
                                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail<?=$data['id_iklan']?>">
                                                Detail
                                              </button>
                                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$data['id_iklan']?>">
                                                Edit
                                              </button>
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['id_iklan']?>">
                                                Delete
                                              </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- DETAIL Modal -->
                                    <div class="modal fade" id="detail<?=$data['id_iklan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                              <label for="" class="text-dark"><b> Logo Perusahaan </b></label>
                                              <img src="../storage/logo/<?php echo $data['logo']?>" alt="" width="100px" height="100px">
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> jabatan </b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['jabatan']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Syarat</b></label>
                                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $data['syarat']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Alamat Perusahaan</b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['alamat']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Salary</b></label>
                                              <input class="form-control" rows="3" value="<?php echo tambahrp($data['salary'])?>" disabled>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- EDIT Modal -->
                                    <div class="modal fade" id="edit<?=$data['id_iklan']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Lowongan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          <form action="../penyedia/sistem_penyedia.php" method="post" enctype="multipart/form-data">
                                    
                                            <input type="hidden" class="form-control" name="id_iklan" value="<?php echo $data['id_iklan']?>">
                                            <input type="hidden" class="form-control" name="id_penyedia" value="<?php echo $_SESSION['id']?>">
                                            
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Jabatan </b></label>
                                              <input type="text" class="form-control"name="jabatan" value="<?php echo $data['jabatan']?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Syarat</b></label>
                                              <textarea class="form-control" name="syarat" id="exampleFormControlTextarea1" rows="10"><?php echo $data['syarat']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Alamat Perusahaan</b></label>
                                              <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo $data['alamat']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Salary</b></label>
                                              <input class="form-control" rows="3" value="<?php echo tambahrp($data['salary'])?>" name="salary">
                                            </div>

                                            <div class="form-group">
                                              <button type="submit" class="btn btn-warning" name="updatelowongan">Submit</button>
                                            </div>

                                          </form>
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
                                            <h5 class="modal-title text-dark" id="exampleModalLabel"> <b>Hapus Lowongan</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="../penyedia/sistem_penyedia.php" method="post">
                                              <div class="form-group text-dark">
                                                Apakah Anda Yakin Ingin Menghapus <b><?php echo $data['jabatan']?></b>
                                                <br><br>
                                                <input type="hidden" name="id_iklan" value=<?php echo $data['id_iklan']?>>
                                                <button type="submit" class="btn btn-danger" name="deletelowowngan">Hapus</button>
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
                                          echo ("<li class='page-item'><a class='page-link cus-font' href='../penyedia/daftar_iklan.php?halaman=$h'>$h</a></li> ");
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

                    <!-- MODAL CREATE -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Lowongan <?php echo $_SESSION['penyedia']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="../penyedia/sistem_penyedia.php" method="post" enctype="multipart/form-data">
                              <!-- mengambil id penyedia yang sedang login -->
                              <input type="hidden" name="id_penyedia" value="<?php echo $_SESSION['id']?>">

                              <div class="form-group">
                                <label for="" class="text-dark"><b>Jabatan</b></label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan" required>
                              </div>
                              <div class="form-group">
                                <label for="" class="text-dark"><b> Syarat </b></label>
                                <textarea name="syarat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                              </div>

                              <div class="form-group">
                                <label for="" class="text-dark"><b> Salary </b></label>
                                <input type="number" class="form-control" name="salary" placeholder="Masukan Salary" required>
                              </div>

                              <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="addiklan">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

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
  // ======================================================== FUNCTION UNTUK RUPIAH =======================================================
function tambahrp($angka){
  $rupiah ='Rp. '.number_format($angka,0,',','.');
  return $rupiah;
}
?>