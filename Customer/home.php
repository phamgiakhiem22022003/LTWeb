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
    
    <?php 
    include '../Customer/components/header.php'; 
    ?>

    <!-- home section starts -->

    <section class="home" id="home">

        <div class="content">
            <h3>Coffee Creation</h3>
            <p>Bắt đầu ngày mới của bạn ngay, tận hưởng khoảnh khắc với 1 ly coffee tại tiệm của tôi</p>
            <a href="#" class="btn">Khám Phá Ngay</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- banner section starts -->

    <section class="banner-container">

        <div class="banner">
            <img src="images/banner-1.png" alt="">
            <div class="content">
                <span>Ưu đãi đặc biệt</span>
                <h3>giảm giá tới 50%</h3>
                <a href="#" class="btn"> Mua Ngay</a>
            </div>
        </div>

        <div class="banner">
            <img src="images/banner-2.png" alt="">
            <div class="content">
                <span>Ưu đãi đặc biệt</span>
                <h3>giảm giá tới 50%</h3>
                <a href="#" class="btn"> Mua Ngay</a>
            </div>
        </div>

        <div class="banner">
            <img src="images/banner-3.png" alt="">
            <div class="content">
                <span>Ưu đãi đặc biệt</span>
                <h3>ugiảm giá tới 50%</h3>
                <a href="#" class="btn"> Mua Ngay</a>
            </div>
        </div>

    </section>

    <!-- banner section ends -->

    <!-- offer section starts -->

    <section class="offer">

        <div class="heading">
            <h3>Các Gói Ưu Đãi</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <img src="images/offer-1.png" alt="">
                <h3>Gói Cơ Bản (Basic)</h3>
                <p>Phù hợp cho quán cà phê nhỏ hoặc vừa, chưa cần tính năng đặt hàng trực tuyến.</p>
            </div>

            <div class="box">
                <img src="images/offer-2.png" alt="">
                <h3>Gói Nâng Cao (Standard)</h3>
                <p>Phù hợp cho quán cà phê có quy mô lớn hơn và mong muốn có tương tác tốt hơn với khách hàng.</p>
            </div>

            <div class="box">
                <img src="images/offer-3.png" alt="">
                <h3>Gói Premium</h3>
                <p>Phù hợp cho các thương hiệu lớn hoặc chuỗi cửa hàng cà phê.</p>
            </div>

            <div class="box">
                <img src="images/offer-4.png" alt="">
                <h3>Gói Chuyên Nghiệp (Enterprise)</h3>
                <p>Phù hợp cho chuỗi cà phê muốn xây dựng một nền tảng hoàn chỉnh với hệ thống quản lý toàn diện.</p>
            </div>

        </div>

    </section>

    <!-- offer section ends -->

    <!-- footer section starts -->
    <?php 
        include_once '../Customer/components/footer.php';
    ?>



    <script src="script.js"></script>
</body>
</html>