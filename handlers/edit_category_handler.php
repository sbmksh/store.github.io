<?php
include '../partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cat_id=$_POST['cid'];
        $cat_name= $_POST['cname'];
        $sql="UPDATE `category` SET `cat_name`='$cat_name' WHERE `cat_id`='$cat_id'";
        if($result=mysqli_query($conn,$sql))
        {
                $sql="UPDATE `item` SET `cat_name`='$cat_name' WHERE `cat_name`='$name'";

                if($result=mysqli_query($conn,$sql))
                {


                $alert="Category name updated successfully";
                header("location: /store/pages/view_category.php?alert=$alert");
                exit();
                }
        }
        else
        $error="unable to update, try again later";

        header("location: /store/pages/view_category.php?error=$error");

    }

    ?>