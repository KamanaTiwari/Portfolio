<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage skills</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Skills</li>
        <li class="breadcrumb-item active">Manage Skills</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Skills</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    <b>N</b>ame
                  </th>
                  <th>Ext.</th>
                  <th>City</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                  <th>Completion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Unity Pugh</td>
                  <td>9958</td>
                  <td>Curicó</td>
                  <td>2005/02/11</td>
                  <td>37%</td>
                </tr>
                <tr>
                  <td>Zelenia Roman</td>
                  <td>7516</td>
                  <td>Redwater</td>
                  <td>2012/03/03</td>
                  <td>31%</td>
                </tr>
                <?php

                $select = 'SELECT * FROM files';
                $result = mysqli_query($con, $select);
                $i = 1;

                while ($data = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['description']; ?></td>
                    <td><img src="../uploads/<?php echo $data['img_link'] ?>" alt="" width="100" height="100"></td>
                    <td>
                      <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit </a>
                      <a class="btn btn-danger btn-sm " onclick="return confirm('Do you want to delete this user??');" href="delete.php?id=<?php echo $data['id']; ?>" role="button">Delete </a>
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