<?php
include './conn.php';
require './PHP/header.php';

$id_product = $_GET['id_product'];

// Lấy thông tin sản phẩm từ bảng product
$stmt = $pdo->prepare('SELECT * FROM product WHERE id_product = :id_product');
$stmt->bindParam(':id_product', $id_product);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<style>
    .product-info-img img {
        max-width: 100%;
        height: auto;
    }
</style>

<main>
    <div class="top">
        <div class="container product">
            <div class="row product_detail ">

                <div class="col-lg-6 product_detail_a">

                    <img src="<?php echo $product['image_link']; ?>" alt="">

                </div>


                <div class="col-lg-6 product_detail_b">
                    <h2 class="name">
                        <?php echo $product['productName']; ?>
                    </h2>
                    <h4 class="price"><?php echo number_format($product['price'], 0, '.', '.'); ?>đ</h4>

                    <h6 class="producCode">Mã sách: <?php echo $product['productCode'] ?></h6>
                    <h6 class="ISBN">Mã ISBN: <?php echo $product['ISBN'] ?></h6>
                    <h6 class="pageNumber">Số trang: <?php echo $product['pageNumber'] ?></h6>
                    <h6 class="author">Tác giả:
                        <a href="search.php?keyword=<?php echo urlencode($product['author']); ?>">
                            <?php echo $product['author']; ?>
                        </a>
                    </h6>
                    <h6>Số lượng:</h6>
                    <div class="quantity-selector">
                        <button class="btn btn-primary quantity-btn" onclick="decrement()">-</button>
                        <input type="text" class="form-control quantity-input" value="1" id="quantity">
                        <button class="btn btn-primary quantity-btn" onclick="increment()">+</button>
                    </div>
                    <button type="button" class="btn btn-primary " onclick="addToCart()"><strong>Mua hàng</strong></button>
                    <ul class="product-list">
                        <li><i class="fa fa-truck"></i> Giao hàng nhanh toàn quốc <a href="#">Xem chi tiết</a></li>
                        <li><i class="fa fa-phone"></i> Tổng đài: 1900.9696.42 (9h00 - 21h00 mỗi ngày)</li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">

                <!-- Info -->
                <div class="col-lg-12 product-info">
                    <div class="product-info-btn">
                        <button type="button" class="description-button"><span>Mô tả</span></button>
                    </div>
                    <div class="product-info-content" style="color: black;">
                        <div id="description-content">
                            <p><?php echo $product['content']; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Recomment -->
                <div class="col-lg-12 product-recomment">
                    <div class="product-info-btn">
                        <button type="button" class="description-button"><span>Đề xuất truyện</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="successModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sản phẩm đã được thêm vào giỏ hàng.
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.title = "San pham";

    function addToCart() {
        var img = document.querySelector(".carousel-item.active img");
        var src = img.getAttribute("src");

        var title = document.querySelector(".name").textContent;
        var body = document.querySelector(".info").textContent;

        var price = document.querySelector(".price").textContent;

        var info = [src, title, body, price];

        var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        cartItems.push(info);
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        //Hiển thị modal
        $('#successModal').modal('show');

        // Ẩn modal
        setTimeout(function() {
            $('#successModal').modal('hide');
        }, 1500);
    }

    // Tăng giảm sản phẩm 
    function increment() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value, 10);
        quantityInput.value = currentQuantity + 1;
    }

    function decrement() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value, 10);

        // Giảm số lượng chỉ khi nó lớn hơn 1
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }
</script>
<?php include './PHP/footer.php'; ?>