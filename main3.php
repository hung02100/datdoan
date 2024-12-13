<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dlmau";
//B1: Create connetion

$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection

if (!$conn) {
   die("connection failer" . mysqli_connect_error());
}
//B2:
$sql = "SELECT * 
        FROM sanpham1
       
        order by rand()
          limit 12";
//Bước 3
$result = mysqli_query($conn, $sql);

?>
<style>
   .current-ten {
      text-transform: uppercase;
      color: green;
      font-weight: bold;

   }

   .product_box {
      margin-bottom: 20px;
   }
</style>

<!-- product section start -->
<div class="product_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="product_taital">Hot Products</h1>
            <p class="product_text">incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
               exercitation</p>
         </div>
      </div>
      <div class="product_section_2 layout_padding">
         <div class="row">
            <?php $limit = 8;
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
               if ($count >= $limit) {
                  break;
               }
               ?>
               <div class="col-lg-3 col-sm-6">
                  <div class="product_box">
                     <h4 class="bursh_text"><?php echo $row["tensp"] ?></h4>
                     <!-- <p class="lorem_text">incididunt ut labore et dolore magna aliqua. Ut enim </p> -->
                     <a href="chitiet.php?masp=<?php echo $row["masp"] ?>">
                        <img src="upload/<?php echo $row["img1"] ?>" class="image_1"> </a>
                     <form action="cart.php" method="post">
                        <div class="btn_main">
                           <div class="buy_bt">
                              <ul>
                                 <li class="active"> <input type="submit" value="Buy Now" name="addcart"></li>
                                 <input type="hidden" name="soluong" value="1">
                                 <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                 <input type="hidden" name="dongiamoi" value="<?php echo $row["dongiamoi"] ?> 000 VNĐ">
                                 <input type="hidden" name="img1" value="<?php echo $row["img1"] ?>">

                              </ul>
                           </div>
                           <h3 class="price_text"><?php echo $row["dongiamoi"] ?>000VNĐ</h3>
                        </div>
                  </div>
               </div>

               <?php
               $count++;
            } ?>
         </div>
      </div>
   </div>
   <!-- about section start -->