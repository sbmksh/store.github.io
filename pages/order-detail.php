<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    
    <?php
// call header 
 require_once "../partials/_header.php";
 
echo ' <div class="container">

<h2 class="center">Order Summary</h2>
            <table width="100%">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        
                    </tr>
                </thead>
                <tbody>';
                if(isset($_GET['invoice_id']))
                {
                    $inv_id= $_GET['invoice_id'];
                    $sql="SELECT * FROM `orders` WHERE `invoice_id`='$inv_id'";
                    $result= mysqli_query($conn,$sql);
                    $grand_total=0;
                   
                    while($row=mysqli_fetch_assoc($result)){
                        $item_name=$row['item_name'];
                        $price=$row['price'];
                        $quantity=$row['quantity'];
                        $totalPrice=$price*$quantity;
                       
                        echo '<tr>
                        <td><div class="cartitem">'.$item_name.'</div></td>
                        <td><div class="center">Rs'.$price.'</div></td>
                        <td><div class="center">'.$quantity.'</div></td>
                        <td><div class="center">Rs '.$totalPrice.'</div></td>
                       
                                </tr>';
                                $grand_total=$grand_total+$totalPrice;
                    }
                    echo '<tr>
                        <td><div class="cartitem"></div></td>
                        <td><div class="center"></div></td>
                        <td><div class="center"></div></td>
                        <td><div class="center">Total charge:'.$grand_total.'</div></td>
                       
                                </tr>';
                    
                    }
echo '
                </tbody>
            </table>

        ';
        // call footer 
        require_once "../partials/_footer.php";
        ?>
        
        
        
                   
        
        
                
        
        
        </div>
        
        
        </body>
        
        </html>