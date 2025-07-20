    <table class="table">
      <tr>
        <th>dinh danh</th>
        <th>ten san pham</th>
        <th>anh</th>
        <th>gia</th>
        <th>thong tin</th>
      </tr>
        <tr>
          <td><?=$data['id']?></td>
          <td><?=$data['name']?></td>
          <td><img src="<?=BASE_ASSET_UPLOAD.$data['thumbnail']?>" alt="" width="100px">
          </td>
          <td><?=$data['price']?></td>
          <td><?=$data['description']?></td>
          <td><?=$data['categoryName']?></td>
        </tr>        
    </table>