<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $fullname   = $_POST['fullname'];
    $phone      = $_POST['phone'];
    $address    = $_POST['address'];

    // Lưu đơn hàng vào database
    $stmt = $pdo->prepare("INSERT INTO orders (product_id, fullname, phone, address, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$product_id, $fullname, $phone, $address]);

    echo "<h2>Đặt hàng thành công!</h2>";
    echo "<a href='index.php'>Quay lại trang chủ</a>";
}
?>