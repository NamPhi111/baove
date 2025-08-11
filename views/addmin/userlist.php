<!-- views/admin/userlist.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: center; }
        th { background: #f4f4f4; }
        a.btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; }
        .btn-edit { background: #4CAF50; color: white; }
        .btn-delete { background: #E74C3C; color: white; }
    </style>
</head>
<body>

    <h1>Quản lý người dùng</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>

        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['avatar_url'] ?></td>
                    <td><?= $user['date'] ?></td>
                    <td>
                        <a href="?action=editUser&id=<?= $user['id'] ?>" class="btn btn-edit">Sửa</a>
                        <a href="<?=BASE_URL_ADDMIN.'&action=deleteUser&id='. $user['id'] ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Chưa có người dùng nào.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>
