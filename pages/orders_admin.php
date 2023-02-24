<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- css links  -->
    <link rel="stylesheet" href="/store/css/util.css">
    <link rel="stylesheet" href="/store/css/style.css">

</head>

<body>
    <?php
// call header 
 require_once "../partials/_header.php";
 require_once "../partials/view_order_modal.php";

 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='admin')
{
    $sql="SELECT * FROM `invoice`";
    $result= mysqli_query($conn,$sql);
    echo '<div class="container">
    <h1 style="text-align:center">Invoice details</h1>
    <table width="100%">
        <thead>
            <tr>
            <th >User Name</th>
            <th >Amount Paid</th>
            <th >Order Date</th>
            <th >Details</th>
            
            </tr>
        </thead>
        <tbody>';
        // print invoice details one by one 

        while($row=mysqli_fetch_assoc($result)){
            $user_id= $row['user_id'];
            $invoice_id= $row['invoice_id'];
            
            $amount= $row['amount'];
            $invoice_date= $row['invoice_date'];
            $sql_user="SELECT `user_name` FROM `user` WHERE `user_id`='$user_id'";
            $result2=mysqli_query($conn, $sql_user);
            $row2=mysqli_fetch_assoc($result2);
            $username= $row2['user_name'];

           
            echo '<tr>
            <td><div class="center">'.$username.'</div></td>
            <td><div class="center">'.$amount.'</div></td>
            <td><div class="center">'.$invoice_date.'</div></td>
            <td><div class="center"><a href="/store/pages/order-detail.php?invoice_id='.$invoice_id.'"><button class="btn-2">Details</button></a></div></td>
            
        
        </tr>';

            



        }
        echo '</tbody>


        </table>

        
        
        ';
    


}


        // call footer 
        require_once "../partials/_footer.php";
        ?>
        
        
        
                   
        
        
                
        </div>
        
        
        
        
        </body>
        
        </html>