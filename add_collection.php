<?php
session_start();
include('koneksi.php');

// Cek jika user adalah admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan input names diambil dengan benar
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Menggunakan prepared statements untuk menghindari SQL injection
    $stmt = $conn->prepare("INSERT INTO collections (name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=collections");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

