<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    die('User not logged in');
}

$user_id = $_SESSION['user_id'];

// Ambil semua item dari keranjang pengguna yang sedang login
$query = "SELECT orders.*, collections.name, collections.price 
          FROM orders 
          JOIN collections ON orders.collection_id = collections.collection_id 
          WHERE orders.user_id = ? AND orders.status = 'pending'";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #023246;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            border: 1px solid #ddd;
            background-color: #d3d4ce;
        }
        .total-row {
            font-weight: bold;
        }
        .back-link {
            display: block;
            text-align: center;
            margin: 20px 0;
            font-size: 18px;
            color: #4CAF50;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .product-image {
            width: 100px;
            height: 100px;
            vertical-align: middle;
        }
        .product-details {
            display: flex;
            align-items: center;
        }
        .product-details img {
            margin-right: 10px;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        .payment-btns {
            text-align: center;
            margin-top: 20px;
        }
        .payment-btns a, .payment-btns button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }
        .whatsapp-btn {
            background-color: #25D366;
        }
        .whatsapp-btn:hover
        {
            background-color: #ddd;
            color: #4CAF50;
        }
        .buy-now-btn {
            background-color: #023246
        }
        .buy-now-btn:hover{
            background-color: #ddd;
            color: #023246;
        }
    </style>
    <script>
        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll('tr[data-id]').forEach(row => {
                const price = parseFloat(row.querySelector('.price').innerText.replace('Rp', '').replace(',', ''));
                const quantity = parseInt(row.querySelector('input[type="number"]').value);
                total += price * quantity;
            });
            document.querySelector('.total-price').innerText = 'Rp' + total.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('input[type="number"]').forEach(input => {
                input.addEventListener('change', function() {
                    const orderId = this.closest('tr').getAttribute('data-id');
                    const quantity = this.value;
                    fetch(`update_quantity.php?order_id=${orderId}&quantity=${quantity}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                updateTotalPrice();
                            } else {
                                alert('Failed to update quantity');
                            }
                        });
                });
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.closest('tr').getAttribute('data-id');
                    fetch(`delete_from_cart.php?id=${orderId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('tr').remove();
                                updateTotalPrice();
                            } else {
                                alert('Failed to delete item');
                            }
                        });
                });
            });

            updateTotalPrice();
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        <a href="AllCol.php" class="back-link">Continue Shopping</a>
        <table>
            <thead>
                <tr>
                    <th>Product Details</th>
                    <th>Price</th>
                    <th>Item</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <?php 
                    $total_price += $row['price'] * $row['quantity']; 
                    $img_path = 'img/' . htmlspecialchars($row['collection_id']) . '.png';
                    ?>
                    <tr data-id="<?php echo htmlspecialchars($row['order_id']); ?>">
                        <td class="product-details">
                            <img src="<?php echo $img_path; ?>" alt="Product Image" class="product-image">
                            <?php echo htmlspecialchars($row['name']); ?>
                        </td>
                        <td class="price">Rp<?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                        <td><input type="number" value="<?php echo htmlspecialchars($row['quantity']); ?>" min="1"></td>
                        <td><button class="delete-btn">Delete</button></td>
                    </tr>
                <?php endwhile; 
                  $_SESSION['total-price'] = $total_price;
                ?>
              
                <tr class="total-row">
                    <td colspan="3">Total</td>
                    <td class="total-price">Rp<?php echo number_format($total_price, 2, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="payment-btns">
            <a href="https://wa.me/yourwhatsappnumber" class="whatsapp-btn">Pay with WhatsApp</a>
            <a href="payment.php" class="buy-now-btn">Buy Now</a>
        </div>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
