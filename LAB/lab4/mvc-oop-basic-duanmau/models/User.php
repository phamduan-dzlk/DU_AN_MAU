<?php
class User{
    public $conn;
    function __construct(){
        $this->conn = connectDB();
    }
    function check($username,$password){
        //check người dùng có tồn tại thì lư vào một biến
        $sql="SELECT * FROM user WHERE username=:username AND password=:password";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([':username'=>$username,
                        ':password'=>$password]);
        $products=$stmt->fetch();
        return $products;
        //chính là biến này
    }
    function add($data){
        $sql="INSERT INTO `user`(`username`, `password`) VALUES (:username, :password)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($data);
    }
    function get($id){
        $sql = "SELECT * FROM user WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $user = $stmt->fetch();
        return $user;
    }
}
?>