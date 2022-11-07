    <?php if(!defined('PAGE')) exit(); ?>

    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">TGBP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link<?= PAGE === 'home' ? ' active' : '' ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= PAGE === 'order' || PAGE === 'invoice' || PAGE === 'receipt' ? ' active' : '' ?>" href="order.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= PAGE === 'contact' ? ' active' : '' ?>" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
