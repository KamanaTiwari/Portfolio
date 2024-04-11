
<?php  
require('includes/header.php');
?>

<?php  
require('includes/navbar.php');
?>
<?php

$hero= "SELECT *FROM files";
$result=mysqli_query($con, $hero);
$hero_data= $result->fetch_assoc();

?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url('admin/uploads/<?php echo $hero_data['img_link'] ;?>') top right;" class="w-100" >
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1><?php echo $hero_data['title']; ?></h1>
      <h2><?php echo $hero_data['description']; ?></h2>
      <a href="about.html" class="btn-about">About Me</a>
    </div>
  </section><!-- End Hero -->

  <?php  
require('includes/footer.php');
?>
