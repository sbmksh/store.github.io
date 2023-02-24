<?php
$sql="SELECT * FROM `category`";
$result=mysqli_query($conn, $sql);

echo '<div class="carousel-wrap">
<div class="owl-carousel">';

while($row= mysqli_fetch_assoc($result))
{
  $cat_id=$row['cat_id'];
  $cat_name=$row['cat_name'];
  $image=$row['image'];


  echo '<div class="item"><a href="/store/pages/products_category.php?cat_id='.$cat_id.'"><img src="/store/img/category/'.$image.'" alt="'.$cat_name.'"><h3 style="text-align: center; background-color: white;">'.$cat_name.'</h3></a></div>';


}
echo '</div>
</div>';


?>





    
    