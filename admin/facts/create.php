<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

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


            <?php

            if (isset($_POST['submit'])) {

                  // Form data retrieval
                  $number = $_POST['number'];
                  $filename = $_FILES['dataFile']['name'];
                  $filesize = $_FILES['dataFile']['size'];
                  $explode = explode('.', $filename);
                  $file = strtolower($explode[0]);
                  $ext = strtolower($explode[1]);
                  $finalname = $file . time() . '.' . $ext;
                  $description = $_POST['description'];
              
                  // Validation
                  if ($number != "" && $description != "" ) {
                      if ($filesize > 20000) { // File size validation (in bytes)
                          if ($ext == "png" || $ext == "jpg" || $ext == "jpeg") { // File extension validation
                              // File upload
                              if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                                  // Database insertion
                                  $insert = "INSERT INTO files(number, description)  
                                      VALUES ('$title', '$finalname', '$ext', '$description')";
                                  $result = mysqli_query($con, $insert);
                                  if ($result) {
                                      echo "Facts have been submitted successfully.";
                                      // Redirect to index.php after 2 seconds
                                      echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                  } else {
                                      echo "Facts could not be submitted to the database.";
                                  }
                              } else {
                                  echo "File could not be uploaded.";
                              }
                          } else {
                              echo "File extension must be png, jpg, or jpeg.";
                          }
                      } else {
                          echo "File size must be less than 20KB.";
                      }
                  } else {
                      echo "All fields are required.";
                  }
              
                  // Close database connection
                  mysqli_close($con);
              }
              
              

            ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="input1" class="form-label">Number</label>
                <input type="number" class="form-control" name="title" id="input1" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
              </div>


              <button type="submit" class="btn btn-danger btn-sm" name="submit">Submit</button>
              <span> Have already an account <a href="index.php"> Login</a></span>

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>