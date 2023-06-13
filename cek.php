<?php
include("koneksi/koneksi.php");
session_start();
// ============================================================================== Register
if(isset($_POST['register'])){
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    $level=$_POST['level'];

    $register=mysqli_query($conn, "INSERT INTO user (email, password, level)
    VALUES ('$email', '$password','$level')");

    $tambahpelamar=mysqli_query($conn, "INSERT INTO pelamar (email, nama_lengkap)
    VALUES ('$email', '$nama')");

    if($register && $tambahpelamar){
        echo "<script>alert('Register Berhasil Di lakukan');document.location='login.php'</script>";
    }else{
        echo"
            <script>alert('Gagal Melakukan Register');document.location='register.php'</script>
        ";
    }
}
// ============================================================================== LOGIN
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $login=mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND PASSWORD ='$password'");
    $admin=mysqli_query($conn, "SELECT * FROM admin");
    $cek = mysqli_num_rows($login);

    if($cek > 0){
        $data = mysqli_fetch_assoc($login);
        $dataadmin = mysqli_fetch_assoc($admin);
        if($data['level']=='admin'){
            $_SESSION['username'] = $dataadmin['username'];
            $_SESSION['level'] = 'admin';
            echo "<script>alert('Berhasil Login');document.location='admin/dashboard.php'</script>";
        }else if($data['level']=='penyedia'){
            $_SESSION['email'] = $email;
            $_SESSION['level'] = 'penyedia';
            echo "<script>alert('Berhasil Login');document.location='penyedia/dashboard.php'</script>";
        }else{
            $_SESSION['email'] = $email;
            echo "<script>alert('Berhasil Login');document.location='pelamar/dashboard.php'</script>";
        }
    }else{
        echo"<script>alert('Gagal Login')</script>";
    }
}
?>