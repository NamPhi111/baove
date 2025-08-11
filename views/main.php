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
<style>
    /* Toàn trang */
    body {
        background-color: #e4e5e6ff;
        font-family: Arial, sans-serif;
    }

    /* Navbar */
    .navbar {
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav .nav-link {
        padding: 10px 15px;
        transition: 0.3s;
    }

    .navbar-nav .nav-link:hover {
        background-color: #0d6efd;
        color: white !important;
        border-radius: 5px;
    }

    /* Giữ menu trên cùng một dòng */
    .navbar-nav {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    /* Canh giữa các item theo chiều dọc */
    .navbar-nav .nav-item {
        display: flex;
        align-items: center;
    }

    /* Logo */
    .nav-logo {
        height: 35px;
        margin-right: 8px;
        border-radius: 50%;
        transition: filter 0.3s ease;
    }

    .navbar-nav .nav-item:hover .nav-logo {
        filter: brightness(0) saturate(100%) invert(36%) sepia(100%) saturate(1300%) hue-rotate(201deg) brightness(93%) contrast(101%);
    }

    /* Nút */
    .btn-outline-primary {
        transition: 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }

    /* Container nội dung */
    .container {
        margin-top: 20px;
        margin-bottom: 50px;
    }

    /* Footer */
    footer {
        background-color: #b9a3a3ff;
        text-align: center;
        padding: 15px;
        font-size: 14px;
        color: #555;
        border-top: 1px solid #ddd;
    }

    footer:hover {
        background-color: #e9ecef;
    }
</style>

<body>
    <nav class="navbar navbar-expand-xxl bg-light justify-content-between">
        <div class="container mp-4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <img src="public/images/logo_hip.png" alt="Logo Hip Store" class="nav-logo">
                    <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Trang Chủ</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="<?=BASE_URL.'?action=into_addmin'?>"><b>Quản lí</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="<?=BASE_URL.'?action=lienhe'?>"><b>Liên hệ</b></a>
                </li>
            </ul>
            <div class="btn-group" role="group">
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="<?=BASE_URL.'?action=logout'?>" class="btn btn-outline-primary">Đăng xuất</a>
            <?php } else { ?>
                <a href="<?=BASE_URL.'?action=regester'?>" class="btn btn-outline-primary">Đăng nhập</a>
                <a href="<?=BASE_URL.'?action=login'?>" class="btn btn-outline-primary">Đăng ký</a>
            <?php } ?>
            </div>
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
    <div>
        <footer>Thanks you</footer>
    </div>
</body>
</html>
