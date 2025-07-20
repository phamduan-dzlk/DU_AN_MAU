<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/DU_AN_MAU/LAB/lab4/mvc-oop-basic-duanmau/');

define('BASE_URL_FIX'       , 'http://localhost/DU_AN_MAU/LAB/lab4/mvc-oop-basic-duanmau/?action=fix');

define('PATH_ROOT'    , __DIR__ . '/../');

define('BASE_ASSET_UPLOAD',BASE_URL.'assets/uploads/');

define('PATH_ASSET_UPLOAD',PATH_ROOT.'assets/uploads/');

define('PATH_VIEW',PATH_ROOT.'views/');

define('PATH_MODEL',PATH_ROOT.'models/');

define('PATH_CONTROLLER',PATH_ROOT.'controllers/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'lab');  // Tên database


