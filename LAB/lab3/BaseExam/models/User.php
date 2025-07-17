<?php
class User extends BaseModel{
    function check($username,$password){
        //check người dùng có tồn tại thì lư vào một biến
        $sql="SELECT * FROM user WHERE username=:username AND password=:password";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([':username'=>$username,
                        ':password'=>$password]);
        $products=$stmt->fetch();
        return $products;
        //chính là biến này
    }
    function add($data){
        $sql="INSERT INTO `user`(`username`, `password`) VALUES (:username, :password)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}
?>