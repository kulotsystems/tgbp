<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order - TGBP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
</head>
<body>

    <?php
        const PAGE = 'order';
        require_once 'partials/navbar.php';
    ?>

    <div class="container mt-3">
        <div class="mb-4">
            <h2>Order</h2>
            <p>Bakal na kamo... Sana ol!</p>
        </div>

        <form method="POST" action="invoice.php">
            <!-- Full Name -->
            <div class="mb-3">
                <label class="text-secondary fw-bold" for="full-name">Full Name:</label>
                <input type="text" class="form-control" id="full-name" name="full-name" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="text-secondary fw-bold" for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <!-- Mode -->
            <div class="mb-3">
                <label class="text-secondary fw-bold">Mode:</label>
                <br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="male" name="mode" value="Pickup" checked>
                    <label for="male" class="form-check-label">Pickup</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="female" name="mode" value="Delivery">
                    <label for="female" class="form-check-label">Delivery</label>
                </div>
            </div>

            <!-- Item and Weight -->
            <div class="mb-3">
                <div class="row">
                    <!-- Item -->
                    <div class="col-sm-6">
                        <label class="text-secondary fw-bold" for="civil-status">Item:</label>
                        <select class="form-control" id="item" name="item">
                            <option value="Turingan">Turingan</option>
                            <option value="Galunggong">Galunggong</option>
                            <option value="Bangus">Bangus</option>
                            <option value="Pusit">Pusit</option>
                        </select>
                    </div>

                    <!-- Kilograms -->
                    <div class="col-sm-6">
                        <label class="text-secondary fw-bold" for="full-name">Kilograms:</label>
                        <input type="number" class="form-control" id="kilograms" name="kilograms" value="1" min="1" max="20">
                    </div>
                </div>

            </div>

            <!-- Preparation -->
            <div class="mb-3">
                <label class="text-secondary fw-bold">Preparation:</label>
                <br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="piolo" name="preparations[]" value="Kinuskosan">
                    <label for="piolo" class="form-check-label">Kinuskosan</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="liza" name="preparations[]" value="Binadi">
                    <label for="liza" class="form-check-label">Binadi</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="daniel" name="preparations[]" value="Chopped">
                    <label for="daniel" class="form-check-label">Chopped</label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mb-3 pt-2">
                <button type="submit" class="btn btn-secondary btn-lg" name="checkout">Checkout</button>
            </div>
        </form>
    </div>



    <!-- Bootstrap JS -->
    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>