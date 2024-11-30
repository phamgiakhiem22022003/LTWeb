<?php 
    include '../components/connection.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location: login.php');
    }

    //delete order
    if (isset($_POST['delete_order'])) {
        
        $order_id = $_POST['order_id'];
        $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);

        $verify_delete = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
        $verify_delete->execute([$order_id]);

        if ($verify_delete->rowCount() > 0) {

            $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
            $delete_order->execute([$order_id]);
            $success_msg[] = "order deleted";
        } else {
            $warning_msg[] = "order adready deleted";
        }

    }

    //Update order
    if (isset($_POST['update_order'])) {
        $order_id = $_POST['order_id'];
        $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);
    
        $update_payment = $_POST['update_payment'];
        $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);
    
        $update_pay = $conn->prepare("UPDATE `orders` SET payment_status = ?, id = ?");
        
        $update_pay->execute([$update_payment, $order_id]); //, $order_id
    
        $success_msg[] = "Order updated";
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
    <title>Website  Coffeee - Order page</title>
</head>
<body>
<?php include '../components/admin_header.php';?>

    <div class="main">
        <div class="banner">
            <h1>Order Placed</h1>
        </div>
        <div class="title2">
            <a href="dashboard.php" style="text-decoration: none">Home</a><span> / Order Placed</span>
        </div>
        <h1 class="heading">Total Order Placed</h1>
        <section class="order-container">
            <div class="box-container">
                <?php 
                    $select_orders = $conn->prepare("SELECT * FROM `orders`");
                    $select_orders->execute();

                    if ($select_orders->rowCount() > 0) {
                        while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="box">
                    <div class="status" style="color: <?php if ($fetch_orders['status'] == 'in progress') {echo "green";} else {echo "red";}?>">
                        <?= $fetch_orders['status']; ?>
                    </div>
                    <div class="detail">
                        <p>Id Order: <span><?= $fetch_orders['id']; ?></span></p>
                        <p>Name Order: <span><?= $fetch_orders['name']; ?></span></p>
                        <p>Order Price: <span><?= $fetch_orders['price']; ?></span></p>
                        <p>Quatity : <span><?= $fetch_orders['qty']; ?></span></p>
                        <p>Date : <span><?= $fetch_orders['date']; ?></span></p>
                        <p>Status : <span><?= $fetch_orders['status']; ?></span></p>
                        <p>Total price : <span><?= $fetch_orders['total']; ?></span></p>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= $fetch_orders['id'];?>">
                        <select name="update_payment">
                            <!-- <option disabled selected><?= $fetch_orders['payment_status'];?></option> -->
                            <option value="pending">pending</option>
                            <option value="complete">complete</option>
                        </select>

                        <div class="flex-btn">
                            <button type="submit" name="update_order" class="btn">Update Payment</button>
                            <button type="submit" name="delete_order" class="btn">Delete Order</button>
                        </div>
                    </form>
                </div>
                <?php
                        }
                    } else {
                        echo'
                            <div class="empty">
                                <p style="color: #fff; font-size: 1.6rem; font-weight: bold;">No order takes placed yet</p>
                            </div>';
                    }
                ?>
            </div>
        </section>
    </div>

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Custom js link -->
    <script type="text/javascript" src="script.js"></script>

    <!--alert-->
    <?php include '../components/alert.php';?>


</body>
</html>