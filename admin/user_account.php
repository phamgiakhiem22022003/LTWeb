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
    <title>Website  Coffeee - Account User page</title>
</head>
<body>
<?php include '../components/admin_header.php';?>

    <div class="main">
        <div class="banner">
            <h1>Accounts</h1>
        </div>
        <div class="title2">
            <a href="dashboard.php" style="text-decoration: none">Home</a><span> / Accounts User</span>
        </div>
        <h1 class="heading">Accounts User</h1>
        <section class="accounts">
            <div class="box-container">
                <?php
                    $select_user = $conn->prepare("SELECT * FROM `users`");
                    $select_user->execute();

                    if ($select_user->rowCount() > 0) {
                        while ($fetch_users = $select_user->fetch(PDO::FETCH_ASSOC)) {
                            $user_id = isset($fetch_users['id']) ? $fetch_users['id'] : 'N/A';
                            $user_name = isset($fetch_users['name']) ? $fetch_users['name'] : 'N/A';
                            $user_email = isset($fetch_users['email']) ? $fetch_users['email'] : 'N/A';

                ?>
                <div class="box">
                    
                    <p>user id : <span><?= $fetch_users['id']; ?></span></p>
                    <p>user name : <span><?= $fetch_users['name']; ?></span></p>
                    <p>user email : <span><?= $fetch_users['email']; ?></span></p>

                </div>
                <?php
                        }
                    } else {
                        echo'
                            <div class="empty">
                                <p>No User registed yet</p>
                            f</div>';
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