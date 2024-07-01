<?php
session_start();
include('koneksi.php');

// Cek jika user adalah admin berdasarkan kolom is_admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    die('Access denied.');
}

// Tanggal hari ini
$today = date('Y-m-d');

// Total pesanan hari ini
$queryTotalPesanan = "SELECT COUNT(*) as total_pesanan FROM orders WHERE DATE(order_date) = '$today'";
$resultTotalPesanan = mysqli_query($conn, $queryTotalPesanan);
$totalPesanan = mysqli_fetch_assoc($resultTotalPesanan)['total_pesanan'];

// Total pemasukan hari ini
$queryTotalPemasukan = "SELECT SUM(amount) as total_pemasukan FROM payments WHERE status = 'selesai' AND DATE(payment_date) = '$today'";
$resultTotalPemasukan = mysqli_query($conn, $queryTotalPemasukan);
$totalPemasukan = mysqli_fetch_assoc($resultTotalPemasukan)['total_pemasukan'];

// Total pelanggan hari ini
$queryTotalPelanggan = "SELECT COUNT(DISTINCT user_id) as total_pelanggan FROM orders WHERE DATE(order_date) = '$today'";
$resultTotalPelanggan = mysqli_query($conn, $queryTotalPelanggan);
$totalPelanggan = mysqli_fetch_assoc($resultTotalPelanggan)['total_pelanggan'];

// Ambil pembayaran dengan status pending
$queryPayments = "SELECT * FROM payments WHERE status = 'pending'";
$resultPayments = mysqli_query($conn, $queryPayments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            width: 100%;
        }
        .sidebar {
            float: left;
            width: 20%;
            background: #2d3e50;
            height: 100vh;
            padding: 20px;
            color: white;
        }
        .content {
            float: right;
            width: 80%;
            padding: 20px;
        }
        .card {
            background: #3498db;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .card h3 {
            margin: 0;
            flex: 1;
        }
        .card p {
            margin: 0;
            font-size: 1.5em;
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            display: inline-block;
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>OUTSPACE</h2>
        <ul>
            <li><a href="admin_dashboard.php">Beranda</a></li>
            <li><a href="admin_payments.php">Pesanan</a></li>
            <li><a href="#">Statistik</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Dashboard</h1>
        <p>Hi Admin, Welcome in Dashboard</p>
        <div class="card">
            <h3>Total Pesanan</h3>
            <p><?php echo $totalPesanan; ?></p>
        </div>
        <div class="card">
            <h3>Total Pemasukan</h3>
            <p>Rp <?php echo number_format($totalPemasukan, 2); ?></p>
        </div>
        <div class="card">
            <h3>Total Pelanggan</h3>
            <p><?php echo $totalPelanggan; ?></p>
        </div>
        <div class="table-container">
            <h2>Pending Payments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($resultPayments)): ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo 'Rp ' . number_format($row['amount'], 2); ?></td>
                            <td><?php echo $row['payment_method']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a class="btn" href="confirm_payment.php?payment_id=<?php echo $row['id']; ?>">Confirm</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // JavaScript for responsive elements can be added here
    </script>
</body>
</html>
