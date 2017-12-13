<?php 
    if (!isset($data)) {
   //     $this->load->view('Home');
    }
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" media="all" /> 
</head>
<body>
<div class="header" style="background-image: url(<?php echo base_url()."assets/pict/Background.jpg"?>);">
  Kid's Story
</div>
   <!-- end header -->
    <div class="navbar">
        <a class="left" href="<?php echo base_url();?>index.php/Home">Home</a>
        <a class="right" href="#">
            <?php echo form_open('Home/search'); ?>
            <form>
            <input type="text" class="search" name="search" placeholder="Search your Story" required>
            <input type="button" class="button" value = "Cari">

            </form>
            <?php echo form_close(); ?>
        </a>
    </div>

<!--    <CENTER>
        <h1>INDEKS JUDUL</h1> <br> 
        <div class="indeks">
        <a> A </a>
        <a> B </a>
        <a> C </a>
        <a> D </a>
        <a> E </a>
        <a> F </a>
        <a> G </a>
        <a> H </a>
        <a> I </a>
        <a> J </a>
        <a> K </a>
        <a> L </a>
        <a> M </a>
        <a> N </a>
        <a> O </a>
        <a> P </a>
        <a> Q </a>
        <a> R </a>
        <a> S </a>
        <a> T </a>
        <a> U </a>
        <a> V </a>
        <a> W </a>
        <a> X </a>
        <a> Y </a>
        <a> Z </a> <hr>
        </div>
    </CENTER>-->
    <center>
<br><br>
    <table class="table" >
    <tr>
      <th border="1">Gambar<br><br><br></th>
      <th border="1">Kategori<br><br><br></th>
      <th border="1">Judul<br><br><br></th>
      <th border="1">Deskripsi<br><br><br></th>
      <th border="1"> Download<br><br></th>
    </tr>
    
    <?php 
        // echo "<pre>";
        // var_dump($books);
        // die();
        // echo "</pre>";
    ?>
    <?php foreach($books as $book) { ?>
    <tr>
        <td><img src="<?php echo base_url().substr($book->Gambar,strpos($book->Gambar,"assets")); ?>"></td>
        <td><?php echo $book->n_kategori; ?></td>
        <td><?php echo $book->Judul; ?></td>
        <td><?php echo $book->Deskripsi;?></td>
        <td>
            <?php if (isset($_SESSION['username'])):?>
            <a href="<?php echo base_url().substr($book->File,strpos($book->File,"assets")); ?>">Download</a>
        <?php else :?>
            <a href="<?php echo base_url();?>index.php/Home/user_login">Download</a>
        <?php endif ?>
        </td>
    </tr>
    <?php } ?>
</table>
    </center>

</body>
</html>