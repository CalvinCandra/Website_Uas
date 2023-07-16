<?php
    include("../koneksi/koneksi.php");

    // ========================================================= ADD LOWONGAN ===============================================================
    // jika variabel addiklan sudah didefinisikan / jika tombol addiklan ditekan
    if(isset($_POST['addiklan'])){
        // simpan inputan user ke dalam variable seperti berikut
        $id_penyedia=$_POST['id_penyedia'];
        $jabatan=$_POST['jabatan'];
        $syarat=$_POST['syarat'];
        $salary=$_POST['salary'];

         // query
        $tambah = mysqli_query($conn, "INSERT INTO iklan (id_penyedia, jabatan, syarat, salary) 
                                VALUE ('$id_penyedia', '$jabatan', '$syarat', '$salary')");

        // jika query di atas berhasil
        if($tambah){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Lowongan Berhasil Ditambah'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Lowongan Tidak Berhasil Ditambah'</script>";
        }
    }

    // ========================================================= UPDATE LOWONGAN ===============================================================
    // jika tombol dengan name updatelowongan di tekan
    if(isset($_POST['updatelowongan'])){
        // simpan inputan user ke dalam variable seperti berikut
        $id_penyedia=$_POST['id_penyedia'];
        $id_iklan=$_POST['id_iklan'];
        $jabatan=$_POST['jabatan'];
        $syarat=$_POST['syarat'];
        $alamat=$_POST['alamat'];
        $salary=$_POST['salary'];

         // query
        $update_iklan = mysqli_query($conn, "UPDATE iklan SET jabatan='$jabatan', syarat='$syarat', salary='$salary' WHERE id_iklan='$id_iklan'");
        $update_penyedia = mysqli_query($conn, "UPDATE penyedia SET alamat='$alamat' WHERE id_penyedia='$id_penyedia'");

        // jika query di atas berhasil
        if($update_iklan && $update_penyedia){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Lowongan Berhasil Di Update'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Lowongan Tidak Berhasil Di Update'</script>";
        }
    }

    // ========================================================= DELETE LOWONGAN ===============================================================
    if(isset($_POST['deletelowowngan'])){
        // simpan inputan user ke dalam variable seperti berikut
        $id_iklan=$_POST['id_iklan'];
        
         // query
        $tambah = mysqli_query($conn, "DELETE FROM iklan WHERE id_iklan = '$id_iklan'");

        // jika query di atas berhasil
        if($tambah){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Lowongan Berhasil Di Hilangkan'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Lowongan Tidak Berhasil Di Hilangkan'</script>";
        }
    }

    // ========================================================= Hilang Pelamar ===============================================================
    if(isset($_POST['hilang'])){
        // simpan inputan user ke dalam variable seperti berikut
        $id_pengajuan=$_POST['id_pengajuan'];

         // query
        $hilang= mysqli_query($conn, "DELETE FROM pengajuan WHERE id_pengajuan = $id_pengajuan");

        // jika query di atas berhasil
        if($hilang){
            echo "<script>document.location='../penyedia/daftar_pelamar.php?success=Pelamar Sudah Bukan Calon Lagi'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_pelamar.php?error=Gagal'</script>";
        }
    }
    
?>