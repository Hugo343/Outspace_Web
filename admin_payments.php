<?php
include('koneksi.php');

$query = "SELECT * FROM payments";
$result = $conn->query($query);
?>

<div class="table-container">
    <h2>Kelola Pembayaran</h2>
    <table>
        <tr>
            <th>ID Pembayaran</th>
            <th>ID Pesanan</th>
            <th>ID User</th>
            <th>Jumlah</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
            <th>Tanggal Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['payment_id']; ?></td>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['payment_method']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['payment_date']; ?></td>
            <td>
                <form action="update_payment_status.php" method="post">
                    <input type="hidden" name="payment_id" value="<?php echo $row['payment_id']; ?>">
                    <select name="status">
                        <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="completed" <?php if ($row['status'] == 'completed') echo 'selected'; ?>>Selesai</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
