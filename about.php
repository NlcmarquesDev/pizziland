<?php include 'src/Views/partials/header.php'; ?>

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
  <?php include 'src/Views/partials/navbar.php'; ?>

  <div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
      <h1 class="display-3 text-white mb-3 animated slideInDown">
        About Us
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item"><a href="/pizzawinkel_app/">Home</a></li>
          <li class="breadcrumb-item text-white active" aria-current="page">
            About
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Navbar & Hero End -->

<!-- About Start -->

<?php include 'src/Views/partials/about.php'; ?>
<!-- About End -->

<!-- Team Start -->

<?php include 'src/Views/partials/team.php'; ?>
<!-- Team End -->

<!-- Footer Start -->
<?php include 'src/Views/partials/footer.php'; ?>