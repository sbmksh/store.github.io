<div id="view_order" class="modal">
    <!-- <form class="modal-content animate" action="" method=""> -->
        <div class="imgcontainer">
            <span onclick="document.getElementById('view_order').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="/store/img/icon/brand.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="modal-container">
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
                <tbody>
                    <?php
                if(isset($_GET['invoice_id']))
                {
                    $inv_id= $_GET['invoice_id'];
                    $sql="SELECT * FROM `orders` WHERE `invoice_id`='$inv_id";
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
            
           


            <button type="button" onclick="document.getElementById(`view_order`).style.display=`none`"
                class="cancelbtn">Close</button>';
                ?>

        </div>
    <!-- </form> -->


</div>