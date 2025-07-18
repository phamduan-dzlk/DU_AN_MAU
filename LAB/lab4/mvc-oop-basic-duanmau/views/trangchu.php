<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- 1. Bootstrap CSS (ở trong <head>) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Nội dung trang ở đây -->

    <!-- 2. Bootstrap JS (trước </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <h1><?php echo $title; ?></h1>
  <h2><?php echo $thoiTiet; ?></h2>
  <div class="container">
    <div class="btn-group" role="group">
      <a href="<?= BASE_URL.'?action=login'?> "class="btn btn-outline-primary">đăng ký</a>
      <a href="<?= BASE_URL.'?action=register'?>" class="btn btn-outline-primary">đăng nhập</a>
    </div>
    <!-- danh muc -->
    <?php
    $category_url=$_GET['category'] ?? '0'; 
    ?>
    <div class="mb-4">
      <div class="btn-group" role="group">
        <a href="<?=BASE_URL.'?action=category'?>"  class="btn btn-outline-primary <?=$category_url==0 ? 'active':''?>">tất cả</a>
        <?php foreach($category as $v){?>
          <a href="<?=BASE_URL.'?action=category&category='.$v['category_id']?>"  class="btn btn-outline-primary <?=$category_url==$v['category_id'] ? 'active':''?>"><?= $v['categoryName']?></a>
        <?php }?>
      </div>
    </div>
    <table class="table">
          <tr>
          <th>dinh danh</th>
          <th>ten san pham</th>
          <th>anh</th>
          <th>gia</th>
          <th>thong tin</th>
          <th>hanh dong</th>
        </tr>
      <?php foreach($data ?? $data_in as $v){?>

        <tr>
          <td><?=$v['id']?></td>
          <td><?=$v['name']?></td>
          <td><img src="<?=BASE_ASSET_UPLOAD.$v['thumbnail']?>" alt=""></td>
          <td><?=$v['price']?></td>
          <td><?=$v['description']?></td>
          <td><?=$v['categoryName']?></td>
          <td>
            <a href="<?= BASE_URL.'?action=delete&id='.$V['id']?>" onclick="return(confirm('ban co muon xoa khong')">xoa</a>
            <a href="<?= BASE_URL.'?action=detail&id='.$V['id']?>">xem chi tiet</a>
            <a href="<?= BASE_URL.'?action=edit&id='.$V['id']?>">sua</a>
          </td>
        </tr>        
      <?php }?>

    </table>
  </div>
  
</body>
</html>