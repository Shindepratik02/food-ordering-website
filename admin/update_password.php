<?php
include('admin_navbar.php');
include('header.php');



?>

<?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

<h3 class='my-2' style="text-align:center;">Update password</h3>

<form action="" method="POST">
        
        <table class="tbl-30">
            <tr>
                <td>Current Password: </td>
                <td>
                    <input type="password" name="current_password" placeholder="Current Password">
                </td>
            </tr>

            <tr>
                <td>New Password:</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
                <td>Confirm Password: </td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                </td>
            </tr>

        </table>

    </form>
    <?php

    if(isset($_POST['submit'])){
          //1. Get the DAta from Form
          $id=$_POST['id'];
          $current_password = md5($_POST['current_password']);
          $new_password = md5($_POST['new_password']);
          $confirm_password = md5($_POST['confirm_password']);


          //2. Check whether the user with current ID and Current Password Exists or Not
          $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

          //Execute the Query
          $res = mysqli_query($conn, $sql);
         
          
          if($res==true)
                {
                    //CHeck whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //User Exists and Password Can be CHanged
                        if($new_password==$confirm_password){
                            $sql2="UPDATE SET 
                            password='$new_password'
                            WHERE id=$id  
                            " ;
                            $res2=mysqli_query($conn,$sql2);

                            if($res2==true){
                                $_SESSION['change password']='password changed sucessfully';
                                header('location:'.SITEURL.'admin/manage_admin.php');
                            }
                            else{
                                $_SESSION['change password']='password not changed';
                                header('location:'.SITEURL.'admin/manage_admin.php');
                            }

                        }
                        else{
                            $_SESSION['password not match']='password not match';
                            header('location:'.SITEURL.'admin/manage_admin.php');
                        }
                    }
                    else{
                        $_SESSION['user not found']='<div style="color:red";>User not found</div>';

                        header('location:'.SITEURL.'admin/manage_admin.php');
                    }
                }
        
    }