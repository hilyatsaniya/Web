<?php 
$this->load->library('session');
if (!isset($_SESSION['username']) || $this->session->userdata('username')!='admin') {
    $this->load->view('Login');
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Uplod File</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style3.css">
</head>
<body>

<div id="container">


        <div class="navbar">
            <a class="left" href="<?php echo base_url();?>/index.php/Home">Home</a>
            <a class="left" href="<?php echo base_url();?>/index.php/Home/Admin" class="active">Upload gambar</a>
            <a class="left" href="<?php echo base_url();?>/index.php/Home/Admin2">Upload file</a>
            <?php if (isset($_SESSION['username'])): ?>
          <a class="right" href="#"><?php echo " ".$_SESSION['username']." "; ?></a>
           <a class="right" href="<?php echo base_url();?>index.php/Home/Logout">Logout</a>
       <?php endif?>
            <!--<a href="download.php">Download</a>-->
        </div>

  <div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Upload File</h1>
    </div>
    <div class="form-content">
        <?php echo form_open_multipart('Home/Upload2'); ?>
            <form action="#" method="post" enctype="multipart/form-data">
            <table width="100%" align="center" border="0" bgcolor="#eee" cellpadding="2" cellspacing="0">
                <tr>
                    <td width="40%" align="right"><b>Judul</b></td><td><b>:</b></td><td><input type="text" name="nama" size="40"  /></td>
                </tr>
                

                <tr>
                    <td
                     width="40%" align="right"><b>File</b></td><td><b>:</b></td><td><input type="file" name="file" size="40" accept=".pdf , .docx"  /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" /></td>
                </tr>
            </table>
            </form>
            <?php echo form_close(); ?>
    </div>
    
  </div>
</div>

</body>
</html>