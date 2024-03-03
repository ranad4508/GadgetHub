<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}

 ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>GadgetHub System|| Sign Up</title>

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
    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>

<style>
  /* Global styles */
body {
    font-family: Arial, sans-serif;
    font-size: 14px;
    line-height: 1.6;
    color: #333;
}

/* Links */
a {
    color: #337ab7;
    text-decoration: none;
}
a:hover {
    color: #23527c;
    text-decoration: underline;
}

/* Form styles */
.form-control {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.form-control:focus {
    outline: none;
    border-color: #66afe9;
    box-shadow: 0 0 5px #66afe9;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #337ab7;
    color: #fff;
    text-align: center;
    cursor: pointer;
}
.btn:hover {
    background-color: #23527c;
}
.btn:active {
    background-color: #1e4160;
}

/* Main header area */
.banner_area {
    background-color: #f5f5f5;
    padding: 30px 0;
}
.banner_text h3 {
    margin: 0;
    font-size: 24px;
    color: #333;
}
.banner_text ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.banner_text ul li {
    display: inline-block;
    margin-right: 10px;
}
.banner_text ul li a {
    color: #337ab7;
    text-decoration: none;
}
.banner_text ul li a:hover {
    color: #23527c;
    text-decoration: underline;
}

/* Contact form area */
.contact_form_area {
    padding: 100px 0;
}
.main_title h2 {
    margin-bottom: 30px;
    font-size: 36px;
    color: #333;
}
.main_title h5 {
    margin-bottom: 50px;
    font-size: 16px;
    color: #777;
}
.contact_us_form .form-group {
    margin-bottom: 15px;
}
.contact_us_form .form-group input[type="text"],
.contact_us_form .form-group input[type="email"],
.contact_us_form .form-group input[type="password"] {
    width: 100%;
}
.contact_us_form .form-group textarea {
    width: 100%;
    height: 150px;
}
.contact_us_form .btn.order_s_btn {
    width: auto;
}

/* Contact details */
.contact_details {
    background-color: #f5f5f5;
    padding: 30px;
}
.contact_d_item h3 {
    margin-top: 0;
    margin-bottom: 15px;
    font-size: 18px;
    color: #333;
}
.contact_d_item h5 {
    margin-top: 0;
    margin-bottom: 10px;
    font-size: 14px;
    color: #777;
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
        			<h3>Registration Form</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="registration.php">Sign Up</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Regitration Form!!</h2>
					<h5>Fill below details.</h5>
				</div>
       			<div class="row">
       				<div class="col-lg-7">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
       					<form class="row contact_us_form"action="" name="signup" method="post" onsubmit="return checkpass();">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="firstname" required="true" placeholder="First Name" required="true">
							</div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required="true">
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true">
              </div>
							<div class="form-group col-md-6">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email address" required="true">
							</div>
							
              <div class="form-group col-md-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat password" required="true">
              </div>
							<div class="form-group col-md-12">
								<button type="submit" value="submit" name="submit" class="btn order_s_btn form-control">submit now</button>
							</div>
              <div class="form-group col-md-12">
                <a href="login.php" class="btn order_s_btn form-control"><i class="ft-user"></i> Login</a> <strong>Already Have an account!!!!</strong>
              </div>
						</form>
       				</div>
       				<div class="col-lg-4 offset-md-1">
       					<div class="contact_details">
       						<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
       						<div class="contact_d_item">
       							<h3>Address :</h3>
       							<p><?php  echo $row['PageDescription'];?></p>
       						</div>
       						<div class="contact_d_item">
       							<h5>Phone : <?php  echo $row['MobileNumber'];?></h5>
       							<h5>Email : <?php  echo $row['Email'];?></h5>
       						</div>
       						
       					</div>
       				</div><?php } ?>
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