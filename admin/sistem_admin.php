<?php
include("../koneksi/koneksi.php");


// ====================================== DASHBOARD ADMIN
// ======================================================================= ADMIN | CREATE =========================================
if(isset($_POST['addadmin'])){
 
    $user = $_POST['nama'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    $email = $_POST['email'];
  
    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$pass', '$role');";
    $query .= "SET @last_id_in_users = LAST_INSERT_ID();";
    $query .= "INSERT INTO admin (id_users, nama_lengkap) VALUES (@last_id_in_users, '$user');";
  
    if(mysqli_multi_query($conn, $query)){
        echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Berhasil Di Tambah'</script>";
    }else{
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Tidak Berhasil Di Tambah'</script>";
    }
  
}
  
// ========================================================== ADMIN || UPDATE ======================================================
if(isset($_POST['updateadmin'])){
    $id_user = $_POST['ids'];
    $id_admin = $_POST['ida'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
  
    $update_admin =mysqli_query($conn, "UPDATE admin SET nama_lengkap='$nama' where id_admin ='$id_admin'");
    $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
  
    if($update_admin && $update_users){
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Berhasil Di Update'</script>";
    }else{
      echo "<script>document.location='../admin/akun_admin.php?error= Akun Admin Tidak Berhasil Di Update'</script>";
    }  
}
  
  //============================================================ ADMIN | DELETE ==================================================== 
if(isset($_POST['deleteadmin'])){
    $ida = $_POST['ida'];
    $ids = $_POST['ids'];
  
    $hapus_admin=mysqli_query($conn, "DELETE FROM admin WHERE id_admin='$ida'");
    $hapus_users=mysqli_query($conn, "DELETE FROM users WHERE id_users='$ids'");
  
    if($hapus_admin && $hapus_users){
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Berhasil Di Delete'</script>";
    }else{
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Tidak Berhasil Di Delete'</script>";
    }
    
}

// ================================================================ ADMIN || PENYEDIA | CREATE ==============================================
if(isset($_POST['addpenyedia'])){
    $user = $_POST['nama'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    // mengambil data data file
    $fotoName = $_FILES['logo']['name'];
    $fotoTmp = $_FILES['logo']['tmp_name'];
    $fotoSize = $_FILES['logo']['size'];

    // pengecekan kalau gambar blm di upload atau tidak
    if($fotoName == ""){
      echo "<script>alert('Maaf Logo Belum Di Upload');</script>";
      // jika ada
    }

    //yang boleh di upload hanya gambar
    $ekstensi_boleh=['jpg','jpeg','png'];
    // memisahkan nama dengan ekstensi
    $ekstensi=explode('.', $fotoName);
    $ekstensi=strtolower(end($ekstensi));

    if(!in_array($ekstensi , $ekstensi_boleh)){
        echo "<script>alert('Maaf, Yang Anda Upload Bukan Gambar');</script>";
        return false;
    }

    // melakukan pengecekan ukuran dari logo
    if($fotoSize > 5000000){
      echo "<script>alert('Size Logo Terlalu Besar, Silakan Upload Logo Dibawah 5 MB');</script>";
    }
        
  
    // membuat nama baru
    $Nama="LOGO";
    // megabungkan nama penanda (yang LOGO) dengan nama asli dari file foto
    $fotoNameBaru = $Nama. '_' .$fotoName;
     
    move_uploaded_file($fotoTmp, '../logo/' .$fotoNameBaru);
        

    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$pass', '$role');";
    $query .= "SET @last_id_in_users = LAST_INSERT_ID();";
    $query .= "INSERT INTO penyedia (id_users, nama_perusahaan, logo, alamat) VALUES (@last_id_in_users, '$user', '$fotoNameBaru', '$alamat');";
  
    if(mysqli_multi_query($conn, $query)){
        echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Ditambah'</script>";
    }else{
      echo "<script>document.location='../admin/akun_penyedia.php?error=Akun Perusahaan Tidak Berhasil Ditambah'</script>";
    }

}
// ============================================================= ADMIN || PELAMAR | EDIT =====================================================
if(isset($_POST['updatepenyedia'])){
    $id_user = $_POST['ids'];
    $id_penyedia = $_POST['idp'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['kota'];

    // mengambil data data file
    $fotoName = $_FILES['logo']['name'];
    $fotoTmp = $_FILES['logo']['tmp_name'];
    $fotoSize = $_FILES['logo']['size'];

    // pengecekan kalau gambar blm di upload atau tidak
    if($fotoName != ""){
      // Ngecek Ukuran File
      if($fotoSize > 5000000){
        echo "<script>alert('Size Logo Terlalu Besar, Silakan Upload Logo Dibawah 5 MB');</script>";
      }

      //yang boleh di upload hanya gambar
      $ekstensi_boleh=['jpg','jpeg','png'];
      // memisahkan nama dengan ekstensi
      $ekstensi=explode('.', $fotoName);
      $ekstensi=strtolower(end($ekstensi));

      // ngecek ekstension
      if(!in_array($ekstensi , $ekstensi_boleh)){
          echo "<script>alert('Maaf, Yang Anda Upload Bukan Gambar');</script>";
          return false;
      }

      // membuat nama baru
      $Nama="LOGO";
      // megabungkan nama penanda (yang LOGO) dengan nama asli dari file foto
      $fotoNameBaru = $Nama. '_' .$fotoName;
      
      move_uploaded_file($fotoTmp, '../logo/' .$fotoNameBaru);

      // query
      $update_penyedia =mysqli_query($conn, "UPDATE penyedia SET nama_perusahaan='$nama', logo='$fotoNameBaru', alamat='$alamat' WHERE id_penyedia ='$id_penyedia'");
      $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
        
      if($update_penyedia && $update_users){
        echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Di Update'</script>";
      }else{
        echo "<script>document.location='../admin/akun_penyedia.php?error=Akun Perusahaan Berhasil Di Update'</script>";
      }  

    }else{

      $update_penyedia =mysqli_query($conn, "UPDATE penyedia SET nama_perusahaan='$nama', alamat='$alamat' WHERE id_penyedia ='$id_penyedia'");
      $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
    
      if($update_penyedia && $update_users){
        echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Di Update'</script>";
      }else{
        echo "<script>document.location='../admin/akun_penyedia.php?error=Akun Perusahaan Berhasil Di Update'</script>";
      }  
    } 

  
}
  
//===================================================== ADMIN || PENYEDIA | HAPUS =========================================================== 
if(isset($_POST['deletepenyedia'])){
    $idp = $_POST['idp'];
    $ids = $_POST['ids'];
  
    $hapus_penyedia=mysqli_query($conn, "DELETE FROM penyedia WHERE id_penyedia='$idp'");
    $hapus_users=mysqli_query($conn, "DELETE FROM users WHERE id_users='$ids'");
  
    if($hapus_penyedia && $hapus_users){
      echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Di Delete'</script>";
    }else{
      echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Tidak Berhasil Di Delete'</script>";
    }
    
}


// ================================================= ADMIN || PELAMAR | UPDATE ===========================================================
if(isset($_POST['updatepelamar'])){
    $id_user = $_POST['ids'];
    $id_pelamar = $_POST['idl'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pendidikan = $_POST['pendidikan'];
    $jurusan = $_POST['jurusan'];
    $no = $_POST['no_wa'];
    $tinggal = $_POST['tinggal'];
    $pengalaman = $_POST['pengalaman'];
  
    $update_pelamar =mysqli_query($conn, "UPDATE pelamar 
    SET nama_lengkap='$nama', riwayat_pendidik='$pendidikan', asal_jurusan='$jurusan', no_wa='$no', tempat_tinggal='$tinggal', pengalaman='$pengalaman' WHERE id_pelamar ='$id_pelamar'");
    
    $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
  
    if($update_pelamar && $update_users){
      echo "<script>document.location='../admin/akun_pelamar.php?success=Akun Pelamar Berhasil Di Update'</script>";
    }else{
      echo "<script>document.location='../admin/akun_pelamar.php?error=Akun pelamar Tidak Berhasil Di Update'</script>";
    }  
}
  
//================================================ ADMIN || PELAMAR | DELETE ============================================================ 
if(isset($_POST['deletepelamar'])){
    $idl = $_POST['idl'];
    $ids = $_POST['ids'];
  
    $hapus_pelamar=mysqli_query($conn, "DELETE FROM pelamar WHERE id_pelamar='$idl'");
    $hapus_users=mysqli_query($conn, "DELETE FROM users WHERE id_users='$ids'");
  
    if($hapus_pelamar && $hapus_users){
      echo "<script>document.location='../admin/akun_pelamar.php?success=Akun Pelamar Berhasil Di Delete'</script>";
    }else{
      echo "<script>document.location='../admin/akun_pelamar.php?success=Akun Pelamar Tidak Berhasil Di Delete'</script>";
    }
    
}

//================================================ ADMIN || DATA LOWONGAN | DELETE ============================================================ 
if(isset($_POST['deletelowongan'])){
  $id_iklan=$_POST['ida'];
  
  $hapus_iklan = mysqli_query($conn, "DELETE FROM iklan WHERE id_iklan = '$id_iklan'");

  if($hapus_iklan){
      echo "<script>document.location='../admin/data_iklan.php?success=Lowongan Berhasil Di Hilangkan'</script>";
  }else{
      echo "<script>document.location='../admin/data_iklan.php?error=Lowongan Tidak Berhasil Di Hilangkan'</script>";
  }
}









































?>