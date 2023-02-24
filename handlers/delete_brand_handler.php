<?php
include '../partials/_dbconnect.php';

// if($_SERVER["REQUEST_METHOD"]=="get")
if(isset($_GET['brand_id']))
{
$brand_id=$_GET['brand_id'];
$sql="DELETE FROM `brand` WHERE `brand_id`='$brand_id'";
if($result= mysqli_query($conn, $sql)){
$alert="brand deleted successfully";
header("location: /store/pages/view_brand.php?alert=$alert");
                    exit();
}
else
$error="some error occord , unable to delete brand, try again";

header("location: /store/pages/view_brand.php?error=$error");

}

?>
