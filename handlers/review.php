<?php
require "../partials/_dbconnect.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['user_id']>0)
{
    $user_id=$_POST['user_id'];
    $user_name=$_POST['user_name'];
    $item_id=$_POST['item_id'];
    $review=$_POST['review'];


    $sql="INSERT INTO `review`(`user_id`, `product_id`, `comment` ,`user_name`) VALUES ('$user_id','$item_id','$review','$user_name')";
    
    if($result= mysqli_query($conn, $sql))
    {
        $alert="your review is important to us! thanks for your valuable review";
        header("location: /store/pages/product.php?alert=$alert&item_id=$item_id");
                    exit(); 
    }
    else{
        $error="something went wrong, unable to post your review";

    }
}
else{
    $error="please login to post your review";

}
$item_id=$_POST['item_id'];

header("location: /store/pages/product.php?error=$error&item_id=$item_id");

?>