<?php
include('admin_navbar.php');
include('header.php');

if(isset($_GET['id']) and isset($_GET['image_name'])){

    // get the value 
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name!=''){
        $path="../images/".$image_name;

        $remove=unlink($path);

        if($remove==true){
            $_SESSION['remove']='failed to remove image';

            header('location:'.SITEURL.'admin/manage_category.php');

            die();
        }
    }
    // delete from db
    $sql="DELETE FROM tbl_category where id=$id";

    $res=mysqli_query($conn,$sql);

    if($res==true){
        $_SESSION['delete']='Category deleted sucessfully';

        header('location:'.SITEURL.'admin/manage_category.php');
    }
    else{
        $_SESSION['delete']='Failed to delete category';

        header('location:'.SITEURL.'admin/manage_category.php');
    }

}
else{
    header('location:'.SITEURL.'admin/manage_category.php');
}

?>