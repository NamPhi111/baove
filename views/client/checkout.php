
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Thanh toán</h1>

    <div class="row">
        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <div class="card">
                <img src="<?= BASE_ASSETS_UPLOADS . $products['thumbnail'] ?>" class="card-img-top" alt="Ảnh sản phẩm">
                <div class="card-body">
                    <h5 class="card-title"><?= $products['name'] ?></h5>
                    <p class="card-text text-danger fs-4"><?= number_format($products['price']) ?>₫</p>
                </div>
            </div>
        </div>

        <!-- Form thanh toán -->
        <div class="col-md-6">
            <form method="POST" action="process_checkout.php">
                <input type="hidden" name="product_id" value="<?= $products['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ giao hàng</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100">Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>