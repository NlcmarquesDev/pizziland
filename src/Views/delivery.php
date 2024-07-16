<?php
include 'src/Views/partials/header.php'; ?>

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
  <?php include 'src/Views/partials/navbar.php'; ?>

  <div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
      <h1 class="display-3 text-white mb-3 animated slideInDown">Delivery Order</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item"><a href="/pizzawinkel_app/index.php">Home</a></li>
          <li class="breadcrumb-item text-white active" aria-current="page">Delivery</li>
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
        <div class="col-md-7 col-lg-12">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" action="/pizzawinkel_app/order.php" method="POST" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Name</label>
                <input type="text" class="form-control" name="firstName" value="<?= $userdata['first_name'] ?>" disabled>
              </div>
              <div class="col-sm-6">
                <label for="username" class="form-label">Email</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" name="email" value="<?= isset($userdata['email']) ? $userdata['email'] : '' ?>" disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <label for="address" class="form-label">Phone number +32</label>
                <input type="text" class="form-control" name="phoneNumber" value="<?= $userdata['phone_number'] ?>" disabled>
              </div>
              <div class="col-sm-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="<?= $userdata['adress'] ?>" disabled>
              </div>
              <div class="col-sm-3">
                <label for="zip" class="form-label">City</label>
                <input type="text" class="form-control" name="city" value="<?= $userLocation['city'] ?>" disabled>
              </div>

              <div class="col-sm-3">
                <label for="zip" class="form-label">Postcode</label>
                <input type="text" class="form-control" name="postcode" placeholder="" value="<?= $userLocation['postcode_number'] ?>" disabled>
              </div>
            </div>

            <hr class="my-4">
            <h4 class="mb-3">Orders</h4>
            <div class="my-3">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Order Number</th>
                    <th scope="col">Pizza</th>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" value="payconiq" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Payconiq</label>
              </div>
            </div>

            <hr class="my-4">
            <?php if (isset($_SESSION['error-postcode'])) : ?>
              <div class="alert alert-danger">
                <?= $_SESSION['error-postcode'] ?>
              </div>
            <?php endif ?>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Deliveried</button>
          </form>
        </div>
      </div>
    </main>

  </div>
</div>
<!-- Menu End -->

<!-- Footer Start -->
<?php

unset($_SESSION['promo-alert']);
unset($_SESSION['error-postcode']);
include 'src/Views/partials/footer.php'; ?>