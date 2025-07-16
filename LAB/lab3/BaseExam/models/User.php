<?php
class User extends BaseModel{
    function check($username,$password){
        $sql="SELECT * FROM user WHERE username=:username AND password=:password";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([':username'=>$username,
                        ':password'=>$password]);
        $products=$stmt->fetch();
        return $products;
    }
    function add($data){
        $sql="INSERT INTO `user`(`username`, `password`,) VALUES (:username, :password)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}
?>