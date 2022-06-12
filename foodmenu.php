

<section class="food-menu">
        <div class="container food-sect">
            <h2 style="color:white;" class="text-center">Food Menu</h2>
            <div class="row">

            <?php
            
            $sql="SELECT * FROM tbl_food where featured='yes' and active='yes'" ;

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
                 <div class="card cards mb-3"  data-aos="fade-up"  data-aos-duration='3000' style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <?php
                        if($image_name=='')
                        {
                          echo 'Image not available';
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
            
      

          

                <!-- <div class="card cards mb-3"  data-aos="fade-up"  data-aos-duration='3000' style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/kolhapuriveg.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Kolhapuri Special Veg</h5>
                          <p class="bold">Rs 250 per plate</p>
                          <p class="bold card-text">3 Rotis, 2 Sabji, 1 Papad, 1 plate rice</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card cards mb-3" data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/kolhapurinonveg.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Thali:-Kolhapuri Special Non-Veg</h5>
                          <p class="bold">Rs 300 per plate</p>
                          <p class="bold card-text">3 Rotis, 1 Chicken handi, 1 Papad, 1 plate rice</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card cards mb-3" data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/kolhapurinonveg.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Thali:-Kolhapuri combo</h5>
                          <p class="bold">Rs 250 per plate</p>
                          <p class="bold card-text">3 Rotis, 3 Sabji, 2 Papad, 1 sweet dish 1 plate rice</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card cards mb-3" data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/south1.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Thali:- South Indian Special</h5>
                          <p class="bold">Rs 300 per plate</p>
                          <p class="bold card-text">3 Rotis, 1 Rasam, 1 Cabbage Poriyyal, 1 sweet dish, RICE</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card cards mb-3"  data-aos="fade-up"style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/poha.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Snacks:-</h5>
                          <p class="bold">Rs 50 per plate</p>
                          <p class="bold card-text">Onion Poha</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card cards mb-3"  data-aos="fade-up"style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/south1.jfif" class="img-fluid imgs rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Snacks:- South starter</h5>
                          <p class="bold">Rs 100 per plate</p>
                          <p class="bold card-text">4 idlis, 1 chutney + Dosa</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card cards mb-3"  data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/idli_dosa.jfif" class="img-fluid imgs  " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Snacks:- South starter</h5>
                          <p class="bold">Rs 100 per plate</p>
                          <p class="bold card-text">4 idlis, 1 chutney + Dosa</p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card cards mb-3" data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/sandwich.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Snacks:-Sandwich</h5>
                          <p class="bold">Rs 80</p>
                          <p class="bold card-text">Cheese Grilled Sandwich </p>
                          <p class="card-text"><small class="text-muted"><a href="order.html" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card cards mb-3" data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/Chickensandwich.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Snacks:-Sandwich</h5>
                          <p class="bold">Rs 120</p>
                          <p class="bold card-text">Chicken Sandwich </p>
                          <p class="card-text"><small class="text-muted"><a href="order.php" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card cards mb-3" data-aos="fade-up" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="images/coke.jfif" class="img-fluid imgs " alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body gx-0 ">
                          <h5 class="bold card-title">Drinks</h5>
                          <p class="bold">Rs 30 per</p>
                          <p class="bold card-text">Coke </p>
                          <p class="card-text"><small class="text-muted"><a href="order.php" class="btn btn-primary">Order Now</a></small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                   -->

                 
                
            </div>

            

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