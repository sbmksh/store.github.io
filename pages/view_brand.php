<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view brands</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    <?php
        // call header 
        require_once "../partials/_header.php";
        require_once "../partials/_edit_brand_modal.php";
        

        echo '<h1 class="center">View Brands</h1>
         <div class="container box-m">';
         $sql="SELECT * FROM `brand`";
         $result= mysqli_query($conn, $sql);

         while($row=mysqli_fetch_assoc($result))
         {
            
                    echo ' <div class="list"><p>'.$row['brand_name'].'</p></div>
                    <div class="sp-col-2">
                        <form action="#" method="get" style="display:inline">
                            <input type="hidden" name="edit_brand_id" value="'.$row["brand_id"].'">
                            <input type="submit" class="btn-3"  value="edit" onclick="document.getElementById(`edit-brand`).style.display=`block`">
                        </form>
                        <a href="/store/handlers/delete_brand_handler.php?brand_id='.$row["brand_id"].'"><button class="btn-3  mx-1" role="button">Delete brand</button></a>
                        <a href="#"><button class="btn-3  mx-1" role="button">View products</button></a>     
                    </div>';

         }


        



        

echo '</div>';



        // call footer 
        require_once "../partials/_footer.php";
 
    ?>



</body>

</html>