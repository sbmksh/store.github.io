<?php
include '../partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $brand_id=$_POST['bid'];
        $brand_name= $_POST['bname'];
        $sql="UPDATE `brand` SET `brand_name`='$brand_name' WHERE `brand_id`='$brand_id'";

        if($result=mysqli_query($conn,$sql))
        {
                $sql="UPDATE `item` SET `brand_name`='$brand_name' WHERE `brand_name`='$name'";
                if($result=mysqli_query($conn,$sql))
                {

                $alert="Brand name updated successfully";
                
                header("location: /store/pages/view_brand.php?alert=$alert");
                exit();
                }
        }
        else
        $error="unable to update, try again later";

        

        header("location: /store/pages/view_brand.php?error=$error");

    }

    ?>