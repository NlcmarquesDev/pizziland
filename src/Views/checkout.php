<?php include 'src/Views/partials/header.php'; ?>

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <?php include 'src/Views/partials/navbar.php'; ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
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
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php foreach ($_SESSION['cart'] as $key => $pizza) :  ?>
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0"><?= $pizza['pizza_name'] ?></h6>
                                        <small class="text-body-secondary">Size: <?= $pizza['pizza_size'] ?> </small>
                                        <br>
                                        <small class="text-body-secondary">Quantity: <?= $pizza['pizza_quantity'] ?></small>
                                    </div>
                                    <span class="text-body-secondary">&euro;<?= $pizza['pizza_price'] ?></span>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (Euro)</span>
                            <strong>&euro;<?php echo isset($_SESSION['total_cart']) ? $_SESSION['total_cart'] : 0 ?></strong>
                        </li>
                    </ul>

                    <form class="card p-2" action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Insert</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" value="<?= $userdata['first_name'] ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" value="<?= $userdata['last_name'] ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="username" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="adress" value="<?= isset($userdata['email']) ? $userdata['email'] : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Phone number</label>
                                <input type="text" class="form-control" id="address" value="+32 <?= $userdata['phone_number'] ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" value="<?= $userdata['adress'] ?>" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="zip" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" value="<?= $userLocation['city'] ?>" required>
                            </div>

                            <div class="col-sm-3">
                                <label for="zip" class="form-label">Postcode</label>
                                <input type="text" class="form-control" id="zip" placeholder="" value="<?= $userLocation['postcode_number'] ?>" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label" for="credit">Payconiq</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="debit">Debit Card</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                        <!--
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-body-secondary">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div> -->

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Place your Order</button>
                    </form>
                </div>
            </div>
        </main>

    </div>
</div>
<!-- Menu End -->

<!-- Footer Start -->
<?php include 'src/Views/partials/footer.php'; ?>