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



            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="input1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <!-- Modal trigger button -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">
                  Choose Image
                </button>

                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                          Choose Image
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <?php

                          $select = 'SELECT *FROM files';
                          $result = mysqli_query($con, $select);
                          $i = 1;
                          while ($data = $result->fetch_assoc()) {
                          ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <img src="../uploads/<?php echo $data['img_link']; ?>" name="img_link" class="w-100" alt="">
                          </div>
                          <?php
                          }

                          ?>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <button type="button" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Optional: Place to the bottom of scripts -->
                <script>
                  const myModal = new bootstrap.Modal(
                    document.getElementById("modalId"),
                    options,
                  );
                </script>

                <label for="input1" class="form-label">Image</label>
                <input type="text" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp">
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