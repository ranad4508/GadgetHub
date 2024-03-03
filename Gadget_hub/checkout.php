<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
include('setting.php');




// For Amount Check
$actualamount = 100000;

if (strlen($_SESSION['fosuid'] == 0)) {
    header('location:logout.php');
} else {

    //placing order


    if (isset($_POST['placeorder'])) {
        //getting address
        $fnaobno = $_POST['flatbldgnumber'];
        $street = $_POST['streename'];
        $area = $_POST['area'];
        $lndmark = $_POST['landmark'];
        $city = $_POST['city'];
        $userid = $_SESSION['fosuid'];
        $cod = $_POST['mode'];

        if ($cod == "Cash on Delivery") {
            $mode = "Cash on Delivery";
        } else {
            $mode = "Paypal";
        }
        $userid = $_SESSION['fosuid'];
        $query = mysqli_query($con, "select tblitem.Image,tblitem.ItemName,tblitem.ItemDes,tblitem.Weight,tblitem.ItemPrice,tblitem.ItemQty,tblorders.ItemId from tblorders join tblitem on tblitem.ID=tblorders.ItemId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
        $num = mysqli_num_rows($query);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($query)) {

                $quantity = $row['ItemQty'];
                $price = $row['ItemPrice'];
                $total = $quantity * $price;
                $grandtotal += $total;
                $cnt = $cnt + 1;
            }
        }
        // Generating order number
        $orderno = mt_rand(100000000, 999999999);
        // Get the coupon code value
        $couponCode = $_POST['coupon'];

        // Check if a coupon code is provided
        if (!empty($couponCode)) {
            // Retrieve the discount percentage from the database based on the coupon code
            $query = "SELECT discount FROM tbldiscount WHERE coupon_code = '$couponCode'";
            $result = mysqli_query($con, $query);

            // Check if a discount is found for the given coupon code
            if ($row = mysqli_fetch_assoc($result)) {
                $discountPercentage = $row['discount'] / 100; // Convert the discount to a decimal value
                $discountAmount = $grandtotal * $discountPercentage;
                $grandtotal -= $discountAmount; // Update the grand total with the discounted amount
            } else {
                // Coupon code is invalid or not found in the database
                echo '<script>alert("Invalid coupon code. Please enter a valid coupon code.")</script>';
                echo "<script>window.location.href='checkout.php'</script>";
                exit();
            }
        } else {
            // No coupon code provided, set discount amount to 0
            $discountAmount = 0;
        }

        // Update the SQL query to include the discount amount column
        $query = "UPDATE tblorders SET OrderNumber='$orderno', IsOrderPlaced='1', Mode='$mode', discount_amount='$discountAmount' WHERE UserId='$userid' AND IsOrderPlaced IS NULL;";
        $query .= "INSERT INTO tblorderaddresses(UserId, Ordernumber, Flatnobuldngno, StreetName, Area, Landmark, City) VALUES ('$userid', '$orderno', '$fnaobno', '$street', '$area', '$lndmark', '$city');";

        $result = mysqli_multi_query($con, $query);
        if ($result) {
            // Order placed successfully
            echo '<script>alert("Your order placed successfully. Order number is ' . $orderno . '")</script>';
            echo "<script>window.location.href='my-order.php'</script>";
        } else {
            // Error in placing the order
            echo '<script>alert("Failed to place the order. Please try again later.")</script>';
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Cake Bakery System || Checkout Page</title>

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
            .billing_details_area {
                padding: 100px 0;
            }

            .billing_details_area .container {
                margin: 0 auto;
            }

            .billing_details_area .main_title {
                margin-bottom: 40px;
                text-align: center;
            }

            .billing_form_area {
                margin-bottom: 50px;
            }

            .billing_form_area .form-group {
                margin-bottom: 20px;
            }

            .billing_form_area label {
                font-weight: bold;
            }

            .billing_form_area input[type="text"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .order_box_price {
                background-color: #f5f5f5;
                padding: 40px;
            }

            .order_box_price .main_title {
                margin-bottom: 40px;
                text-align: center;
            }

            .order_box_price .payment_list {
                margin-bottom: 40px;
            }

            .order_box_price .payment_list h5 {
                margin-bottom: 10px;
            }

            .order_box_price .price_single_cost h4,
            .order_box_price .price_single_cost h3 {
                margin-top: 20px;
            }

            .order_box_price .text_f {
                color: #347AB8;
            }

            .accordion_area {
                margin-top: 40px;
            }

            .card-header {
                background-color: #f5f5f5;
                border: none;
            }

            .card-header h5 {
                margin-bottom: 0;
            }

            .pest_btn {
                display: inline-block;
                padding: 10px 20px;
                /* background-color: #1ab394; */
                color: #fff;
                font-weight: bold;
                text-decoration: none;
                border-radius: 4px;
                transition: background-color 0.3s ease;
            }

            .pest_btn:hover {
                /* background-color: #18a689; */
                cursor: pointer;
            }

            .container {
                max-width: 1170px;
                margin: 0 auto;
                padding: 0 15px;
            }

            .text-center {
                text-align: center;
            }

            .font-weight-bold {
                font-weight: bold;
            }

            .text-uppercase {
                text-transform: uppercase;
            }

            @media (max-width: 767px) {
                .container {
                    padding: 0 10px;
                }

                .billing_details_area {
                    padding: 50px 0;
                }
            }

            .button-one {
                display: flex;
                flex-direction: row-reverse;
                justify-content: center;
            }

            #paypal-button-container {
                display: flex;
            }

            .button-one input[type="radio"] {
                margin: 35px 10px 0px 0px;
            }

            #paypal-button-container input[type="radio"] {
                margin: 10px 10px 45px 0px;
            }

            input[type="radio"] {
                width: 25px;
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
                    <h3>Chekout</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="checkout.php">Chekout</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Main Header Area =================-->

        <!--================Billing Details Area =================-->
        <section class="billing_details_area p_100">
            <div class="container">

                <div class="row">
                    <div class="col-lg-7">
                        <div class="main_title">
                            <h2>Billing Details</h2>
                        </div>
                        <div class="billing_form_area" id="billingForm">
                            <form class="billing_form row" action="" method="post" id="myform">
                                <div class="form-group col-md-6">
                                    <label for="first">Flat or Building Number *</label>
                                    <input type="text" name="flatbldgnumber" id="flatbldgnumber"
                                        placeholder="Flat or Building Number" class="form-control" required="true">
                                    <small class="text-danger flatNumber"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last">Street Name *</label>
                                    <input type="text" name="streename" id="streename" placeholder="Street Name"
                                        class="form-control" required="true">
                                    <small class="text-danger streetname"></small>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="company">Area</label>
                                    <input type="text" name="area" id="area" placeholder="Area" class="form-control"
                                        required="true">
                                    <small class="text-danger area"></small>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="address">Landmark if any</label>
                                    <input type="text" name="landmark" id="landmark" placeholder="Landmark if any"
                                        class="form-control">
                                    <small class="text-danger landmark"></small>

                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Town / City *</label>
                                    <input type="text" name="city" id="city" placeholder="City" class="form-control"
                                        equired="true">
                                    <small class="text-danger city"></small>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="coupon">Coupon Code/if any</label>
                                    <input type="text" name="coupon" id="coupon" placeholder="Coupon Code"
                                        class="form-control">
                                    <small class="text-danger coupon"></small>
                                    <div id="couponValidationMsg"></div>
                                    <!-- New element for displaying coupon validation messages -->
                                </div>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="order_box_price">
                            <div class="main_title">
                                <h2>Your Order</h2>
                            </div>
                            <div class="payment_list">
                                <div class="price_single_cost">

                                    <h5>Prodcut <span>Total</span></h5>
                                    <?php
                                    $userid = $_SESSION['fosuid'];
                                    $query = mysqli_query($con, "select tblitem.Image,tblitem.ItemName,tblitem.ItemDes,tblitem.Weight,tblitem.ItemPrice,tblitem.ItemQty,tblorders.ItemId from tblorders join tblitem on tblitem.ID=tblorders.ItemId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
                                    $num = mysqli_num_rows($query);
                                    if ($num > 0) {
                                        while ($row = mysqli_fetch_array($query)) {

                                            $quantity = $row['ItemQty'];
                                            $price = $row['ItemPrice'];
                                            $total = $quantity * $price;

                                            ?>
                                            <h5>
                                                <?php echo $row['ItemName'] ?> <span>$
                                                    <?php echo $total; ?>
                                                    <?php
                                                    $grandtotal += $total;
                                                    $cnt = $cnt + 1;

                                                    ?>
                                                </span>
                                            </h5>
                                            <?php $cnt++;
                                        }
                                    } ?>
                                    <h4>Subtotal <span>$
                                            <?php echo $grandtotal; ?>
                                        </span></h4>

                                    <h4>Discount Amount <span id="discountAmount">$0.00</span></h4>
                                    <h5>Shipping And Handling<span class="text_f">Free Shipping</span></h5>
                                    <h3>Total <span>$
                                            <?php echo $grandtotal; ?>
                                        </span></h3>
                                    <input type="hidden" name="id" value='<?php echo $grandtotal; ?>'>
                                </div>

                                <div id="accordion" class="accordion_area">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0 button-one">
                                                <input type="submit" class="btn pest_btn px-7" name="placeorder" id="cod"
                                                    value="Cash on Delivery" style="min-width:282px;">
                                                <input type="radio" value="Cash on Delivery" name="mode" class="modeselect">

                                            </h5>
                                        </div>

                                    </div>
                                </div>
                                <div id="paypal-button-container" class="mt-3" name="paypal">
                                    <input type="hidden" name="placeorder" value="Paypal">
                                    <input type="radio" value="Paypal" name="mode" class="modeselect">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Billing Details Area =================-->

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

<script
    src="https://www.paypal.com/sdk/js?client-id=Ab2VPkOPXevsHdOrjeRa8z4rYMc53sfKi3eSljJS6Fld20CC-2WkNo6Us8z08ffUFfBH-zKCW9ZRJLQS&currency=USD"></script>
<script>

    paypal.Buttons({
        onClick: function () {
            var flatNumber = $('#flatbldgnumber').val();
            var streetName = $('#streename').val();
            var area = $('#area').val();
            var city = $('#city').val();

            if (flatNumber.length == 0) {
                $('.flatNumber').text("Please enter the flat or building number.");
            } else {
                $('.flatNumber').text("");
            }

            if (streetName.length == 0) {
                $('.streetname').text("Please enter the street name.");
            } else {
                $('.streetname').text("");
            }

            if (area.length == 0) {
                $('.area').text("Please enter the area.");
            } else {
                $('.area').text("");
            }

            if (city.length == 0) {
                $('.city').text("Please enter the city.");
            } else {
                $('.city').text("");
            }

            if (flatNumber.length == 0 || streetName.length == 0 || area.length == 0 || city.length == 0) {
                return false;
            }
            var selectedMode = $('input[name="mode"]:checked').val();
            if (selectedMode === undefined) {
                alert('Please select a payment mode.'); // Show an error message
                return false;
            }

        },
        // Order is created on the server and the order id is returned
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $grandtotal; ?>'
                    }
                }]
            });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                document.getElementById("myform").submit()
            });
        }
    }).render('#paypal-button-container');
