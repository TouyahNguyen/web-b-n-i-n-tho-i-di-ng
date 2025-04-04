<?php include 'app/views/shares/header.php'; ?>

<div class="confirmation-container">
    <div class="confirmation-content shadow-lg bg-white rounded-4 p-5">
        <h1 class="text-center text-success fw-bold mb-3">✅ Đơn hàng đã được xác nhận!</h1>
        <p class="text-center fs-5 text-secondary mb-4">🎉 Cảm ơn bạn đã đặt hàng! Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</p>
        <div class="text-center">
            <a href="/Product/" class="btn btn-primary px-4 py-2 rounded-3 fs-6 fw-semibold">🛍️ Tiếp tục mua sắm</a>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    body {
        background: linear-gradient(to bottom right, #e0f7fa, #d0f0ff);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .confirmation-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 2rem;
    }

    .confirmation-content {
        max-width: 600px;
        width: 100%;
        transition: transform 0.25s ease-in-out;
    }

    .confirmation-content:hover {
        transform: scale(1.01);
    }

    .btn-primary {
        background: #0d6efd;
        border: none;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: #0a58ca;
    }

    @media (max-width: 768px) {
        .confirmation-content {
            padding: 2rem;
        }

        .btn {
            width: 100%;
            font-size: 15px;
        }
    }
</style>
