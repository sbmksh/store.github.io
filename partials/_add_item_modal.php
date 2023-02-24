<div id="add-item" class="modal">

    <form class="modal-content animate" action="/store/handlers/add_item_handler.php" method="post" enctype="multipart/form-data">
        <div class="imgcontainer">
            <span onclick="document.getElementById('add-item').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="/store/img/icon/product.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="modal-container" >
            <h3>Add Item</h3>

            <label for="pic"><b>Upload a Photo of Product</b></label>
            <input type="file"  name="file" required><br>
            
            <label for="brandname"><b>Brand Name</b></label>
            <?php
            require "_dbconnect.php";
            $sql1= "SELECT * FROM `brand`";
            $sql2= "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql1);
            
            
           

            echo '<select id="brandname" name="brandname" required >
            <option value="" >-----select-----</option>';
            while($row1 = mysqli_fetch_assoc($result))
            {
            echo '<option value="'.$row1['brand_name'].'">'.$row1['brand_name'].'</option>';
            }

            echo '</select><br>';

            echo '<label for="category"><b>Catogery Name</b></label>
            <select id="category" name="category" required>
            <option  >-----select-----</option>';
            $result = mysqli_query($conn, $sql2);
            
            while($row2 = mysqli_fetch_assoc($result))
            {
            echo '<option value="'.$row2['cat_name'].'">'.$row2['cat_name'].'</option>';
            }

            echo '</select><br>';
            ?>
            <label for="itemname"><b>Name of Product</b></label>
            <input type="text" placeholder="Enter Name of the product" name="itemname" required>
            
            <label for="keywords"><b>Keywords</b></label>
            <textarea name="keywords" rows="3" cols="100" width="100%"> </textarea><br>
            
            <label for="price"><b>Price of Product</b></label>
            <input type="number" min="1" placeholder="Enter Price of the product" name="price" required><br>
            
            <label for="stock"><b>Stock of Product</b></label>
            <input type="number" min="1" placeholder="Enter Stock of the product" name="stock" required><br>

            <label for="description"><b>Description of product</b></label>
            <textarea name="description" rows="3" cols="100" width="100%"> </textarea><br>

            <label for="container_type"><b>Type of Contianer</b></label>
            <input type="text" placeholder="Enter type of the container" name="container_type" required>

            <label for="quantity"><b>Quantity</b></label>
            <input type="text" placeholder="Enter the quantity of product with unit" name="quantity" required>

            <label for="ingridients"><b>ingridients</b></label>
            <input type="text" placeholder="Enter ingridients details" name="ingridients" required>

            <label for="max_shelf_life"><b>Maximum shelf life of product</b></label>
            <input type="text" placeholder="Enter Maximum shelf life of product" name="max_shelf_life" required>

            <label for="source_type"><b>Source type of the product</b></label>
            <input type="text" placeholder="Enter Source type of the product" name="source_type" required>

            <label for="organic"><b>Is Product organic?</b></label>
            <input type="text" placeholder="Is Product organic?" name="organic" required>

            <label for="usedfor"><b>Use of the product</b></label>
            <input type="text" placeholder="What is use of the product?" name="usedfor" required>

            

            <button type="submit">Submit</button>


            <button type="button" onclick="document.getElementById('add-item').style.display='none'"
                class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>