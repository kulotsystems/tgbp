<?php
    // check if order form was submitted
    if(!isset($_POST['checkout'])) {
        // if not, redirect to 'order.php'
        header('location: order.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - TGBP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
</head>
<body>

    <?php
        const PAGE = 'invoice';
        require_once 'partials/navbar.php';

        // prepare item prices (per kilogram)
        $item_prices = [
            'Turingan'   => 260,
            'Galunggong' => 180,
            'Bangus'     => 175,
            'Pusit'      => 480
        ];

        // prepare mode prices
        $mode_prices = [
            'Pickup'   => 0,
            'Delivery' => 20
        ];

        // prepare preparation prices
        $preparation_prices = [
            'Kinuskosan' => 10,
            'Binadi'     => 15,
            'Chopped'    => 5
        ];


        // get form inputs
        $full_name    = strip_tags($_POST['full-name']);
        $address      = strip_tags($_POST['address']);
        $mode         = $_POST['mode'];
        $item         = $_POST['item'];
        $kilograms    = intval($_POST['kilograms']);
        $preparations = [];
        if(isset($_POST['preparations']))
            $preparations = $_POST['preparations'];


        // compute
        $price      = $item_prices[$item];
        $item_price = $price * $kilograms;
        $mode_price = $mode_prices[$mode];
        $preparations_price = 0;
        foreach ($preparations as $preparation) {
            $preparations_price += $preparation_prices[$preparation];
        }
        $invoice_total = $item_price + $mode_price + $preparations_price;
    ?>

    <div class="container mt-3">
        <div class="mb-4">
            <h2>Invoice</h2>
            <p>
                Thank you for ordering
                <b class="text-secondary"><i><?= $full_name ?></i></b> of
                <b class="text-secondary"><i><?= $address ?></i>.</b>
                Please review your order details below:
            </p>
        </div>

        <!-- Invoice -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2"></th>
                    <th class="text-center">Charge</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Mode</th>
                    <td><?= $mode ?></td>
                    <td align="right"><?= number_format($mode_price, 2) ?></td>
                </tr>
                <tr>
                    <th>Item</th>
                    <td><?= $item ?> (<b><?= $price ?></b> per kg.)</td>
                    <td rowspan="2" class="align-middle" align="right"><?= number_format($item_price, 2) ?></td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td><b><?= $kilograms ?></b> kg.</td>
                </tr>
                <?php
                    for($i=0; $i<sizeof($preparations); $i++) {
                        $preparation = $preparations[$i];
                ?>
                        <tr>
                            <?php if($i === 0) { ?>
                                <th rowspan="<?= sizeof($preparations) ?>">Preparations</th>
                            <?php } ?>
                            <td><?= $preparation ?></td>
                            <td align="right"><?= number_format($preparation_prices[$preparation], 2) ?></td>
                        </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="table-warning">
                    <th colspan="2" class="py-3">TOTAL</th>
                    <td align="right" class="py-3"><b><?= number_format($invoice_total, 2) ?></b></td>
                </tr>
            </tfoot>
        </table>

        <!-- Payment -->
        <div class="row pt-3">
            <div class="col-sm-6 offset-sm-6">
                <form method="POST" action="receipt.php">
                    <label class="form-label text-secondary fw-bold" for="payment">How much will you pay?</label>
                    <div class="input-group input-group-lg mb-3">
                        <input type="number" class="form-control" id="payment" name="payment" required>
                        <button class="btn btn-outline-secondary" type="submit" name="pay">Pay</button>
                    </div>

                    <!-- Hidden Fields -->
                    <input type="hidden" name="full-name" value="<?= $full_name ?>">
                    <input type="hidden" name="address" value="<?= $address ?>">
                    <input type="hidden" name="mode" value="<?= $mode ?>">
                    <input type="hidden" name="mode_price" value="<?= $mode_price ?>">
                    <input type="hidden" name="item" value="<?= $item ?>">
                    <input type="hidden" name="price" value="<?= $price ?>">
                    <input type="hidden" name="kilogram" value="<?= $kilograms ?>">
                    <?php foreach ($preparations as $preparation) { ?>
                        <input type="hidden" name="preparations[]" value="<?= $preparation ?>">
                        <input type="hidden" name="preparation_prices[]" value="<?= $preparation_prices[$preparation] ?>">
                    <?php } ?>
                    <input type="hidden" name="invoice-total" value="<?= $invoice_total ?>">
                </form>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>