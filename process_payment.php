<?php
session_start();
include('koneksi.php');
require __DIR__ . '/vendor/autoload.php'; 

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$email = $_POST['email'];
$coupon = $_POST['coupon'];
$payment_method = $_POST['payment_method'];
$total_price = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0;

// Hitung diskon jika ada voucher
if ($coupon === "DISKON20") {
    $discount = $total_price * 0.20;
    $total_price -= $discount;
}

// Generate QR Code untuk DANA
$qrCode = new QrCode('https://dana.id/qrcode/62895613231486'); // URL untuk QR Code DANA Anda
$writer = new PngWriter();
$qrDirectory = 'qrcodes';
if (!is_dir($qrDirectory)) {
    mkdir($qrDirectory, 0755, true);
}
$qrPath = $qrDirectory . '/qr_' . time() . '.png';
$writer->write($qrCode)->saveToFile($qrPath);

// Simpan data pembayaran ke database
$status = 'pending';
$transaction_id = uniqid();
$payment_date = date('Y-m-d H:i:s');

// Ambil atau buat order_id yang relevan
$order_query = "SELECT order_id FROM orders WHERE user_id = ? AND status = 'pending'";
$stmt = $conn->prepare($order_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $order_data = $result->fetch_assoc();
    $order_id = $order_data['order_id'];
} else {
    // Buat pesanan baru jika belum ada
    $insert_order_query = "INSERT INTO orders (user_id, total_price, status, created_at) VALUES (?, ?, 'pending', NOW())";
    $stmt = $conn->prepare($insert_order_query);
    $stmt->bind_param("id", $user_id, $total_price);
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;
    } else {
        die("Order creation failed: " . $stmt->error);
    }
}

$sql = "INSERT INTO payments (order_id, user_id, amount, payment_method, status, transaction_id, payment_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param('iidssss', $order_id, $user_id, $total_price, $payment_method, $status, $transaction_id, $payment_date);
$stmt->execute();

if ($stmt->error) {
    die("Execute error: " . $stmt->error);
}

// Redirect ke halaman dengan QR code
header("Location: payment_confirmation.php?qr=" . urlencode($qrPath) . "&transaction_id=" . urlencode($transaction_id));
exit();

