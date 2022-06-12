<?php
include('admin_navbar.php');
include('header.php');



?>

<h1 style="text-align:center;">ADD FOOD</h1>
<?php
ob_start();
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

?>

<form class="my-5 " action="" method="POST" enctype='multipart/form-data'>

<table class="tbl" style="margin:0px auto; max-height:300px;">
    <tr>
        <td>Title </td>
        <td>
            <input type="text" class="my-2 px-3"  name="title" placeholder="Title of food">
        </td>
    </tr>
    <tr>
        <td>Description</td>
        <td>
            <textarea name="description" id="" cols="30" rows="2" placeholder="description of food"></textarea>
        </td>
    </tr>
    <tr>
        <td>Price</td>
        <td>
            <input type="number" name="price">
        </td>
    </tr>
    <tr>
        <td>Select image</td>
        <td>
            <input type="file" name="image">
        </td>
    </tr>
    <tr>
        <td>Category</td>
        <td>
            <select name="category" >
            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='yes'";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>

                
            </select>
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
            <input type="submit" name="submit"  class="mx-3 my-2" value="Add Food" class="btn-secondary">
        </td>
    </tr>

</table>

</form>

<?php
if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    //Check whether radion button for featured and active are checked or not
    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No"; //SEtting the Default Value
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No"; //Setting Default Value
    }

    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];

        if($image_name!=""){

        

            $source_path=$_FILES['image']['tmp_name'];

            $destination_path="../images/".$image_name;

            $upload=move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']='Failed to upload';
                header('location:'.SITEURL.'admin/add_food.php');

                die();
            }

        }
        // upload image
    }
    else{
        $image_name="";
    }

    $sql2 = "INSERT INTO tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($res2 == true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage_food.php');
                    ob_end_flush();
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                    header('location:'.SITEURL.'admin/manage_food.php');
                }

}

?>



