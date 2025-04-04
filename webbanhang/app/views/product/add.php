<?php include 'app/views/shares/header.php'; ?> 

<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #d63384;">✨ Thêm sản phẩm mới</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger rounded-pill px-4 py-2">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm p-4 rounded-4 form-container" style="background: #fff0f6;">
        <form method="POST" action="/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="mb-3">
                <label for="name" class="form-label">👗 Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ví dụ: Đầm maxi hoa nhí" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">📝 Mô tả:</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Mô tả chi tiết chất liệu, phong cách..." required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">💸 Giá bán:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" placeholder="VD: 399000" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">📂 Danh mục:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="" disabled selected>Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->id; ?>">
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">📷 Ảnh sản phẩm:</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                <button type="submit" class="btn btn-pink w-100">➕ Thêm sản phẩm</button>
                <a href="/Product/list" class="btn btn-outline-dark w-100">⬅️ Quay lại</a>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<!-- Custom CSS -->
<style>
    body {
        background: linear-gradient(to bottom right, #fff0f6, #fce4ec);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 12px;
        font-size: 15px;
        border: 1.5px solid #f8bbd0;
    }

    .form-control:focus, .form-select:focus {
        border-color: #d63384;
        box-shadow: 0 0 5px rgba(214, 51, 132, 0.3);
    }

    .btn-pink {
        background-color: #d63384;
        color: white;
        border: none;
        font-weight: bold;
        padding: 12px;
        border-radius: 12px;
        transition: 0.3s ease;
    }

    .btn-pink:hover {
        background-color: #ad2167;
    }

    .btn-outline-dark {
        border: 1.5px solid #343a40;
        color: #343a40;
        font-weight: bold;
        padding: 12px;
        border-radius: 12px;
        transition: 0.3s ease;
    }

    .btn-outline-dark:hover {
        background-color: #343a40;
        color: white;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }
    }
</style>

<!-- JS Validation -->
<script>
function validateForm() {
    let name = document.getElementById("name").value.trim();
    let description = document.getElementById("description").value.trim();
    let price = document.getElementById("price").value.trim();
    let category = document.getElementById("category_id").value;

    if (name === "" || description === "" || price === "" || category === "") {
        alert("Vui lòng điền đầy đủ thông tin!");
        return false;
    }

    if (price <= 0) {
        alert("Giá sản phẩm phải lớn hơn 0!");
        return false;
    }

    return true;
}
</script>
