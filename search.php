<?php
include './conn.php';
require './PHP/header.php';


if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Truy vấn SQL để lấy ra sản phẩm dựa trên từ khoá
    $query = "SELECT * FROM product WHERE productName LIKE :keyword OR productCode LIKE :keywordCode OR author LIKE :keywordAuthor OR ISBN LIKE :keywordISBN";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
    $stmt->bindValue(':keywordCode', $keyword . '%', PDO::PARAM_STR);
    $stmt->bindValue(':keywordAuthor', '%' . $keyword . '%', PDO::PARAM_STR);
    $stmt->bindValue(':keywordISBN', $keyword . '%', PDO::PARAM_STR);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- // Hiển thị kết quả tìm kiếm -->
    <main>
        <div class="container">

            <!-- Product -->
            <div class="text-center">
                <div>
                    <h1 class='text-search-result'>KẾT QUẢ TÌM KIẾM: <?php echo $keyword; ?></h1>
                </div>
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
    </main>

    <script>
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
<?php
}
?>