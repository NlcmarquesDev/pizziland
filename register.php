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
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <main class="form-signin w-100 m-auto">
                    <form method="POST" action="/notes_app_php/register">
                        <h1 class="h3 mb-3 fw-normal">Please Sign in</h1>
                        <div class="form-floating">
                            <input type="text" name="firstname" class="form-control mb-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="lastname" class="form-control mb-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Last Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control mb-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control mb-3" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <?php if (isset($_SESSION['errors'])) : ?>
                            <div class="alert alert-danger fw-light fs-6 " role="alert">
                                <?= $_SESSION['errors'] ?>
                            </div>
                        <?php endif  ?>
                        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

                    </form>
                </main>
            </div>
        </div>
    </div>
</div>


<!-- Footer Start -->
<?php include 'src/Views/partials/footer.php'; ?>