<?php
require_once "_dbconnect.php";


echo '
        <div id="edit-brand" class="modal">

                    <form class="modal-content animate" action="/store/handlers/edit_brand_handler.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById(`edit-brand`).style.display=`none`" class="close"
                                title="Close Modal">&times;</span>
                            <img src="/store/img/icon/brand.jpg" alt="Avatar" class="avatar">
                        </div>

                        <div class="modal-container">
                            <h3>Edit brand</h3>';
                            if(isset($_GET['edit_brand_id']))
                            $brand_id=$_GET['edit_brand_id'];
                            $sql= "SELECT * FROM `brand` WHERE `brand_id`='$brand_id'";
                            $result= mysqli_query($conn,$sql);
                            $row= mysqli_fetch_assoc($result);
                            $name= $row['brand_name'];

                            echo '  <label for="bname"><b>Brand Name</b></label>
                                    <input type="text" name="bname" value="'.$name.'">
                                    <input type="hidden" name="bid" value="'.$brand_id.'">
                        
                        
                                    <button class="btn-3" type="submit">Submit</button>
                        

                                    <button type="button" onclick="document.getElementById(`edit-brand`).style.display=`none`"
                                        class="cancelbtn">Cancel</button>

                                </div>
                            </form>
                        </div>';

                ?>