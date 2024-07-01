<?php
session_start();
include('koneksi.php');

// Mengambil total harga dari sesi
$total_price = isset($_SESSION['total-price']) ? $_SESSION['total-price'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        <?php include 'stylepayment.css'; ?>
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 bg-image d-flex align-items-center">
                <h2 class="text-white p-3">Complete your purchase by providing your payment details</h2>
            </div>
            <div class="col-md-6 payment-details">
                <h3>Payment Details</h3>
                <p>Shopping cart > Payment</p>
                <div class="social-icons">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-shopify"></i>
                    <i class="bi bi-wallet"></i>
                </div>
                <form action="process_payment.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="coupon">Code voucher</label>
                        <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter your code">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="applyCoupon()">Apply</button>
                    <div class="summary mt-3">
                        <p>Subtotal: Rp <span id="subtotal"><?php echo number_format($total_price, 0, ',', '.'); ?></span></p>
                        <p>Diskon 20%: Rp <span id="discount">0</span></p>
                        <p>Total: Rp <span id="total"><?php echo number_format($total_price, 0, ',', '.'); ?></span></p>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" name="payment_method">Pay Rp <span id="totalBtn"><?php echo number_format($total_price, 0, ',', '.'); ?></span></button>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I agree to the terms & conditions</label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function applyCoupon() {
            const subtotal = <?php echo $total_price; ?>;
            const couponCode = document.getElementById('coupon').value;
            const discount = couponCode === 'DISKON20' ? subtotal * 0.2 : 0;
            const total = subtotal - discount;

            document.getElementById('discount').innerText = discount.toLocaleString('id-ID');
            document.getElementById('total').innerText = total.toLocaleString('id-ID');
            document.getElementById('totalBtn').innerText = total.toLocaleString('id-ID');
        }
    </script>
</body>
</html>
