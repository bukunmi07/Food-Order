<?php include('partials-front/menu.php');  ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            
            <h2 class="subheading text-center">Explore Foods</h2>

            <?php

                //Display all the categories that are active
                //SQL Query
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether categories available or not
                if($count>0)
                {
                    //Categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values
                        $id = $row['ID'];
                        $title = $row['Title'];
                        $image_name = $row['Image_name'];
                        ?>
                            
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php 
                                        if($image_name=="")
                                        {
                                            //Image Not Available
                                            echo "<div class='error'>Image not found. </div>";
                                        }
                                        else
                                        {
                                            //Image Available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>
                        
                        <?php
                    }
                }
                else
                {
                    //Categories Not Available
                    echo "<div class='error'>Category not found. </div>";
                }
            ?>

            


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php');  ?>
