<?php
    include("../koneksi/koneksi.php");

    // ==================================================================== EDIT PROFILE PELAMAR
    // jika tombol dengan name update_profile di tekan
    if(isset($_POST['update_profile'])){
        // simpan inputan user ke dalam variable seperti berikut
        $email=$_POST['email'];
        $nama_lengkap=$_POST['nama_lengkap'];
        $lulusan=$_POST['lulusan'];
        $no_wa=$_POST['no_wa'];
        $tempat_tinggal=$_POST['tempat_tinggal'];
        $pengalaman=$_POST['pengalaman'];
        $id_pelamar = $_POST['id_pelamar'];
        $id_users = $_POST['id_users'];

         // query
        $update_pelamar = mysqli_query($conn, "UPDATE pelamar SET nama_lengkap='$nama_lengkap', lulusan='$lulusan', no_wa='$no_wa', tempat_tinggal = '$tempat_tinggal', pengalaman ='$pengalaman' WHERE id_pelamar = '$id_pelamar'");
        $update_users = mysqli_query($conn, "UPDATE users SET email='$email' WHERE id_users = '$id_users'");

        // jika query di atas berhasil
        if($update_pelamar && $update_users){
            echo "<script>alert('Sukses Update Profile');document.location='../pelamar/dashboard.php'</script>";
        }else{
            echo "<script>alert('Gagal Update Profile');document.location='../pelamar/dashboard.php'</script>";
        }  

    }

    // ==================================================================== EDIT PROFILE PELAMAR
    // jika tombol dengan name upload_cv di tekan
    if(isset($_POST['upload_cv'])){
        // simpan inputan user ke dalam variable seperti berikut
        $id_pelamar=$_POST['id_pelamar'];
        $id_penyedia=$_POST['id_penyedia'];
        $id_iklan=$_POST['id_iklan'];

        // mengambil data data file
        $fileName = $_FILES['cv']['name'];
        $fileTmp = $_FILES['cv']['tmp_name'];
        $fileSize = $_FILES['cv']['size'];

        //yang boleh di upload hanya pdf
        $ekstensi_boleh=['pdf'];
        // memisahkan nama dengan ekstensi
        $ekstensi=explode('.', $fileName);
        $ekstensi=strtolower(end($ekstensi));

        if(!in_array($ekstensi , $ekstensi_boleh)){
            echo "<script>alert('Maaf, File Harus Berupa PDF');document.location='../pelamar/dashboard.php'</script>";
            return false;
        }

        // melakukan pengecekan ukuran dari file
        if($fileSize > 5000000){
            echo "<script>alert('Size File Terlalu Besar, Silakan Upload File Dibawah 5 MB');document.location='../pelamar/dashboard.php'</script>";
            return false;
        }
            
        // membuat nama baru
        $Nama="CV";
        // megabungkan nama penanda (yang CV dan nama pelamar) dengan nama asli dari file
        $fileNameBaru = $Nama. '_' .$pelamar. '_' .$fileName;
        
        move_uploaded_file($fileTmp, '../storage/cv/' .$fileNameBaru);

        $tambah =mysqli_query($conn, "INSERT INTO pengajuan (id_iklan, id_pelamar, id_penyedia, cv) VALUES ('$id_iklan', '$id_pelamar', '$id_penyedia', '$fileNameBaru')");

        if($tambah){
            echo "<script>alert('Berhasil Upload Cv');document.location='../pelamar/dashboard.php'</script>";
        }else{
            echo "<script>alert('Gagal Upload Cv')document.location='../pelamar/dashboard.php'</script>";
        }  

    }


?>