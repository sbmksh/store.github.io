<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>


    <?php
        // call header 
        require_once "../partials/_header.php";
        require "../partials/edit_item_modal.php";

        echo '  <form action="" method="get">
                    <input type="text" name="item_search" placeholder="search products to view" style="width:80%">
                    <input type="submit" value="Search" class="btn-2">
                </form>';

        echo ' <table width="100%">
        <thead>
            <tr>
            <th >Item</th>
            <th >Price</th>
            <th >Quantity</th>
            <th >Edit</th>
            <th >Delete</th>
            </tr>
        </thead>
        <tbody>';
        // select all the items from the item list 


        $sql="SELECT * FROM `item`";


        // if search is set 
        if(isset($_GET['item_search']))
        {
            $search=$_GET['item_search'];
            $sql="SELECT * FROM `item` WHERE MATCH(`cat_name`,`keyword`,`item_name`) AGAINST ('$search')";
        }

        $result=mysqli_query($conn, $sql);        
        while($row= mysqli_fetch_assoc($result))
        {
            $item_id= $row['item_id'];
            $item_name=$row['item_name'];
            $price=$row['price'];
            $quantity=$row['quantity'];
            



            echo    '<tr>
                        <td>'.$item_name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$quantity.'</td>
                        <td><form action="#" method="get">
                                <input type="hidden" name="edit_item" value="'.$item_id.'">
                                <input type="submit" class="btn-2"  value="edit" onclick="document.getElementById(`edit-item`).style.display=`block`">
                            </form>
                        </td>
                        <td><form action="#" method="get">
                                <input type="hidden" name="delete_item" value="'.$item_id.'">
                                <input type="submit" class="btn-2"  value="delete">
                            </form>
                        </td>
                    </tr>';
        }


        // check if delete request is set 
        if(isset($_GET['delete_item']))
        {
            $delete_item=$_GET['delete_item'];
            $sql="DELETE FROM `item` WHERE `item_id`='$delete_item'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $alert="item deleted from the list";
                header("location: /store/pages/view_items.php?alert=$alert");
            }
            
        }







         // call footer 
         require_once "../partials/_footer.php";
 
         ?>
     
    
     
     </body>
     
     </html>
