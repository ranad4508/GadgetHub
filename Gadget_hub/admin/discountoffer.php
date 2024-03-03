<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['fosaid'] == 0)) {
    header('location:logout.php');
    exit();
}

$message = ""; // Initialize an empty message variable

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $offer = $_POST['offer'];
    $coupon = $_POST['coupon'];
    $discount = $_POST['discount'];
    
    // Check if an image is selected
    if ($_FILES["image"]["name"]) {
        $itempic = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $extension = pathinfo($itempic, PATHINFO_EXTENSION);
        
        // allowed extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        
        // Validate the image extension
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            // Move the uploaded image to the desired location
            $image = "itemimages/offerimage/" . uniqid() . "." . $extension;
            move_uploaded_file($tempname, $image);
            
            // Perform data validation
            if (empty($title) || empty($description) || empty($offer) || empty($coupon) || empty($discount)) {
                $message = "All fields are required.";
            } else {
                // Prepare and execute the database query to insert data
                $itempic = '../'.$image;
                $query = "INSERT INTO tbldiscount (coupon_code, discount, title, description, offer, image) VALUES ('$coupon', '$discount', '$title', '$description', '$offer', '$itempic')";
    
                if (mysqli_query($con, $query)) {
                    // Data inserted successfully
                    $message = "Discount offer added successfully!";
                } else {
                    // Error occurred while inserting data
                    $message = "Failed to add discount offer.";
                }
            }
        }
    } else {
        // Show an error message if no image is selected
        $message = "Please select an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Discount Offer</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/adminstyle.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        <?php include_once('includes/leftbar.php'); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include_once('includes/header.php'); ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="mb-4" style="text-align: center;
    font-size: 30px;
    font-weight: 700;
    color: brown;">Add Discount Offer</h2>
                        <?php if ($message) { ?>
                            <div
                                class="alert alert-<?php echo ($message == "Discount offer added successfully!") ? 'success' : 'danger'; ?>">
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="offer">Offer</label>
                                <input type="text" class="form-control" id="offer" name="offer" required>
                            </div>
                            <div class="form-group">
                                <label for="coupon">Coupon Code</label>
                                <input type="text" class="form-control" id="coupon" name="coupon" required>
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="text" class="form-control" id="discount" name="discount" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Add Offer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

</body>

</html>
