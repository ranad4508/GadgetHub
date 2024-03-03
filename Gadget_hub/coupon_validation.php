<?php
include_once('includes/dbconnection.php');
session_start();

if (isset($_POST['coupon'])) {
    $couponCode = $_POST['coupon'];
    $userId = $_SESSION['fosuid'];

    // Check if the coupon has already been used by this user
    $query = "SELECT * FROM tbldiscount WHERE coupon_code = '$couponCode' AND UserId = '$userId' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Coupon code has already been used by the user
        echo json_encode(['status' => 'invalid', 'message' => 'Coupon code has already been used.']);
    } else if (!empty($couponCode)) {
        // Fetch coupon details from the database
        $query = "SELECT * FROM tbldiscount WHERE coupon_code = '$couponCode' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Coupon code is valid, return the discount amount
            $row = mysqli_fetch_assoc($result);
            $discount = (float)$row['discount'];
            echo json_encode(['status' => 'valid', 'discount' => $discount]);

            // Mark the coupon as used by this user
            $insertQuery = "INSERT INTO tbldiscount (coupon_code, UserId) VALUES ('$couponCode', '$userId')";
            mysqli_query($con, $insertQuery);
        } else {
            // Coupon code is invalid or not found
            echo json_encode(['status' => 'invalid', 'message' => 'Invalid coupon code.']);
        }
    } else {
        // Coupon code is not provided, skip validation
        echo json_encode(['status' => 'valid', 'discount' => 0]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Coupon code is missing.']);
}
?>
