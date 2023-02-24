<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/Drift.min.js" integrity="sha512-Pd9pNKoNtEB70QRXTvNWLO5kqcL9zK88R4SIvThaMcQRC3g8ilKFNQawEr+PSyMtf/JTjV7pbFOFnkVdr0zKvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/drift-basic.min.css" integrity="sha512-us5Qz8z1MIzLykX5KtvnVAcomNfU28BC7wdaZS2QICFxgJo4QoLj6OXq/FeAl+qb+qyqsxilHoiMBgprdnKtlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">
   
   <style>
  <style>
 .review input[type="text"]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

    .demo-area{
  background:rgb(255, 255, 255);
  border-radius:8px;
  padding:20px;
}
.demo-area section{
  padding-top: 40px;
    padding-left: 40px;
}

.demo-trigger {
  display: inline-block;
  width: 30%;
  float:left;
}

.detail {
  position: relative;
  width: 65%;
  margin-left: 5%;
  float: left;
  margin-top: 1%;
  
}


@media (max-width: 610px) {

  .detail, .demo-trigger {
    float: none;
  }

  .demo-trigger {
    display:block;
    width: 50%;
    max-width:200px;
    margin: 0 auto;
  }

  .detail {
    margin: 0;
    width: auto;
  }

  p {
    margin: 0 auto 1em;
  }

  .responsive-hint {
    display: none;
  }
  h3 {
    margin-top:20px;
  }
}
   </style>

   </style>

</head>

<body>
    <?php
    
   
// call header 
 require_once "../partials/_header.php";



 if($_SERVER["REQUEST_METHOD"]=="GET")
{

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
    $user_id= $_SESSION['id'];
    $_user_name=$_SESSION['name'];
    }
    else{
    $user_id= 0;
    $_user_name="Guest";
    }

    $item_id= $_GET['item_id'];
    // $_GET['item_id'];
    $sql="SELECT * FROM `item` WHERE `item_id`='$item_id'";
    $result=mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);

// get all the details of the product 
    
    $brandname = $row['brand_name'];
    $category = $row['cat_name'];
    $itemname = $row['item_name'];    
    $price = $row['price'];
    $stock = $row['stock'];
    $description = $row['description'];
    $container_type = $row['container_type'];
    $quantity = $row['quantity'];
    $ingridients = $row['Ingredients'];
    $max_shelf_life = $row['maximum_shelf_life'];
    $source_type = $row['source_type'];
    $organic = $row['organic'];
    $usedfor = $row['used_for'];
    $photo= $row['photo'];

    echo '
    <section class="content">
  <article class="demo-area">
  <img class="demo-trigger" src="/store/img/product/'.$photo.'?w=200&ch=DPR&dpr=2&border=1,ddd" data-zoom="/store/img/product/'.$photo.'?w=1000&ch=DPR&dpr=2">
  <div class="detail">
  <section>
      <h3>'.$itemname.'</h3>
      <h4>Specifications:</h4>
      <ul>
        
        <li ><strong>Brand  :</strong>'.$brandname.'</li>
        <li><strong>Quantity :</strong>        '.$quantity.'</li>
        <li><strong>Container type :</strong> '.$container_type.'</li>
        <li><strong>Ingredients :</strong> '.$ingridients.'</li>
        <li><strong>Maximum Shelf Life :</strong> '.$max_shelf_life.'</li>
        <li><strong>Source Type :</strong> '.$source_type.'</li>
        <li><strong>Organic :</strong> '.$organic.'</li>
        <li><strong>Used for :</strong> '.$usedfor.'</li>
        
      </ul>
      <h4>Rs. '.$price.'  <a href="/store/handlers/cart_handler.php?item_id='.$item_id.'&price='.$price.'"><button class="btn-2">Add to Cart</button></a>
      <a href="/store/handlers/wishlist_handler.php?item_id='.$item_id.'&price='.$price.'"><button class="btn-2">Add to wishlist</button></a>
      <a href=""><button class="btn-2">buy now</button></a></h4>
      </section>
  </div>
  </article>
  <article>
     <h1>Description</h1>
     <p>'.$description.'</p>
     </article>
     
     <h1 class="review " style="text-align:center">Review</h1>';
    $sql="SELECT * FROM `review` WHERE `product_id`='$item_id'";
    $result=mysqli_query($conn,$sql);
    $reviewcount=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $reviewcount++;
        
        $_user_id=$row['user_id'];
        $_review=$row['comment'];
        $time=$row['time'];
        $user_name=$row['user_name'];
        // if($reviewcount%2==0)
        // {
            echo '<div class="review">
            <img src="/store/img/icon/user_avatar.jpg" alt="Avatar" style="width:100%;">
            <p>'.$_review.'</p>
            <span class="time-right">On-'.$time.'</span>
            <span class="time-left">by:'.$user_name.'</span>
            </div>';
        // }
        // else{
        //   echo '<div class="review">
        //   <img src="/store/img/icon/user_avatar.jpg" alt="Avatar" style="width:100%;">
        //   <p>'.$_review.'</p>
        //         <span class="time-left">On-'.$time.'</span>
        //         <span class="time-right">by:'.$user_name.'</span>
        //         </div>';
        // }

       

    }


    if($reviewcount==0)
    {
      echo '<div class="review">
      <p> No Review available yet</p>
      </div>';
    }
    
    echo ' <div class="review">
          <form action="/store/handlers/review.php" method="post">
              <input type="text" name="review" placeholder="please give your review">
              <input type="hidden" name="item_id" value="'.$item_id.'">
              <input type="hidden" name="user_id" value="'.$user_id.'">
              <input type="hidden" name="user_name" value="'.$_user_name.'">
              <input type="submit" value="post your review">
              
          </form>
          </div>
           
          </section>';

}



        // call footer 
require_once "../partials/_footer.php";

?>

<script>
    var demoTrigger = document.querySelector('.demo-trigger');
    var paneContainer = document.querySelector('.detail');

new Drift(demoTrigger, {
  paneContainer: paneContainer,
  inlinePane: false,
});
</script>
</body>



</html>