<?php
include './conn.php';
require './PHP/header.php';

$id_product = $_GET['id_product'];

// Lấy thông tin sản phẩm từ bảng product
$stmt = $pdo->prepare('SELECT * FROM product WHERE id_product = :id_product');
$stmt->bindParam(':id_product', $id_product);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Lấy danh sách hình ảnh từ bảng img_list
$stmt = $pdo->prepare('SELECT * FROM img_list WHERE id_product = :id_product');
$stmt->bindParam(':id_product', $id_product);
$stmt->execute();
$img_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh sách hình ảnh từ bảng img_info
$stmt = $pdo->prepare('SELECT * FROM img_info WHERE id_product = :id_product');
$stmt->bindParam(':id_product', $id_product);
$stmt->execute();
$img_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Đưa thông tin sản phẩm và danh sách hình ảnh vào một mảng
// $data = array(
//     'product' => $product,
//     'img_list' => $img_list
// );

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
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($img_list as $key => $img) : ?>
                                <div class="carousel-item<?php if ($key === 0) echo ' active'; ?>">
                                    <img src="<?php echo $img['url']; ?>" class="d-block w-100" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="col-lg-6 product_detail_b">
                    <h1 class="name" style="color: #fff;">
                        <?php echo $product['productName']; ?>
                    </h1>
                    <h2 class="price"><?php echo number_format($product['price'], 0, '.', '.'); ?>đ</h2>
                    <button class="btn btn-dark info"><?php echo $product['productOption']; ?></button>

                    <div class="card">
                        <div class="card-header">
                            Khuyến mãi
                        </div>
                        <div class="card-body">
                            <p>Giá và khuyến mãi dự kiến áp dụng đến 23:00 | 28/02</p>
                            <p>Mua kèm Macbook ưu đãi thêm (Tuỳ sản phẩm và không áp dụng khuyến mãi khác của sản phẩm mua kèm):</p>
                            <ul>
                                <li>Phụ kiện: Giảm đến 50% <a href="#">Click xem chi tiết</a></li>
                                <li>Apple Watch: Giảm đến 30% <a href="#">Click xem chi tiết</a></li>
                                <li>iPad: Giảm đến 25% <a href="#">Click xem chi tiết</a></li>
                            </ul>
                            <p>Nhập mã MOMO100K giảm 2% tối đa 100K khi thanh toán qua Ví Momo (<a href="#">click xem chi tiết</a>)</p>
                            <p>Nhập mã khuyến mãi giảm đến 100.000đ khi thanh toán qua VNPAY-QR cho hóa đơn từ 10 triệu (<a href="#">click để nhận mã khuyến mại</a>)</p>
                            <p>(*) Giá hoặc khuyến mãi không áp dụng trả góp lãi suất đặc biệt (0%, 0.5%, 1%)</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addToCart()"><strong>Mua hàng</strong></button>
                    <div class="btn_last">
                        <button type="button" class="btn btn-light"><strong>Trả góp qua công ty tài chính</strong></button>
                        <button type="button" class="btn btn-light"><strong>Trả góp qua thẻ</strong> </button>
                    </div>
                    <ul class="product-list">
                        <li><i class="fa fa-box"></i> Sách hướng dẫn, Thùng máy, Cáp ( Type C - sạc magsafe ), Sạc Laptop Apple ( 67W )</li>
                        <li><i class="fa fa-wrench"></i> Hư gì đổi nấy 12 tháng tại 3486 siêu thị trên toàn quốc <a href="#">Xem chi tiết chính sách bảo hành, đổi trả</a></li>
                        <li><i class="fa fa-shield"></i> Bảo hành chính hãng 1 năm</li>
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
                <div class="col-lg-12 product-info">

                    <div class="product-info-btn">
                        <button type="button" class="btn btn-outline-dark" id="description-button">Mô tả</button>
                        <!-- <button type="button" class="btn btn-outline-dark" id="specs-button">Thông số kỹ thuật</button> -->
                    </div>
                    <div id="img-product-info" class="product-info-img">
                        <?php foreach ($img_info as $key => $img) : ?>
                            <img src="<?php echo $img['url_info']; ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                    <div class="product-info-content" style="color: black;">
                        <div id="description-content">
                            <h4>Nội dung về tính năng</h4>
                            <p><?php echo $product['content']; ?></p>
                            <h4>Pháp lý</h4>
                            <p>Hiện có sẵn các lựa chọn để nâng cấp.
                                Thời lượng pin khác nhau tùy theo cách sử dụng và cấu hình. Truy cập apple.com/batteries để biết thêm thông tin.</p>
                        </div>
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
</script>
<?php include './PHP/footer.php'; ?>