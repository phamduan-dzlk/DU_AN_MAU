<h1>thêm sản phẩm</h1>
<form action="<?= BASE_URL.'?action=add'?>" method="post" enctype="multipart/form-data">
    <p>
        <label for="">name</label>
        <input type="text" name="name" id="">
    </p>
    <p>
        <label for="">description</label>
        <input type="text" name="description" id="">
    </p>
    <p>
        <label for="">price</label>
        <input type="text" name="price" id="">
    </p>
    <p>
        <label for="">category</label>
        <select name="category_id" id="">
            <?php foreach($data as $v){?>
                <option value="<?=$v['id']?>"><?=$v['name']?></option>
            <?php }?>
        </select>
    </p>
    <p>
        <label for="">thumbnail</label>
        <input type="file" name="thumbnail" id="">
    </p>
    <button class="btn btn-primary" type="submit">submit</button>
</form>