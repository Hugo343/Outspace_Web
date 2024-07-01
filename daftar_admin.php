<div class="table-container">
    <h2>Daftar Admin</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultAdmins)): ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <?php echo ($_SESSION['admin_id'] == $row['admin_id']) ? '<span class="active">Aktif</span>' : '<span class="inactive">Tidak Aktif</span>'; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
