<?php
// get the id of admin to be deleted

// create sql query to delete admin

// 3.redirect to manage_admin page with msg sucess or error
include('admin_navbar.php');
include('header.php');
include('footer.php');

$id=$_GET['id'];

$sql="DELETE FROM ADMIN WHERE ID=$id";

// execute query

$res=mysqli_query($conn,$sql);

if($res==true){
    $_SESSION['delete']="Admin deleted sucessfully";

    header('location:'.SITEURL.'admin/manage_admin.php');
}
else{
    $_SESSION['delete']="Failed to delete admin";

    header('location:'.SITEURL.'admin/manage_admin.php');
}
?>