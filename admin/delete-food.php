<?php
    //Include constants page
    include('../config/constants.php');

    // echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        //process to Delete
        // echo "Process to Delete";

        //1. Get ID and Image Name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove The image if Available
        if($image_name != "")
        {
            //It has image and need to remove from folder
            //Get the image path
            $path = "../images/food/".$image_name;

            //Remove Image fille from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to Remove Image
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image</div>";
                //Redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the process of deleting food
                die();
            }
        }
        //3. Delete food from database
        $sql = "DELETE FROM tbl_food WHERE ID=$id";
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //To Check if the session message is ser ot not
        //4. Redirect to manage Food with session message
        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else 
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

    }
    else
    {
        //Redirect to Manage Food page
        // echo "Redirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>