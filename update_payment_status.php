<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_id = $_POST['payment_id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE payments SET status = ? WHERE payment_id = ?");
    $stmt->bind_param("si", $status, $payment_id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=payments");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
