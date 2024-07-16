<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Pizziland</h1>
        <!-- <img src="src/assets/img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="menu.php" class="nav-item nav-link">Menu</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>
        <?php
        if (isset($_SESSION['client'])) : ?>
            <a href="/pizzawinkel_app/checkout.php" class="btn btn-primary py-1 px-2 me-3">Checkout</a>
            <a href="/pizzawinkel_app/logout.php" class="btn btn-primary py-1 px-2 me-3"><i class="bi bi-box-arrow-right"></i></a>
        <?php else : ?>
            <a href="/pizzawinkel_app/login.php" class="btn btn-primary py-1 px-2 me-3">SignUp</a>
            <a href="/pizzawinkel_app/register.php" class="btn btn-primary py-1 px-2 me-3">Register</a>
        <?php endif ?>


        <a class="btn btn-primary position-relative py-1 px-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="bi bi-bag"></i>
            <?php
            if (isset($_SESSION['cart'])) : ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo count($_SESSION['cart']); ?>
                </span>
            <?php endif; ?>


        </a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Your Order <span class="bg-primary rounded-circle px-2 text-white "><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <main>
                        <ul class="products text-decoration-none p-0">
                            <?php
                            if (isset($_SESSION['cart'])) : ?>
                                <?php foreach ($_SESSION['cart'] as $key => $pizza) :  ?>
                                    <hr class="mx-3">
                                    <li class="d-flex justify-content-between my-2">
                                        <a href="#" class="product-link">
                                            <div class="d-flex gap-2">
                                                <img src="src/assets/img/<?php echo $pizza['pizza_image']; ?>" class="rounded-circle" alt="Pizza <?php echo $pizza['pizza_name']; ?>">
                                                <div class="my-auto">
                                                    <h6><?php echo $pizza['pizza_name']; ?> - <?php echo $pizza['pizza_size']; ?></h6>
                                                    <span class="qty d-flex gap-2">
                                                        <label for="">Quantity: </label>
                                                        <input class="w-25 border border-opacity-10" type="number" name="qty" id="" value="<?php echo $pizza['pizza_quantity']; ?>">
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="d-flex flex-column align-items-end gap-2  ">
                                            <form action="/pizzawinkel_app/delete-pizza.php" method="POST">
                                                <input type="hidden" name="delete" value="<?= $key ?>">
                                                <button class=" btn btn-outline-danger border-0"><i class="bi bi-trash"></i></button>
                                            </form>
                                            <!-- <a href="#remove" class="remove-button"><i class="bi bi-trash"></i></a> -->
                                            <div class="fs-5">&euro;<?php echo $pizza['pizza_price']; ?></div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                            <?php else : ?>
                                <h4>Your cart is empty</h4>

                                <div>
                                    <a class="btn btn-primary w-100 m-0 mt-5" href="/pizzawinkel_app/menu.php">Menu</a>
                                </div>
                            <?php endif; ?>
                        </ul>
                    </main>
                </div>
            </div>
            <hr>
            <div class="totals">
                <div class="subtotal px-3 pb-3">
                    <span class="label"><b>Subtotal:</b></span> <span class="amount">&euro;<?php echo isset($_SESSION['total_cart']) ? $_SESSION['total_cart'] : 0 ?></span>
                </div>
                <div class="action-buttons">
                    <?php
                    if (isset($checkoutForm) && $checkoutForm) : ?>
                        <a class="btn btn-primary w-100 m-0" href="/pizzawinkel_app/checkout.php">Checkout</a>
                    <?php else : ?>
                        <a class="btn btn-primary w-100 m-0" href="/pizzawinkel_app/register.php">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php // if (isset($_SESSION['orderPlaced'])) : 
        ?>
        <a href="/pizzawinkel_app/delivery.php" class="btn btn-primary py-1 px-2 ms-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scooter" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M9 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-.39l1.4 7a2.5 2.5 0 1 1-.98.195l-.189-.938-2.43 3.527A.5.5 0 0 1 9.5 13H4.95a2.5 2.5 0 1 1 0-1h4.287l2.831-4.11L11.09 3H9.5a.5.5 0 0 1-.5-.5M3.915 12a1.5 1.5 0 1 0 0 1H2.5a.5.5 0 0 1 0-1zm8.817-.789A1.499 1.499 0 0 0 13.5 14a1.5 1.5 0 0 0 .213-2.985l.277 1.387a.5.5 0 0 1-.98.196z" />
            </svg>
        </a>
        <?php // endif 
        ?>
    </div>
</nav>