<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/food-order/css/style1.css?v=<?php echo time(); ?>">
    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    include('admin_navbar.php');
    ?>

    <?php
    //   $db_hostname='127.0.0.1';
    //   $db_username='root';
    //   $db_password='';
    //   $db_name='food-order';
  
    //   $conn = mysqli_connect ($db_hostname,$db_username,$db_password,$db_name);
      
      if(isset($_POST['submit']))
      {
         $full_name=$_POST['full_name'];
         $username=$_POST['username'];
         $password=md5($_POST['password']);
  
         $sql= "INSERT INTO ADMIN (full_name,username,password) VALUES ('$full_name','$username','$password')";
        
        
        
        // Executing query and storing in db
        $res= mysqli_query($conn,$sql) or die(mysqli_error());

        // to check whether query is successfully executed or not

        if($res==TRUE){
            $_SESSION['add']='Admin added sucessfully';

            header('location:'.SITEURL.'admin/manage_admin.php');
            
        }
        else{
            $_SESSION['add']='Failed to add admin';

            header('location:'.SITEURL.'admin/add_admin.php');
        }
      }
      
   
    
    mysqli_close($conn);
?>
<form class="my-5 " action="" method="POST">

<table class="tbl">
    <tr>
        <td>Full Name: </td>
        <td>
            <input type="text" class="my-2 px-3"  name="full_name" placeholder="Enter Your Name">
        </td>
    </tr>

    <tr>
        <td>Username: </td>
        <td>
            <input type="text"  class="my-2 px-3" name="username" placeholder="Your Username">
        </td>
    </tr>

    <tr>
        <td>Password: </td>
        <td>
            <input type="password"  class="my-2 px-3" name="password" placeholder="Your Password">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="submit"  class="mx-3" value="Add Admin" class="btn-secondary">
        </td>
    </tr>

</table>

</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>