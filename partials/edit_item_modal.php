<div id="edit-item" class="modal">

    <form class="modal-content animate" action="/store/handlers/edit-item_handler.php" method="post" >
        <div class="imgcontainer">
            <span onclick="document.getElementById('edit-item').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="/store/img/icon/product.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="modal-container" >
            <h3>Edit Item</h3>

            
            
            <label for="brandname"><b>Brand Name</b></label>
            <?php
            require_once "_dbconnect.php";
            $sql1= "SELECT * FROM `brand`";
            $sql2= "SELECT * FROM `category`";
            if(isset($_GET['edit_item']))
            $item_id=$_GET['edit_item'];
            $sql3="SELECT * FROM `item` WHERE `item_id`='$item_id'";
            $result = mysqli_query($conn, $sql1);
            $result3=mysqli_query($conn, $sql3);
            $row3=mysqli_fetch_assoc($result3);

            $brandname = $row3['brand_name'];
            $category = $row3['cat_name'];
            $itemname = $row3['item_name'];    
            $price = $row3['price'];
            $stock = $row3['stock'];
            $description = $row3['description'];
            $container_type = $row3['container_type'];
            $quantity = $row3['quantity'];
            $ingridients = $row3['Ingredients'];
            $max_shelf_life = $row3['maximum_shelf_life'];
            $source_type = $row3['source_type'];
            $organic = $row3['organic'];
            $usedfor = $row3['used_for'];
            $photo= $row3['photo'];
            $keyword=$row3['keyword'];
        
            
            
           

            echo '<select id="brandname" name="brandname" required >';
            while($row1 = mysqli_fetch_assoc($result))
            {if($row1['brand_name']==$brandname)
            echo '<option value="'.$row1['brand_name'].'" selected>'.$row1['brand_name'].'</option>';
            else
            echo '<option value="'.$row1['brand_name'].'">'.$row1['brand_name'].'</option>';
            }

            echo '</select><br>';

            echo '<label for="category"><b>Catogery Name</b></label>
            <select id="category" name="category" required>';
            $result = mysqli_query($conn, $sql2);
            
            while($row2 = mysqli_fetch_assoc($result))
            {
                if($row2['cat_name']==$category)
                echo '<option value="'.$row2['cat_name'].'" selected>'.$row2['cat_name'].'</option>';
                else
                echo '<option value="'.$row2['cat_name'].'">'.$row2['cat_name'].'</option>';
            }

            echo '</select><br>
            
            <label for="itemname"><b>Name of Product</b></label>
            <input type="text" value="'.$itemname.'" name="itemname" required>
            
            <label for="keywords"><b>Keywords</b></label>
            <textarea name="keywords" rows="3" cols="100" width="100%">'.$keyword.' </textarea><br>
            
            <label for="price"><b>Price of Product</b></label>
            <input type="number" min="1" value="'.$price.'" name="price" required><br>
            
            <label for="stock"><b>Stock of Product</b></label>
            <input type="number" min="1" value="'.$stock.'" name="stock" required><br>

            <label for="description"><b>Description of product</b></label>
            <textarea name="description" rows="3" cols="100" width="100%">'.$description.' </textarea><br>

            <label for="container_type"><b>Type of Contianer</b></label>
            <input type="text" value="'.$container_type.'" name="container_type" required>

            <label for="quantity"><b>Quantity</b></label>
            <input type="text" value="'.$quantity.'" name="quantity" required>

            <label for="ingridients"><b>ingridients</b></label>
            <input type="text" value="'.$ingridients.'" name="ingridients" required>

            <label for="max_shelf_life"><b>Maximum shelf life of product</b></label>
            <input type="text" value="'.$max_shelf_life.'" name="max_shelf_life" required>

            <label for="source_type"><b>Source type of the product</b></label>
            <input type="text" value="'.$source_type.'" name="source_type" required>

            <label for="organic"><b>Is Product organic?</b></label>
            <input type="text" value="'.$organic.'" name="organic" required>

            <label for="usedfor"><b>Use of the product</b></label>
            <input type="text" value="'.$usedfor.'" name="usedfor" required>
            
            <input type="hidden" name="item_id" value="'.$item_id.'">
            ';

            ?>
            

            <button type="submit">Submit</button>


            <button type="button" onclick="document.getElementById('edit-item').style.display='none'"
                class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>