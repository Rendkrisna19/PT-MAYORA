<?php
// Menghubungkan ke database MySQL
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "mayora_db"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO contacts (first_name, last_name, email, subject, message)
            VALUES ('$first_name', '$last_name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, tampilkan pesan terimakasih
        echo "<script>alert('Terimakasih, pesan Anda telah terkirim.'); window.location.href='index.html';</script>";
    } else {
        // Jika terjadi kesalahan
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>