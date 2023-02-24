<?php
include '../partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $brandname= $_POST['brandname'];
    $category= $_POST['category'];
    $targetDir = "../img/product/";
    $fileName =  basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    
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

    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

            $sql= "INSERT INTO `item`( `cat_name`, `brand_name`, `item_name`, `keyword`, `price`, `stock`, `description`, `container_type`, `quantity`, `Ingredients`, `maximum_shelf_life`, `source_type`, `organic`, `used_for`, `photo`) VALUES ('$category','$brandname','$itemname','$keywords','$price','$stock','$description','$container_type','$quantity','$ingridients','$max_shelf_life','$source_type','$organic','$usedfor','$fileName')";
            $result = mysqli_query($conn, $sql);

            if($result){
                $statusMsg = "Your Item has been uploaded successfully.";
                header("location: /store/pages/admin_dashboard.php?alert=$statusMsg");
                    exit();

            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
    }

    header("location: /store/pages/admin_dashboard.php?error=$statusMsg");
   
}