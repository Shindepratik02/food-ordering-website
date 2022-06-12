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
    <link rel="stylesheet" href="css/style1.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- Navbar Section Starts Here -->
   <?php
   include('top.php');
   include('config/constants.php');
   ?>

   <?php
   if(isset($_GET['category_id']))
   {
     $category_id=$_GET['category_id'];

     $sql="SELECT title from tbl_category where id=$category_id";

     $res=mysqli_query($conn,$sql);

     $row=mysqli_fetch_assoc($res);

     $category_title=$row['title'];
   }
   else
   {
     header('location:'.SITEURL);
   }

   ?>

      <div class="container-fluid inner">
        <div class="sect">
         <div class="containers">
             
            <h2 style="color:white;">Foods on Category <a href="#" class="text-white"><?php echo $category_title;?></a></h2>
 
         </div>
        </div>
     </div>
    
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    
       
            
            

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">


        <div class="container food-sect">
            <h2 class="text-center" style="color:white;">Food Menu</h2>
            <div class="row">
              <?php
              $sql2="SELECT * FROM tbl_food where category_id=$category_id";

              $res2=mysqli_query($conn,$sql2);

              $count2=mysqli_num_rows($res2);

              if($count2>0)
              {
                while($row2=mysqli_fetch_assoc($res2))
                {
                  $id=$row2['id'];
                  $title=$row2['title'];
                  $price=$row2['price'];
                  $description=$row2['description'];
                  $image_name=$row2['image_name'];
                  ?>

                  <div class="card cards mb-3" style="max-width: 540px;">
                                      <div class="row g-0">
                                        <div class="col-md-4">

                                        <?php
                                        if($image_name=='')
                                        {
                                          echo ' image not found';
                                        }
                                        else
                                        {
                                          ?>

                                        <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" class="img-fluid imgs rounded-start" alt="...">
                                          <?php

                                        }

                                        ?>
                                        
                                        </div>
                                        <div class="col-md-8">
                                          <div class="card-body gx-0 ">
                                            <h5 class="bold card-title"><?php echo $title;?></h5>
                                            <p class="bold"><?php echo $price;?></p>
                                            <p class="bold card-text"><?php echo $description;?></p>
                                            <p class="card-text"><small class="text-muted"><a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a></small></p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                  <?php
                }

              }
              else
              {

              }

              ?>

              
            

            <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/download (1).jfif" alt="Chicke Hawain Pizza" class="imgs">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/chinese.jfif" alt="Chicke Hawain Pizza" class="imgs">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Nice Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div> -->


            <div class="clearfix"></div>

            

        </div>

        
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    
    <!-- footer Section Ends Here -->

</body>
</html>