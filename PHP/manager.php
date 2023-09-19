<?php
include '../conn.php';
require './admin_header.php'
?>

<button id="scroll-to-top"><i class="fa-solid fa-arrow-up"></i></button>

<main style="min-height: 500px;">
  <div class="container p-5 bg-dark text-white text-center mt-5 mb-5" style="border-radius: 5px;">
    <h1>Chào mừng người quản trị!</h1>
    <p>Chúc bạn một ngày làm việc thật tốt.</p>
  </div>

  <div class="container text-center">
    <h2>Hãy chọn chức năng</h2>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12 card product" style="height: 100px;">
        <a href="./admin_product.php">
          <div class="card-info">
            <p class="text-title">Quản lý sản phẩm</p>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 card product" style="height: 100px;">
        <a href="./admin_customer.php">
          <div class="card-info">
            <p class="text-title">Quản lý khách hàng</p>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 card product" style="height: 100px;">
        <a href="./error.php">
          <div class="card-info">
            <p class="text-title">Quản lý đơn hàng</p>
          </div>
        </a>
      </div>
    </div>
  </div>

</main>

<!-- <div class="container mt-5">
    <div class="row">
      <div class="col-sm-8">
        <h3>Hiển thị tất cả sản phẩm.</h3>
        <div class="row">
          <div class="col-sm-1">
            <h5>STT</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['id_product'];
            }
            ?>
          </div>
          <div class="col-sm-3">
            <h5>Tên sản phẩm</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['productName'];
            }
            ?>
          </div>
          <div class="col-sm-1">
            <h5>Giá</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['price'];
            }
            ?>
          </div>
          <div class="col-sm-1">
            <h5>Loại</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['id_product'];
            }
            ?>
          </div>
          <div class="col-sm-1">
            <h5>Giảm</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['discount'];
            }
            ?>
          </div>
          <div class="col-sm-1">
            <h5>Ảnh</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['image_link'];
            }
            ?>
          </div>
          <div class="col-sm-2">
            <h5>Lựa chọn</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['productOption'];
            }
            ?>
          </div>
          <div class="col-sm-2">
            <h5>Ghi chú</h5>
            <?php
            include './conn.php';
            $sql = "SELECT * FROM product";
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
              echo "<br>" . $row['content'] . "<br>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <h3>Quản lý sản phẩm</h3>

        <?php include '../PHP/add_product.php'; ?>

      </div>
    </div>
  </div> -->
<?php include './footer.php'; ?>
</body>

</html>