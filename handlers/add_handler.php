<?php
include '../partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['cname']))
{
    $targetDir = "../img/category/";
    $fileName =  basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $cname=$_POST['cname'];
    $sqlcheck="SELECT * FROM `category` WHERE `cat_name`='$cname'";

    $result = mysqli_query($conn, $sqlcheck);

    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        $error="Category already exists";
    }

    else{


            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database

                    $sql="INSERT INTO `category`( `cat_name`,`image`) VALUES ('$cname','$fileName')";
                    if($result = mysqli_query($conn, $sql))
                        {
                            $alert="Category added successfully";
                            header("location: /store/pages/admin_dashboard.php?alert=$alert");
                            exit();
                        }
                        else{
                        $error="some error occured! try again";
                        }
                    }
                    else{
                            $error = "Sorry, there was an error uploading your file.";
                        }
                    }
                else{
                        $error = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                    }
                }
        header("location: /store/pages/admin_dashboard.php?error=$error");
    
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['brandname']))
{
    $brandname=$_POST['brandname'];
    $sqlcheck="SELECT * FROM `brand` WHERE `brand_name`='$brandname'";

    $result = mysqli_query($conn, $sqlcheck);

    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        $error="Brand already exists";
    }

    else{

            $sql="INSERT INTO `brand`( `brand_name`) VALUES ('$brandname')";
            if($result = mysqli_query($conn, $sql))
                {
                    $alert="Brand added successfully";
                    header("location: /store/pages/admin_dashboard.php?alert=$alert");
                    exit();

                }
                else
                $error="some error occured! try again";

        }
header("location: /store/pages/admin_dashboard.php?error=$error");
}



?>