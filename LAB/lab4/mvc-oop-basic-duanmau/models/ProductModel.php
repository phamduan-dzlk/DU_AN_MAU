<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAll()
    {
        $sql="SELECT products.* ,category.name as categoryName
        FROM products
        LEFT JOIN category
        ON products.category_id = category.id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $products=$stmt->fetchAll();
        return $products;
    }
    public function category()
    {
        
        $sql="SELECT DISTINCT  category.name as categoryName, category.id as category_id
        FROM products 
        JOIN category
        ON products.category_id = category.id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $category=$stmt->fetchAll();
        return $category;
    }
    public function Qcate($category)
    {
        
        $sql="SELECT products.* ,category.name as categoryName
        FROM products
        LEFT JOIN category
        ON products.category_id = category.id
        WHERE products.category_id=:category";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([':category'=>$category]);
        $category=$stmt->fetchAll();
        return $category;
    }

    public function get($id)
    {
        $sql="SELECT products.* ,category.name as cattegoryName
        FROM products
        LEFT JOIN category
        ON products.category_id = category.id
        WHERE products.id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $products=$stmt->fetch();
        return $products;
    }
    public function delete($id)
    {
        $sql="DELETE FROM products where id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->rowCount();
    }
    public function add($data)
    {
        $sql="INSERT INTO `products`( `name`, `thumbnail`, `price`, `description`, `category_id`) VALUES (:name, :thumbnail, :price, :description, :category_id)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function update($data)
    {
        $sql="UPDATE `products` SET `name`=:name,`thumbnail`=:thumbnail,`price`=:price,`description`=:description,`category_id`=:category_id WHERE 1";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
}
