<?php

require_once "config.php"; // Assuming config.php is in the same directory

$title = "dashboard - sma ";
require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";

if(isset($_GET['msg'])){

  $msg = $_GET['msg'];
}
else {
  $msg = '';
}

$alert =' ';
if ($msg =='cancel')
{
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class= "fa-solid fa-xmark"> </i>  Tambah username gagal , username sudah ada 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg =='added')
{
  $alert = '<div class="alert alert-succes alert-dismissible fade show" role="alert">
    <i class= "fa-solid fa-circle-check"> </i>  Tambah username berhasil, segera ganti passsword
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>


<div id="layoutSidenav_content">
          <main>
          <div class="container-fluid px-4">
         <h1 class="mt-4">Tambah User</h1>
          <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>   
      <li class="breadcrumb-item active">Tambah User</li>
     </ol>
    <form action="proses-user.php" method="POST" enctype="multipart/form-data">
      <?php 
      if ($msg !== ''){
        echo $alert;
      }
      ?>
    <div class="card">
  <div class="card-header">
    <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah User </span>
    <div class="btn-group float-end">
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
  <button type="reset" name="reset" class="btn btn-danger mr-2"><i class="fa-solid fa-xmark"></i> Reset</button>
</div>
<div class ="card-body">
    <div class = "row">
        <div class=" col-8">
        <label for="inputPassword5" class="form-label">Nama </label>
<input type="text" id="nama" class="form-control" id= "nama" name= "nama" maxlength="20">
        </div>
        <div class=" col-8">
        <label for="inputPassword5" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" id= "username" name= "username" maxlength="20">


        </div>
  </div>
</div>
</div></main>
                
<?php

                require_once "template/footer.php";

                ?>



