<?php include 'app/views/shares/header.php'; ?>

<div class="cart-container">
    <div class="cart-content">
        <h1 class="text-center mb-4" style="color: #d63384;">🛒 Giỏ hàng</h1>

        <?php if (!empty($cart)): ?>
            <div class="card p-4 rounded-4 shadow" style="background-color: #fff0f6;">
                <ul class="list-group list-group-flush">
                    <?php 
                    $total = 0;
                    foreach ($cart as $id => $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center cart-item bg-white rounded mb-2 shadow-sm">
                            <div class="cart-item-details">
                                <h5 class="mb-1" style="color: #6f42c1;"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>

                                <?php if (!empty($item['image'])): ?>
                                    <img src="/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                        alt="Product Image" class="img-thumbnail product-img">
                                <?php endif; ?>

                                <p class="mb-1">Giá: <strong style="color: #e83e8c;"><?php echo number_format($item['price'], 0, ',', '.'); ?> đ</strong></p>

                                <p class="mb-0">
                                    Số lượng: 
                                    <button class="btn btn-sm btn-outline-pink update-cart" 
                                            data-id="<?php echo $id; ?>" data-action="decrease">−</button>
                                    
                                    <input type="text" class="quantity-input" id="quantity-<?php echo $id; ?>" 
                                           value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" readonly>

                                    <button class="btn btn-sm btn-outline-pink update-cart" 
                                            data-id="<?php echo $id; ?>" data-action="increase">＋</button>
                                </p>
                            </div>

                            <button class="btn btn-outline-danger btn-sm remove-cart" data-id="<?php echo $id; ?>">❌</button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <h4 class="text-end mt-3">Tổng tiền: <span id="total" style="color: #d63384;"><?php echo number_format($total, 0, ',', '.'); ?> đ</span></h4>

                <div class="text-center mt-4">
                    <a href="/Product" class="btn btn-outline-dark me-2">🔄 Tiếp tục mua sắm</a>
                    <a href="/Product/checkout" class="btn btn-pink">💳 Thanh toán</a>
                </div>
            </div>
        <?php else: ?>
            <p class="text-center text-danger fs-5 mt-4">🛍️ Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<!-- Custom CSS -->
<style>
    body {
        background: linear-gradient(to bottom right, #fff0f6, #fce4ec);
        font-family: 'Segoe UI', sans-serif;
    }

    .cart-container {
        display: flex;
        justify-content: center;
        align-items: start;
        padding: 40px 20px;
        min-height: 100vh;
    }

    .cart-content {
        width: 100%;
        max-width: 700px;
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
        padding: 15px;
        border-radius: 12px;
        transition: background 0.3s ease;
    }

    .cart-item:hover {
        background-color: #fff5fb;
    }

    .product-img {
        max-width: 90px;
        border-radius: 10px;
        margin: 8px 0;
    }

    .quantity-input {
        width: 48px;
        text-align: center;
        font-weight: bold;
        border: 1.5px solid #e1bee7;
        border-radius: 8px;
        margin: 0 5px;
        background-color: #fffafc;
    }

    .btn-outline-pink {
        border: 1.5px solid #d63384;
        color: #d63384;
        font-weight: bold;
        border-radius: 8px;
        transition: 0.2s ease-in-out;
    }

    .btn-outline-pink:hover {
        background-color: #d63384;
        color: white;
    }

    .btn-pink {
        background-color: #d63384;
        color: white;
        border: none;
        font-weight: bold;
        border-radius: 12px;
        padding: 10px 24px;
        transition: 0.3s ease-in-out;
    }

    .btn-pink:hover {
        background-color: #ad2167;
    }

    @media (max-width: 768px) {
        .cart-content {
            padding: 20px;
        }
    }
</style>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".update-cart").click(function() {
        let product_id = $(this).data("id");
        let action = $(this).data("action");
        let input = $("#quantity-" + product_id);
        let newQuantity = parseInt(input.val());

        if (action === "increase") {
            newQuantity++;
        } else if (action === "decrease" && newQuantity > 1) {
            newQuantity--;
        }

        input.val(newQuantity);

        $.ajax({
            url: "/Product/updateCart",
            method: "POST",
            data: { product_id: product_id, quantity: newQuantity },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#total").text(response.total);
                }
            }
        });
    });

    $(".remove-cart").click(function() {
        let product_id = $(this).data("id");
        let cartItem = $("#quantity-" + product_id).closest("li");

        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
            $.ajax({
                url: "/Product/removeFromCart",
                method: "POST",
                data: { product_id: product_id },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        cartItem.remove();
                        $("#total").text(response.total);
                    }
                }
            });
        }
    });
});
</script>
