<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '../partials/_dbconnect.php';

    $user_name = $_POST['username'];
    $name = $_POST['name'];
    $psw = $_POST['psw'];
    $psw_rep = $_POST['psw-repeat'];
    

    //check weather this email exist
    $existSql = "select * from `user` where user_name='$user_name'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        $showError = "username already in use";

    }
    else{

        if($psw == $psw_rep)
        {
            $hash = password_hash($psw, PASSWORD_DEFAULT);
            $sql= "INSERT INTO `user`( `user_name`, `name`, `password`) VALUES ('$user_name','$name','$hash')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                $showAlert = "Congratulations! You have successfully registered your account. Login to continue Shopping";
                header("location: /store/index.php?alert=$showAlert");
                exit();
            }
        }
        else
        {
            $showError = "passwords do not match";
            
        }
    }
    header("location: /store/index.php?error=$showError");


}

?>