<h1>chỉnh sửa danh mục</h1>
  <?php
  if(isset($_SESSION["msg"])){
    $color=$_SESSION["status"] ? "green" : "red";
    echo"<p style='color:$color'>{$_SESSION['msg']}</p>";
    unset($_SESSION["msg"]);
    unset($_SESSION["status"]);
  }
  ?>
<a href="<?=BASE_URL.'?action=create_category'?>">them danh  muc</a>
<table class="table">
      <?php foreach($data as $v){?>
        <tr>
          <td><?=$v['name']?></td>
          <td>
            <a href="<?= BASE_URL.'?action=delete_category&id='.$v['id']?>" onclick="return(confirm('ban co muon xoa khong'))">xoa</a>
            <a href="<?= BASE_URL.'?action=edit_categoty&id='.$v['id']?>">sua</a>
          </td>
        </tr>        
      <?php }?>
    </table>
<a href="<?=BASE_URL?>"><button>submit</button></a>