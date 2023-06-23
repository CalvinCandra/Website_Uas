<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Dashboard</title>
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
                     // melakukan Pengecekan Jika User Belum Login
                    if(!$_SESSION['admin']){
                        echo "<script>document.location='../login.php'</script>";
                    }
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color :#2B1B56;">BALI JOB FINDER</h6>
                                </div>
                                <div class="card-body">
                                
                                    <p class="text-secondary fw-bold"> "Semakin keras saya bekerja, maka semakin banyak keberuntungan yang saya miliki." <span class="text-dark fw-bold">- <b>Thomas Jefferson</b></span> </p>
                                    <p class="mb-0"> <i>Selamat Datang & Selamat Berkerja</i> </p>
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