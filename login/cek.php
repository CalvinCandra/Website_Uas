<?php

require("../koneksi/koneksi.php");
session_start();

// ============================================================================== Register
// jika variabel register sudah didefinisikan / jika tombol register ditekan
if(isset($_POST['register'])){
    // simpan di dalam variabel inputan user
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    $confrim=$_POST['konfrim'];
    $role=$_POST['role'];

    // pengecekan jika pass==confrim
    if($password == $confrim){

        // melakukan perintah ke mySQLI
        $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role');";
        $query .= "SET @last_id_in_users = LAST_INSERT_ID();";
        $query .= "INSERT INTO pelamar (id_users, nama_lengkap) VALUES (@last_id_in_users, '$nama');";

        // melakukan eksekusi beberapa query dengan fungsi mysqli_multi_query()
        if(mysqli_multi_query($conn, $query)){
            echo"
                <script>document.location='../login/login.php'</script>
            ";
        }
    // jika tidak sama
    }else{
        echo"
            <script>document.location='../login/register.php?error= Password Tidak Sama'</script>
        ";
    }
    

}

// ============================================================================== LOGIN
// jika variabel login sudah didefinisikan / jika tombol login ditekan
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $login=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password ='$password'");

    // membuat variabel cek untuk menaruh hasil dari menghitung jumlah bari dari hasil query dengan fungsi mysqli_num_rows()
    $cek = mysqli_num_rows($login);


    if($email =="" || $password ==""){
        echo"<script>document.location='../login/login.php?error=Mohon Inputan Tidak Boleh Kosong'</script>";
    }else{
        // mengecek data user ada atau tidak di database
        if($cek > 0){
            // mengambil data sebagai array asosiatif dengan fungsi mysqli_fetch_assoc();
            $data = mysqli_fetch_assoc($login);

             // query tb admin, tb penyedia, tb pelamar berdasarkan id_users yang sedang login
            $pelamar=mysqli_query($conn, "SELECT * FROM pelamar WHERE id_users = ". $data['id_users']);
            $penyedia=mysqli_query($conn, "SELECT * FROM penyedia WHERE id_users = ". $data['id_users']);
            $admin=mysqli_query($conn, "SELECT * FROM admin WHERE id_users = ". $data['id_users']);

            // mengambil data sebagai array asosiatif dengan fungsi mysqli_fetch_assoc();
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