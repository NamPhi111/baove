
<?php
    $category=$_GET['category'] ?? '0';
?>
<h2 class="mb-4">Danh sách sản phẩm</h2>
<div class="row">
    <?php foreach($dataAll ?? $data as $v): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="<?=BASE_URL.'?action=detail&id='.$v['id']?>">          

                    <img src="<?=BASE_ASSETS_UPLOADS .$v['thumbnail']?>" class="card-img-top text-center" alt="Hình sản phẩm">
                </a>
                <div class="card-body text-center">
                    <h5 class="card-title"><?=$v['name']?></h5>
                    <p class="card-text">Danh mục: <?=$v['categoryName']?></p>
                    <p class="card-text text-danger fw-bold"><?=number_format($v['price'])?>₫</p>
                </div>
                <div class="card-footer text-center">
                    <a href="<?=BASE_URL.'?action=detail&id='.$v['id']?>" class="btn btn-primary btn-lg">Xem chi tiết</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<style>
    .active{
        background-color: #0d6efd;
        color:white;
    }
</style>
