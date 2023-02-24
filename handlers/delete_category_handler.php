<?php
include '../partials/_dbconnect.php';

// if($_SERVER["REQUEST_METHOD"]=="get")
if(isset($_GET['cat_id']))
{
$cat_id=$_GET['cat_id'];
$sql="DELETE FROM `category` WHERE `cat_id`='$cat_id'";
if($result= mysqli_query($conn, $sql)){
$alert="category deleted successfully";
header("location: /store/pages/view_category.php?alert=$alert");
                    exit();
}
else
$error="some error occord , unable to delete category, try again";

header("location: /store/pages/view_category.php?error=$error");

}

?>