</script>
<script>
    $(document).ready(function () {
        $('#myform').submit(function (e) {
            var selectedMode = $('input[name="mode"]:checked').val();

            if (selectedMode === undefined) {
                e.preventDefault(); // Prevent form submission
                alert('Please select a payment mode.'); // Show an error message
            }
        });
    });


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // ...

        $('#myform').submit(function (e) {
            e.preventDefault(); // Prevent form submission here, will submit later if everything is valid
            var selectedMode = $('input[name="mode"]:checked').val();

            if (selectedMode === undefined) {
                alert('Please select a payment mode.'); // Show an error message
                return false;
            }

            // Get the coupon code value
            var couponCode = $('#coupon').val();

            // Perform Ajax coupon code validation
            $.ajax({
                type: 'POST',
                url: 'coupon_validation.php',
                data: { coupon: couponCode },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'valid') {
                        // Coupon code is valid, proceed with form submission
                        // Calculate the discounted total
                        var discount = parseFloat(response.discount);
                        var grandTotal = <?= $grandtotal ?>; // Get the grand total from PHP variable
                        var discountedTotal = grandTotal - discount;

                        $('#discountAmount').text('$' + discount.toFixed(2));

                        // Update the total amount with the discounted amount
                        $('.order_box_price .price_single_cost h3 span').text('$' + discountedTotal.toFixed(2));

                        // Submit the form now that the coupon is valid
                        document.getElementById('myform').submit();
                    } else {
                        // Coupon code is invalid or not found
                        $('#couponValidationMsg').html('<p class="text-danger">' + response.message + '</p>');
                    }
                },
                error: function () {
                    // Handle Ajax error if any
                    $('#couponValidationMsg').html('<p class="text-danger">An error occurred. Please try again.</p>');
                }
            });
        });
    });
</script>