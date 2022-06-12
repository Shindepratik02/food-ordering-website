<?php
include('admin_navbar.php');
include('header.php');
?>
<br>
<h1 style="text-align:center;">Update admin</h1>

<?php

 $id=$_GET['id'];

 $sql="SELECT * FROM admin WHERE id=$id";

 $res=mysqli_query($conn,$sql);

//  check wheteher thr query is exexcuted or not

if($res==true){
    // check whether data is available or not
    $count=mysqli_num_rows($res);

    // to chech whether we have admin data or not
    if($count==1){

        $row=mysqli_fetch_assoc($res);
        
        $full_name = $row['full_name'];
        $username = $row['username'];
    }
    else{
        header('location:'.SITEURL.'admin/manage_admin.php');
    }
}


?>

<form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name"  value="<?php  echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" class="mx-2 my-2"  value="<?php echo $id ?>"><br>
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php

        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $full_name=$_POST['full_name'];
            $username=$_POST['username'];

            //  create sql query to update admin
            $sql="UPDATE admin set
            full_name='$full_name',
            username='$username' 
            WHERE id='$id'
            ";

            $res=mysqli_query($conn,$sql);
            
            if($res==true){
                $_SESSION['update']="admin added sucessfully";

                header('location:'.SITEURL.'admin/manage_admin.php');
            }
            else{
                $_SESSION['update']="Failed to delete admin";

                header('location:'.SITEURL.'admin/manage_admin.php');
            }
        }



        ?>