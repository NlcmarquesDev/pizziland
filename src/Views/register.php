<?php include 'src/Views/partials/header.php'; ?>

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <?php include 'src/Views/partials/navbar.php'; ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/pizzawinkel_app/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">register</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->


<div class=" px-4 py-5 my-auto">
    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h4 class="text-body-secondary fst-italic fw-bold">"Join the Family! Taste the Difference with Every Slice."</h4>
        </div>

        <div class="col">
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal">Please Sign in</h1>
                <form method="POST" action="/pizzawinkel_app/register.php">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="form-floating  col">
                            <input type="text" name="firstname" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                            <label class="ps-4" for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" name="lastname" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                            <label class="ps-4" for="floatingInput">Last Name</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" name="adress" class="form-control" id="floatingInput" placeholder="adress" required>
                            <label class="ps-4" for="floatingInput">Adress</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" name="city" class="form-control" id="floatingInput" placeholder="city" required>
                            <label class="ps-4" for="floatingInput">City</label>
                        </div>
                        <div class="form-floating col">
                            <input type="number" name="postcode" class="form-control" id="floatingInput" placeholder="postcode" required>
                            <label class="ps-4" for="floatingInput">Postcode</label>
                        </div>
                        <div class="form-floating col ">
                            <input type="number" name="phone" class="form-control" id="floatingInput" placeholder="Phone number " maxlength="10" required>
                            <label class="ps-4" for="floatingInput">Phone number ex. 0444 00 00 00</label>
                        </div>
                        <div class="form-check form-switch mx-auto mb-4">
                            <input class="form-check-input check-register" name="role" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            <label class="form-check-label" for="flexSwitchCheckChecked">I want to create a new account</label>
                        </div>
                    </div>
                    <div class="check-user-database d-none mb-4">
                        <div class="form-floating ">
                            <input type="email" class="form-control mb-3 input-email" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating ">
                            <input type="password" class="form-control mb-3 input-pass" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['errors'])) : ?>
                        <div class="alert alert-danger fw-light fs-6 " role="alert">
                            <?= $_SESSION['errors'] ?>
                        </div>
                    <?php endif ?>
                    <button class="btn btn-primary w-100 py-2 btn-register" type="submit">Go to Checkout</button>
                </form>
            </main>
        </div>
    </div>
</div>


<!-- Footer Start -->
<?php
unset($_SESSION['errors']);
include 'src/Views/partials/footer.php'; ?>