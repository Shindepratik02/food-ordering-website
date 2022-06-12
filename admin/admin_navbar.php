<?php
include('../config/constants.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <!-- <div class="container-fluid"> -->
    <a class="navbar-brand" href="#">Indo-Meal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="admin_home.php" href="admin_home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_admin.php">Manage admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_food.php">Food</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_logout.php">Logout</a>
        </li>
       
      </ul>
      
    </div>
  </div>
</nav>