<?php
include("../koneksi/koneksi.php");


// ====================================== DASHBOARD ADMIN
// ======================================================================= ADMIN | CREATE =========================================

// jika variabel addadmin sudah didefinisikan / jika tombol addadmin ditekan
if(isset($_POST['addadmin'])){
  // simpan inputan user ke dalam variable seperti berikut
    $user = $_POST['nama'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    // query 
    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$pass', '$role');";
    $query .= "SET @last_id_in_users = LAST_INSERT_ID();";
    $query .= "INSERT INTO admin (id_users, nama_lengkap) VALUES (@last_id_in_users, '$user');";
  
    // melakukan eksekusi beberapa query dengan fungsi mysqli_multi_query()
    if(mysqli_multi_query($conn, $query)){
        echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Berhasil Di Tambah'</script>";
    }else{
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Tidak Berhasil Di Tambah'</script>";
    }
  
}
  
// ========================================================== ADMIN || UPDATE ======================================================
// jika variabel updateadmin sudah didefinisikan / jika tombol updateadmin ditekan
if(isset($_POST['updateadmin'])){
  // simpan inputan user ke dalam variable seperti berikut
    $id_user = $_POST['id_users'];
    $id_admin = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // query 
    $update_admin =mysqli_query($conn, "UPDATE admin SET nama_lengkap='$nama' where id_admin ='$id_admin'");
    $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
  
    // jika query di atas berhasil
    if($update_admin && $update_users){
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Berhasil Di Update'</script>";
    }else{
      echo "<script>document.location='../admin/akun_admin.php?error= Akun Admin Tidak Berhasil Di Update'</script>";
    }  
}
  
  //============================================================ ADMIN | DELETE ==================================================== 
 // jika variabel deleteadmin sudah didefinisikan / jika tombol deleteadmin ditekan
if(isset($_POST['deleteadmin'])){
    // simpan inputan user ke dalam variable seperti berikut
    $id_admin = $_POST['id_admin'];
    $id_users = $_POST['id_users'];
  
     // query
    $hapus_admin=mysqli_query($conn, "DELETE FROM admin WHERE id_admin='$id_admin'");
    $hapus_users=mysqli_query($conn, "DELETE FROM users WHERE id_users='$id_users'");

    // jika query di atas berhasil
    if($hapus_admin && $hapus_users){
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Berhasil Di Delete'</script>";
    }else{
      echo "<script>document.location='../admin/akun_admin.php?success= Akun Admin Tidak Berhasil Di Delete'</script>";
    }
    
}

// ================================================================ ADMIN || PERUSAHAAN | CREATE ==============================================
if(isset($_POST['addpenyedia'])){

    // simpan inputan user ke dalam variable seperti berikut
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];

    // mengambil data data file berupa nama file, tempat penyimpanan sementara dan size
    $fotoName = $_FILES['logo']['name'];
    $fotoTmp = $_FILES['logo']['tmp_name'];
    $fotoSize = $_FILES['logo']['size'];

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
      return false;
    }
        
  
    // membuat nama baru
    $Nama="LOGO";
    // megabungkan nama penanda (yang LOGO) dengan nama asli dari file foto
    $fotoNameBaru = $Nama. '_' .$fotoName;
     
    // memindahkan file ke tempat lokasi yang telah kita sediakan
    move_uploaded_file($fotoTmp, '../storage/logo/' .$fotoNameBaru);
        
    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role');";
    $query .= "SET @last_id_in_users = LAST_INSERT_ID();";
    $query .= "INSERT INTO penyedia (id_users, nama_perusahaan, logo, kota, alamat) VALUES (@last_id_in_users, '$nama', '$fotoNameBaru', '$kota', '$alamat');";
  
     // melakukan eksekusi beberapa query dengan fungsi mysqli_multi_query()
    if(mysqli_multi_query($conn, $query)){
        echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Ditambah'</script>";
    }else{
      echo "<script>document.location='../admin/akun_penyedia.php?error=Akun Perusahaan Tidak Berhasil Ditambah'</script>";
    }

}
// ============================================================= ADMIN || PERUSAHAAN | EDIT =====================================================
// jika tombol dengan name updatepenyedia di tekan
if(isset($_POST['updatepenyedia'])){
    // simpan inputan user ke dalam variable seperti berikut
    $id_user = $_POST['id_users'];
    $id_penyedia = $_POST['id_penyedia'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];

    // mengambil data data file
    $fotoName = $_FILES['logo']['name'];
    $fotoTmp = $_FILES['logo']['tmp_name'];
    $fotoSize = $_FILES['logo']['size'];

    // pengecekan kalau gambar di upload ulang atau tidak
    if($fotoName != ""){
      // Ngecek Ukuran File
      if($fotoSize > 5000000){
        echo "<script>alert('Size Logo Terlalu Besar, Silakan Upload Logo Dibawah 5 MB');</script>";
        return false;
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
      
      move_uploaded_file($fotoTmp, '..storage/logo/' .$fotoNameBaru);

      $update_penyedia =mysqli_query($conn, "UPDATE penyedia SET nama_perusahaan='$nama', logo='$fotoNameBaru', kota='$kota', alamat='$alamat' WHERE id_penyedia ='$id_penyedia'");
      $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
      
      // jika query di atas berhasil
      if($update_penyedia && $update_users){
        echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Di Update'</script>";
      }else{
        echo "<script>document.location='../admin/akun_penyedia.php?error=Akun Perusahaan Berhasil Di Update'</script>";
      }  

    // jika Gambar tidak di upload ulang
    }else{

      $update_penyedia =mysqli_query($conn, "UPDATE penyedia SET nama_perusahaan='$nama', alamat='$alamat' WHERE id_penyedia ='$id_penyedia'");
      $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
    
      // jika query di atas berhasil
      if($update_penyedia && $update_users){
        echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Di Update'</script>";
      }else{
        echo "<script>document.location='../admin/akun_penyedia.php?error=Akun Perusahaan Berhasil Di Update'</script>";
      }  
    } 

  
}
  
//===================================================== ADMIN || PERUSAHAAN | HAPUS =========================================================== 
if(isset($_POST['deletepenyedia'])){
    // simpan inputan user ke dalam variable seperti berikut
    $id_penyedia = $_POST['id_penyedia'];
    $id_users = $_POST['id_users'];

    $hapus_penyedia=mysqli_query($conn, "DELETE FROM penyedia WHERE id_penyedia='$id_penyedia'");
    $hapus_users=mysqli_query($conn, "DELETE FROM users WHERE id_users='$id_users'");
  
    // jika query di atas berhasil
    if($hapus_penyedia && $hapus_users){
      echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Berhasil Di Delete'</script>";
    }else{
      echo "<script>document.location='../admin/akun_penyedia.php?success=Akun Perusahaan Tidak Berhasil Di Delete'</script>";
    }
    
}


// ================================================= ADMIN || PELAMAR | UPDATE ===========================================================
if(isset($_POST['updatepelamar'])){
    // simpan inputan user ke dalam variable seperti berikut
    $id_user = $_POST['id_users'];
    $id_pelamar = $_POST['id_pelamar'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $lulusan = $_POST['lulusan'];
    $no = $_POST['no_wa'];
    $tempat_tinggal = $_POST['tempat_tinggal'];
    $pengalaman = $_POST['pengalaman'];

    $update_pelamar =mysqli_query($conn, "UPDATE pelamar SET nama_lengkap='$nama', lulusan='$lulusan', no_wa='$no', tempat_tinggal='$tinggal', pengalaman='$pengalaman' WHERE id_pelamar ='$id_pelamar'");
    $update_users =mysqli_query($conn, "UPDATE users SET email='$email' where id_users ='$id_user'");
  
    // // jika query di atas berhasil
    if($update_pelamar && $update_users){
      echo "<script>document.location='../admin/akun_pelamar.php?success=Akun Pelamar Berhasil Di Update'</script>";
    }else{
      echo "<script>document.location='../admin/akun_pelamar.php?error=Akun pelamar Tidak Berhasil Di Update'</script>";
    }  
}
  
//================================================ ADMIN || PELAMAR | DELETE ============================================================ 
if(isset($_POST['deletepelamar'])){
    // simpan inputan user ke dalam variable seperti berikut
    $id_pelamar = $_POST['id_pelamar'];
    $id_users = $_POST['id_user'];
  
    $hapus_pelamar=mysqli_query($conn, "DELETE FROM pelamar WHERE id_pelamar='$id_pelamar'");
    $hapus_users=mysqli_query($conn, "DELETE FROM users WHERE id_users='$id_users'");
  
    // jika query di atas berhasil
    if($hapus_pelamar && $hapus_users){
      echo "<script>document.location='../admin/akun_pelamar.php?success=Akun Pelamar Berhasil Di Delete'</script>";
    }else{
      echo "<script>document.location='../admin/akun_pelamar.php?success=Akun Pelamar Tidak Berhasil Di Delete'</script>";
    }
    
}

//================================================ ADMIN || DATA LOWONGAN | DELETE ============================================================ 
if(isset($_POST['deletelowongan'])){
  // simpan inputan user ke dalam variable seperti berikut
  $id_iklan=$_POST['id_iklan'];
  
  $hapus_iklan = mysqli_query($conn, "DELETE FROM iklan WHERE id_iklan = '$id_iklan'");

  // jika query di atas berhasil
  if($hapus_iklan){
      echo "<script>document.location='../admin/data_iklan.php?success=Lowongan Berhasil Di Hilangkan'</script>";
  }else{
      echo "<script>document.location='../admin/data_iklan.php?error=Lowongan Tidak Berhasil Di Hilangkan'</script>";
  }
}









































?>