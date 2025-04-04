<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5" style="background: linear-gradient(to right, #fce4ec, #f8bbd0); padding: 30px; border-radius: 16px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header text-white text-center" style="background-color: #d63384; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <h2 class="mb-0">🛠️ Sửa sản phẩm</h2>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-semibold">📦 Tên sản phẩm:</label>
                            <input type="text" id="name" name="name" class="form-control fs-5 rounded-3" 
                                   value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label fw-semibold">📝 Mô tả:</label>
                            <textarea id="description" name="description" class="form-control fs-5 rounded-3" rows="4" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price" class="form-label fw-semibold">💰 Giá:</label>
                            <input type="text" id="price" name="price" class="form-control fs-5 text-danger fw-bold rounded-3" step="0.01" 
                                   value="<?php echo number_format($product->price, 0, ',', '.'); ?> đ" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label fw-semibold">📂 Danh mục:</label>
                            <select id="category_id" name="category_id" class="form-control fs-5 rounded-3" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->id; ?>" 
                                            <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="image" class="form-label fw-semibold">🖼️ Hình ảnh:</label>
                            <input type="file" id="image" name="image" class="form-control fs-5 rounded-3">
                            <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                            <?php if ($product->image): ?>
                                <div class="mt-3">
                                    <img src="/<?php echo $product->image; ?>" alt="Product Image" class="img-thumbnail rounded-3 shadow" style="max-width: 200px;">
                                </div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-pink w-100 fs-5 mb-2">💾 Lưu thay đổi</button>
                    </form>

                    <a href="/Product/list" class="btn btn-outline-dark w-100 fs-5">🔙 Quay lại danh sách sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .btn-pink {
        background-color: #d63384;
        color: white;
        border-radius: 10px;
        font-weight: 600;
        transition: background 0.3s ease-in-out;
    }

    .btn-pink:hover {
        background-color: #ad2167;
    }

    .form-control:focus {
        border-color: #d63384;
        box-shadow: 0 0 6px rgba(214, 51, 132, 0.4);
        outline: none;
    }

    label {
        color: #6f42c1;
    }

    .card {
        border-radius: 16px;
    }

    .alert-danger {
        border-radius: 10px;
    }
</style>
