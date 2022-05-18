    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- HOUSE sEARCH Section Starts Here -->
    <section class="house-search text-center">
        <div class="container">
            
            <h2>Houses on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- HOuse sEARCH Section Ends Here -->



    <!-- HOuse MEnu Section Starts Here -->
    <section class="house-menu">
        <div class="container">
            <h2 class="text-center">House Menu</h2>

            <?php 
            
                //Create SQL Query to Get houses based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_house WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether house is available or not
                if($count2>0)
                {
                    //House is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="house-menu-box">
                            <div class="house-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/house/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="house-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="house-price">$<?php echo $price; ?></p>
                                <p class="house-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?house_id=<?php echo $id; ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //House not available
                    echo "<div class='error'>House not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>