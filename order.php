<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="style1.css?v=<?php echo time(); ?>">
    <style>
        
        
    </style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
   

    
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->

    <?php
    include('top.php');
    include('config/constants.php');
    ob_start();
        if(isset($_GET['food_id']))       
        {
            // get details of food through food id
            $food_id=$_GET['food_id'];

            $sql="SELECT * FROM tbl_food WHERE id=$food_id";

            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);

            if($count>0)
            {
                $row=mysqli_fetch_assoc($res);

                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];
            }

        }
        else
        {

        }

    ?>
    <section class="food-search">
        <div class="container ms-auto">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method='POST' onsubmit=" return validate()">
                <fieldset style="color:black;">
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" style="min-height:100px; min-width:120px;" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name='food' value='<?php echo $title;?>'>
                        <p class="food-price">Rs <?php echo $price;?></p>
                        <input type="hidden" name='price' value='<?php echo $price;?>'>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name"   placeholder="Enter Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" minlength="10"  placeholder="Enter Contact"  id="mobileno" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email"   placeholder="Enter email address" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <a href="https://rzp.io/l/dJnZYQq7YW"><input type="submit" name="submit" value="Confirm Order" class="btn btn-primary"></a>
                </fieldset>

            </form>

            <?php

            if(isset($_POST['submit']))
            {
                $food=$_POST['food'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];

                $total= $price*$qty;

                $order_date=date("Y-m-d h:i:sa");

                $status='ordered';

                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                $sql2 = "INSERT INTO tbl_order SET 
                food = '$food',
                price = '$price',
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
            ";


                $res2=mysqli_query($conn,$sql2);

                if($res2==true)
                {
                    // $_SESSION['order-sucess']='Food ordered successfully';
                    header('location:'.SITEURL.'order-sucess.php');
                    ob_end_flush();


                }
                else
                {
                    $_SESSION['order-sucess']='Failed to order';

                }
            }

            ?>

        </div>
    </section>
  
   
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
   
    <!-- footer Section Ends Here -->

</body>
</html>