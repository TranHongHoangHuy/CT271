<?php

include '../conn.php';

// Xử lý form đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lấy giá trị nhập từ form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Truy vấn bảng user để kiểm tra thông tin đăng nhập
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE username = ? AND password = ?");
  $stmt->execute([$username, $password]);
  $count = $stmt->fetchColumn();

  if ($count > 0) {
    // Lưu session nếu thông tin đăng nhập đúng
    $_SESSION['admin'] = $username;

    // Chuyển hướng đến trang quan ly
    header('Location: ./manager.php');
    // exit;
  } else {
    // Hiển thị thông báo nếu thông tin đăng nhập sai
    echo "<script>alert('Bạn đã nhập sai thông tin đăng nhập');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="../ASSETS/CSS/style-admin.css">

</head>

<body>

  <div class="page">
    <div class="container">
      <div class="left">
        <div class="login">Đăng nhập</div>
        <div class="eula">Trang quản lý của webshop<br>admin<br></div>
        <div class="text-center"><a href="../index.php" style="text-decoration: none; ">Trở về trang chủ</a></div>
      </div>
      <div class="right">
        <svg viewBox="0 0 320 300">
          <defs>
            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
              <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
              <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
            </linearGradient>
          </defs>
          <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
        </svg>
        <div class="form">
          <form action="admin.php" method="post">

            <label for="uname"><b>Tên đăng nhập</b></label>
            <input type="text" placeholder="Nhập tên đăng nhập" name="username" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" required>

            <button class="btn btn-outline-primary mt-2" type="submit" style="height: 50px;">Đăng nhập</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <script language="javascript" src="../JS/script.js"></script>
</body>

</html>