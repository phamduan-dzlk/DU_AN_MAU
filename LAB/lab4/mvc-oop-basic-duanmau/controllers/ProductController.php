<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;
    public $category;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
        $this->category = new Category();
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
    public function delete()
    {
        try {
            if(!isset($_GET['id'])){
                throw new exception ("khong co id");
            }
            $user=$this->modelProduct->get($_GET['id']); 
            if(empty($user)){
                throw new Exception("khong co nguoi");
            }
            $row=$this->modelProduct->delete($_GET['id']);
            if($row > 0){
                $_SESSION['status']=true;
                $_SESSION['msg']=("da xoa thanh cong");
            }else{
                throw new Exception("xóa không thành công");
            }
        } catch (\Throwable $th) {
            $_SESSION['status']=false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('LOCATION:'.BASE_URL);
        exit;
    }
    function detail(){
        $data=$this->modelProduct->get($_GET['id']);
        require_once PATH_VIEW.'detail.php';
    }
    function create(){
        $data=$this->category->getAll();
        require_once PATH_VIEW.'create.php';
    }
    function add(){
        if($_SERVER['REQUEST_METHOD']){
            $data=$_POST + $_FILES;
            echo"<pre>";
            print_r($data);
            if($data['thumbnail']['size']>0){
                $data['thumbnail']=uploadFile($data['thumbnail'],"img_ao");
            }else{
                $data['thumbnail']="img_ao/1.jpg";
            }
            $this->modelProduct->add($data);
        }
        header('LOCATION:'.BASE_URL);
        exit;
    }
    function edit(){
        if(isset($_GET['id'])){
            $data_in=$this->modelProduct->get($_GET['id']);
            $data=$this->category->getAll();
            require_once PATH_VIEW.'edit.php';
        }
        
    }
    function update(){
        if($_SERVER['REQUEST_METHOD']){
            $data=$_POST + $_FILES;
            $product=$this->modelProduct->get($_POST['id']);
            if($data['thumbnail']['size']>0){
                $data['thumbnail']=uploadFile($data['thumbnail'],'img_ao');
            }else{
                $data['thumbnail']=$product['thumbnail'];
            }            $row=$this->modelProduct->update($data);
            if($row>0 && file_exists($product['thumbnail'])){
                deleteFile($product['thumbnail']);
            }
        }
        header('LOCATION:'.BASE_URL);
        exit;
    }
}
