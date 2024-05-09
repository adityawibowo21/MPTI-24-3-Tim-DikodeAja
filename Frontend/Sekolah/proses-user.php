<?php


require_once "config.php";


if(isset($_POST["simpan"])){

    $username = trim(htmlspecialchars($_POST['username']));
    $password = 1234;
    $pass     = password_hash($password, PASSWORD_DEFAULT);
    $nama     = trim(htmlspecialchars($_POST['nama']));

    $cekusername = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($cekusername) > 0) {
        header("location:new-user.php?msg=cancel");
        return;

        }    
        mysqli_query($koneksi, "INSERT INTO tb_user VALUES (null,'$username' , '$nama')");
        header("location:new-user.php?msg=added");
        return; 
    
      
    }
