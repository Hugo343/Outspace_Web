<?php
include('koneksi.php');

$query = "SELECT * FROM admin";
$result = $conn->query($query);
?>

<div class="table-container">
    <h2>Daftar Admin</h2>
    <table>
        <tr>
            <th>ID Admin</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['admin_id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo ($row['admin_id'] == $_SESSION['admin_id']) ? 'Aktif' : 'Tidak Aktif'; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
