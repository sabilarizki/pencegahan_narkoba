<?php
$servername = "localhost";
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "absensi_karyawan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengatur zona waktu ke WIB
date_default_timezone_set('Asia/Jakarta');

// Fungsi untuk mengubah nama hari ke bahasa Indonesia
function hari_ini() {
    $hari = date('l');
    switch ($hari) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'Tidak diketahui';
    }
}

// Periksa metode permintaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $hari = hari_ini(); // Menggunakan fungsi untuk mendapatkan hari dalam bahasa Indonesia
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');

    $sql = "INSERT INTO karyawan (nama, jabatan, hari, tanggal, waktu)
            VALUES ('$nama', '$jabatan', '$hari', '$tanggal', '$waktu')";

    if ($conn->query($sql) === TRUE) {
        echo "Nama: $nama, Jabatan: $jabatan, Hari: $hari, Tanggal: $tanggal, Jam: $waktu";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
