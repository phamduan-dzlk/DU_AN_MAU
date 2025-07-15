<?php
class Categoty extends BaseModel{
        function getAll(){
        $sql="SELECT * from category";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $products=$stmt->fetchAll();
        return $products;
    }
}
?>