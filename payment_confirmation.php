<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$qrPath = isset($_GET['qr']) ? urldecode($_GET['qr']) : '';
$transaction_id = isset($_GET['transaction_id']) ? urldecode($_GET['transaction_id']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #023246;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #f6f6f6;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            margin-bottom: 25px;
            color: #333;
        }
        img {
            width: 200px;
            height: 200px;
            margin-bottom: 25px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .info {
            font-size: 18px;
            margin-bottom: 25px;
            color: #666;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            background-color: #023246;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Confirmation</h1>
        <?php if ($qrPath): ?>
            <img src="<?php echo $qrPath; ?>" alt="QR Code">
        <?php endif; ?>
        <div class="info">
            <p>Transaction ID: <?php echo $transaction_id; ?></p>
            <p>Please scan the QR code to complete your payment.</p>
        </div>
        <a class="btn" href="index.php">Return to Home</a>
        <a class="btn" href="AllCol.php">Shop More</a>
    </div>

    <script>
        
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseenter', () => {
                button.style.backgroundColor = '#287194';
            });
            button.addEventListener('mouseleave', () => {
                button.style.backgroundColor = '#287194';

            });
        });
    </script>
</body>
</html>
