    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Nội dung trang ở đây -->

    <!-- 2. Bootstrap JS (trước </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<h1 class="text-center my-4">Chi tiết sản phẩm</h1>

<div class="container shadow p-4 rounded">
    <div class="row align-items-center">
        <!-- Ảnh sản phẩm -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="<?= BASE_ASSET_UPLOAD.$data['thumbnail']?>" alt="Ảnh sản phẩm" class="img-fluid rounded">
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
        <button class="btn btn-primary btn-lg">Mua</button>
    </div>
</div>


<style>
    .main{
        box-shadow: 0px 0px 15px gray;
        padding:20px;
        border-radius: 10px;
    }
    .detail{
        width: 80%;

    }
    p{
        font-size: 30px;
    }
    
    .detail{
        display: flex;
        justify-content: space-between;
    }

</style>