<form action="<?= BASE_URL.'?action=update'?>" method="post" enctype="multipart/form-data">
    <p>
        <label for="">name</label>
        <input type="text" name="name" id="" value="<?=$data_in['name']?>">
    </p>
    <p>
        <label for="">description</label>
        <input type="text" name="description" id="" value="<?=$data_in['description']?>">
    </p>
    <p>
        <label for="">price</label>
        <input type="text" name="price" id="" value="<?=$data_in['price']?>">
    </p>
    <p>
        <label for="">category</label>
        <select name="category_id" id="">
            <?php foreach($data as $v){?>
                <option value="<?=$v['id']?>" <?=$v['id']==$data_in['category_id'] ?'selected':''?>><?=$v['name']?></option>
            <?php }?>
        </select>
    </p>
    <p>
        <label for="">thumbnail</label>
        <input type="file" name="thumbnail" id="">
    </p>
    <input type="hidden" name="id" id="" value="<?=$data_in['id']?>">
    <button class="btn btn-primary" type="submit">submit</button>
</form>