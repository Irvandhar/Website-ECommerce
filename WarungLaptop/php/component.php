<?php

function component(){
    $element ="
    <div class="pro">
    <form action="menu.php" method="post">
    <img src="img/1.0/produk/rog1.png" alt="">
    <div class="des">
      <span>Asus</span>
      <h5>Asus ROG Strix SCAR 18 G834JY-I949C6T-O</h5>
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h4>69.250K</h4>
    </div>
    <button type="submit" name="add"><a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a></button>
  </form> 
  </div>  
    ";

    echo $element;
}

?>