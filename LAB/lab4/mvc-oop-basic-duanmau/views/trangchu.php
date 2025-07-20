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
  <?php

  if(isset($_SESSION["msg"])){
    $color=$_SESSION["status"] ? "green" : "red";
    echo"<p style='color:$color'>{$_SESSION['msg']}</p>";
    unset($_SESSION["msg"]);
    unset($_SESSION["status"]);
  }
  ?>
  
  <div class="container">
      <!-- Nếu đã đăng nhập -->
    <?php if (isset($_SESSION['username'])): ?>
      <div class="mb-3">
        <p class="text-success">Chào mừng đã đến với trang web, <strong><?= $_SESSION['username'] ?>_san</strong>!</p>
        <a href="<?= BASE_URL . '?action=logout' ?>" class="btn btn-outline-danger">Đăng xuất</a>
      </div>
    <?php endif; ?>

    <a href="<?=BASE_URL.'?action=fix'?>" class="btn btn-outline-primary">chỉnh sửa</a>
    <div class="btn-group" role="group">
      <a href="<?= BASE_URL.'?action=login'?> "class="btn btn-outline-primary">đăng ký</a>
      <a href="<?= BASE_URL.'?action=register'?>" class="btn btn-outline-primary">đăng nhập</a>
    </div>
    <a href="<?=BASE_URL.'?action=create'?>">them san pham</a>
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
          <td><img src="<?=BASE_ASSET_UPLOAD.$v['thumbnail']?>" alt="" width="100px">
          </td>
          <td><?=$v['price']?></td>
          <td><?=$v['description']?></td>
          <td><?=$v['categoryName']?></td>
          <td>
            <a href="<?= BASE_URL.'?action=delete&id='.$v['id']?>" onclick="return(confirm('ban co muon xoa khong'))">xoa</a>
            <a href="<?= BASE_URL.'?action=detail&id='.$v['id']?>">xem chi tiet</a>
            <a href="<?= BASE_URL.'?action=edit&id='.$v['id']?>">sua</a>
          </td>
        </tr>        
      <?php }?>

    </table>
  </div>
</body>
</html>