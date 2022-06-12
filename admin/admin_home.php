
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Web Page</title>
    <style>
      body{
        background-color: rgb(238 225 204);
      }
      .dash{
        display:flex;
        flex-wrap: wrap;
        

      }
    </style>
  </head>
  <body bgcolor="lightgreen">
  <?php
  include('admin_navbar.php');
  
  // include('..config/constants.php');
  $sql="SELECT * FROM tbl_order";

  $res=mysqli_query($conn,$sql);

  $count=mysqli_num_rows($res);

  ?>
  <?php
  $sql2="SELECT * FROM tbl_category";

  $res2=mysqli_query($conn,$sql2);

  $count2=mysqli_num_rows($res2);
  
  ?>
  <?php
  $sql3="SELECT sum(total) as total from tbl_order";

  $res3=mysqli_query($conn,$sql3);

  $row3=mysqli_fetch_assoc($res3);

  $total_revenue=$row3['total'];
  
  
  ?>

<?php
  $sql4="SELECT * FROM tbl_food";

  $res4=mysqli_query($conn,$sql4);

  $count4=mysqli_num_rows($res4);
  
  ?>
  
    

<br><br>
    <center><h1>DashBoard</h1></center>

    <br><br><br><br>
    <div class="  card-deck d-flex">
        <div class="card  my-3 mx-2">
          <img class="card-img-top" style="max-width: 414px; height: 150px;" src="/food-order/images/dashboard_order.jpeg" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title">Total Order</h5></center><br>
            <center><h5><?php echo $count;?></h5></center>
          </div>
        </div>
        <div class="card my-3 mx-2">
          <img class="card-img-top" style="max-width: 414px;" src="/food-order/images/dashboard_delivery.jpeg" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title">Category</h5></center>
            <br>
            <center><h5><?php echo $count2;?></h5></center>
          </div>
        </div>
        <div class="card my-3 mx-2">
          <img class="card-img-top" style="max-width: 414px;" src="/food-order/images/dashboard_revenue.jpeg" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title">Total Revenue Generated</h5></center>
            <br>
            <center><h5><?php echo $total_revenue;?></h5></center>
          </div>
          </div>
        <div class="card my-3 mx-2">
          <img class="card-img-top" src="/food-order/images/dashboard_food.jfif" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title">Foods</h5></center>
            <br>
            <center><h5><?php echo $count4;?></h5></center>
          </div>
          </div>
          </div>
          
          <br><br><br><br>
       
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>