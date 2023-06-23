<?php
    include('../koneksi/koneksi.php');
    require ("../sistem/sistem.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AKUN PERUSAHAAN | Data Pengguna</title>
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn tambah" data-toggle="modal" data-target="#exampleModal">
                              Tambah Akun Perusahaan
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Logo Perusahaan</th>
                                            <th>Kota Perusahaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                      $ambildata=mysqli_query($conn, "SELECT penyedia.*, users.email FROM penyedia INNER JOIN users ON  penyedia.id_users = users.id_users");
                                      $i=1;
                                      while($data=mysqli_fetch_array($ambildata)){
                                
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <td><?php echo $data['email']?></td>
                                            <td><?php echo $data['nama_perusahaan']?></td>
                                            <td><img src="<?php echo "../logo/" . $data['logo']?>" alt="" width="120px" height="120px"></td>
                                            <td><?php echo $data['alamat']?></td>
                                            <td>
                                              <button type="button" class="btn update" data-toggle="modal" data-target="#edit<?=$data['id_penyedia']?>">
                                                Edit
                                              </button>
                                              <button type="button" class="btn delete" data-toggle="modal" data-target="#delete<?=$data['id_penyedia']?>">
                                                Delete
                                              </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- EDIT Modal -->
                                    <div class="modal fade" id="edit<?=$data['id_penyedia']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Akun Perusahaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" class="form-control" name="ids" value="<?php echo $data['id_users']?>">
                                            <input type="hidden" class="form-control" name="idp" value="<?php echo $data['id_penyedia']?>">
                                            
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Email Perusahaan</b></label>
                                              <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Nama Perusahaan</b></label>
                                              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_perusahaan']?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-dark"><b> Logo Perusahaan</b></label> <br>
                                                <img src="../logo/<?php echo $data['logo']?>" alt="" width="120px" height="120px">
                                                <input type="file" name="logo">
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="text-dark"><b> Kota Perusahaan</b></label>
                                              <input type="text" class="form-control" name="kota" value="<?php echo $data['alamat']?>" required>
                                            </div>
                                            <div class="form-group">
                                              <button type="submit" class="btn update" name="updatepenyedia">Submit</button>
                                            </div>

                                          </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- DELETE Modal -->
                                    <div class="modal fade" id="delete<?=$data['id_penyedia']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel"> <b>Hapus Akun Perusahaan</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form method="post">
                                              <div class="form-group text-dark">
                                                Apakah Anda Yakin Ingin Menghapus <b><?php echo $data['nama_perusahaan']?></b>
                                                <br><br>
                                                <input type="hidden" name="idp" value=<?php echo $data['id_penyedia']?>>
                                                <input type="hidden" name="ids" value=<?php echo $data['id_users']?>>
                                                <button type="submit" class="btn delete" name="deletepenyedia">Hapus</button>
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
                                    <li class="page-item"><a class="page-link cus-font" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link cus-font" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link cus-font" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link cus-font" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link cus-font" href="#">Next</a></li>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" enctype="multipart/form-data">
                              <input type="hidden" class="form-control" name="role" value="penyedia">

                              <div class="form-group">
                                <label for="" class="text-dark"><b> Email Perusahaan</b></label>
                                <input type="email" class="form-control" name="email" placeholder="name@gmail.com" required>
                              </div>
                              <div class="form-group">
                                <label for="" class="text-dark"><b> Nama Perusahaan</b></label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Perusahaan" required>
                              </div>
                              <div class="form-group">
                                  <label for="" class="text-dark"><b> Logo Perusahaan</b></label> <br>
                                  <input type="file" name="logo" id="logo">
                              </div>
                              <div class="form-group">
                                <label for="" class="text-dark"><b> Passwrod Perusahaan</b></label>
                                <input type="text" class="form-control" name="pass" placeholder="Password Perusahaan" required>
                              </div>
                              <div class="form-group">
                                <label for="" class="text-dark"><b> Kota Perusahaan</b></label>
                                <input name="alamat" class="form-control" placeholder="Kota Perusahaan" required>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn tambah" name="addpenyedia">Submit</button>
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

?>