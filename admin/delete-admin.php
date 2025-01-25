<?php 

    //Include constants.php file here
    include('../config/constants.php');

    //1. get the ID of the admin to be deleted
    echo $id = $_GET['id'];

    //2. Create SQL query to delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true)
    {
        //Query executed Successfully and Admin Deleted
        //echo "Admin Deleted";
        //Create Session Variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";

        //Redirect to Manage Admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
        // echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class ='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //3. redirect to manage admin page with message (success/error) 

    ?>