<?php

class HomeController
{
    public $products;
    public $category;
    public $user;
    function __construct(){
        $this->products = new Products();
        $this->category = new Categoty();
        $this->user = new User();
    }
    public function index() 
    {
        if(isset($_GET['category'])){
            $data=$this->products->category($_GET['category']);
            $view='client/home';
            require_once PATH_VIEW . 'main.php';      
        }
        $dataAll=$this->products->getAll();
        $title="";
        $view='client/home';
        require_once PATH_VIEW . 'main.php';        
    }
    public function get() 
    {
        if(isset($_GET['id'])){
            $data=$this->products->get($_GET['id']);
        }
        $title="chi tiet san pham";
        $view='client/detail';
        require_once PATH_VIEW . 'main.php';      
    }
    public function login() 
    {
        if($_SERVER['REQUEST_METHOD']){
            $this->user->add($_POST);
            header('LOCATION:'.BASE_URL);
        }
    }
    public function check() 
    {
        if($_SERVER['REQUEST_METHOD']){
            $data=$this->user->check($_POST['username'],$_POST['password']);
            if(!isset($data)){
                $message= "bạn đã đăng nhập thất bại";
                $title="trang chủ";
                $view='client/home';
                require_once PATH_VIEW . 'main.php';
            }else{
                $_SESSION['user'] = $data;
                $_SESSION['regester'] = true;


                $message= "bạn đã đăng nhập thành công";
                $title="trang chủ";
                $view='client/home';
                require_once PATH_VIEW . 'main.php';             
            }

        }
    }

}