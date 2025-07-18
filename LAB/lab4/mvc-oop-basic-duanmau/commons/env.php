<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , '');

define('PATH_ROOT'    , __DIR__ . '/../');

define('BASE_ASSET_UPLOAD',PATH_ROOT.'asset/upload/');

define('PATH_VIEW',PATH_ROOT.'views/');

define('PATH_MODEL',PATH_ROOT.'models/');

define('PATH_CONTROLLER',PATH_ROOT.'controllers/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'lab');  // Tên database


