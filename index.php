<?php
include './conn.php';
require './PHP/header.php';
// include '../PHP/check_login.php';

// if (!isset($_SESSION['username'])) {
//     header("Location: ../login.php");
//     exit();
// }
$products = $pdo->query("SELECT * FROM product WHERE id_catalog = 1 ORDER BY RAND()")->fetchAll(PDO::FETCH_ASSOC);
?>


<main>

    <div class="container">

        <!-- Slide -->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="../ASSETS/IMG/slide/IMAC-MACMINI-2400-600-1920x480.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../ASSETS/IMG/slide/Mac-2400-600-1920x480.jpg" class="d-block w-100" alt="...">
                </div>
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
        <!-- Logo
        <div class="brand">
            <i class="fa-brands fa-apple"></i>
            <span>Mac</span>
        </div> -->
        <!-- Product -->
        <div class="text-center">
            <div id="gallery" class="row">
                <?php foreach ($products as $product) { ?>
                    <div class="col-lg-2 col-md-3 col-sm-6 card product">
                        <a href="product.php?id_product=<?php echo $product['id_product']; ?>">
                            <div class="card-img">
                                <img src="<?php echo $product['image_link']; ?>" alt="">
                            </div>
                        </a>
                        <div class="card-info">
                            <p class="text-title productTitle"><?php echo $product['productName']; ?></p>

                        </div>
                        <div class="card-footer">
                            <span class="text-title"><?php echo number_format($product['price'], 0, '.', '.'); ?>đ</span>
                            <div class="card-button" onclick="getInfo(this)">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    <div class="modal" id="alertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn chỉ được đặt một sản phẩm.Một cái được rồi, nhiều quá nghèo đó!!!!
                </div>
            </div>
        </div>
    </div>


</main>

<script>
    //Get product infomation
    var products = [];

    function getInfo(cardButton) {
        var card = cardButton.closest(".card");
        var img = card.querySelector(".card-img img");
        var src = img.getAttribute("src");

        var title = card.querySelector(".card-info .text-title").textContent;
        var body = card.querySelector(".card-info .text-body").textContent;

        var price = card.querySelector(".card-footer .text-title").textContent;

        var info = [src, title, body, price];

        //thêm vào localStorage
        var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        cartItems.push(info);
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        //Hiển thị modal
        $('#successModal').modal('show');

        // Ẩn modal
        setTimeout(function() {
            $('#successModal').modal('hide');
        }, 1500);

        // // Kiểm tra trùng lặp
        // var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        // var isDuplicate = false;
        // for (var i = 0; i < cartItems.length; i++) {
        //     if (JSON.stringify(cartItems[i]) === JSON.stringify(info)) {
        //         isDuplicate = true;
        //         break;
        //     }
        // }
        // if (isDuplicate) {
        //     $('#alertModal').modal('show');

        //     // Ẩn modal
        //     setTimeout(function() {
        //         $('#alertModal').modal('hide');
        //     }, 1500);
        // } else {
        //     // Thêm vào Local Storage
        //     cartItems.push(info);
        //     localStorage.setItem("cartItems", JSON.stringify(cartItems));
        //     $('#successModal').modal('show');

        //     // Ẩn modal
        //     setTimeout(function() {
        //         $('#successModal').modal('hide');
        //     }, 1500);
        // }
    }

    // JavaScript để cắt văn bản và thêm dấu "..."
    var titleElements = document.getElementsByClassName("productTitle");
    var maxLength = 35; // Độ dài tối đa
    for (var i = 0; i < titleElements.length; i++) {
        var titleElement = titleElements[i];
        var titleText = titleElement.innerText;

        if (titleText.length > maxLength) {
            titleElement.innerText = titleText.substring(0, maxLength) + "...";
        }
    }
</script>





<?php include './PHP/footer.php'; ?>