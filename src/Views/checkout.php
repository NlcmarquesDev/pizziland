<?php
var_dump($_SESSION['client']);
var_dump($_SESSION['alert']);
die();

include 'src/Views/partials/header.php'; ?>

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <?php include 'src/Views/partials/navbar.php'; ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pizza Name</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/pizzawinkel_app/menu.php">All Pizzas</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">pizza name</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->



<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Pizzas</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <h1>This is the singel pizza page for pizza id = <?= $pizzaId ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

<!-- Footer Start -->
<?php include 'src/Views/partials/footer.php'; ?>