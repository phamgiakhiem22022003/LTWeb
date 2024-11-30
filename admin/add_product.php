<?php 
    include '../components/connection.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location: login.php');
    }

    //add products databse
    if (isset($_POST['publish'])) {
        $id = unique_id();

        $name = $_POST['text'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);

        $content = $_POST['content'];
        $content = filter_var($content, FILTER_SANITIZE_STRING);

        $status = 'active';

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../image/' .$image;

        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ?");
        $select_image->execute([$image]);

        if (isset($image)) {
            if($select_image->rowCount() > 0) {
                $warning_msg[] = 'image name repeated';
            } elseif ($image_size > 2000000) {
                $warning_msg[] = 'image size to large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        } 

        if ($select_image->rowCount() > 0 AND $image != '') {
            $warning_msg[] = 'please rename your image';
        } else {
            $insert_product = $conn->prepare("INSERT INTO `products`(id, name, price, image, product_detail, status) VALUES (?,?,?,?,?,?)");
            $insert_product->execute([$id, $name, $price, $image, $content, $status]);
            $success_msg[] = 'product inserted successfully';
        }

    }

    //add products databse as the draft
    if (isset($_POST['draft'])) {
        $id = unique_id();

        $name = $_POST['text'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);

        $content = $_POST['content'];
        $content = filter_var($content, FILTER_SANITIZE_STRING);

        $status = 'deactive';

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../image/' .$image;

        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ?");
        $select_image->execute([$image]);

        if (isset($image)) {
            if($select_image->rowCount() > 0) {
                $warning_msg[] = 'image name repeated';
            } elseif ($image_size > 2000000) {
                $warning_msg[] = 'image size to large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        } 

        if ($select_image->rowCount() > 0 AND $image != '') {
            $warning_msg[] = 'please rename your image';
        } else {
            $insert_product = $conn->prepare("INSERT INTO `products`(id, name, price, image, product_detail, status) VALUES (?,?,?,?,?,?)");
            $insert_product->execute([$id, $name, $price, $image, $content, $status]);
            $success_msg[] = 'product inserted successfully';
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
    <title>Website  Coffeee - add products page</title>
</head>
<body>
<?php include '../components/admin_header.php';?>

    <div class="main">
        <div class="banner">
            <h1>Add Products</h1>
        </div>
        <div class="title2">
            <a href="dashboard.php" style="text-decoration: none">Home</a><span> / Add Products</span>
        </div>

        <section class="form-container">
            <h1 class="heading">Add Products</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label>Product Name<sup>*</sup></label>
                    <input type="text" name="text" maxlength="100" required placeholder="add product name">
                </div>

                <div class="input-field">
                    <label>Product Price<sup>*</sup></label>
                    <input type="number" name="price" maxlength="100" required placeholder="add product price">
                </div>

                <div class="input-field">
                    <label>Product Detail<sup>*</sup></label>
                    <textarea name="content" required maxlength="10000" required placeholder="write product description"></textarea>
                </div>

                <div class="input-field">
                    <label>Product Image<sup>*</sup></label>
                    <input type="file" name="image" accept="image/*" required>
                </div>

                <div class="flex-btn">
                    <button type="summit" name="publish" class="btn-ap">Publish Product</button>
                    <button type="summit" name="draft" class="btn-ap">Save As Craft</button>
                </div>
            </form>

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