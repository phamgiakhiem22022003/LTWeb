<?php
include '../Customer/components/constants.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user from database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "Login successful! Welcome, " . $_SESSION['user_name'];
            // Redirect to the home page or another page
            header("Location: home.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
}
?>

<!-- header section starts -->

<header class="header">

    <a href="<?php echo SITEURL; ?>Customer/home.php" class="logo"> <i class="fas fa-mug-hot"></i> Coffee Shop</a>

    <nav class="navbar">
        <a href="<?php echo SITEURL; ?>Customer/home.php" class="active">home</a>
        <a href="<?php echo SITEURL; ?>Customer/about.php">about</a>
        <a href="<?php echo SITEURL; ?>Customer/menu.php">menu</a>
        <a href="<?php echo SITEURL; ?>Customer/review.php">review</a>
        <a href="<?php echo SITEURL; ?>Customer/blogs.php">blogs</a>
        <a href="<?php echo SITEURL; ?>Customer/contact.php">contact</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" name="" id="search-box" placeholder="search here..">
        <label class="fas fa-search"></label>
    </form>

    <!-- shopping cart -->

    <div class="shopping-cart">
        <?php
        //Create SQL query to display Menu from Database
        $sql = "SELECT * FROM `orders`";
        
        //excute the Query
        $res = mysqli_query($con, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            //Categories Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Value like id, titile
                $id_orders = $row['id'];
                $name_orders = $row['name'];
                $price_orders = $row['price'];
                $date_orders = $row['date'];
                $qty_orders = $row['qty'];
                $status_orders = $row['status'];
                $payment_status_orders = $row['payment_status'];
                $total_orders = $row['total'];
                
                ?>
                <div class="box">
                    <i class="fas fa-trash"></i>
                    <div class="content">
                        <h3><?php echo $name_orders; ?></h3>
                        <span class="price"><?php echo $price_orders; ?>.000VNĐ</span>
                        <span class="quantity"> qty : <?php echo $qty_orders; ?></span>
                    </div>
                </div>


                <?php

            }
        }
        ?>


        <div class="total">total : <?php echo $total_orders; ?>.000VNĐ</div>
        <a href="#" class="btn">checkout</a>

    </div>

    <!-- login -->

    <form action="" class="login-form">
        <h3>login form</h3>
        <input type="email" placeholder="Your Email" class="box">
        <input type="password" placeholder="Your Password" class="box">
        <p>forget your password <a href="#"> click here</a></p>
        <p>don't have an account? <a href="register"> create now</a></p>
        <input type="submit" value="login" class="btn">
    </form>



</header>

<!-- header section ends -->