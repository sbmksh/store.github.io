<?php session_start(); ?>

<div class="sticky">

<div class="topnav" id="myTopnav">
    <a href="/store/index.php" class="active">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <!-- <div class="dropdown">
        <button class="dropbtn">Shop with Categories
            <i class="fa fa-caret-down"></i>
        </button>

        <div class="dropdown-content"> -->
        <?php
        require "_dbconnect.php";
        // $sql1= "SELECT * FROM `category`";
        $sql2= "SELECT * FROM `brand`";
        // $result = mysqli_query($conn, $sql1);
        // while($row = mysqli_fetch_assoc($result))
        // {
        // echo '<a href="/store/pages/products_category.php?cat_id='.$row["cat_id"].'">'.$row["cat_name"].'</a>';
        // }
        // echo '   </div>
        // </div>';
        echo '
        <div class="dropdown">
            <button class="dropbtn">Shop with Brand
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">';
            $result = mysqli_query($conn, $sql2);
            while($row = mysqli_fetch_assoc($result))
            {
            echo '<a href="/store/pages/products_brand.php?brand_id='.$row["brand_id"].'">'.$row["brand_name"].'</a>';
            }
            echo '
                  </div>
                </div>';
              
        
        
        ?>                  
    <!-- <div class="search">
        <form action="" method="post">
           
            <input type="search" name="" id="" placeholder="search any product here">
            <input type="submit" value="search">
        </form>
    </div> -->
    <a href="#about">About</a>
    <!-- <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> -->
    <a href="javascript:void(0);" class="icon" onclick="toggleNav()">
        <div class="menu" onclick="togglemenu(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </a>
    
</div>

<?php


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true)
{
  $user_id=$_SESSION['id'];
  $sql="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
  $result=mysqli_query($conn,$sql);  
  $total= mysqli_num_rows($result);
  $sql="SELECT * FROM `wishlist` WHERE `user_id`='$user_id'";
  $result=mysqli_query($conn,$sql);
  $totalwish= mysqli_num_rows($result);
echo '
<div class="downnav">
  <a class="active" href="#">Welcome <span class="uppercase"><strong>'.$_SESSION['name'].'</strong></span></a>
  <a href="/store/pages/cart.php" class="p-0 mx-1" >Cart<img  src="/store/img/icon/cart.png" alt="" height="40px"><sup>'.$total.'</sup></a>
  <a href="/store/pages/wishlist.php" class="p-0 mx-1">wishlist<img  src="/store/img/icon/wishlist.png" alt="" height="40px"><sup>'.$totalwish.'</sup></a>
  <a href="/store/handlers/logout_handler.php" style="background-color: #f3572cb1">Logout</a>';
  if($_SESSION['type']=='admin')
  echo '  <a href="/store/pages/admin_dashboard.php"> Admin Dashboard</a>';
 echo ' <div class="search-container">
 <form action="/store/pages/search.php" method="GET">
 <input type="text" placeholder="Search.." name="search">
 <button type="submit"><i class="fa fa-search"></i></button>
</form>
  </div>
</div>';
}
else{echo '
    <div class="downnav">
      <a class="active" href="#home">Welcome Guest</a>
      <a href="#about" class="p-0  mx-1" >cart<img  src="/store/img/icon/cart.png" alt="" height="40px"><sup>0</sup></a>
      <a href="#about" class="p-0  mx-1" >wishlist<img  src="/store/img/icon/wishlist.png" alt="" height="40px"><sup>0</sup></a>
      <a href="#" onclick="document.getElementById(`login-modal`).style.display=`block`" style="background-color:#43f43696">Login</a>
      <div class="search-container">
        <form action="/store/pages/search.php" method="GET">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>';

}
echo '</div>';



if(isset($_GET['alert']))
{
    echo '<div class="alert" id="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>'.$_GET["alert"].'
    
  </div>
  <script>function close() {document.getElementById(`alert`).style.display=`none`;}
setTimeout(close, 5000 )</script>';
}
else if(isset($_GET['error']))
{
    echo '<div class="error" id="error">
    <span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>
    '.$_GET["error"].'
  </div>
  
  <script>function close() {document.getElementById(`error`).style.display=`none`;}
setTimeout(close, 5000 )</script>
';

}



?>

<?php 
require "_signup_modal.php"; 
?>
<?php 
require "_login_modal.php"; 
?>

