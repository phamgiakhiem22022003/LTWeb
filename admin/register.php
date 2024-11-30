<?php 
    include '../components/connection.php';

    if (isset($_POST['register'])){

        $id = unique_id();

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $email= $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $pass = sha1($_POST['password']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $cpass = sha1($_POST['cpassword']);
        $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../image/'.$image;

        $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE email = ?");
        $select_admin->execute([$email]);

        if ($select_admin->rowCount() > 0) {
            $warning_msg[] = 'user email already exit';
        } else {
            if($pass != $cpass) {
                $warning_msg[] = 'confirm password not matchedt';
            } else {
                $insert_admin = $conn->prepare("INSERT INTO `admin` (id, name, email, password, profile) VALUES (?, ?, ?, ?, ?)");
                $insert_admin->execute([$id, $name, $email, $cpass, $image]);
                move_uploaded_file($image_tmp_name, $image_folder);
                $success_msg[] = 'new admin register';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boxicon cdn link-->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time();?>">
    <title>Website  Coffeee - Register page</title>
</head>
<body>

    <div class="main">
        <section>
            <div class="form-container" id="admin_login">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Register now</h3>

                    <div class="input-field">
                        <label>Username <sup>*</sup></label>
                        <input type="text" name="name" maxlength="20" 
                        required placeholder="Enter your username" 
                        oninput="this.value.replace(/\s/g,'')">
                    </div>

                    <div class="input-field">
                        <label>Email <sup>*</sup></label>
                        <input type="email" name="email" maxlength="20" 
                        required placeholder="Enter your email" 
                        oninput="this.value.replace(/\s/g,'')">
                    </div>

                    <div class="input-field">
                        <label>Password <sup>*</sup></label>
                        <input type="password" name="password" maxlength="20" 
                        required placeholder="Enter your password" 
                        oninput="this.value.replace(/\s/g,'')">
                    </div>

                    <div class="input-field">
                        <label>Comfirm password <sup>*</sup></label>
                        <input type="password" name="cpassword" maxlength="20" 
                        required placeholder="Confirm password" 
                        oninput="this.value.replace(/\s/g,'')">
                    </div>

                    <div class="input-field">
                        <label>select profile <sup>*</sup></label>
                        <input type="file" name="image" accept="image/*">
                    </div>

                    <button type="submit" name="register" class="btn">Register now</button>
                    <p>already have an account ? <a href="login.php">Login now</a></p>

                    

                </form>
            </div>
        </section>
    </div>



    <!--sweetalert cdn link-->
    <script src="https://cdnjs.cloundflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!--Custom js link-->
    <script type="text/javascript" src="script.js"></script>

    <!--alert-->
    <?php include '../components/alert.php';?>


</body>
</html>