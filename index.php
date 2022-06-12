<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="/food-order/css/style1.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    
    
    <style>
        .card1{
            background-color:#72726e;
        }
        .search-bar{
           min-width: 200px!important;
    height: 43px;
    border-radius: 38px;
        }
        h1{
          font-family:
        }
       
        /* body{
          width:100%;
        } */
    </style>
   
</head>

<body>
    <?php
    include('top.php');
    include('config/constants.php');
    ?>
    
    
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
      </nav>
    -->
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <div class="container-fluid inner">
         <div class="inner-card  sect ins" >
           <!-- <img src="images/logo.png" alt=""> -->
           
             <h1 class="mb-5" data-aos="fade-down" data-aos-duration="3000" style="color:white;"><strong>‘‘To live a full life, you have to fill your stomach first.’’</strong></h1>
        <form class="containers mx-5" action="<?php echo SITEURL;?>food_search.php" method="POST">
            <input  type="search" class='search-bar px-5' name="search" placeholder="        Search for Food.." required="">
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

            <!-- <div class="card card1 mx-3" data-aos="fade-up-left" data-aos-duration='3000' style="width: 18rem; ">
          <img src="/food-order/images/man.png" style="height:80px; width:80px; margin:auto"  class="card-img-top img-curve" alt="...">
          <div class="card-body" >
            <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content"</p>
          </div>
            </div>
            <div class="card card1 mx-3" data-aos="fade" data-aos-duration='3000' style="width: 18rem; ">
          <img src="/food-order/images/man.png" style="height:80px; width:80px; margin:auto"  class="card-img-top img-curve" alt="...">
          <div class="card-body" >
            <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content"</p>
          </div>
            </div>
            <div class="card card1  mx-3 " data-aos="fade-up-right" data-aos-duration='3000' style="width: 18rem; ">
          <img src="/food-order/images/man.png" style="height:80px; width:80px; margin:auto"  class="card-img-top img-curve" alt="...">
          <div class="card-body" >
            <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content"</p>
          </div>
            </div> -->
        </div>

        <?php
        if(isset($_SESSION['order-sucess']))
        {
          echo $_SESSION['order-sucess'];
          unset($_SESSION['order-sucess']);
        }

        ?>
         
       
    </div>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <div class="container-fluid">

      <section id="categories" class="categories">
          <div class="container">
              <h2 class="text-center">Explore Cuisine</h2>
  
              <?php
  
              $sql="SELECT * FROM tbl_category where featured='yes' and active='yes'" ;
  
              $res=mysqli_query($conn,$sql);
  
              $count=mysqli_num_rows($res);
  
              if($count>0)
              {
                while($row=mysqli_fetch_assoc($res))
                {
                  $id=$row['id'];
                  $title=$row['title'];
                  $image_name=$row['image_name'];
                  ?>
  
                          <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                              <div class="box-3 float-container" data-aos="fade-up-right" data-aos-duration="3000">
  
                              <?php
                              if($image_name=='')
                              {
                                echo 'image not available';
                              }
                              else{
                                ?>
                                <img src="<?php echo SITEURL ;?>images/<?php echo $image_name;?>" style="max-width:300px; height:300px;" alt="Pizza" class="img-responsive img-curve">
                                <?php
                              }
                              ?>
  
                                  <h3 class="float-text text-white"><?php echo $title;?></h3>
                              </div>
                          </a>
  
                              <?php
  
  
                }
  
              }
              else{
                echo 'Category not added';
              }
  
              ?>
  
             
  
             
             
  
              <div class="clearfix"></div>
          </div>
      </section>
    </div>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <div id="foodmenu">

    <?php
    include('foodmenu.php')
    ?>
    </div>

    <div class="container">
    <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#index.php" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#foodmenu" class="nav-link p-0 text-muted">Foods</a></li>
          <li class="nav-item mb-2"><a href="#categories" class="nav-link p-0 text-muted">category</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

     

    

      <div class=" ms-auto col-4 offset-1">
        <form>
         
          <h5 style="text-align:center;">ADDRESS</h5>
          <strong>Shanti Dham, Gandhi-Chowk, Opposite to food plaza</strong>
          <h5 style="text-align:center;">Contact details</h5>
          <p>Email:-indomealresto@gmail.com</p>
          <p>Phone:-9225647890</p>
          <p>Phone:-02525-264789</p>

          <h5 style="text-align:center;">Opening Hours</h5><br>
          <H5>Monday:-9.00 am to 8.00pm</H5>
          <H5>Tuesday:-9.00 am to 8.00pm</H5>
          <H5>Wednesday:-9.00 am to 8.00pm</H5>
          <H5>Thursday:-9.00 am to 8.00pm</H5>
          <H5>Friday:-9.00 am to 8.00pm</H5>
          <h5>Saturday:-9.00 am to 8.00pm</H5>
          <H5>Sunday:-OFF</H5>
          



          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>© 2021 Indo-Meal, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>
  </footer>
    </div>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
  
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    
    <!-- footer Section Ends Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>