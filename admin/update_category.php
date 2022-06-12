<?php

include('admin_navbar.php');
include('header.php');

if(isset($_GET['id'])){
    
    // getting data through id

    $id=$_GET['id'];

    $sql="SELECT * FROM tbl_category where id=$id";

    $res=mysqli_query($conn,$sql);

    // count the rows to check whether id is available or not

    $count=mysqli_num_rows($res);

    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);

        $title=$row['title'];
        $current_image=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];
    }
    else{
        $_SESSION['no-category-found']='Category not found';
        header('location:'.SITEURL.'admin/manage_category.php');
    }
}


?>
<h1 style="text-align:center;">Update Category</h1>
<form class="my-5 " action="" method="POST" enctype='multipart/form-data'>

<table class="tbl">
    <tr>
        <td>Title </td>
        <td>
            <input type="text" class="my-2 px-3"  name="title" value='<?php echo $title;?>'>
        </td>
    </tr>
    <tr>
        <td>Current image </td>
        <td>
            <?php
            if($current_image!=""){
                
                ?>
                <img src="<?php echo SITEURL ;?>images/<?php echo $current_image ; ?>" style='max-width:200px; max-height:200px;' alt="">
                <?php
            }
            else{
                echo 'Image not added';
            }
            ?>

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
            <input <?php if($featured=='yes'){echo 'checked';} ?> type="radio"  class="  mx-2" name="featured" value='Yes' >Yes
            <input <?php if($featured=='no'){echo 'checked';} ?>  type="radio"  class=" mx-2 " name="featured" value='No'>No

        </td>
    </tr>

    <tr>
        <td>Active</td>
        <td>
            <input <?php if($active=='yes'){echo 'checked';} ?> type="radio"  class=" mx-2" name="active" placeholder="Your Password" value='yes'>Yes
            <input <?php if($active=='no'){echo 'checked';} ?> type="radio"  class=" mx-2" name="active" placeholder="Your Password" value='no'>No
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="hidden" name="current_image" value="<?php echo $current_image ; ?>">
            <input type="hidden" name="id" value="<?php echo $id ;?>">
            <input type="submit" name="submit"  class="mx-3 my-2" value="update Category" class="btn-secondary">
        </td>
    </tr>

</table>

</form>

<?php
 if(isset($_POST['submit'])){
     $id=$_POST['id'];
     $title=$_POST['title'];
     $current_image=$_POST['current_image'];
     $featured=$_POST['featured'];
     $active=$_POST['active'];

     if(isset($_FILES['image']['name'])){
         $image_name=$_FILES['image']['name'];

        //  check image is avail or not

        if($image_name!=""){

            $source_path=$_FILES['image']['tmp_name'];

            $destination_path="../images/".$image_name;

            $upload=move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']='Failed to upload';
                header('location:'.SITEURL.'admin/manage_category.php');

                die();
            }

            if($current_image!="")
            {
                $remove_path="../images/".$current_image;
            
                $remove=unlink($remove_path);
    
                if($remove==false){
                    $_SESSION['failed-remove']='failed to remove path';
                    header('location:'.SITEURL.'admin/manage_category.php');
                    die();
    
                }
    

            }
           
        }
        else{
            $image_name=$current_image;
        }
     }

    $sql2="UPDATE tbl_category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    where id=$id ";

    $res2=mysqli_query($conn,$sql2);

    if($res2==true)
    {
        $_SESSION['update']='Category updated sucessfully';

        header('location:'.SITEURL.'admin/manage_category.php');
    }
    else{
        $_SESSION['update']='Failed to delete category';

        header('location:'.SITEURL.'admin/manage_category.php');

    }

     
 }




?>
