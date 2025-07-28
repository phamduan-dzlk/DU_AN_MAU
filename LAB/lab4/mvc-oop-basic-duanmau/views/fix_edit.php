<h1>chỉnh sửa danh mục</h1>
<form action="<?=BASE_URL.'?action=update_category'?>" method="post">
    <label for="">ten danh muc</label>
    <input type="text" name="name" id="" value="<?=$data['name']?>">
    <input type="hidden" name="id" id="" value="<?=$data['id']?>">
    <button type="submit">submit</button>
</form>