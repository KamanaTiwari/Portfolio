<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">
  <?php

  if (isset($_POST['register'])) {

    $tittle = $_POST['title'];
    $description = $_POST['description'];
    
    

    if ($title != "" && $description != "") {
      $insert = "INSERT INTO users(title, description,)
VALUES('$tittle', '$description', )";
      $result = mysqli_query($con, $insert);

      if ($result) {
  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Skills are created</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
      } else {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Skillsis not created</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php?error\">";
      }
    } else {

      header("Refresh:0; URL=create.php?empty");
    }
  }

  ?>
  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Layouts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Multi Columns Form</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">title</label>
                <input type="text" class="form-control" name="text" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">description</label>
                <input type="description" class="form-control" name ="description" id="inputEmail5">
              </div>
              <div class="col-md-12">
                <button type="submit" name="register" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>