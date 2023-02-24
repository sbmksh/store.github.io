<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    <?php
// call header 
 require_once "../partials/_header.php";

//  call modals 
 require_once "../partials/_add_category_modal.php";
 require_once "../partials/_add_brand_modal.php";
 require_once "../partials/_add_item_modal.php";
 require_once "../partials/_add_item_modal.php";
 


 
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='admin')
 {

     
     
     echo '<h1>Welcome to Admin Dashboard</h1>';

    echo ' <div class="grid-box-1">
     <div>
     <button class="btn-3" role="button" onclick="document.getElementById(`add-category`).style.display=`block`" >Add Category</button>
     </div>
     <div>
     <a href="/store/pages/view_category.php"><button class="btn-3" role="button" >View Category</button></a>
     </div>
     <div>
     <a href="#"><button class="btn-3" role="button" onclick="document.getElementById(`add-brand`).style.display=`block`">Add Brand</button></a>
     </div>
     <div>
     <a href="/store/pages/view_brand.php"><button class="btn-3" role="button">View Brand</button></a>
     </div>
     <div>
     <a href="#"><button class="btn-3" role="button" onclick="document.getElementById(`add-item`).style.display=`block`">Add Item</button></a>
     </div>
     <div>
     <a href="/store/pages/view_items.php"><button class="btn-3" role="button">View Items</button></a>
     </div>
     <div>
     <a href="/store/pages/orders_admin.php"><button class="btn-3" role="button">View Orders</button></a>
     </div>
     
     </div>';

    

     
     
     // call footer 
     require_once "../partials/_footer.php";
}
else 
{
    header("location: /store/index.php");
}
?>



</body>

</html>