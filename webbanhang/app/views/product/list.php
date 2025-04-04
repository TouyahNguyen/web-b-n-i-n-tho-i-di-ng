<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <div class="alert alert-info text-center rounded-3 fs-5 shadow-sm" role="alert">
        🎉 <strong>Giảm giá 50%</strong> cho sinh viên từ ngày <u>1/6 đến 31/8</u>! 🎉
    </div>

    <h1 class="text-center mb-4 fw-bold text-primary-emphasis">📋 Danh sách sản phẩm</h1>

    <?php $categoryParam = isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : ''; ?>

    <?php if (isset($_GET['category_id'])): ?>
        <?php $category = $this->categoryModel->getCategoryById($_GET['category_id']); ?>
        <h3 class="text-center text-secondary-emphasis">🔖 Sản phẩm thuộc danh mục: <span class="text-primary"><?= htmlspecialchars($category->name) ?></span></h3>
    <?php endif; ?>

    <div class="row mb-4 mt-3">
        <!-- Sắp xếp theo -->
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="card p-3 shadow-sm rounded-4 border-0">
                <h6 class="text-uppercase text-muted fw-semibold mb-2">SẮP XẾP THEO:</h6>
                <div class="d-flex">
                    <a href="?sort=high<?= $categoryParam ?>" class="btn btn-outline-danger me-2">🔻 Giá cao</a>
                    <a href="?sort=low<?= $categoryParam ?>" class="btn btn-outline-success">🔺 Giá thấp</a>
                </div>
            </div>
        </div>

        <!-- Lọc theo giá -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm rounded-4 border-0">
                <h6 class="text-uppercase text-muted fw-semibold mb-2">CHỌN MỨC GIÁ:</h6>
                <form method="GET" action="" class="d-flex justify-content-end align-items-center">
                    <?php if (isset($_GET['category_id'])): ?>
                        <input type="hidden" name="category_id" value="<?= htmlspecialchars($_GET['category_id']) ?>">
                    <?php endif; ?>
                    <select name="price_range" id="price_range" class="form-select w-auto rounded-3 me-2">
                        <option value="">Tất cả</option>
                        <option value="0-2000000">Dưới 2 triệu</option>
                        <option value="2000000-4000000">Từ 2 - 4 triệu</option>
                        <option value="4000000-7000000">Từ 4 - 7 triệu</option>
                        <option value="7000000-13000000">Từ 7 - 13 triệu</option>
                        <option value="13000000-20000000">Từ 13 - 20 triệu</option>
                        <option value="20000000-999999999">Trên 20 triệu</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm rounded-4">
                        <?php if ($product->image): ?>
                            <img src="/<?php echo $product->image; ?>" class="card-img-top rounded-top-4" alt="Product Image">
                        <?php else: ?>
                            <img src="/uploads/default-image.jpg" class="card-img-top rounded-top-4" alt="Product Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark fw-semibold">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text fw-bold text-danger">💰 <?php echo number_format($product->price, 0, ',', '.'); ?> đ</p>
                            <p class="card-text"><span class="text-muted">📂</span> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <div class="card-footer bg-white border-top-0 text-center d-flex flex-wrap justify-content-center gap-2">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <a href="/Product/show/<?php echo $product->id; ?>" class="btn btn-outline-info btn-sm">Xem</a>
                                <a href="/Product/edit/<?php echo $product->id; ?>" class="btn btn-outline-warning btn-sm">Sửa</a>
                                <a href="/Product/delete/<?php echo $product->id; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'user')): ?>
                                <a href="/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm">🛒 Thêm vào giỏ</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center fs-5 text-muted">Không có sản phẩm trong danh mục này.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    body {
        background: linear-gradient(to right, #fdfbfb, #ebedee);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .product-card {
        transition: transform 0.3s ease-in-out;
    }
    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }
    .text-custom {
        color: #6f42c1;
    }

    @media (max-width: 768px) {
        .d-flex.align-items-center {
            flex-direction: column;
            gap: 0.5rem;
        }
        .form-select,
        .btn {
            width: 100% !important;
        }
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
