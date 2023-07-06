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

    <title>AKUN PELAMAR | Data Pengguna</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
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
                            <h6 class="m-0 font-weight-bold" style="color:#2B1B56;">Data Pelamar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama Pelamar</th>
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
                                      $query = mysqli_query($conn, "SELECT * FROM pelamar");
                                      $jmldata = mysqli_num_rows($query);

                                      //melakukan pembagian antara $jmldata dengan $batas, dan nanti akan dibulatkan menggunakan fungsi ceil() 
                                      $jmlhalaman = ceil($jmldata/$batas);

                                      $ambildata=mysqli_query($conn, "SELECT * FROM pelamar INNER JOIN users ON pelamar.id_users = users.id_users ORDER by id_pelamar DESC LIMIT $posisi, $batas");
                                      $i=$halaman_awal+1;
                                      while($data=mysqli_fetch_array($ambildata)){
                                
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <td><?php echo $data['email']?></td>
                                            <td><?php echo $data['nama_lengkap']?></td>
                                            <td>
                                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail<?=$data['id_pelamar']?>">
                                                Detail
                                              </button>
                                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$data['id_pelamar']?>">
                                                Edit
                                              </button>
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['id_pelamar']?>">
                                                Delete
                                              </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- DETAIL Modal -->
                                    <div class="modal fade" id="detail<?=$data['id_pelamar']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Akun Pelamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Email Pelamar</b></label>
                                              <input type="email" class="form-control" value="<?php echo $data['email']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Nama Pelamar</b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['nama_lengkap']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Lulusan Pelamar</b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['lulusan']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Nomer WhatsApp</b></label>
                                              <input type="text" class="form-control" value="<?php echo $data['no_wa']?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Tempat Tinggal</b></label>
                                              <textarea class="form-control" rows="3" disabled><?php echo $data['tempat_tinggal']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Pengalaman</b></label>
                                              <textarea class="form-control" rows="3" disabled><?php echo $data['pengalaman']?></textarea>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- EDIT Modal -->
                                    <div class="modal fade" id="edit<?=$data['id_pelamar']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Akun Pelamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          <form action="../admin/sistem_admin.php" method="post">
                                            <input type="hidden" class="form-control" name="id_users" value="<?php echo $data['id_users']?>">
                                            <input type="hidden" class="form-control" name="id_pelamar" value="<?php echo $data['id_pelamar']?>">
                                            
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Email Pelamar</b></label>
                                              <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Nama Pelamar</b></label>
                                              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_lengkap']?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b>Lulusan Pelamar</b></label>
                                              <input type="text" class="form-control" name="lulusan" value="<?php echo $data['lulusan']?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Nomer WhatsApp</b></label>
                                              <input type="number" class="form-control" name="no_wa" value="<?php echo $data['no_wa']?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Tempat Tinggal</b></label>
                                              <textarea class="form-control" rows="3" name="tempat_tinggal" required><?php echo $data['tempat_tinggal']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Pengalaman</b></label>
                                              <textarea class="form-control" rows="3" name="pengalaman" require><?php echo $data['pengalaman']?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <button type="submit" class="btn btn-warning" name="updatepelamar">Submit</button>
                                            </div>

                                          </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- DELETE Modal -->
                                    <div class="modal fade" id="delete<?=$data['id_pelamar']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel"> <b>Hapus Akun Perusahaan</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="../admin/sistem_admin.php" method="post">
                                              <div class="form-group text-dark">
                                                Apakah Anda Yakin Ingin Menghapus <b><?php echo $data['nama_lengkap']?></b>
                                                <br><br>
                                                <input type="hidden" name="id_pelamar" value=<?php echo $data['id_pelamar']?>>
                                                <input type="hidden" name="id_users" value=<?php echo $data['id_users']?>>
                                                <button type="submit" class="btn btn-danger" name="deletepelamar">Hapus</button>
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
                                          echo ("<li class='page-item'><a class='page-link cus-font' href='../admin/akun_pelamar.php?halaman=$h'>$h</a></li> ");
                                        }else{
                                          echo ("<li class='page-item'><a class='page-link cus-font'>$h</a></li>");
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