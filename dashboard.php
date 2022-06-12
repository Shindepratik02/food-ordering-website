
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Web Page</title>
    <style>
      body{
        background-color: rgb(196, 188, 175);
      }
    </style>
  </head>
  <body bgcolor="lightgreen">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Food Ordering</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="E:\TE-IT\Bootstrap\EXP-4.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="E:\TE-IT\Bootstrap\EXP-3.html">Sign Up  <span class="sr-only">(current)</a>
            </li>
            </ul>
            </div>
            </nav>
    
<br><br>
    <center><h1>DashBoard</h1></center>

    <?php
    // include('..config/constants.php');
    $sql="SELECT * FROM tbl_food";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    ?>

<br><br><br><br>
    <div class="card-deck">
        <div class="card">
          <img class="card-img-top" src="images/dashboard_delivery.jpeg" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title"><?php echo $count;?></h5></center><br>
            <center><h5>10</h5></center>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="E:\TE-IT\Bootstrap\orderd1.png" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title">Order Delivered</h5></center>
            <br>
            <center><h5>08</h5></center>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="E:\TE-IT\Bootstrap\money.png" alt="Card image cap">
          <div class="card-body">
            <center><h5 class="card-title">Total Revenue Generated Per Day</h5></center>
            <br>
            <center><h5>500</h5></center>
          </div>
          </div>
          </div>
          
          <br><br><br><br>

          <div class="card-deck">
            <div class="card">
              <img class="card-img-top" src="E:\TE-IT\Bootstrap\uorder.jpg" alt="Card image cap">
              <div class="card-body">
                  <br>
                <center><h5 class="card-title">Order UnDelivered</h5></center><br>
                <center><h5>02</h5></center>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="E:\TE-IT\Bootstrap\orderc1.jpg" alt="Card image cap">
              <div class="card-body">
                  <br>
                <center><h5 class="card-title">Order Cancelled</h5></center>
                <br>
                <center><h5>00</h5></center>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="E:\TE-IT\Bootstrap\money.png" alt="Card image cap">
              <div class="card-body">
                <center><h5 class="card-title">Total Revenue Generated Per Month</h5></center>
                <br>
                <center><h5>20000</h5></center>
              </div>
              </div>
              </div>
          
       
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>