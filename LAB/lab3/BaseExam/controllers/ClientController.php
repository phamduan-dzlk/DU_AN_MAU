<?php

class ClientController {
    public $user;
    public $products;
    function __construct(){
        $this->user = new user();
        $this->products = new products();
    }


    function login(){
        $message= "hãy đăng ký";
        $view='client/login';
        require_once PATH_VIEW . 'main.php';        
    }
    public function add() 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->user->add($_POST);
            $message= "bạn đã đăng nhập thành công";
            header('Location:'.BASE_URL);
        }
    }
    function regester(){
        $message= "hãy đăng nhap";
        $view='client/regester';
        require_once PATH_VIEW . 'main.php';  
    }
    public function check() 
    { 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data=$this->products->getAll();
            $user=$this->user->check($_POST['username'],$_POST['password']);
            if(!empty($user)){
                $_SESSION['user'] = $user;
                $_SESSION['regester'] = true;
                $_SESSION['id']=$user['id'];
                $message= "<h1 style='color: green;'>bạn đã đăng nhập thành công</h1>";
                $title="trang chủ";
                $view='client/home';
                require_once PATH_VIEW . 'main.php';
            }else{
                $message= "<h1 style='color: red;'>bạn đã đăng nhập thất bại</h1>";
                $view='client/regester';
                require_once PATH_VIEW . 'main.php';           
            }
        }
    }
}

?>