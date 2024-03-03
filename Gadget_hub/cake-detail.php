<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
  $ItemId = $_POST['ItemId'];
  $userid = $_SESSION['fosuid'];
  $query = mysqli_query($con, "insert into tblorders(UserId,ItemId) values('$userid','$ItemId') ");
  if ($query) {
    echo "<script>alert('Product has been added in to the cart');</script>";
  } else {
    echo "<script>alert('Something went wrong.');</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>GadgetHub System || Product Detail</title>

  <!-- Icon css link -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/linearicons/style.css" rel="stylesheet">
  <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
  <link href="vendors/stroke-icon/style.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Rev slider css -->
  <link href="vendors/revolution/css/settings.css" rel="stylesheet">
  <link href="vendors/revolution/css/layers.css" rel="stylesheet">
  <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
  <link href="vendors/animate-css/animate.css" rel="stylesheet">

  <!-- Extra plugin css -->
  <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
  <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">

  <link href="css/gadgethubstyle.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <style>
    form {
      display: flex;
    }
  </style>
</head>

<body>

  <!--================Main Header Area =================-->
  <?php include_once('includes/header.php'); ?>
  <!--================End Main Header Area =================-->

  <!--================End Main Header Area =================-->
  <section class="banner_area">
    <div class="container">
      <div class="banner_text">
        <h3>All Products</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="cake-detail.php">Product Detail</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!--================End Main Header Area =================-->

  <!--================Special Area =================-->
  <section class="special_area p_100">
    <div class="container">
      <div class="main_title">
        <h2>Detail of Product</h2>
        <h5>Embrace technology that enhances your life, not complicates it
        </h5>
      </div>

      <div class="special_item_inner">
        <div class="specail_item">
          <div class="row">
            <?php
            $cid = $_GET['fid'];
            $ret = mysqli_query($con, "select * from tblitem where ID='$cid'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {

              ?>
              <div class="col-lg-4">
                <div class="s_left_img">
                  <img class="img-fluid" src="admin/itemimages/<?php echo $row['Image']; ?>" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="special_item_text">
                  <h4>
                    <?php echo $row['ItemName']; ?>
                  </h4>
                  

                  <p><strong>Price:</strong> $
                    <?php echo $row['ItemPrice']; ?>
                  </p>
                  <p><strong>Weight:</strong>
                    <?php echo $row['Weight']; ?>.
                  </p>
                  <?php if($row['color']!=null){ ?>
                  <p><strong>Color:</strong>
                    <?php 
                      echo $row['color'];
                    } ?>
                  </p>
                  <p style="margin-bottom: 20px;"><strong>Product Detail:</strong>
                    <?php echo $row['ItemDes']; ?>.
                  </p>
                  <?php if ($_SESSION['fosuid'] == "") { ?>
                    <a href="login.php" class="pest_btn">Add to Cart</a>
                  <?php } else { ?>
                    <form method="post">
                      <input type="hidden" name="ItemId" value="<?php echo $row['ID']; ?>">
                      <button type="submit" name="submit" class="pest_btn">Add to Cart</button>
                      <div class="input-group" style="width: 150px; margin-left: 50px;">
                        <span class="input-group-btn">
                          <button class="btn" type="button" id="decrementBtn"
                            style="height: 56px;width:40px;background-color:#ED0018;color:#fff;">-</button>
                        </span>
                        <input type="text" class="form-control text-center" id="quantityField" name="quantity" value="1">
                        <span class="input-group-btn">
                          <button class="btn" type="button" id="incrementBtn"
                            style="height: 56px;width:40px;background-color:#ED0018;color:#fff;">+</button>
                        </span>
                      </div>
                      <?php
                      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $quantity = $_POST['quantity']; // Get the updated quantity from the form
                        $ItemId = $_POST['ItemId']; // Get the food ID from the form
                  
                        // Update the database with the new quantity
                        $updateQuery = "UPDATE tblitem SET ItemQty = '$quantity' WHERE ID = '$ItemId'";
                        mysqli_query($con, $updateQuery);

                        // Rest of your code for adding the item to the cart or further processing
                      }
                      ?>

                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
  </section>
  <!--================End Special Area =================-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#incrementBtn').click(function () {
        var quantity = parseInt($('#quantityField').val());
        $('#quantityField').val(quantity + 1);
      });

      $('#decrementBtn').click(function () {
        var quantity = parseInt($('#quantityField').val());
        if (quantity > 1) {
          $('#quantityField').val(quantity - 1);
        }
      });
    });
  </script>


  <!--================Footer Area =================-->
  <?php include_once('includes/footer.php'); ?>
  <!--================End Footer Area =================-->







  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Rev slider js -->
  <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
  <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
  <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
  <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
  <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
  <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
  <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
  <!-- Extra plugin js -->
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
  <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="vendors/isotope/isotope.pkgd.min.js"></script>
  <script src="vendors/datetime-picker/js/moment.min.js"></script>
  <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
  <script src="vendors/lightbox/simpleLightbox.min.js"></script>

  <script src="js/theme.js"></script>
</body>

</html>