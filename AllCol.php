<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$sql = "SELECT * FROM collections";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            margin: 20px 0;
            font-size: 2.5rem;
            color: #333;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            width: 100%;
            max-width: 1200px;
        }
        .grid-item {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .grid-item img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .grid-item p {
            margin: 10px 0;
            color: #666;
        }
        .grid-item p.price {
            font-weight: bold;
            color: #333;
        }
        .grid-item:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

<h1>All Collections</h1>

<div class="grid-container">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="grid-item">
            <img src="img/<?php echo $row['collection_id']; ?>.png" alt="<?php echo $row['name']; ?>" onclick="addToCart(<?php echo $row['collection_id']; ?>)">
            <p><?php echo $row['name']; ?></p>
            <p class="price">Price: Rp<?php echo $row['price']; ?></p>
        </div>
    <?php endwhile; ?>
</div>

<script>
function addToCart(collectionId) {
    fetch('addtocart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'collection_id=' + collectionId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item added to cart');
        } else {
            alert('Failed to add item to cart: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>

</body>
</html>
<?php
$conn->close();
?>
