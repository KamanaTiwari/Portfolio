<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage Files</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Files</li>
        <li class="breadcrumb-item active">Manage Files</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Files</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $select = 'SELECT *FROM files';
                $result = mysqli_query($con, $select);
$i=1;
                while ($data = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['title'] ;?></td>
                    <td><?php echo $data['description'] ;?></td>
                    <td><img src="../uploads/<?php echo $data['img_link'] ?>" alt="" width="100" height="100"></td>
                    <td>
                      <a class="btn btn-primary btn-sm " href="#" role="button">Edit </a>
                      <a class="btn btn-danger btn-sm " href="#" role="button">Delete </a>
                    </td>
                  </tr>
                <?php
                }

                ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require('../includes/footer.php'); ?>