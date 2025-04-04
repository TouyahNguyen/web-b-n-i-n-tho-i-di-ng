<?php include 'app/views/shares/header.php'; ?>
<div class="container py-4">
    <div class="card shadow-lg rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0 fw-bold">📦 Chi tiết sản phẩm</h2>
        </div>
        <div class="card-body">
            <?php if ($product): ?>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <?php if ($product->image): ?>
                            <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                 class="img-fluid rounded-3 border"
                                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                            <img src="/images/no-image.png"
                                 class="img-fluid rounded-3 border"
                                 alt="Không có ảnh">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h3 class="fw-bold text-dark mb-3">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <p class="mb-3 text-muted">
                            <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                        <p class="h4 text-danger fw-bold mb-3">
                            💰 <?php echo number_format($product->price, 0, ',', '.'); ?> đ
                        </p>
                        <p class="mb-4">
                            <strong>Danh mục:</strong>
                            <span class="badge bg-info text-white">
                                <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục'; ?>
                            </span>
                        </p>

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <?php if (isset($_SESSION['username'])): ?>
                                <a href="/Product/addToCart/<?php echo $product->id; ?>"
                                   class="btn btn-success px-4 py-2 rounded-3 fw-semibold">
                                    ➕ Thêm vào giỏ hàng
                                </a>
                            <?php else: ?>
                                <div class="alert alert-warning w-100">
                                    🔒 Bạn cần <a href="/account/login/">đăng nhập</a> để mua hàng.
                                </div>
                            <?php endif; ?>
                            <a href="/Product/list" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-semibold">⬅ Quay lại</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center my-4">
                    <h4>🚫 Không tìm thấy sản phẩm!</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>
