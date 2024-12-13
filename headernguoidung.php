<?php session_start();
//   if(isset($_SESSION)){

//   }


?>
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
$sql_nhom = "SELECT * FROM `sanpham_nhom` ";
;
//Bước 3
$result_nhom = mysqli_query($conn, $sql_nhom);

$addToCartClicked = isset($_POST['addcart']);

if ($addToCartClicked && !isset($_SESSION['user'])) {
   // Người dùng chưa đăng nhập và đã nhấn nút "Thêm vào giỏ hàng"
   // Chuyển hướng đến trang login.php
   header("Location: login.php");
   exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Foods</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="./assetss/css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="./assetss/css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="./assetss/css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="./assetss/images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="./assetss/css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext"
      rel="stylesheet">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="./assetss/css/owl.carousel.min.css">
   <link rel="stylesheet" href="./assetss/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
   <!-- header section start -->
   <div class="header_section">
      <div class="container-fluid">
         <nav class="navbar navbar-light bg-light justify-content-between">
            <div id="mySidenav" class="sidenav">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <?php if (isset($_SESSION['user'])) { ?>
                  <a href="index.php">Trang Chủ</a>
                  <a href="fullsp.php">Sản Phẩm</a>

                  <a href="xemdonhang_dadat.php">Đơn Hàng</a>
                  <a href="logout.php">Đăng Xuất</a>
               <?php } else { ?>
                  <a href="index.php">Trang Chủ</a>
                  <a href="fullsp.php">Sản Phẩm</a>

                  <a href="login.php">Đăng Nhập</a>
                  <a href="dangki.php">Đăng kí</a>
               <?php } ?>
            </div>
            <span class="toggle_icon" onclick="openNav()"><img src="./assetss/images/toggle-icon.png"></span>
            <a class="logo" href="index.php"><img src="./assetss/images/logo1.png"></a></a>
            <form class="form-inline ">
               <div class="login_text">
                  <ul>
                     <li><a href="#"> <?php if (isset($_SESSION['user'])) { ?>
                        <li> <a href="cart.php">
                              <img src="./assetss/images/bag-icon.png"></a></li>

                        <img src="./assetss/images/user-icon.png"></a></li>
                        <?php echo $_SESSION['user']; ?>

                     <?php } else { ?>
                        <li><a href="login.php"><img src="./assetss/images/user-icon.png"></a></li>
                        <li><a href="login.php"><a href="#"><img src="./assetss/images/bag-icon.png"></a></li>

                     <?php } ?>
                  </ul>
               </div>
            </form>
         </nav>
      </div>
   </div>
   <!-- css -->
   <script src="./assetss/js/jquery.min.js"></script>
   <script src="./assetss/js/popper.min.js"></script>
   <script src="./assetss/js/bootstrap.bundle.min.js"></script>
   <script src="./assetss/js/jquery-3.0.0.min.js"></script>
   <script src="./assetss/js/plugin.js"></script>
   <!-- sidebar -->
   <script src="./assetss/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="./assetss/js/custom.js"></script>
   <!-- javascript -->
   <script src="./assetss/js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "100%";
      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
      }
   </script>

   </head>