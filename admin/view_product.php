<?php 
    include '../components/connection.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location: login.php');
    }

    //delete Product

    if (isset($_POST['delete'])) {

        // Check if product_id is set and not empty
        if (isset($_POST['delete'])) {
        
            $p_id = $_POST['product_id'];
            $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);
    
            $delete_product = $conn->prepare("DELETE FROM products WHERE id = ?");
            $delete_product->execute([$p_id]);
    
            $success_msg[] = 'Product delete successfully'; 
        }
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
    <title>Website  Coffeee - All Products page</title>
</head>
<body>
<?php include '../components/admin_header.php';?>

    <div class="main">
        <div class="banner">
            <h1>All Products</h1>
        </div>
        <div class="title2">
            <a href="dashboard.php">Home</a><span> / all products</span>
        </div>

        <section class="show-post">
            <h1 class="heading">All products</h1>
            <div class="box-container">
                <?php
                    $select_products = $conn->prepare("SELECT * FROM `products`");
                    $select_products->execute();

                    if ($select_products->rowCount() > 0) {
                        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {

                        
                ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                    <?php if($fetch_products['image'] != '') { ?>
                        <img src="../image/<?= $fetch_products['image']; ?>" class="image">
                    <?php } ?>
                    <div class="status" style="color: <?php if($fetch_products['status'] == 'active') {echo "green";} else{echo "red";} ?>">
                        <?= $fetch_products['status'];?>
                    </div>

        

                    <div class="price"><?= $fetch_products['price']; ?>.000VNĐ</div>
                    <div class="title"><?= $fetch_products['name']; ?></div>
                    <div class="flex-btn">
                        <a href="edit_product.php?id=<?= $fetch_products['id']; ?>" class="btn-vp">edit</a>
                        <button type="submit" name="delete" class="btn-vp" onclick="return confirm('detele this product');">delete</button>
                        <a href="read_product.php?post_id=<?= $fetch_products['id']; ?>" class="btn-vp">view</a>
                    </div>

                </form>
                <?php
                        }
                    } else {
                        echo'
                        <div class="empty">
                            <p>No product added yet! <br> <a href="add_product.php" style="margin-top: 1.5rem;" class="btn">add products</a></p>
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