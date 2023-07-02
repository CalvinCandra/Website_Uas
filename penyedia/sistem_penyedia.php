<?php
    include("../koneksi/koneksi.php");

    // ========================================================= ADD LOWONGAN ===============================================================
    if(isset($_POST['addiklan'])){
        $id_penyedia=$_POST['idp'];
        $jabatan=$_POST['jabatan'];
        $syarat=$_POST['syarat'];
        $salary=$_POST['salary'];

        $tambah = mysqli_query($conn, "INSERT INTO iklan (id_penyedia, jabatan, syarat, salary) 
                                VALUE ('$id_penyedia', '$jabatan', '$syarat', '$salary')");

        if($tambah){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Lowongan Berhasil Ditambah'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Lowongan Tidak Berhasil Ditambah'</script>";
        }
    }

    // ========================================================= UPDATE LOWONGAN ===============================================================
    if(isset($_POST['updatelowongan'])){
        $id_penyedia=$_POST['idp'];
        $id_iklan=$_POST['idi'];
        $jabatan=$_POST['jabatan'];
        $syarat=$_POST['syarat'];
        $alamat=$_POST['alamat'];
        $salary=$_POST['salary'];

        $update_iklan = mysqli_query($conn, "UPDATE iklan SET jabatan='$jabatan', syarat='$syarat', salary='$salary' WHERE id_iklan='$id_iklan'");
        $update_penyedia = mysqli_query($conn, "UPDATE penyedia SET alamat='$alamat' WHERE id_penyedia='$id_penyedia'");

        if($update_iklan && $update_penyedia){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Lowongan Berhasil Di Update'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Lowongan Tidak Berhasil Di Update'</script>";
        }
    }

    // ========================================================= DELETE LOWONGAN ===============================================================
    if(isset($_POST['deletelowowngan'])){
        $id_iklan=$_POST['ida'];
        
        $tambah = mysqli_query($conn, "DELETE FROM iklan WHERE id_iklan = '$id_iklan'");

        if($tambah){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Lowongan Berhasil Di Hilangkan'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Lowongan Tidak Berhasil Di Hilangkan'</script>";
        }
    }




    // ========================================================= Fungsi Pelamar ===============================================================
    if(isset($_POST['submit'])){
        $id_pengajuan=$_POST['idj'];

        $hapus= mysqli_query($conn, "DELETE FROM pengajuan WHERE id_pengajuan = $id_pengajuan");

        if($tambah){
            echo "<script>document.location='../penyedia/daftar_iklan.php?success=Pelamar Sudah Bukan Calon Lagi'</script>";
        }else{
            echo "<script>document.location='../penyedia/daftar_iklan.php?error=Gagal'</script>";
        }
    }
?>