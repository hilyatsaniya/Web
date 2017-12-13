<?php 
$this->load->library('session');
 ?>
<!DOCTYPE html>
 
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Bed Time Stories</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" />
  </head>
  <body style="background-image: url(<?php echo base_url()."assets/pict/Background.jpg"?>);" >     
<!--Header-->
  <div class="header">
<h1 style="color: Black">  Kid's Story</h1>
  </div>

  <div class="navbar">
        <a class="left" href="<?php echo base_url();?>index.php/Home">Home</a>
        <a class="left" href="<?php echo base_url();?>index.php/Home/show_all">Indeks</a>
        <?php if(isset($_SESSION['username'])&&$_SESSION['username']=='admin'):?>
        <a class="left" href="<?php echo base_url();?>index.php/Home/Upload">Upload</a>
      <?php endif ?>
          <?php if (isset($_SESSION['username'])): ?>
         
          <a class="right" href="#"><?php echo " ".$_SESSION['username']." "; ?></a>
           <a class="right" href="<?php echo base_url();?>index.php/Home/Logout">Logout</a>
           <?php else: ?>
        <a class="right" href="<?php echo base_url();?>index.php/Home/user_login">Login</a>
        <a class="right" href="<?php echo base_url();?>index.php/Home/user_registration">Register</a>
      <?php endif ?>
   <!--     <a class="right" href="#">
          <form>
            <input type="text" class="search" placeholder="Search your Story" required>
            <input type="button" class="button" value = "Cari">
            </form>
        </a>-->
    </div>
    
<!--Tengah--> 
<br><br><br><br><br><br><br><br><br><br> 
    <center>
      <div id=slidercontainer>
        <div id=css3slider>
            <img src="<?php echo base_url();?>assets/pict/pict1.jpg" alt="pict1">
          	<img src="<?php echo base_url();?>assets/pict/pict2.jpg" alt="pict2">
          	<img src="<?php echo base_url();?>assets/pict/pict3.jpg" alt="pict3">
          	<img src="<?php echo base_url();?>assets/pict/pict4.jpg" alt="pict4">
          	<img src="<?php echo base_url();?>assets/pict/pict5.jpg" alt="pict5">
        </div>
      </div>
    </center>
  </body>
</html>