<?php
include '../partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST" )
{
    $itemname= $_POST['itemname'];
    $keywords= $_POST['keywords'];
    $price= $_POST['price'];
    $stock= $_POST['stock'];
    $description= $_POST['description'];
    $container_type= $_POST['container_type'];
    $quantity= $_POST['quantity'];
    $ingridients= $_POST['ingridients'];
    $max_shelf_life= $_POST['max_shelf_life'];
    $source_type= $_POST['source_type'];
    $organic= $_POST['organic'];
    $usedfor= $_POST['usedfor'];
    $brandname= $_POST['brandname'];
    $category= $_POST['category'];
    $item_id= $_POST['item_id'];

    $sql="UPDATE `item` SET `cat_name`='$category',`brand_name`='$brandname',`item_name`='$itemname',`keyword`='$keywords',`price`='$price',`stock`='$stock',`description`='$description',`container_type`='$container_type',`quantity`='$quantity',`Ingredients`='$ingridients',`maximum_shelf_life`='$max_shelf_life',`source_type`='$source_type',`organic`='$organic',`used_for`='$usedfor' WHERE `item_id`='$item_id'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $alert="You have successfully updated the items";
        header("location: /store/pages/admin_dashboard.php?alert=$alert");
    }





}



?>