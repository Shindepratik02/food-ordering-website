<?php
include('../config/constants.php');

include('header.php');



?>

 
 
    
    <main class="text-center form-signin">
        <?php
    if(isset($_SESSION['login'])){
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?><br><br>
      <form class="mt-5" style="display:flex; flex-direction:column; justify-content:center; align-items:center" method="POST" action="">
        <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 mt-5 fw-normal">Please login</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Enter username">
          <label for="floatingInput">username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
        
        <input type="submit" name="submit" value="login" class="btn-primary mt-2"> 
        <!-- <p class="mt-5 mb-3 text-muted">© 2017–2021</p> -->
      </form>
    </main>

    <?php

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1){
            $_SESSION['login']='Login Sucessfull';

            header('location:'.SITEURL.'admin/admin_home.php');
        }
        else{
            $_SESSION['login']='Login Unsucessfull';

            header('location:'.SITEURL.'admin/admin_login.php');

        }

    }

    ?>
    

    
        
      
    
   