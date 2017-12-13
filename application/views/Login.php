<?php 
$this->load->library('session');
if (isset($_SESSION['username'])) {
  redirect();
}
//if (isset($_SESSION['message_display']));
//if ($_SESSION['message_display'] === "Anda Berhasil Logout");
?>


<!DOCTYPE html>
<html >
<head>

<title>Log In</title>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style2.css">  
</head>

<body>


 <div class="header" style="background-image: url(<?php echo base_url()."assets/pict/Background.jpg"?>);">
<h1 style="color: Black">  Kid's Story</h1>
  </div>


  <div class="navbar">
        <a class="left" href="<?php echo base_url();?>index.php/Home">Home</a>
        <a class="left" href="<?php echo base_url();?>index.php/Home/show_all">Indeks</a>
</div>

<div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Log In Akun</h1>
      </div>
    <div class="form-content">
     <?php echo validation_errors(); ?>
    <?php echo form_open('Home/user_login_process'); ?>
      <form>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username"/>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password"/>
        </div>
        <div class="form-group">
          <label class="form-remember">
            <input type="checkbox"/>Remember Me
          </label><a class="form-recovery" href="#">Forgot Password?</a>
        </div>
        <div class="form-group">
          <button type="submit">Log In</button>
        </div>
        <div class="form-group">
         <a style="text-decoration: none" href="<?php echo base_url();?>index.php/Home/user_registration"> Create New Account </a>
      </form>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
</body>
</html>


<!--
  <div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Log In Akun</h1>
    </div>
    -->
    <?php  //if (isset($_SESSION['message_display'])):
  //if ($_SESSION['message_display'] === "Anda Berhasil Logout"): ?>
   <!-- <div class="alert alert-success text-center">
      <?php// echo $_SESSION['message_display']; ?>
    </div>
  </div>-->
  <?php// else: ?> 
 <!--   <div class="container">
      <div class="alert alert-danger text-center">
        <?php //echo $_SESSION['message_display']; ?>
      </div>
    </div> -->
  <?php// endif
   //echo validation_errors();
  // session_destroy(); 
// endif 
//if (validation_errors() != null): ?>
<!--  <div class="container">
    <div class="alert alert-danger text-center">
      <?php// echo validation_errors(); ?>
    </div>
  </div>-->  
<?php/* endif 
 if (isset($_SESSION['user_name'])) {
  redirect('');
}*/ ?>