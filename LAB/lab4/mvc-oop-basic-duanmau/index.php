<?php 
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)
require_once "./commons/env.php";
require_once "./commons/function.php";

spl_autoload_register(function($class){
    $fileName=$class.".php";
    $files_Controller= PATH_CONTROLLER . $fileName;
    $files_models=PATH_MODEL . $fileName;
    if(is_readable($files_Controller)){
        require_once $files_Controller;
    }else if(is_readable($files_models)){
        require_once $files_models;
    }
});



// Route
$act = $_GET['action'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new ProductController())->Home(),

    'category'=>(new ProductController())->Home(),
    'delete'=>(new ProductController())->delete(),
    'detail'=>(new ProductController())->detail(),
    'edit'=>(new ProductController())->edit(),
    'update'=>(new ProductController())->update(),
    'create'=>(new ProductController())->create(),
    'add'=>(new ProductController())->add(),
    'fix'=>(new ProductController())->fix(),
    'delete_category'=>(new ProductController())->delete_category(),
    'edit_categoty'=>(new ProductController())->edit_categoty(),
    'update_category'=>(new ProductController())->update_categoty(),
    'add_category'=>(new ProductController())->add_category(),
    'create_category'=>(new ProductController())->create_category(),
    'login'=>(new ProductController())->login(),
    'register'=>(new ProductController())->register(),
    'check_user'=>(new ProductController())->check_user(),
    'add_user'=>(new ProductController())->add_user(),
    'logout'=>(new ProductController())->logout(),
};