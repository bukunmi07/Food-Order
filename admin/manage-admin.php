<?php include('partials/menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                       echo $_SESSION['add']; //Displaying Session Message
                       unset($_SESSION['add']); //Removing Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                       echo $_SESSION['delete']; //Displaying Session Message
                       unset($_SESSION['delete']); //Removing Session Message
                    }

                    if(isset($_SESSION['update']))
                    {
                       echo $_SESSION['update']; //Displaying Session Message
                       unset($_SESSION['update']); //Removing Session Message
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                       echo $_SESSION['user-not-found']; //Displaying Session Message
                       unset($_SESSION['user-not-found']); //Removing Session Message
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                       echo $_SESSION['pwd-not-match']; //Displaying Session Message
                       unset($_SESSION['pwd-not-match']); //Removing Session Message
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                       echo $_SESSION['change-pwd']; //Displaying Session Message
                       unset($_SESSION['change-pwd']); //Removing Session Message
                    }


                ?>
                <br><br><br>


                <!--- Button to Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                
                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_admin";

                        // Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //Check whether the Query is Executedor Not
                        if($res==TRUE)
                        {
                            // Count Rows to check whether we have data in databse or not 
                            $rows = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Varirable and Assign the value

                            //Check the num of rows
                            if ($rows)
                            {
                                //We have data in database
                                while ($rows = mysqli_fetch_assoc($res)) 
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have database

                                    //Get individual data
                                    $id=$rows['ID'];
                                    $full_name=$rows['Full_name'];
                                    $username=$rows['Username'];

                                    //Display the values in our table
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?> </td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            </td>
                                        </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //We do not have data in the database
                            }
                        }
                        
                    ?>
                </table>


            </div>   
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php');?>