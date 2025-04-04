<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục mới</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Nền màu xanh dương nhạt */
        body {
            background: linear-gradient(to bottom right, #d3fcf7, #b3ecff);
        }

        /* Container với màu nền trắng, bo góc và bóng đổ */
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề trang màu xanh đậm */
        h2 {
            color: #00796b;
            font-weight: bold;
        }

        /* Nút chính với màu xanh lá cây */
        .btn-primary {
            background-color: #00796b;
            border-color: #00796b;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Nút phụ với màu xanh dương */
        .btn-secondary {
            background-color: #0288d1;
            border-color: #0288d1;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Hiệu ứng hover cho nút */
        .btn-primary:hover, .btn-secondary:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }

        /* Tăng kích thước cho các trường nhập liệu */
        .form-control {
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        /* Hiệu ứng khi ô input được focus */
        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 119, 107, 0.3);
            border-color: #00796b;
        }

        /* Khoảng cách giữa các phần tử trong form */
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Thêm danh mục mới</h2>

    <!-- Form thêm danh mục mới -->
    <form action="/Category/store" method="POST">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" placeholder="Nhập mô tả danh mục" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">Thêm danh mục</button>
    </form>

    <!-- Các nút quay lại -->
    <div class="d-flex justify-content-between mt-3">
        <a href="/Category/index" class="btn btn-secondary">Quay lại danh sách</a>
        <a href="/Product/index" class="btn btn-primary">Quay lại danh sách sản phẩm</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
