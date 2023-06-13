<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="bootsraps/css/bootstrap.css">

    <!-- link css -->
    <link rel="stylesheet" href="bootsraps/styeling.css">
    <title>REGISTER</title>
</head>
<body>
    <div class="wrapper p">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row rounded-3 bg-white shadow register">
                <div class="col-md-6 d-flex justify-content-center align-items-center position-relative side-form">
                    <div class="input-box">
                        <header class="h3 text-center font-weight-bold mb-3">REGISTER</header>
                        <form action="cek.php" method="post">
                            <div class="input-field">
                                <input type="email" name="email" class="input" required autocomplete="off">
                                <label for="">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="nama" class="input" required autocomplete="off">
                                <label for="">Nama Lengkap Pelamar</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="input" require>
                                <label for="">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="level" class="input" value="pelamar" require hidden>
                            </div>
                            <div class="input-field">
                               <button type="submit" class="btn btn-primary" name="register">Register</button>
                               <p class="mt-1 text-center">Or</p>
                            </div>
                            <div class="input-field">
                            <a class="btn" style="background-color: #F2F2F2;" role="button">
                                <i class="fab fa-twitter me-2"></i>Register Dengan Google</a>
                            </div>
                            <div class="input-field">
                              <p class="text-center mt-3">Sudah Punya Akun? <a href="login.php" class="text-decoration-none">Klik Disini</a> </p>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-6 side-register">
                    <!-- img -->
                    <img src="bootsraps/img/logo_login.png" class="position-absolute img-register" alt="">
                    <div class="text position-absolute">
                        <p class="text-white">Welcome to</p>
                        <h2 class="text-white h2">Bali Job Finder</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <script src="bootsraps/js/bootstrap.js"></script>
</body>
</html>