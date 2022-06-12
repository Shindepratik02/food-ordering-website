<?php
include('admin_navbar.php');
include('header.php');
include('footer.php');
?>
<h1 style="text-align:center"> Category</h1>

<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

?>

<form class="my-5 " action="" method="POST" enctype='multipart/form-data'>

<table class="tbl">
    <tr>
        <td>Title </td>
        <td>
            <input type="text" class="my-2 px-3"  name="title" placeholder="Enter Your Name">
        </td>
    </tr>
    <tr>
        <td>Select Image </td>
        <td>
            <input type="file" class="my-2 px-3"  name="image" >
        </td>
    </tr>



    <tr>
        <td> Featured</td>
        <td>
            <input type="radio"  class="  mx-2" name="featured" value='yes' >Yes
            <input type="radio"  class=" mx-2 " name="featured" value='no'>No

        </td>
    </tr>

    <tr>
        <td>Active</td>
        <td>
            <input type="radio"  class=" mx-2" name="active" placeholder="Your Password" value='yes'>Yes
            <input type="radio"  class=" mx-2" name="active" placeholder="Your Password" value='no'>No
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="submit"  class="mx-3 my-2" value="Add Category" class="btn-secondary">
        </td>
    </tr>

</table>

</form>

<?php
ob_start();

if(isset($_POST['submit'])){
    // Get value from form

    $title=$_POST['title'];

    // for radio input , we must check it is selected or not
    if(isset($_POST['featured'])){
        
        $featured=$_POST['featured'];
    }
    else{
        $featured='no';
    }

    if(isset($_POST['active'])){
        
        $active=$_POST['active'];
    }
    else{
        $active='no';
    }

    // check whether image is selected or not

    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];

        if($image_name!=""){

        

            $source_path=$_FILES['image']['tmp_name'];

            $destination_path="../images/".$image_name;

            $upload=move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']='Failed to upload';
                header('location:'.SITEURL.'admin/add_category.php');

                die();
            }

        }
        // upload image
    }
    else{
        $image_name="";
    }

    // query to insert category in db

    $sql="INSERT INTO tbl_category (title,image_name,featured,active) values ('$title','$image_name','$featured','$active')";

    $res=mysqli_query($conn,$sql);

    if($res==true){
        $_SESSION['add']='Category added sucesfully';

        header('location:'.SITEURL.'admin/manage_category.php');
        ob_end_flush();
    }
    else{
        $_SESSION['add']='Failed to add category';

        header('location:'.SITEURL.'admin/add_category.php');
    }

    

}



?>