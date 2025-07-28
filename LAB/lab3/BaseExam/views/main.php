<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    if(isset($message)){
        echo "$message";
    }else{
        echo "";
    }
    ?>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <ul class="d-flex list-unstyled">
            <li class="me-3">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>home</b></a>
            </li>
            <li class="me-3">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>liên hệ</b></a>
            </li>
            <li class="me-3">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><canvas id="mycanvas">hihi</canvas></a>
            </li>
        </ul>
        <div class="btn-group" role="group">
            <a href="<?=BASE_URL.'?action=regester'?>" class="btn btn-outline-primary">đăng nhập</a>
            <a href="<?=BASE_URL.'?action=login'?>" class="btn btn-outline-primary">đăng ký</a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW . $view . '.php';
            }
            ?>
        </div>
    </div>
    <footer>
        <p>follow us</p>
        
    </footer>
</body>
<style>
    footer{
        background-color: black;
        padding: 10px;
        text-align: center;
        margin-top: 50px;
    }
    footer p{
        color: wheat;
        
    }
    footer p:hover{
        color: white;

    }
</style>
</html>