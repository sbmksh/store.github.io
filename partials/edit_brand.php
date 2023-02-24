<?php
$brand_id=$_GET['edit_brand_id'];
$sql= "SELECT * FROM `brand` WHERE `brand_id`='$brand_id'";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($result);
$name= $row['brand_name'];






echo '
    

<form class="sp-col-3" action="#" method="post">
       

        
            <h3>Edit Brand</h3>
            <label for="cname"><b>Brand Name</b></label>
            <input type="text" name="bname" value="'.$name.'">
            <input type="hidden" name="bid" value="'.$brand_id.'">


            <button class="btn-3" type="submit">Submit</button>

            

           
              

       
    </form>';


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