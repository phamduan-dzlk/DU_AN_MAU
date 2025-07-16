<?php
class Products extends BaseModel{
    function getAll(){
        $sql="SELECT products.* ,category.name as categoryName
        FROM products
        LEFT JOIN category
        ON products.category_id = category.id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $products=$stmt->fetchAll();
        return $products;
    }
    function category($category){
        $sql="SELECT products.* ,category.name as categoryName
        FROM products
        LEFT JOIN category
        ON products.category_id = category.id
        WHERE products.category_id=:category";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([':category'=>$category]);
        $products=$stmt->fetchAll();
        return $products;
    }
    function get($id){
        $sql="SELECT products.* ,category.name as categoryName
        FROM products
        LEFT JOIN category
        ON products.category_id = category.id
        WHERE products.id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $products=$stmt->fetch();
        return $products;
    }
    function delete($id){
        $sql="DELETE products
        WHERE id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->rowCount();
    }
    function add($data){
        $sql="INSERT INTO `products`( `name`, `thumbnail`, `price`, `description`, `category_id`) VALUES (:name, :thumbnail, :price, :description, :category_id)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    function update($data){
        $sql="UPDATE `products` SET `name`=':name',`thumbnail`=':thumbnail',`price`=':price',`description`='description',`category_id`=':category_id' WHERE id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
}
?>