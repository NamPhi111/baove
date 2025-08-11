<div class="content_header">
  <!-- <?php if (isset($message)) echo $message; ?>
    <div class="btn_into">
        <a href="<?=BASE_URL.'?mode=addmin&action=create'?>"><button class="btn btn-primary">thêm sản phẩm</button></a><br><br>
        <a href="<?=BASE_URL.'?mode=addmin&action=user'?>"><button class="btn btn-primary">quản lý người dùng</button></a><br><br>
    </div>
</div><hr>
<form action="" class="d-flex my-3" method="get" >
    <input type="hidden" name="mode" value="addmin" id="">
    <input type="hidden"  name="action" value="search_courses" id="">
    <input type="text" class="form-control me-2" name="search" id="" placeholder="nhập để tìm kiếm...">
    <button type="submit" class="btn btn-outline-primary">tim kiem</button>
</form> -->

<table class="table">
    <tr>
        <th>Định danh</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên hãng</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>
        <tr>
            <td><?=$v['id']?></td>
            <td><?=$v['name']?></td>
            <td><img src="<?=BASE_ASSETS_UPLOADS.$product['thumbnail']?>" alt="" width="100"></td>
            <td><?=$v['categoryName']?></td>
            <td><?=$v['description']?></td>
            <td><?=$v['price']?></td>
        </tr>
</table>