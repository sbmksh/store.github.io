<div id="order" class="modal">
    <form class="modal-content animate" action="/store/handlers/order_handler.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('order').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="/store/img/icon/brand.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="modal-container">
            <h3>Order Summary</h3>
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
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true && $_SESSION['type']=='user')
                {
                    $user_id=$_SESSION['id'];
                    $sql="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
                    $result= mysqli_query($conn,$sql);
                    $grand_total=0;
                    $d_item_id=array();
                    $d_item_quantity=array();
                    while($row=mysqli_fetch_assoc($result)){
                        $item_id=$row['item_id'];
                        array_push($d_item_id,$item_id);
                        $sql="SELECT * FROM `item` WHERE `item_id`='$item_id'";
                        $result2=mysqli_query($conn,$sql);
                        $row2=mysqli_fetch_assoc($result2);
                        $item_name=$row2['item_name'];                        
                        $price=$row2['price'];
                        $quantity=$row['number'];
                        array_push($d_item_quantity,$quantity);
                        $totalPrice=$quantity*$price;
                        $grand_total=$grand_total+$totalPrice;
                        echo '<tr>
                        <td><div class="cartitem">'.$item_name.'</div></td>
                        <td><div class="center">Rs'.$price.'</div></td>
                        <td><div class="center">'.$quantity.'</div></td>
                        <td><div class="center">Rs '.$totalPrice.'</div></td>
                       
                                </tr>';
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
            </table>';
            
            foreach($d_item_id as $item_ids)
            {
               echo ' <input type="hidden" name="item_ids[]" value="'.$item_ids.'">';
            }

            foreach($d_item_quantity as $item_quantities)
            {
                echo ' <input type="hidden" name="item_quantities[]" value="'.$item_quantities.'">';
            }
            

            echo '<input type="hidden" name="u_user" value="'.$user_id.'">
            
            
            <input type="hidden" name="grand_total" value="'.$grand_total.'">

            <button type="submit" name="paid">Confirm Order</button>


            <button type="button" onclick="document.getElementById(`order`).style.display=`none`"
                class="cancelbtn">Cancel</button>';
                ?>

        </div>
    </form>


</div>