
    <?php include('partials-front/menu.php'); ?>

    <!-- House sEARCH Section Starts Here -->
    <section class="house-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>house-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Houses.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- HOuse sEARCH Section Ends Here -->



    <!-- House MEnu Section Starts Here -->
    <section class="house-menu">
        <div class="container">
            <h2 class="text-center">Houses</h2>

            <?php 
                //Display House that are Active
                $sql = "SELECT * FROM tbl_house WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the houses are availalable or not
                if($count>0)
                {
                    //house Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="house-menu-box">
                            <div class="house-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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
                    //HOuse not Available
                    echo "<div class='error'>House not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>