<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view categories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    <?php
        // call header 
        require "../partials/_header.php";
        require "../partials/_edit_category_modal.php";
        
       

        echo '<h1 class="center">View Categories</h1>
         <div class="container box-m">';
         $sql="SELECT * FROM `category`";
         $result= mysqli_query($conn, $sql);

         while($row=mysqli_fetch_assoc($result))
         {
            

         
            echo ' <div class="list"><p>'.$row['cat_name'].'</p></div>
                    <div class="sp-col-2">
                        <form action="#" method="get" style="display:inline">
                            <input type="hidden" name="edit_cat_id" value="'.$row["cat_id"].'">
                            <input type="submit" class="btn-3"  value="edit" onclick="document.getElementById(`edit-category`).style.display=`block`">
                        </form>
                        <a href="/store/handlers/delete_category_handler.php?cat_id='.$row["cat_id"].'"><button class="btn-3  mx-1" role="button">Delete category</button></a>
                        <a href="#"><button class="btn-3  mx-1" role="button">View products</button></a>     
                    </div>';
         
         }

         


        

echo '</div>';

        // call footer 
        require "../partials/_footer.php";
 
    ?>



</body>

</html>