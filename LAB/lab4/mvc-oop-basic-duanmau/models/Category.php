<?php
class Category {
    public $conn;
    function __construct(){
        $this->conn = connectDB();
    }
    function getAll(){
        $sql="SELECT * FROM category";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $category=$stmt->fetchAll();
        return $category;
    }
}
?>