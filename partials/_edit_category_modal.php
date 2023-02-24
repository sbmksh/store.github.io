<?php
require_once "_dbconnect.php";

echo '
        <div id="edit-category" class="modal">

            <form class="modal-content animate" action="/store/handlers/edit_category_handler.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById(`edit-category`).style.display=`none`" class="close"
                        title="Close Modal">&times;</span>
                    <img src="/store/img/icon/category.jpg" alt="Avatar" class="avatar">
                </div>

                <div class="modal-container">
                    <h3>Edit Category</h3>';

                    if(isset($_GET['edit_cat_id']))
                    $edit_cat_id=$_GET['edit_cat_id'];
                    $sql= "SELECT * FROM `category` WHERE `cat_id`='$edit_cat_id'";
                    $result= mysqli_query($conn,$sql);
                    $row= mysqli_fetch_assoc($result);
                    $name= $row['cat_name'];



                    echo'
                            <label for="cname"><b>Category Name</b></label>
                            <input type="text" name="cname" value="'.$name.'">
                            <input type="hidden" name="cid" value="'.$edit_cat_id.'">


                            <button class="btn-3" type="submit">Submit</button>



                            <button type="button" onclick="document.getElementById(`edit-category`).style.display=`none`"
                                class="cancelbtn">Cancel</button>

                        </div>
                    </form>
                </div>';


?>