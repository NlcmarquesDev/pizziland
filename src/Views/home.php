<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <?php include 'src/Views/partials/navbar.php'; ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <a href="/pizzawinkel_app/menu.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Choose your pizza</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="src/assets/img/pizza-home.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Service Start -->
<?php include 'src/Views/partials/servicesCards.php'; ?>
<!-- Service End -->

<!-- About Start -->
<?php include 'src/Views/partials/about.php'; ?>
<!-- About End -->


<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Pizzas</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <!-- <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Popular</small>
                            <h6 class="mt-n1 mb-0">Breakfast</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Special</small>
                            <h6 class="mt-n1 mb-0">Launch</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Lovely</small>
                            <h6 class="mt-n1 mb-0">Dinner</h6>
                        </div>
                    </a>
                </li>
            </ul> -->
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php foreach ($allBestPizzas as $pizza) : ?>
                            <div class="col-lg-6">
                                <a href="/pizzawinkel_app/single-pizza.php?id=<?= $pizza['pizza_id'] ?>">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="src/assets/img/menu-3.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?= $pizza['pizza_name'] ?></span>
                                                <span class="text-primary">&euro;<?= $pizza['pizza_price'] ?></span>
                                            </h5>
                                            <small class="fst-italic"><?= $pizza['pizza_description'] ?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->


<!-- Reservation Start -->
<?php include 'src/Views/partials/reservation.php'; ?>
<!-- Reservation Start -->

<!-- Team Start -->
<?php include 'src/Views/partials/team.php'; ?>
<!-- Team End -->

<!-- Testimonial Start -->
<?php include 'src/Views/partials/testimonials.php'; ?>
<!-- Testimonial End -->

<!-- Footer Start -->
<?php include 'src/Views/partials/footer.php'; ?>