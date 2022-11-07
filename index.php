<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - TGBP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
</head>
<body>

    <?php
        const PAGE = 'home';
        require_once 'partials/navbar.php';
    ?>

    <div class="container mt-3">
        <div class="mb-4">
            <h2>Home</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At debitis esse facilis, fuga in officia perferendis quaerat recusandae rem sint.</p>
        </div>


        <!-- Order Now Link -->
        <div class="mt-4">
            <a href="order.php" class="btn btn-outline-secondary btn-lg">Order Now</a>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>