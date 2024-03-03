<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['fosuid'] == 0)) {
	header('location:logout.php');
} else {
	// Code for deleting product from cart
	if (isset($_GET['delid'])) {
		$rid = intval($_GET['delid']);
		$query = mysqli_query($con, "delete from tblorders where ID='$rid'");
		echo "<script>alert('Data deleted');</script>";
		echo "<script>window.location.href = 'cart.php'</script>";


	}

	//placing order

	if (isset($_POST['placeorder'])) {
		//getting address
		$fnaobno = $_POST['flatbldgnumber'];
		$street = $_POST['streename'];
		$area = $_POST['area'];
		$lndmark = $_POST['landmark'];
		$city = $_POST['city'];
		$userid = $_SESSION['fosuid'];
		//genrating order number
		$orderno = mt_rand(100000000, 999999999);
		$query = "update tblorders set OrderNumber='$orderno',IsOrderPlaced='1' where UserId='$userid' and IsOrderPlaced is null;";
		$query .= "insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city');";

		$result = mysqli_multi_query($con, $query);
		if ($result) {

			echo '<script>alert("Your order placed successfully. Order number is "+"' . $orderno . '")</script>';
			echo "<script>window.location.href='my-order.php'</script>";

		}
	}

	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>GadgetHub|| cart Page</title>

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
		<link href="vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">

		<link href="css/gadgethubstyle.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style>
			.cart_table_area {
				padding: 100px 0;
			}

			.cart_table_area .table {
				width: 100%;
				margin-bottom: 0;
				border: 1px solid #ebebeb;
			}

			.cart_table_area .table thead th {
				background-color: #f5f5f5;
				color: #333;
				font-weight: bold;
				text-transform: uppercase;
				vertical-align: middle;
			}

			.cart_table_area .table tbody td {
				vertical-align: middle;
			}

			.cart_table_area .table tbody td img {
				max-width: 100px;
				max-height: 80px;
			}

			.cart_table_area .table tbody td a {
				color: #333;
			}

			.cart_table_area .table tbody td a:hover {
				color: #1ab394;
			}

			.cart_total_inner .cart_total_text {
				background-color: #f5f5f5;
				padding: 30px;
				border-radius: 4px;
				text-align: center;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			}

			.cart_total_inner .cart_total_text .cart_head {
				font-size: 24px;
				font-weight: bold;
				color: #333;
				margin-bottom: 30px;
			}

			.cart_total_inner .cart_total_text .sub_total h5,
			.cart_total_inner .cart_total_text .total h4 {
				font-size: 18px;
				color: #333;
				margin-bottom: 10px;
			}

			.cart_total_inner .cart_total_text .sub_total span,
			.cart_total_inner .cart_total_text .total span {
				font-weight: bold;
				color: #1ab394;
			}

			.cart_total_inner .cart_total_text .cart_footer {
				margin-top: 30px;
			}

			.cart_total_inner .cart_total_text .cart_footer .pest_btn {
				display: inline-block;
				padding: 10px 30px;
				/* background-color: #1ab394; */
				color: #fff;
				font-weight: bold;
				text-decoration: none;
				border-radius: 4px;
				transition: background-color 0.3s ease;
			}

			.cart_total_inner .cart_total_text .cart_footer .pest_btn:hover {
				/* background-color: #18a689; */
				cursor: pointer;
			}

			.container {
				max-width: 1170px;
				margin-left: auto;
				margin-right: auto;
				padding-left: 15px;
				padding-right: 15px;
			}

			.row {
				margin-left: -15px;
				margin-right: -15px;
			}

			.col-lg-5,
			.col-lg-7 {
				position: relative;
				width: 100%;
				min-height: 1px;
				padding-left: 15px;
				padding-right: 15px;
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
					<h3>Cart</h3>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">Cart</a></li>
					</ul>
				</div>
			</div>
		</section>
		<!--================End Main Header Area =================-->

		<!--================Cart Table Area =================-->
		<section class="cart_table_area p_100">
			<div class="container">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Preview</th>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Weight</th>
								<?php $userid = $_SESSION['fosuid'];
								$query = mysqli_query($con, "SELECT tblitem.Image, tblitem.ItemName, tblitem.ItemDes, tblitem.Weight, tblitem.ItemPrice, tblitem.ItemQty,tblitem.color, tblorders.ItemId, tblorders.ID FROM tblorders JOIN tblitem ON tblitem.ID=tblorders.ItemId WHERE tblorders.UserId='$userid' AND tblorders.IsOrderPlaced IS NULL");
								$num = mysqli_num_rows($query);
								if ($num > 0) {
									while ($row = mysqli_fetch_array($query)) {
										$color = $row['color'];
										if ($color != null) {
											echo '<th scope="col">Color</th>';
										}
									}
								}
								?>

								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$userid = $_SESSION['fosuid'];
							$query = mysqli_query($con, "SELECT tblitem.Image, tblitem.ItemName, tblitem.ItemDes, tblitem.Weight, tblitem.ItemPrice, tblitem.ItemQty,tblitem.color, tblorders.ItemId, tblorders.ID FROM tblorders JOIN tblitem ON tblitem.ID=tblorders.ItemId WHERE tblorders.UserId='$userid' AND tblorders.IsOrderPlaced IS NULL");
							$num = mysqli_num_rows($query);
							if ($num > 0) {
								$grandtotal = 0; // Initialize grandtotal
								while ($row = mysqli_fetch_array($query)) {
									$total = $row['ItemPrice'];
									$alltotal = $total * $row['ItemQty'];
									$grandtotal += $alltotal;
									?>
									<tr>
										<td>
											<img src="admin/itemimages/<?php echo $row['Image'] ?>" width="100" height="80"
												alt="<?php echo $row['ItemName'] ?>">
										</td>
										<td>
											<?php echo $row['ItemName'] ?>
										</td>
										<td>$
											<?php echo $total ?>
										</td>
										<td>
											<?php echo $row['Weight'] ?>
										</td>
										
											<?php if($row['color']!=null){
												echo '<td>';
												echo $row['color'];
												echo '</td> ';
											} ?>
										

										<td>
											<?php echo $row['ItemQty'] ?>
										</td>
										<td>$
											<?php echo $alltotal ?>
										</td>
										<td>
											<a href="cart.php?delid=<?php echo $row['ID']; ?>"
												onclick="return confirm('Do you really want to Delete ?');">
												<i class="fa fa-trash fa-delete" aria-hidden="true" style="font-size: 25px;"></i>
											</a>
										</td>
									</tr>
									<?php
								}
							}
							?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row cart_total_inner">
					<div class="col-lg-7"></div>
					<div class="col-lg-5">
						<div class="cart_total_text">
							<div class="cart_head">
								Cart Total
							</div>
							<div class="sub_total">
								<h5>Sub Total <span>Rs.
										<?php echo $grandtotal; ?>
									</span></h5>
							</div>
							<div class="total">
								<h4>Total <span>Rs.
										<?php echo $grandtotal; ?>
									</span></h4>
							</div>
							<div class="cart_footer">
								<a class="pest_btn" href="checkout.php">Proceed to Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--================End Cart Table Area =================-->

		<?php include_once('includes/footer.php'); ?>





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
<?php } ?>