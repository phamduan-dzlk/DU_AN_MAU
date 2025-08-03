<?php
class Comment {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function get_comment($product_id){
        $sql = "SELECT * FROM `comment` where product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':product_id'=>$product_id]);
        $comments = $stmt->fetchAll();
        return $comments;
    }
    public function add($data){
        $sql = "INSERT INTO `comment`(`product_id`, `commenter_id`, `comment_type`, `content`) VALUES (:product_id, :commenter_id, :comment_type, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}
?>