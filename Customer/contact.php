<?php
session_start();

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
        <h1>contact us</h1>
    </div>

    <!-- end -->

    <?php
    if (isset($_SESSION['contact_message'])) {
        echo $_SESSION['contact_message'];
        unset($_SESSION['contact_message']);
    }
    ?>

    <!-- contact us section starts -->

    <section class="contact">

        <div class="row">

            <form action="" method="POST">
                <h3>Liên Hệ</h3>

                <div class="inputBox">
                    <input type="text" placeholder="Enter Your Name" class="box">
                    <input type="email" placeholder="Enter Your Email" class="box">
                </div>

                <div class="inputBox">
                    <input type="number" placeholder="Enter Your number" class="box">
                    <input type="number" placeholder="How Many Members" class="box">
                </div>
                <textarea placeholder="Your Message" cols="30" rows="10"></textarea>
                <input type="submit" name="send_message" value="Send Message" class="btn">

            </form>
            <?php
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
                // Kiểm tra và gán giá trị từ form
                
                $name_ct = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';
                $email_ct = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
                $phone_number_ct = isset($_POST['number']) ? mysqli_real_escape_string($con, $_POST['number']) : '';
                $members_ct = isset($_POST['member']) ? intval($_POST['member']) : 0;
                $message_ct = isset($_POST['message']) ? mysqli_real_escape_string($con, $_POST['message']) : '';
            
                // Xử lý nếu các trường bắt buộc không được điền
                if (empty($name_ct) || empty($email_ct) || empty($phone_number_ct) || empty($$members_ct) ||empty($message_ct)) {
                    $_SESSION['contact_message'] = "<div class='error'>Please fill in all required fields.</div>";
                } else {
                    // Thực hiện câu lệnh INSERT
                    $sql3 = "INSERT INTO `message` (`name`, `email`, `phone`, `member`, `message`) 
                             VALUES ('$name_ct', '$email_ct', '$phone_number_ct', '$members_ct', '$message_ct')";
            
                    if (mysqli_query($con, $sql3)) {
                        $_SESSION['contact_message'] = "<div class='success'>Message sent successfully!</div>";
                    } else {
                        $_SESSION['contact_message'] = "<div class='error'>Failed to send message. Please try again later.</div>";
                    }
                }
            }

            mysqli_close($con);
            ?>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.9293944930487!2d-97.7546682884772!3d30.267592874706946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644b50e25cd8c2d%3A0x3fa3976be9ecaa5!2sMerit%20Coffee!5e0!3m2!1sen!2s!4v1709320735877!5m2!1sen!2s"
                width="550" allowfullscreen="" loading="lazy" class="map"></iframe>

        </div>

    </section>

    <!-- contact us section ends -->

    <!-- footer section starts -->

    <?php
    include '../Customer/components/footer.php';
    ?>

    <script src="script.js"></script>

</body>

</html>