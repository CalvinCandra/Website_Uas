<?php

require("../koneksi/koneksi.php");
session_start();

// ============================================================================== Register
if(isset($_POST['register'])){
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    $confrim=$_POST['konfrim'];
    $role=$_POST['role'];

    if($password == $confrim){
        $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role');";
        $query .= "SET @last_id_in_users = LAST_INSERT_ID();";
        $query .= "INSERT INTO pelamar (id_users, nama_lengkap) VALUES (@last_id_in_users, '$nama');";

        if(mysqli_multi_query($conn, $query)){
            echo"
                <script>document.location='../login/login.php'</script>
            ";
        }
    }else{
        echo"
            <script>document.location='../login/register.php?error= Password Tidak Sama'</script>
        ";
    }
    

}

// ============================================================================== LOGIN
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $login=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password ='$password'");

    // membuat variabel cek untuk digunakan pengecekan
    $cek = mysqli_num_rows($login);

    if($email =="" || $password ==""){
        echo"<script>document.location='../login/login.php?error=Mohon Inputan Tidak Boleh Kosong'</script>";
    }else{
        // mengecek data user ada atau tidak di database
        if($cek > 0){
            // mengambil data role pada tb user
            $data = mysqli_fetch_assoc($login);

             // query tb admin, tb penyedia, tb pelamar berdasarkan id_users yang sedang login
            $pelamar=mysqli_query($conn, "SELECT * FROM pelamar WHERE id_users = ". $data['id_users']);
            $penyedia=mysqli_query($conn, "SELECT * FROM penyedia WHERE id_users = ". $data['id_users']);
            $admin=mysqli_query($conn, "SELECT * FROM admin WHERE id_users = ". $data['id_users']);

            // mengambil data untuk dijadikan SESSION
            $dataadmin = mysqli_fetch_assoc($admin);
            $datapelamar = mysqli_fetch_assoc($pelamar);
            $datapenyedia = mysqli_fetch_assoc($penyedia);
    
            // membuat multiuser(login dengan banyak user)
            if($data['role']=='admin'){
                $_SESSION['admin'] = $dataadmin['nama_lengkap'];
                echo "<script>document.location='../admin/dashboard.php?success=Berhasil Login'</script>";
            }else if($data['role']=='penyedia'){
                $_SESSION['penyedia'] = $datapenyedia['nama_perusahaan'];
                $_SESSION['id'] = $datapenyedia['id_penyedia'];
                echo "<script>document.location='../penyedia/dashboard.php?success=Berhasil Login'</script>";
            }else{
                $_SESSION['id_pelamar'] = $datapelamar['id_pelamar'];
                echo "<script>document.location='../pelamar/dashboard.php'</script>";
            }
        }else{
            echo"<script>document.location='../login/login.php?error=Email dan Password Tidak Cocok'</script>";
        }
    }

}
?>