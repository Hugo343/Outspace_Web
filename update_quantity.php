<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    die('User not logged in');
}

if (isset($_GET['order_id']) && isset($_GET['quantity'])) {
    $order_id = intval($_GET['order_id']);
    $quantity = intval($_GET['quantity']);
    $user_id = $_SESSION['user_id'];

    $query = "UPDATE orders SET quantity = ? WHERE order_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iii', $quantity, $order_id, $user_id);
    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false]);
}
