
    <?php include('partials-front/menu.php'); ?>

    <!-- House sEARCH Section Starts Here -->
    <section class="house-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Houses on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- HOuse sEARCH Section Ends Here -->



    <!-- HOuse MEnu Section Starts Here -->
    <section class="house-menu">
        <div class="container">
            <h2 class="text-center">House Menu</h2>

            <?php 

                //SQL Query to Get house based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_house WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT * FROM tbl_house WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether house available of not
                if($count>0)
                {
                    //House Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="house-menu-box">
                            <div class="house-menu-img">
                                <?php 
                                    // Check whether image name is available or not
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

                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food Not Available
                    echo "<div class='error'>house not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>