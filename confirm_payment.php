<?php
session_start();
include('koneksi.php');

// Cek jika user adalah admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];
    
    $sql = "UPDATE payments SET status = 'selesai' WHERE payment_id = '$payment_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php?page=payments");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

