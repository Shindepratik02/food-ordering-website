<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="/food-order/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/food-order/css/style1.css?v=<?php echo time(); ?>">
    <style>
      .foodcard{
        margin:10px auto;
        /* display:flex;
        flex-wrap: wrap;
        align-content: center;
        flex-direction: column; */

        

        /* justify-content:center; */
        
      }
    </style>
   
</head>

<body>
    <?php
    include('top.php');
    include('config/constants.php');
    // error_reporting(0);
    ?>

    
    
    
    <!-- Navbar Section Starts Here -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" style="color: white;" href="#">Navbar</a>
          <button class="navbar-toggler" style="background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span style="background-color: white;" class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link active" style="color: white;" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="categories.html" style="color: white;">Categories</a>
              <a class="nav-link" href="foods.html" style="color: white;">Foods</a>
              <a class="nav-link disabled" style="color: white;">About Us</a>
            </div>
          </div>
        </div>
      </nav> -->
   
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <div class="container-fluid inner">
       <div class="sect">
        <div class="containers">
          <?php
          $search=$_POST['search'];

          ?>
          
            
            <h2 style="color:white;">Foods on <a style="color:white;" href="#"><?php echo $search;?></a></h2>

        </div>
       </div>
    </div>

<section class='food-menu'>
  <div class="container food-sect">
    <!-- <h2 class="text-center">Food Menu</h2> -->
    <h2 style="color:white; text-align:center">Foods on <a style="color:white;" href="#"><?php echo $search;?></a></h2>
    <div class="row">


    <?php
    // if(isset($_POST['submit']))
    // {
      
      
    


    

    
    // $search = mysqli_real_escape_string($conn, $_POST['search']);

    $sql="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count>0)
    {
      while($row=mysqli_fetch_assoc($res))
      {
        $id=$row['id'];
        $title=$row['title'];
        $price=$row['price'];
        $description=$row['description'];
        $image_name=$row['image_name'];

        ?>
        
          
          <div class="card  cards  mb-3"  data-aos="fade-up"  data-aos-duration='3000' style="max-width: 540px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <?php
                          if($image_name=='')
                          {
                            echo 'image not found';
                          }
                          else
                          {
                            ?>
  
                            <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" class="img-fluid imgs " alt="...">
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
      echo 'Food not available';

    }
  

    ?>
  </div>
</section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <!-- <?php
    include('foodmenu.php')
    ?> -->
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
   
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    
    <!-- footer Section Ends Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>