<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online store website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>

    
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">
    <link rel="stylesheet" href="/store/css/slider.css">

</head>

<body>
    <?php
// call header 
 require_once "partials/_header.php";
echo ' <div class="container-fluid">';
 require_once "partials/_slider.php";

echo ' </div>
<div class="container">
<h2 style="text-align:center">Categories</h2>';
require "partials/_cat_slider.php";




echo '<div class=" grid-box">';

$sql= "SELECT * FROM `item`";
$result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
          $heading=$row['item_name'];
          $price= $row['price'];
          $description= $row['description'];
          $photo= $row['photo'];
          $item_id=$row['item_id'];
          
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

        echo '</div>';
        echo '</div>';

        // call footer 
require_once "partials/_footer.php";

?>


</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>
<script src='https://use.fontawesome.com/826a7e3dce.js'></script>
<script  src="js/slider.js"></script>

</html>