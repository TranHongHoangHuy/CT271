<?php
include '../conn.php';

$customers = $pdo->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
require './admin_header.php'
?>
<style>
    main {
        min-height: 700px;
        background-image: url("../ASSETS/IMG/Website-Building-Landscape.jpg");
        background-size: cover;
        background-position: center;
        opacity: 0.5;
    }

    .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 1px 1px black;
    }
</style>
<main>
    <div class="center d-flex align-items-center justify-content-center">
        <p>Tính năng đang xây dựng, vui lòng quay lại sau</p>
    </div>
</main>


<?php include './footer.php'; ?>