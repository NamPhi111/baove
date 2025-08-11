<style>
    /* Căn giữa màn hình
    body {
        margin: 0;
        padding: 0;
        height: 100vh; /* Chiều cao toàn màn hình */
        display: flex;
        justify-content: center; /* Căn ngang */
        align-items: center;     /* Căn dọc */
        background-color: #f5f5f5; /* Màu nền nhẹ nhàng */
        font-family: Arial, sans-serif;
    } */

    .form-container {
        background: white;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 450px;
    }

    .form-container label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    .form-container input,
    .form-container textarea,
    .form-container select,
    .form-container button {
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
        padding: 8px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-container img {
        margin-top: 5px;
        margin-bottom: 10px;
        display: block;
    }

    .form-container button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .form-container button:hover {
        background-color: #45a049;
    }
</style>

<div class="form-container">
    
    <form action="<?= BASE_URL_ADDMIN . '&action=update' ?>" method="post" enctype="multipart/form-data">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" value="<?= $product['name'] ?>">

        <label for="">Ảnh hiện tại</label>
        <img src="<?= $product['thumbnail'] ?>" alt="Thumbnail" width="100">

        <label for="">Đổi ảnh</label>
        <input type="file" name="thumbnail">

        <label for="">Giá</label>
        <input type="number" name="price" value="<?= $product['price'] ?>">

        <label for="">Mô tả</label>
        <textarea name="description"><?= $product['description'] ?></textarea>

        <label for="">Danh mục</label>
        <select name="category_id">
            <option value="<?= $product['category_id'] ?>" selected><?= $product['categoryName'] ?></option>
            <!-- Các option khác có thể load từ DB -->
        </select>

        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <button type="submit">Lưu</button>
    </form>
</div>
