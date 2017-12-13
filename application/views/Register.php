<?php 
$this->load->library('session');
if (isset($_SESSION['username'])) {
  $this->load->view('Home');
}

 ?>

<!DOCTYPE html>
<html >
<head>

<title>Daftar</title>
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
      <h1>Daftarkan Akun</h1>
    </div>
    <div class="form-content">
    <?php echo form_open('Home/reg_user') ?>
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
          <label for="password">Konfirmasi Password</label>
          <input type="password" id="cpassword" name="cpassword" "/>
        </div>
        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input type="email" id="email" name="email" "/>
        </div>
        <div class="form-group">
          <button type="submit">Daftar<button>
        </div>
      </form>
      <?php echo form_open('Home/reg_user'); ?>
    </div>
    <?php if (validation_errors()): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo validation_errors(); ?>
      </div>
    <?php endif ?>
    <?php if (isset($error)): ?>
      <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
    <?php endif ?>
  </div>
</div>

</body>
</html>