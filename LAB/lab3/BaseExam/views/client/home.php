<?php
    $category=$_GET['category'] ?? '0';
?>
<h1 class="mb-4">Danh mục</h1>
<div class="mb-4">
    <div class="btn-group" role="group">
        <a href="<?=BASE_URL.'?action=category'?>"  class="btn btn-outline-primary <?=$category==0 ? 'active':''?>">tất cả</a>
        <a href="<?=BASE_URL.'?action=category&category=1'?>" class="btn btn-outline-primary <?=$category==1 ? 'active':''?>">Áo</a>
        <a href="<?=BASE_URL.'?action=category&category=2'?>" class="btn btn-outline-primary <?=$category==2 ? 'active':''?>">Quần</a>
        <a href="<?=BASE_URL.'?action=category&category=3'?>" class="btn btn-outline-primary <?=$category==3 ? 'active':''?>">Giày</a>
        <a href="<?=BASE_URL.'?action=category&category=4'?>" class="btn btn-outline-primary <?=$category==4 ? 'active':''?>">Mũ</a>
    </div>
</div>
<form class="d-flex my-3" action="" method="get">
  <input type="hidden" name="action" value="search">
  <input class="form-control me-2" type="search" placeholder="Nhập từ khóa..." name="search">
  <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
</form>
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
                    <button class="btn btn-primary">Mua</button>
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
