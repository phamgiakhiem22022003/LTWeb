<?php
// Start output buffering
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- header section starts -->
    <?php 
    include '../Customer/components/header.php'; 
    ?>

    <!-- sub heading -->

    <div class="sub-heading">
        <h1>our menu</h1>
    </div>

    <!-- end -->

    <?php 
    if (isset($_SESSION['order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    
    ?>

    <!-- menu section starts -->

    <section class="menu">
        <div class="box-container">
            <?php 
                //Create SQL query to display Menu from Database
                $sql = "SELECT * FROM `products`";

                //excute the Query
                $res = mysqli_query($con, $sql);

                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    //Categories Available
                    while ($row=mysqli_fetch_assoc($res)) {
                        //Get the Value like id, titile
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $status = $row['status'];
                        $image = $row['image'];
                        ?>
                            <div class="box">
                                <div class="image">
                                    <?php 
                                        if ($image == "") {
                                            echo "<div class='error'>Image not Available</div>";
                                        } else {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>image/<?php echo $image; ?>" alt="">
                                            <?php
                                        }
                                    ?>
                                </div>


                            <div class="content">

                            <h3><?php echo $name; ?></h3>

                            <form action="" method="POST" class="order">

                                <input type="hidden" name="name_food" value="<?php echo $name; ?>">
                                
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>

                                <div class="price"><?php echo $price; ?>.000VNĐ</div>
                                <input type="hidden" name="price_food" value="<?php echo $price; ?>">
                            </div>
                            
                                <div class="icons">
                                    <div class="flex">
                                        <p class="SL">Số Lượng: </p>
                                        <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                                    </div>
                                    <div class="icons-btn">
                                        <button type="submit" name="submit_order" value="confirm-order"><i class="fas fa-shopping-cart"></i></button>
                                        <button type="submit" name="add_to_wishlish"><i class="fas fa-heart"></i></button>
                                        <a href="<?php echo SITEURL; ?>Customer/menu.php/detail.php" class="fas fa-eye"></a>
                                    </div>
                                </div>
                            </form>

                            <?php
                                if (isset($_POST['submit_order'])) {
                                    
                                    $order_id = $_POST ['order_id'];
                                    $name_food = $_POST['name_food'];
                                    $price_food = $_POST['price_food'];
                                    $date = date("Y-m-d"); // Corrected date format
                                    $qty = $_POST['qty'];
                                    $status = "ordered"; 
                                    $payment_status = "Pending"; // Set a default payment status
                                    $total = $price_food * $qty;
                                
                                    $sql2 = "INSERT INTO `orders`(`id`, `name`, `price`, `date`, `qty`, `status`, `payment_status`,  `total`) 
                                             VALUES ('$id', '$name_food', '$price_food', '$date', '$qty', '$status', '$payment_status', '$total')";
                                
                                    // Execute the Query
                                    $res2 = mysqli_query($con, $sql2);
                                
                                    // Check whether the query executed successfully
                                    if ($res2 == true) {
                                        $_SESSION['order'] = "<div class='success'>Ordered Successfully</div>";
                                        header('location: menu.php');
                                    } else {
                                        $_SESSION['order'] = "<div class='error' style='font-size: 2rem; text-align: center;'>Failed to Order</div>";
                                    }
                                }

                            ?>

                            </div>
                        <?php
                    }
                } 
            
            ?>

        </div>

    </section>


    <!-- menu section ends -->

    <!-- footer section starts -->

    <?php 
        include '../Customer/components/footer.php';
    ?>

    <script src="script.js"></script>

</body>
</html>