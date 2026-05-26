<?php
include 'config/koneksi.php';
// Mengaktifkan session php
session_start();

// Menghubungkan dengan koneksi

// Menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5($_POST['password']); // Jika password di database di-hash, gunakan password_verify

// Menyeleksi data user dengan username yang sesuai
$login = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // Verifikasi password (Asumsi menggunakan password_verify jika di-hash)
    // Jika Anda menggunakan MD5 atau plain text (tidak disarankan), ubah bagian ini
    if ($password == $data['password']) {

        // Buat session
        $_SESSION['id_user']     = $data['id_user'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['username']     = $data['username'];
        $_SESSION['level']        = $data['level'];
        $_SESSION['status']       = "login";

        // Cek level user dan alihkan ke halaman yang sesuai
        if ($data['level'] == "admin") {
            header("location:admin/index.php"); // Ganti dengan folder admin Anda
        } else if ($data['level'] == "petugas") {
            header("location:petugas/index.php"); // Ganti dengan folder petugas Anda
        }
    } else {
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
