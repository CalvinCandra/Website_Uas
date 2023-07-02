<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="../login/css/modif.css">
    <title>Sign In</title>
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
                    <img src="../login/img/login.svg" alt="login" width=" 100%" class="my-5">
                </div>

                <div class="col-md-6">
                    <div class="m-5 text-center">
                        <h3>SIGN IN</h3>
                     </div>
                        <form action="../login/cek.php" method="post" class="m-5">
                            <div class="input-group mb-4 justify-content-center">
                                <input type="email" name="email" class="input rounded-4" placeholder="Email">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="input-group mb-4 justify-content-center">  
                                <input type="password" name="password" class="input rounded-4" placeholder="Password">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <div class="input-group justify-content-center">
                                <button type="submit" name="login" class="btn btn-primary w-50 rounded-4">LOGIN</button>
                            </div>
                        </form>
                    <div class="text-center">
                        <p>Belum Punya Akun ? <a href="../login/register.php" class="list-unstyled">Klik Disini</a></p>
                    </div>
                </div>
                    
                
            </div>
        </div>
    </section>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 2000);
    </script>
</body>
</html>