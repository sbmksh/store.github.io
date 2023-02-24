<?php
require "../partials/_dbconnect.php";
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='user')
{
    if(isset($_POST['d_wishlist_id']))
{
    $wishlist_id=$_POST['d_wishlist_id'];
    $sql="DELETE FROM `wishlist` WHERE `id`='$wishlist_id'";
    if($result=mysqli_query($conn,$sql))
    {
        $alert="item deleted from the wishlist";
        header("location: /store/pages/wishlist.php?alert=$alert");
        exit();
    }

}


    if(isset($_GET['item_id']))
    {
        $user_id=$_SESSION['id'];
        $item_id= $_GET['item_id'];
        $price= $_GET['price'];
        $sql= "SELECT * FROM `wishlist` WHERE `user_id`='$user_id' && `item_id`='$item_id'";
        $result= mysqli_query($conn, $sql);
        $numrows= mysqli_num_rows($result);
        $row= mysqli_fetch_assoc($result);

        if($numrows>0)
        {
            $error="Item already present in your wishlist";
            header("location: /store/index.php?error=$error");
                    exit();


        }
        else{


        $sql="INSERT INTO `wishlist`(`user_id`, `item_id`, `price`) VALUES ('$user_id','$item_id','$price')";
        
        if($result= mysqli_query($conn,$sql))
        {
            $alert="Item added to wishlist";
            header("location: /store/index.php?alert=$alert");
                    exit();
        }
        else
        $error="something went wrong, Item was not added to wishlist! try again later";
    }



    }
   
}
else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='admin'){
    $error="Please login through user account to add items to wishlist";
}
else{
    $error="please login to add items to wishlist";
}
header("location: /store/index.php?error=$error");

?>