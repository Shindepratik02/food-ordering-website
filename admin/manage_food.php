<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title>Hello, world!</title>
    <style>
      @media (max-width:454px){
        .butn{
          max-height:33px !important;
          max-width: 68px !important;
          
        }
      }
      .butn{
        padding: auto;
        padding-right:5px;
       
      }
      .btn-data{
        margin-top:10px;
      }
    </style>
  </head>
  <body>
    <?php
    include('admin_navbar.php');
    include('header.php');

    ?>

    <h3 class="my-5" style="text-align:center;" >Manage Food</h3>

    <?php
    
    if(isset($_SESSION['add'])){
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if(isset($_SESSION['delete'])){
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if(isset($_SESSION['unauthorize']))
    {
        echo $_SESSION['unauthorize'];
        unset($_SESSION['unauthorize']);
    }
    if(isset($_SESSION['upload'])){
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    if(isset($_SESSION['update'])){
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    
    
   

    ?>
    <br><br>
    <a href="add_food.php"><button class="mx-5 my-3" style="background-color:yellow;">ADD FOOD</button></a>
<table class="table">
  <thead>
    <tr style="text-align:center;">
      <th scope="col" style="text-align:center;">sn</th>
      <th scope="col">title</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">featured</th>
      <th scope="col">active</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql="SELECT * FROM tbl_food";

      $res=mysqli_query($conn,$sql);

      if($res==TRUE)
      {
        $count=mysqli_num_rows($res);
        $sn=1;

        if($count>0){
          while($rows=mysqli_fetch_assoc($res)) 
          {
            // using while loop to get all data from db

            // getting individual data
            $id=$rows['id'];
            $title=$rows['title'];
            $price=$rows['price'];
            $image_name=$rows['image_name'];
            $featured=$rows['featured'];
            $active=$rows['active'];

            // display values in table
            ?>

                <tr style="text-align:center;">
                <th scope="row"><?php echo $sn++;?></th>
                <td><?php echo $title;?></td>
                <td><?php echo $price;?></td>
                <td>
                  <?php
                  if($image_name=='')
                  {
                    echo 'Image not added';
                  }
                  else{
                    ?>
                    <img src="<?php echo SITEURL ;?>images/<?php echo $image_name;?>" style="max-height:100px; max-width:200px;" alt="">
                    <?php
                  }

                  ?>
                </td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active;?></td>
                <td class="btn-data">
                <!-- <a href="<?php echo SITEURL;?>admin/update_password.php?id=<?php echo $id; ?>"><button style="background-color:blue;" class="btn-success   butn" >Change password</button></a> -->
                  <a href="<?php echo SITEURL;?>admin/update_food.php?id=<?php echo $id; ?>"><button class="btn-success  butn" >Update Food</button></a>
                <a href="<?php echo SITEURL;?>admin/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>"><button class="btn-danger butn">Delete Food</button></a></td>
              </tr>
             
            <?php
            
            }
        }
      }
    ?>
    <!-- <tr style="text-align:center;">
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td class="btn-data"><button class="btn-success  butn" >Update admin</button> <button class="btn-danger butn">Delete admin</button></td>
    </tr>
    <tr style="text-align:center;">
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr style="text-align:center;">
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>