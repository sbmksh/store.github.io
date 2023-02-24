<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    include '../partials/_dbconnect.php';


    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    $usertype= $_POST['usertype']; 

    
if($usertype=='user'){


    $sqlcheck = "select * from user where user_name= '$uname'";
    $result = mysqli_query($conn, $sqlcheck);

    $numRows = mysqli_num_rows($result);
    if($numRows==1)
    {
        
        $row = mysqli_fetch_assoc($result);
        
        
        if(password_verify($psw, $row['password']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['type']= $usertype;
            
            header("location: /store/index.php");
            exit();
            
            
        }
        else
        {
            $error = "unable to login password mismatch" ;          
        }    

    }
    else
    {    
    $error = "user not found ! Please try again." ;
    }
    
}
else if($usertype=='admin'){
    
    $sqlcheck = "select * from admin where user_name= '$uname'";
    $result = mysqli_query($conn, $sqlcheck);

    $numRows = mysqli_num_rows($result);
    if($numRows==1)
    {
        
        $row = mysqli_fetch_assoc($result);
        
        
        if(password_verify($psw, $row['password']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['admin_id'];
            $_SESSION['type']= $usertype;
            
            header("location: /store/pages/admin_dashboard.php");
            exit();
            
            
        }
        else
        {
            $error = "unable to login password mismatch" ;          
        }    

    }
    else
    {    
    $error = "user not found ! Please try again." ;
    }




}




}
header("location: /store/index.php?&error=$error");

?>