<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- link css -->
    <link rel="stylesheet" href="../login/css/modif.css">
    <title>Sign Up</title>
</head>
<body>
    
    <section class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <?php
            @$error = $_GET['error'];
            if($error){
                echo('
                    <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                    '.$error.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ');
            }
        ?>
        <div class="container justify-content-center align-items-center d-flex shadow-lg rounded-3">
            <div class="row my-5">
                
                    
                <div class="col-md-6">
                    <div class="m-3 text-center">
                        <h3>Register</h3>
                    </div>
                    <form action="../login/cek.php" method="post" class="m-3 p-4">
                        <div class="input-group mb-3 justify-content-center">
                            <input type="email" name="email" class="input rounded-5" placeholder="Email" required>
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div class="input-group mb-3 justify-content-center"">  
                            <input type="text" name="nama" class="input rounded-5" placeholder="Nama Lengkap" required>
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="input-group mb-3 justify-content-center"">  
                            <input type="password" name="password" class="input rounded-5" placeholder="Password" required>
                            <i class="fa-solid fa-unlock"></i>
                        </div>
                        
                        <div class="input-group mb-3 justify-content-center"">  
                            <input type="password" name="konfrim" class="input rounded-5" placeholder="Konfrimasi Password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>

                        <input type="hidden" name="role" value="pelamar">
                        
                        <div class="input-group justify-content-center">
                            <button type="submit" name="register" class="btn btn-primary w-50 rounded-5">REGISTER</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p>Sudah Punya Akun ? <a href="../login/login.php" class="list-unstyled">Klik Disini</a></p>
                    </div>
                </div>
                
                <div class="col-md-6">      
                    <img src="../login/img/register.svg" alt="register" width=" 100%" class="my-5 pe-5">
                </div>
                    
                
            </div>
        </div>
    </section>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>