<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['collection_id'];

$sql = "INSERT INTO orders (user_id, collection_id, quantity, status, created_at) 
        VALUES (?, ?, 1, 'pending', NOW())";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Database error']);
    exit();
}

$stmt->bind_param('ii', $user_id, $product_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add product to cart']);
}

$stmt->close();
$conn->close();
