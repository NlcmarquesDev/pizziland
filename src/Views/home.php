<?php include 'src/Views/partials/header.php'; ?>
<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <?php
    include 'src/Views/partials/navbar.php';
    ?>


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
<?php if (isset($_SESSION['alertLogin'])) : ?>
    <div class="alert alert-success container">
        <?= $_SESSION['alertLogin'] ?>
    </div>
<?php endif; ?>
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
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php foreach ($allBestPizzas as $pizza) : ?>
                            <div class="col-lg-5">
                                <a type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $pizza['pizza_id'] ?>">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="src/assets/img/menu-3.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                                <span><?= $pizza['pizza_name'] ?></span>
                                                <div class="d-flex justify-content-center align-items-center gap-3">
                                                    <span class="text-primary">&euro;<?= $pizza['pizza_price'] ?></span>
                                                </div>
                                            </h5>
                                            <small class="fst-italic"><?= $pizza['pizza_description'] ?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $pizza['pizza_id'] ?>">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $pizza['pizza_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="/pizzawinkel_app/cart.php" method="POST">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pizza <?= $pizza['pizza_name'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <div class="d-flex ">
                                                    <img class=" img-fluid rounded-circle ms-3 me-5 " src="src/assets/img/<?= $pizza['pizza_image'] ?>" alt="" style="min-width: 180px;">
                                                    <div>
                                                        <p>
                                                            <b>Description:</b> <?= $pizza['pizza_description'] ?>
                                                        </p>
                                                        <p><b>Price: </b> &euro;<?= $pizza['pizza_price'] ?></p>
                                                        <p><b>Alergies: </b> <?= $pizza['pizza_alergies'] ?></p>
                                                        <p><b>Size:</b></p>
                                                        <select name="size" id="">
                                                            <option value="small">small </option>
                                                            <option value="medium">Medium +10%</option>
                                                            <option value="large">Large +15%</option>
                                                            <option value="xl">Extra Large +20%</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="hidden" name="pizza_id" value="<?= $pizza['pizza_id'] ?>">
                                                <input type="hidden" name="pizza_name" value="<?= $pizza['pizza_name'] ?>">
                                                <input type="hidden" name="pizza_description" value="<?= $pizza['pizza_description'] ?>">
                                                <input type="hidden" name="pizza_price" value="<?= $pizza['pizza_price'] ?>">
                                                <input type="hidden" name="pizza_image" value="<?= $pizza['pizza_image'] ?>">
                                                <button type="submit" class="btn btn-primary">Add to cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
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
<?php
unset($_SESSION['alertLogin']);
include 'src/Views/partials/footer.php'; ?>