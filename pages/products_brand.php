<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products with brand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    <?php
// call header 
 require_once "../partials/_header.php";
 

if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET['brand_id']))
{
    $brand_id= $_GET['brand_id'];
echo '<div class="container grid-box">';
$sqlbrand="SELECT * FROM `brand` WHERE `brand_id` = '$brand_id'";
$result = mysqli_query($conn, $sqlbrand);
$row = mysqli_fetch_assoc($result);
$brand_name= $row['brand_name'];




$sql= "SELECT * FROM `item` WHERE `brand_name`='$brand_name'";
$result = mysqli_query($conn, $sql);
$noitem= true;
        while($row = mysqli_fetch_assoc($result))
        {
          $heading=$row['item_name'];
          $price= $row['price'];
          $description= $row['description'];
          $photo= $row['photo'];
          $item_id=$row['item_id'];
          $noitem=false;
          
          echo '
          <div class="card">

          <a href="/store/pages/product.php?item_id='.$item_id.'" ><img src="/store/img/product/'.$photo.'" alt="'.$heading.'" style="width:100%"></a>
          <a href="/store/pages/product.php?item_id='.$item_id.'" ><h3>'.$heading.'</h3></a>
          <p class="price">Rs.'.$price.'</p>
          <p>'. substr($description, 0, 100).'...</p>
          <a href="/store/handlers/cart_handler.php?item_id='.$item_id.'&price='.$price.'"><button class="btn-2">Add to Cart</button></a>
          <a href="/store/handlers/wishlist_handler.php?item_id='.$item_id.'&price='.$price.'"><button class="btn-2">Add to wishlist</button></a>
          <a href=""><button class="btn-2">buy now</button></a>
        
        </div>';
        }

        if($noitem==true)
        {
            echo '<h1>No Items available </h1>';
        }

        echo '</div>';
    }

        // call footer 
require_once "../partials/_footer.php";

?>


</body>

</html>