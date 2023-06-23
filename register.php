<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="bootsraps/css/bootstrap.css">

    <!-- link css -->
    <link rel="stylesheet" href="bootsraps/tampilan.css">
    <title>REGISTER</title>
</head>
<body>
    <div class="wrapper p">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row rounded-3 bg-white shadow register">
                <div class="col-md-6 d-flex justify-content-center align-items-center position-relative side-form">
                    <div class="input-box">
                        <header class="h3 text-center font-weight-bold mb-3">REGISTER</header>
                        <form action="sistem/cek.php" method="post">
                            <div class="input-field">
                                <input oninput="inputEmail()" type="email" name="email" class="input" required autocomplete="off">
                                <label for="" id="labelEmail">Email</label>
                            </div>
                            <div class="input-field">
                                <input oninput="inputNama()" type="text" name="nama" class="input" required autocomplete="off">
                                <label for="" id="labelNama">Nama Lengkap Pelamar</label>
                            </div>
                            <div class="input-field">
                                <input oninput="inputPassword()" type="password" name="password" class="input" required>
                                <label for="" id="labelPassword">Password</label>
                            </div>
                            <div class="input-field">
                                <input oninput="inputConfrim()" type="password" name="confrim" class="input" required>
                                <label for="" id="labelConfrim">Confrim Password</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="role" class="input" value="pelamar" required hidden>
                            </div>
                            <div class="input-field">
                               <button type="submit" class="btn btn-primary" name="register">Register</button>
                               <p class="mt-1 text-center">Or</p>
                            </div>
                            <div class="input-field">
                                <a class="btn" style="background-color: #F2F2F2;" role="button">
                                <img src="bootsraps/img/google.png" alt="" class="me-5" width="30px" height="30px" style="margin-left:-55px;">
                                    Register Dengan Google
                                </a>
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
    <script>
        function inputEmail(){
            const labelEmail = document.getElementById('labelEmail')
            if(labelEmail.value !== ''){
                labelEmail.style.top = "-10px"
                labelEmail.style.fontSize = "13px"
            }            
        }

        function inputNama(){
            const labelNama = document.getElementById('labelNama')
            if(labelNama.value !== ''){
                labelNama.style.top = "-10px"
                labelNama.style.fontSize = "13px"
            }            
        }

        function inputConfrim(){
            const labelConfrim = document.getElementById('labelConfrim')
            if(labelConfrim.value !== ''){
                labelConfrim.style.top = "-10px"
                labelConfrim.style.fontSize = "13px"
            }            
        }

        function inputPassword(){
            const labelPass = document.getElementById('labelPassword')
            if(labelPass.value !== ''){
                labelPass.style.top = "-10px"
                labelPass.style.fontSize = "13px"
            }
        }

    </script>
</body>
</html>