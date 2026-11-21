<?php 
// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$email= $_POST['email'];
$password = md5($_POST['password']); // Gunakan password_hash()
$alamat = $_POST['address']; 

$login = mysqli_query($koneksi, "SELECT * FROM users WHERE names='$username'");
$cek = mysqli_num_rows($login);

if($cek <= 0){
    // Lakukan INSERT
    $insert = mysqli_query($koneksi, "INSERT INTO users (id_pengguna,names, passwords, email, alamat, user_level) VALUES (null,'$username', '$password', '$email', '$alamat', '2')");
    
    // Periksa apakah INSERT berhasil
    if($insert){
        
        
        // Lakukan SELECT untuk mendapatkan data yang baru saja dimasukkan
        $new_user = mysqli_query($koneksi, "SELECT * FROM users WHERE names='$username'");
        $data = mysqli_fetch_assoc($new_user);
        if($data['user_level'] == "1"){
            header("location:admin/");
        }else if($data['user_level'] == "2"){
            header("location:../login/index.php");
        }else{
            header("location:index.php?alert=gagaluser");
        }
    } else {
        header("location:index.php?alert=gagalinsert");
    }
} else {
    header("location:index.php?alert=gagalcek");
}
?>
