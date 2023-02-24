<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wishlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    <?php
// call header 
 require "../partials/_header.php";

 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='user')
{$user_id=$_SESSION['id'];
    $sql="SELECT * FROM `wishlist` WHERE `user_id`='$user_id'";
    $result= mysqli_query($conn,$sql);
    echo '<div class="container">
    <h1 style="text-align:center">Your wishlist</h1>
    <table width="100%">
        <thead>
            <tr>
            <th >Item</th>
            <th >Price</th>
            <th> </th>           
            <th ></th>
            </tr>
        </thead>
        <tbody>';
        while($row=mysqli_fetch_assoc($result)){
            $item_id=$row['item_id'];
            $sql="SELECT * FROM `item` WHERE `item_id`='$item_id'";
            $result2=mysqli_query($conn,$sql);
            $row2=mysqli_fetch_assoc($result2);
            $item_name=$row2['item_name'];
            $photo=$row2['photo'];
            $price=$row2['price'];           
            
            echo '<tr>
            <td><div class="cartitem"><img src="/store/img/product/'.$photo.'" alt="'.$item_name.'"> <div class="center">'.$item_name.'</div></div></td>
            <td><div class="center"><p style="text-align:center">Rs'.$price.'</p></div></td>
            <td><div class="center"><a href="/store/handlers/cart_handler.php?item_id='.$item_id.'&price='.$price.'"><button class="btn-2">Add to Cart</button></a></div>
                                    </td>            
            <td><div class="center"><form action="/store/handlers/wishlist_handler.php" method="post">
                                    <input type="hidden" name="d_wishlist_id" value="'.$row['id'].'">
                                    <input class="btn-2" type="submit" value="Delete">
                                    </form></div></td></div></td>
        </tr>';

            



        }
    


}




        // call footer 
require "../partials/_footer.php";
?>



           


        </tbody>


    </table>
</div>




</body>

</html>