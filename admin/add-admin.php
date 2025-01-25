<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br/><br/>

        <?php
            if(isset($_SESSION['add'])) //Checking whether the Session is Set or Not
            {
                echo $_SESSION['add']; // Displaying the Session Message if Set
                unset($_SESSION['add']);//Remove the Session Message
            }
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" id="" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php');?>

<?php 
    //Process the Value from Form and Save it in the database
    //Check whether the button is clicked or not 

    if (isset($_POST['submit']))
    {
        // Button clicked 
        // echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password encrypted with MD5

       //2.SQL Query to Save the data into database
       $sql = "INSERT INTO tbl_admin SET
        Full_name = '$full_name',
        Username = '$username',
        Password = '$password'
       ";

       //3. Executing Query and Saving the Data into Database
       $res = mysqli_query($conn, $sql) or die(mysqli_error());
       
       //4. Check whether the (Query is Excuted) data is inserted or not and display appropriate message 
       if($res==TRUE)
       {
            //Data Inserted
            //echo "Data Inserted";
            //Create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
           
            //Redirect Page to Manage admin
            header("location:".SITEURL.'admin/manage-admin.php');

       }
       else
       {
            //FAILED TO INSERT DATA
            //echo "Failed to Insert Data";
             //Create a session variable to display message
             $_SESSION['add'] = "<div class ='error'>Failed to Add Admin</div>";
           
             //Redirect Page to Add admin
             header("location:".SITEURL.'admin/add-admin.php');
       }

    }
?>