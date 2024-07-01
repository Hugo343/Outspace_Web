<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['price'];

    $sql = "INSERT INTO collections (name, price) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $name, $description);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>

<<div class="form-container">
    <h2>Tambah Koleksi Produk</h2>
    <form action="add_collection.php" method="post">
        <label for="name">Nama Koleksi</label>
        <input type="text" id="name" name="name" required>
        <label for="price">Harga</label>
        <input type="number" id="price" name="price" required>
        <button type="submit">Tambah Koleksi</button>
    </form>
</div>

