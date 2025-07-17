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
        //cái này là đăng ký , người ta đăng ký thì thêm người ta vào
        if($_SERVER['REQUEST_METHOD']){
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
        //cái này là đăng nhập, 
        if($_SERVER['REQUEST_METHOD']){
            $data=$this->products->getAll();
            $user=$this->user->check($_POST['username'],$_POST['password']);
            //người dùng nhập thông tin ở form thông tin được controller điều hướng đến model/ user
            //sau khi vào model nếu đúng hay sai nó đều trả về một mảng có tên là đata
            //mình đi xét cái $data đấy xem nó có tồn tại không
            //nếu đúng mình sẽ cho người dùng dùng
            if(!empty($user)){
                $_SESSION['user'] = $user;
                $_SESSION['regester'] = true;
                // $_SESSION['id']=$user['id'];
                //vì data mang thông số của người dùng vì mình đã in ra mảng nên chắc chắn nó sẽ có id
                //việc của mình là lấy cái id của người đăng nhập đêt lưu hành động của người ta mua hay bán
                //ngoài id có thể lấy số điện thoại thứ mà không ai giống ai
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
//chạy thử
//chưa có thông tin
//xong da dawng nhap xong

?>