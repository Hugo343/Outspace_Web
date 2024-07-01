<?php
session_start();
include('koneksi.php');

// Cek jika user adalah admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'payments';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <div class="sidebar">
        <h2>OUTSPACE</h2>
        <ul>
            <li><a href="admin_dashboard.php?page=payments">Kelola Pembayaran</a></li>
            <li><a href="admin_dashboard.php?page=collections">Tambah Koleksi</a></li>
            <li><a href="admin_dashboard.php?page=admins">Daftar Admin</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="content">
        <?php
        if ($page == 'payments') {
            include('admin_payments.php');
        } elseif ($page == 'collections') {
            include('admin_collections.php');
        } elseif ($page == 'admins') {
            include('admin_list.php');
        }
        ?>
    </div>
</body>
</html>
