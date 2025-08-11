<h1 class="text-center my-4">Chi tiết sản phẩm</h1>

<div class="container shadow p-4 rounded">
    <div class="row align-items-center">
        <!-- Ảnh sản phẩm -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="<?= BASE_ASSETS_UPLOADS . $data['thumbnail'] ?>" alt="Ảnh sản phẩm" class="img-fluid rounded">
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h2 class="card-title"><?=$data['name']?></h2>
            <p class="card-text fs-5">Danh mục: <?=$data['categoryName']?></p>
            <p class="card-text text-danger fw-bold fs-3"><?= number_format($data['price']) ?>₫</p>
        </div>
    </div>

    <!-- Nút mua -->
    <div class="text-center mt-5">
            <a href="<?=BASE_URL .'?action=checkout&id='. $data['id'] ?>" class="btn btn-primary btn-lg">Mua</a>
    </div>

    <!-- Phần bình luận -->
    <div class="comments-section mt-5">
        <h3 class="mb-4">Bình luận</h3>

        <!-- Form bình luận -->
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Tên của bạn</label>
                <input type="text" name="username" class="form-control" placeholder="Nhập tên..." required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" rows="3" placeholder="Nhập bình luận..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Gửi bình luận</button>
        </form>

        <!-- Danh sách bình luận -->
        <div class="mt-4">
            <div class="comment-item p-3 border rounded mb-3">
                <strong>Híp:</strong>
                <p>Sản phẩm rất đẹp 👍</p>
            </div>
            <div class="comment-item p-3 border rounded mb-3">
                <strong>Nam:</strong>
                <p>Giá hợp lý, giao hàng nhanh.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .comments-section {
        border-top: 2px solid #ddd;
        padding-top: 20px;
    }
    .comment-item {
        background: #f9f9f9;
    }
</style>
