<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm - Fashion Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfdfd;
        }

        /* Navbar thời trang */
        .navbar {
            background-color: #fce4ec;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            margin-top: 15px;
        }
        .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 10px 16px;
        }
        .navbar-nav .nav-link:hover {
            color: #d81b60 !important;
        }

        .form-inline .form-control {
            border-radius: 20px;
            padding: 8px 16px;
            width: 230px;
            border: 1px solid #ccc;
        }
        .btn-outline-success {
            border-radius: 20px;
            background-color: #f8bbd0;
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-outline-success:hover {
            background-color: #ec407a;
        }

        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #f8bbd0;
        }
        .dropdown-item:hover {
            background-color: #fce4ec;
        }

        .nav-link.username {
            font-weight: bold;
            color: #d81b60 !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light container">
    <a class="navbar-brand font-weight-bold text-dark" href="/">Khang Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="/Product/">Sản phẩm</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" data-toggle="dropdown">
                    Danh mục
                </a>
                <div class="dropdown-menu">
                    <?php if (empty($categories)) : ?>
                        <p class="dropdown-item text-muted">Chưa có danh mục</p>
                    <?php else : ?>
                        <?php foreach ($categories as $category) : ?>
                            <a class="dropdown-item" href="/Product?category_id=<?= htmlspecialchars($category->id) ?>">
                                <?= htmlspecialchars($category->name) ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                        <a class="dropdown-item" href="/Category/">Quản lý danh mục</a>
                    <?php endif; ?>
                </div>
            </li>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/Product/add">Thêm sản phẩm</a>
                </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'user'])) : ?>
                <li class="nav-item"><a class="nav-link" href="/Product/cart">Giỏ hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="/Product/checkout">Thanh toán</a></li>
            <?php endif; ?>

            <li class="nav-item">
                <form class="form-inline" action="/Product/search" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm sản phẩm" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                </form>
            </li>

            <li class="nav-item">
                <?php if (isset($_SESSION['username'])) : ?>
                    <a class="nav-link username"><?= htmlspecialchars($_SESSION['username']) ?></a>
                <?php else : ?>
                    <a class="nav-link" href="/account/login">Đăng nhập</a>
                <?php endif; ?>
            </li>

            <?php if (isset($_SESSION['username'])) : ?>
                <li class="nav-item"><a class="nav-link" href="/account/logout">Đăng xuất</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <!-- Nội dung chính ở đây -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
