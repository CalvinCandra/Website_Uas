<?php
    include('../koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Akun Admin | Data Pengguna</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php
    require('../admin/partial/meta_css.php');
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- NAVBAR -->
<?php
    require('../admin/partial/header.php');
?>
<!--END NAVBAR -->

<!-- SIDEBAR -->
<?php
    require('../admin/partial/sidebar.php');
?>
<!-- END SIDEBAR -->
  

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Akun Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Pengguna</a></li>
              <li class="breadcrumb-item active">Akun Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" id="home">
        <div class="container-fluid">
          <!-- kontent -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Akun Admin
          </button>
          <!-- card-header -->
          <div class="card-header"></div>
          <!--card Body -->
          <div class="card-body">
          <?php 
            //   @$success = $_GET['success'];
            //   if($success)
            //   {             
            //     echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
            //               <strong>Success!</strong>'.$success.' 
            //               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                 <span aria-hidden="true">&times;</span>
            //               </button>
            //           </div>');
            //   }
            ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Email</th>
                  <th>Nama Admin</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $ambildata=mysqli_query($conn, "SELECT * FROM admin");
                  $i=1;
                  while($data=mysqli_fetch_array($ambildata)){
                ?>

                  <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $data['email']?></td>
                  <td><?php echo $data['username']?></td>
                  <td>
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">
                        Edit
                      </button>
                      <input type="hidden" name="idkategoridihapus" value="">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                        Delete
                      </button>
                    </td>
                  </tr>

                  <!-- EDIT Modal -->
                  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post">
                            <div class="form-group">
                              <input type="text" class="form-control" name="kategoribaru" value=""
                                placeholder="Nama Kategori" required><br>
                                <input type="hidden" name="idk" value=>
                              <button type="submit" class="btn btn-primary" name="updatekategori">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- DELETE Modal -->
                  <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori?
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post">
                            <div class="form-group">
                              Apakah Anda Yakin Ingin Menghapus <b></b>
                              <br><br>
                              <input type="hidden" name="idkategori" value=>
                              <button type="submit" class="btn btn-danger" name="deletekategori">Hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php
                }
                ?>
                
              </tbody>
            </table>
          </div>
          <!-- Create Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="">Nama Admin</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Admin" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Admin</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Admin" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Admin</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Admin" required>
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="level" placeholder="Admin" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="addAdmin">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- card-Footer -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->

<!-- footer -->
<?php
  require('../admin/partial/footer.php');
?>
<!-- end footer -->
</body>
</html>
