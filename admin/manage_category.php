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
      body{
        color: white;
      }
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

    <h3 class="my-5" style="text-align:center;" >Manage Category</h3>

    <?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['remove'])){
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);
}
if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
if(isset($_SESSION['no-category-found'])){
    echo $_SESSION['no-category-found'];
    unset($_SESSION['no-category-found']);
}
if(isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if(isset($_SESSION['failed-remove'])){
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
}


?>

    <a href="add_category.php"><button class="mx-5" style="background-color:yellow;">ADD Category</button></a>

<table class="table">
  <thead>
    <tr style="text-align:center;">
      <!-- <th scope="col" style="text-align:center;">#</th> -->
      <th scope="col">S.N</th>
      <th scope="col">Title</th>
      <th scope="col">image</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>

    <?php
      $sql="SELECT * FROM tbl_category ";

      $res=mysqli_query($conn,$sql);

      $count=mysqli_num_rows($res);

      $sn=1;

      if($count>0){
        while($row=mysqli_fetch_assoc($res)){
          $id=$row['id'];
          $title=$row['title'];
          $image_name=$row['image_name'];
          $featured=$row['featured'];
          $active=$row['active'];

          ?>

              <tr style="text-align:center;">
                    <th scope="row"><?php echo $sn++; ?></th>
                    <td><?php echo $title; ?></td>

                    <td>
                      <?php
                      if($image_name!=''){

                        ?>
                        <img src="<?php echo SITEURL; ?>images/<?php echo $image_name;?>" style="width:100px; height:100px;">
                        <?php
                      }
                      else{
                        echo "image not uploaded";
                      }
                      ?>
                    

                    
                      
                    
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td class="btn-data">
                      <a href="<?php echo SITEURL; ?>admin/update_category.php?id=<?php echo $id;?>"><button class="btn-success  butn" >Update Category</button></a>
                      <a href="<?php echo SITEURL;?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"><button class="btn-danger butn">Delete Category</button></a> </td>
                  </tr>
<?php

        }
      }
      else{

      }
    ?>
  </thead>
  <tbody>
   
    
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