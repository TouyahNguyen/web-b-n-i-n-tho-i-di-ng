<?php include 'app/views/shares/header.php'; ?>

<div class="checkout-container">
    <div class="checkout-content">
        <h1 class="text-center mb-4" style="color: #d63384;">💳 Thanh toán</h1>
        <form action="/Product/processCheckout" method="POST">
            <div class="form-group">
                <label for="name" class="form-label">👩 Họ tên:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">📞 Số điện thoại:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">🏠 Địa chỉ:</label>
                <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-pink me-2">✅ Xác nhận thanh toán</button>
                <a href="/Product/cart" class="btn btn-outline-dark">🔙 Quay lại giỏ hàng</a>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    body {
        background: linear-gradient(to bottom right, #fff0f6, #fce4ec);
        font-family: 'Segoe UI', sans-serif;
    }

    .checkout-container {
        display: flex;
        justify-content: center;
        align-items: start;
        min-height: 100vh;
        padding: 40px 20px;
    }

    .checkout-content {
        width: 100%;
        max-width: 500px;
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .checkout-content:hover {
        transform: scale(1.02);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #6f42c1;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1.5px solid #e1bee7;
        border-radius: 10px;
        font-size: 16px;
        background-color: #fffafc;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #d63384;
        box-shadow: 0 0 6px rgba(214, 51, 132, 0.4);
        outline: none;
    }

    .btn {
        padding: 10px 22px;
        font-size: 16px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .btn-pink {
        background-color: #d63384;
        color: white;
        border: none;
    }

    .btn-pink:hover {
        background-color: #ad2167;
    }

    .btn-outline-dark {
        border: 1.5px solid #6c757d;
        color: #6c757d;
    }

    .btn-outline-dark:hover {
        background-color: #6c757d;
        color: white;
    }

    @media (max-width: 768px) {
        .checkout-content {
            width: 100%;
        }
    }
</style>
