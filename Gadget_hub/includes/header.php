<head><style>
    .top_header_area {
    background: rgba(51, 51, 51, 1.00) !important;
    position: relative;
    z-index: 3;
}
.main_menu_area .navbar.navbar-expand-lg .navbar-nav li a {
    color: white !important;
}
.main_menu_area .navbar.navbar-expand-lg {
    position: relative;
    padding: 0px;
    background-color: ##1974D2 !important;
}
.main_menu_area{
    background-color: #1974D2 ;
}
.main_menu_area .navbar.navbar-expand-lg .navbar-nav li.submenu .dropdown-menu{
    background-color: #6c797d;
}
.cake_img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s;
}
.main_menu_area .navbar.navbar-expand-lg .navbar-brand img {
    z-index: 2;
    position: relative;
    margin-top: 12px;
    margin-right: 250px;
    display: inline-block;
    border-radius: 50%;
}

</style></head>
<header class="main_header_area">
    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <?php
                $ret = mysqli_query($con, "select * from tblpage where PageType='contactus'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <a href="tel:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + <?php echo $row['MobileNumber']; ?></a>
                    <a href="mailto:gadjethub@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $row['Email']; ?></a>
                <?php } ?>
            </div>
            <div class="float-right">
                <ul class="h_search list_style">
                    <?php
                    $userid = $_SESSION['fosuid'];
                    $ret1 = mysqli_query($con, "select * from tblorders where IsOrderPlaced is null && UserId='$userid'");
                    $num = mysqli_num_rows($ret1);
                    ?>
                    <li><a href="cart.php"><i class="lnr lnr-cart"><strong><?php echo $num; ?></strong></i></a></li>

                    <li><a href="search-cake.php"><i class="fa fa-search"></i></a></li>
                    <!-- Swap "My Account" and "Admin" positions here -->
                    <?php if (strlen($_SESSION['fosuid'] > 0)) { ?>
                            <li class="dropdown submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
                                <ul class="dropdown-menu" style="background-color: #ED0018; padding-left:10px; margin: 0px;">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="my-order.php">My Orders</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: end;">
                    <ul class="navbar-nav mr-5">
                        <a class="navbar-brand" href="index.php">
                            <img src="img\logo-no-background.png" alt="" style="height: 50px; width: auto;">
                        </a>
                        <li class="dropdown submenu active">
                            <a class="dropdown-toggle" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                        </li>
                        <li><a href="product.php">All Products</a></li>
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                <?php
                                $ret = mysqli_query($con, "select * from tblcategory");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <li><a href="category-details.php?catname=<?php echo $row['CategoryName']; ?>"><?php echo $row['CategoryName']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="about-us.php">About Us</a></li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <?php if (strlen($_SESSION['fosuid'] == 0)) { ?>
                            <li><a href="login.php">Sign in</a></li>
                            <li><a href="track-order.php">Track Order</a></li>
                        <?php } ?>
                        <!-- Swap "My Account" and "Admin" positions here -->
                        <?php if (strlen($_SESSION['fosuid'] > 0)) { ?>
                            
                            <!-- <li class="dropdown submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
                                <ul class="dropdown-menu">
                                    <li><a href="my-order.php">My Orders</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li> -->
                            <li><a href="cart.php">Cart Page</a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
