<?php
require "../partials/_dbconnect.php";
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='user')
{

if(isset($_POST['ucart']))
{
    $number=$_POST['ucart'];
    $cart_id= $_POST['cart_id'];
    $total_price= $_POST['price'];
    $total_price=$total_price*$number;
    $sql="UPDATE `cart` SET `number`='$number',`total_price`='$total_price' WHERE `id`='$cart_id'" ;
    if($result=mysqli_query($conn,$sql))
    {
        $alert="item updated in the cart";
        header("location: /store/pages/cart.php?alert=$alert");
        exit();
    }



}
if(isset($_POST['d_cart_id']))
{
    $cart_id=$_POST['d_cart_id'];
    $sql="DELETE FROM `cart` WHERE `id`='$cart_id'";
    if($result=mysqli_query($conn,$sql))
    {
        $alert="item deleted from the cart";
        header("location: /store/pages/cart.php?alert=$alert");
        exit();
    }

}

    if(isset($_GET['item_id']))
    {
        $user_id=$_SESSION['id'];
        $item_id= $_GET['item_id'];
        $price= $_GET['price'];
        $sql= "SELECT * FROM `cart` WHERE `user_id`='$user_id' && `item_id`='$item_id'";
        $result= mysqli_query($conn, $sql);
        $numrows= mysqli_num_rows($result);
        $row= mysqli_fetch_assoc($result);

    
        if($numrows>0)
        {
        //     $number=$row['number'];
        //     $number++;
        //     $total_price=$row['total_price'];
        //     $total_price=$total_price*$number;
        //     $id=$row['id'];
        
        //    $sql="UPDATE `cart` SET `number`='$number',`total_price`='$total_price' WHERE `id`='$id'" ;
        //    if($result= mysqli_query($conn, $sql))
        //    {
            $alert="item already in your cart ";
            header("location: /store/pages/cart.php?alert=$alert");
            exit();
          // }


        }


        else{




        $sql="INSERT INTO `cart`(`user_id`, `item_id`, `price`, `number`, `total_price`) VALUES ('$user_id','$item_id','$price',1,'$price')";
        
        if($result= mysqli_query($conn,$sql))
        {
            $alert="Item added to Cart";
            header("location: /store/index.php?alert=$alert");
                    exit();
        }
        else
        $error="something went wrong, Item was not added to cart! try again later";




    }}
   
}
else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='admin'){
    $error="Please login through user account to add items to cart";
}
else{
    $error="please login to add items to cart";
}
header("location: /store/index.php?error=$error");

?>