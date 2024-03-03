<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);


  ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>GadgetHub System|| Track Order</title>

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

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
          .contact_form_area {
  padding: 100px 0;
}

.contact_form_area .main_title {
  margin-bottom: 50px;
  text-align: center;
}

.contact_form_area .main_title h2 {
  font-size: 36px;
  margin-bottom: 10px;
}

.contact_form_area .main_title h5 {
  font-size: 18px;
  margin: 0;
}

.contact_form_area .row {
  justify-content: center;
}

.contact_form_area form {
  max-width: 500px;
  margin: 0 auto;
}

.contact_form_area .form-group {
  margin-bottom: 20px;
}

.contact_form_area .form-control {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.contact_form_area .btn {
  width: 100%;
  background-color: #ff9800;
  color: #fff;
  border: none;
  padding: 15px;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.contact_form_area .btn:hover {
  background-color: #f57c00;
  cursor: pointer;
}

.contact_form_area .btn:active {
  background-color: #e65100;
}

.contact_form_area .btn:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.3);
}

.contact_form_area .table {
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
}

.contact_form_area .table th,
.contact_form_area .table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.contact_form_area .table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.contact_form_area .table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

        </style>
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<?php include_once('includes/header.php');?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Track Order</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="track-order.php">Track Order</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Track Your Order</h2>
					<h5>Track Your Order by your provided order number.</h5>
				</div>
       			<div class="row">
       				<div class="col-lg-7" style="padding-bottom: 20px;">
       					<form class="row contact_us_form" action="" method="post">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="Track Your Order">
							</div>
							
							<div class="form-group col-md-12">
								<button type="submit" value="submit" name="search" class="btn order_s_btn form-control">submit now</button>
							</div>
						</form>
       				</div>

       				 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>

                                 <table class="table table-bordered mg-b-0">
                                    <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Order Number</th>
                  <th>Order Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
$ret=mysqli_query($con,"select * from tblorderaddresses where Ordernumber like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

     <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['Ordernumber'];?></td>
                  <td><?php  echo $row['OrderTime'];?></td>
                                    <td><a href="trackinvorder.php?oid=<?php echo $row['Ordernumber'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
               
              </tbody>
            </table>
       			</div>
        	</div>
        </section>
        <!--================End Contact Form Area =================-->
        
        
       
       <?php include_once('includes/footer.php');?>
        
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
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/map-active.js"></script>
        
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html>