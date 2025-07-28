<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $user;
    public $modelProduct;
    public $category;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
        $this->category = new Category();
        $this->user = new User();
    }
    public function Home()
    {
        $category = $this->modelProduct->category();
        $title = "Trang chủ";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";

        if(isset($_GET['category'])){
            $data_in = $this->modelProduct->Qcate($_GET['category']);
        } else {
            $data = $this->modelProduct->getAll();
        }

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
        if(isset($_GET['id'])){
            $data=$this->modelProduct->get($_GET['id']);
            require_once PATH_VIEW.'detail.php';            
        }

    }
    function create(){
        $data=$this->category->getAll();
        require_once PATH_VIEW.'create.php';
    }
    function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data=$_POST + $_FILES;
            $product=$this->modelProduct->get($_POST['id']);
            if($data['thumbnail']['size']>0){
                $data['thumbnail']= uploadFile($data['thumbnail'],'img_ao');
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
    function fix(){
        $data=$this->category->getAll();
        require_once PATH_VIEW.'fix.php';        
    }
    public function delete_category(){
        try {
            if(!isset($_GET['id'])){
                throw new Exception("khong co id");
            }
            $row=$this->category->delete($_GET['id']);
            if($row>0){
                $_SESSION['status']=true;
                $_SESSION['msg']=("da xoa thanh cong");
            }else{
                throw new Exception("xoa khong thanh cong");
            }
        } catch (\Throwable $th) {
            $_SESSION['status']=false;
            $_SESSION['msg']=("");
        }
        header('location:'.BASE_URL_FIX);
    }

    public function edit_categoty(){
        if(isset($_GET['id'])){
            $data=$this->category->get($_GET['id']);
            require_once PATH_VIEW.'fix_edit.php';  
        }
         
    }
    public function update_categoty(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $row=$this->category->update($_POST);
            if($row>0){
                $mesage="da sua thanh cong";
            }
            header('location:'.BASE_URL_FIX);
            exit;
        }
    }

    public function create_category(){
        require_once PATH_VIEW.'fix_create.php';        
    }
    public function add_category(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $row=$this->category->add($_POST);
            if($row>0){
                $mesage="da theem thanh cong";
            }
            header('location:'.BASE_URL_FIX);
            exit;
        }
    }
    public function login(){
        require_once PATH_VIEW.'login.php';
    }
    public function add_user(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category=$this->modelProduct->category();
            if(isset($_GET['category'])){
                $data_in=$this->modelProduct->Qcate($_GET['category']);
                $title = "Trang chu";
                $thoiTiet = "Hôm nay trời có vẻ là mưa";
                require_once PATH_VIEW.'trangchu.php';
            }

            $data=$this->modelProduct->getAll();
            $this->user->add($_POST);

            $_SESSION['login']=true;
            $_SESSION['username']=$_POST['username'];
            $_SESSION['status']=true;
            $_SESSION['msg']=("bạn đã đăng ký thành công!");   

            header("Location: " . BASE_URL);
            exit;
        }
    }
    
    public function register(){
        require_once PATH_VIEW.'register.php'; 
    }
    public function check_user(){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $data=$this->user->check($_POST['username'],$_POST['password']);
            if(empty($data)){
                $_SESSION['login']=false;
                $_SESSION['status']=false;
                $_SESSION['msg']=("bạn đã đăng nhập thất bại!");
                require_once PATH_VIEW.'register.php'; 
            }else{
                $_SESSION['login']=true;
                $_SESSION['username']=$data['username'];
                $_SESSION['status']=true;
                $_SESSION['msg']=("bạn đã đăng nhập thành duẩn công!");
                
                header("Location: " . BASE_URL);
                exit;               
            }
        }
    }
    public function logout() {
    session_destroy();
    header("Location: " . BASE_URL);
    exit;
    }

}
