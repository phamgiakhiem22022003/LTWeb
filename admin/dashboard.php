<?php 
    include '../components/connection.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boxicon cdn link-->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.mincss" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time();?>">
    <title>Website  Coffeee - Dashboard page</title>
</head>
<body>
<?php include '../components/admin_header.php';?>

    <div class="main">
        <div class="banner">
            <h1>Dashboard</h1>
        </div>
        <div class="title2">
            <a href="dashboard.php" style="text-decoration: none">Home</a><span> / Dashboard</span>
        </div>
        <h1 class="heading">dsboard</h1>
        <section class="dashboard">
            <div class="box-container">
                <div class="box">
                    <h3>Welcome!</h3>
                    <p><?= $fetch_profile['name']; ?></p>
                    <a href="" class="btn-db">profile</a>
                </div>
                    
                <!------------Products------------->
                <div class="box">
                    <?php
                        $sellect_product = $conn->prepare("SELECT * FROM `products`");
                        $sellect_product->execute();
                        $num_of_product = $sellect_product->rowCount();
                    ?>
                    <h3><?= $num_of_product; ?></h3>
                    <p>products added</p>
                    <a href="add_product.php" class="btn-db" style="background-color: var(--light-grown);">add new products</a>
                </div>

                <div class="box">
                    <?php
                        $sellect_active_product = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
                        $sellect_active_product->execute(['active']);
                        $num_of_active_product = $sellect_active_product->rowCount();
                    ?>
                    <h3><?= $num_of_active_product; ?></h3>
                    <p>total active product</p>
                    <a href="view_product.php" class="btn-db">view active products</a>
                </div>

                <div class="box">
                    <?php
                        $sellect_deactive_product = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
                        $sellect_deactive_product->execute(['deactive']);
                        $num_of_deactive_product = $sellect_deactive_product->rowCount();
                    ?>
                    <h3><?= $num_of_deactive_product; ?></h3>
                    <p>total deactive product</p>
                    <a href="view_product.php" class="btn-db">view deactive products</a>
                </div>


                <!------------USERS------------->
                <div class="box">
                    <?php
                        $sellect_users = $conn->prepare("SELECT * FROM `users`");
                        $sellect_users->execute();
                        $num_of_users = $sellect_users->rowCount();
                    ?>
                    <h3><?= $num_of_users; ?></h3>
                    <p>registerd users</p>
                    <a href="acconts.php" class="btn-db">view users</a>
                </div>


                 <!------------admin------------->
                <div class="box">
                    <?php
                        $sellect_admin = $conn->prepare("SELECT * FROM `admin`");
                        $sellect_admin->execute();
                        $num_of_admin = $sellect_admin->rowCount();
                    ?>
                    <h3><?= $num_of_admin; ?></h3>
                    <p>registerd admin</p>
                    <a href="acconts.php" class="btn-db">view admin</a>
                </div>


                 <!------------message------------->
                <div class="box">
                    <?php
                        $sellect_message = $conn->prepare("SELECT * FROM `message`");
                        $sellect_message->execute();
                        $num_of_message = $sellect_message->rowCount();
                    ?>
                    <h3><?= $num_of_message; ?></h3>
                    <p>unread message</p>
                    <a href="message.php" class="btn-db">view message</a>
                </div>


                 <!------------orders------------->
                <div class="box">
                    <?php
                        $sellect_orders = $conn->prepare("SELECT * FROM `orders`");
                        $sellect_orders->execute();
                        $num_of_orders = $sellect_orders->rowCount();
                    ?>
                    <h3><?= $num_of_orders; ?></h3>
                    <p>total orders placed</p>
                    <a href="order.php" class="btn-db">view orders</a>
                </div>

                <div class="box">
                    <?php
                        $sellect_confirm_orders = $conn->prepare("SELECT * FROM `orders` WHERE status = ? ");
                        $sellect_confirm_orders->execute(['in progress']);
                        $num_of_confirm_orders = $sellect_confirm_orders->rowCount();
                    ?>
                    <h3><?= $num_of_confirm_orders; ?></h3>
                    <p>total confirm orders</p>
                    <a href="order.php" class="btn-db">view confirm orders</a>
                </div>

                <div class="box">
                    <?php
                        $sellect_canceled_orders = $conn->prepare("SELECT * FROM `orders` WHERE status = ? ");
                        $sellect_canceled_orders->execute(['canceled']);
                        $num_of_canceled_orders = $sellect_canceled_orders->rowCount();
                    ?>
                    <h3><?= $num_of_canceled_orders; ?></h3>
                    <p>total canceled orders</p>
                    <a href="order.php" class="btn-db">view canceled orders</a>
                </div>
            </div>
        </section>
    </div>

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

    <!-- Custom js link -->
    <script type="text/javascript" src="script.js"></script>

    <!--alert-->
    <?php include '../components/alert.php';?>


</body>
</html>