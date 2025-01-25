<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        
        <br><br><br>

        <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
        ?>
        <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from Database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; //Display the latest order at first
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //create a seriial number and set its initial value as 1

                        if($count>0)
                        {
                            //Order Available
                            while ($row=mysqli_fetch_assoc($res)) 
                            {
                                //get all order details
                                $id = $row['ID'];
                                $food = $row['Food'];
                                $price = $row['Price'];
                                $qty = $row['Quantity'];
                                $total = $row['Total'];
                                $order_date = $row['Order_date'];
                                $status = $row['Status'];
                                $customer_name = $row['Customer_name'];
                                $Customer_contact = $row['Customer_contact'];
                                $Customer_email = $row['Customer_email'];
                                $Customer_address = $row['Customer_address'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery") 
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered") 
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled") 
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $Customer_contact; ?></td>
                                        <td><?php echo $Customer_email; ?></td>
                                        <td><?php echo $Customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //Order not available
                            echo "<tr><td colspan='12' class='error'>Orders not Available. </td></tr>";
                        }
                    ?>

                    

                    
                </table>
    </div>
</div>


<?php include('partials/footer.php'); ?>
