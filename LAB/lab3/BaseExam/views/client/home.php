        <a href="<?=BASE_URL.'?action=regester'?>" class="btn btn-outline-primary">đăng nhập</a>
        <a href="<?=BASE_URL.'?action=login'?>" class="btn btn-outline-primary">đăng ký</a>
<h1 class="mb-4">Danh mục</h1>
<div class="mb-4">
    <div class="btn-group" role="group">
        <a href="<?=BASE_URL.'?action=category'?>" class="btn btn-outline-primary">tất cả</a>
        <a href="<?=BASE_URL.'?action=category&category=1'?>" class="btn btn-outline-primary">Áo</a>
        <a href="<?=BASE_URL.'?action=category&category=2'?>" class="btn btn-outline-primary">Quần</a>
        <a href="<?=BASE_URL.'?action=category&category=3'?>" class="btn btn-outline-primary">Giày</a>
        <a href="<?=BASE_URL.'?action=category&category=4'?>" class="btn btn-outline-primary">Mũ</a>
    </div>
</div>

<h2 class="mb-4">Danh sách sản phẩm</h2>
<div class="row">
    <?php foreach($dataAll ?? $data as $v): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="<?=BASE_URL.'?action=detail&id='.$v['id']?>">
                    <img src="<?=$v['thumbnail']?>" class="card-img-top" alt="Hình sản phẩm">
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