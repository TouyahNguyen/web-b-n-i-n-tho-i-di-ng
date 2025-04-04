<footer class="footer-fashion text-center text-lg-start mt-5">
    <div class="container p-4">
        <div class="row">
            <!-- Cột giới thiệu -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="footer-title">Fashion Shop</h5>
                <p class="footer-text">
                    Hệ thống quản lý sản phẩm giúp bạn dễ dàng theo dõi, chỉnh sửa và cập nhật các mặt hàng thời trang mới nhất.
                </p>
            </div>
            <!-- Cột liên kết nhanh -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-title">Liên kết nhanh</h5>
                <ul class="list-unstyled">
                    <li><a href="/Product/" class="footer-link">Danh sách sản phẩm</a></li>
                    <li><a href="/Product/add" class="footer-link">Thêm sản phẩm</a></li>
                </ul>
            </div>
            <!-- Cột mạng xã hội -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-title">Kết nối</h5>
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="text-center p-3 footer-bottom">
        © 2025 Fashion Shop. All rights reserved.
    </div>
</footer>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- CSS mới cho footer thời trang -->
<style>
    .footer-fashion {
        background-color: #fce4ec;
        color: #333;
        border-top: 2px solid #f8bbd0;
        border-radius: 12px 12px 0 0;
    }
    .footer-title {
        font-weight: 600;
        color: #d81b60;
        margin-bottom: 15px;
    }
    .footer-text {
        font-size: 14px;
        color: #555;
    }
    .footer-link {
        display: block;
        color: #555;
        margin-bottom: 8px;
        text-decoration: none;
        transition: all 0.3s;
    }
    .footer-link:hover {
        color: #d81b60;
        text-decoration: underline;
    }
    .social-icon {
        font-size: 20px;
        margin-right: 12px;
        color: #d81b60;
        transition: color 0.3s ease;
    }
    .social-icon:hover {
        color: #ad1457;
    }
    .footer-bottom {
        background-color: #d81b60;
        color: white;
        border-radius: 0 0 12px 12px;
    }

    /* Đảm bảo footer đẩy xuống dưới nếu ít nội dung */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .container {
        flex: 1;
    }
    footer {
        margin-top: auto;
    }
</style>
