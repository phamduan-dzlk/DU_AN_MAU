<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }
    public function Home()
    {
        $category=$this->modelProduct->category();
        if(isset($_GET['category'])){
            $data_in=$this->modelProduct->Qcate($_GET['category']);
            $title = "Trang chu";
            $thoiTiet = "Hôm nay trời có vẻ là mưa";
            require_once PATH_VIEW.'trangchu.php';
        }

        $data=$this->modelProduct->getAll();

        // echo "<pre>";
        // print_r($category);
        // print_r($data);
        $title = "Trang chu";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        require_once PATH_VIEW.'trangchu.php';
    }
    public function category()
    {
        $data=$this->modelProduct->getAll();
        $title = "Trang chu";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        require_once PATH_VIEW.'trangchu.php';
    }
}
