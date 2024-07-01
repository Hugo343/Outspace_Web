<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    die('User not logged in');
}

if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM orders WHERE order_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $order_id, $user_id);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false]);
}
