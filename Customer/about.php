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

    <!-- header section ends -->


    <!-- sub heading -->

    <div class="sub-heading">
        <h1>about us</h1>
    </div>

    <!-- end -->

    <!-- about us section starts-->

    <section class="about">

        <div class="image">
            <img src="images/about.png" alt="">
        </div>

        <div class="content">
            <h3>Khám phá niềm đam mê của chúng tôi về trải nghiệm cà phê hoàn hảo</h3>
            <p>Quán Coffee Shop mang đậm giá trị hương thơm và sự ngọt ngào từ các hạt cà phê và từng hương vị</p>
            <a href="<?php echo SITEURL; ?>Customer/menu.php?>" class="btn"> Menu của Chúng Tôi</a>    
        </div>

    </section>

    <!-- about us section ends-->

    <!-- coffee base section starts-->

    <section class="base">

        <div class="heading">
            <h3>Cách loại cà phê</h3>
        </div>

        <div class="box-container">

            <div class="image">
                <img src="images/coffee-base.gif" alt="">
            </div>

            <div class="container">

                <div class="item">
                    <div class="icon">
                        <img src="images/base-1.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Cà Phê Mang Đi</h3>
                        <p>Có thể tới quầy mua mang về hoặc đặt trên website này</p>
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <img src="images/base-2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Cà Phê Đá</h3>
                        <p>Có thể uống tại chỗ hoặc mua mang về.</p>
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <img src="images/base-3.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Cà Phê Gói</h3>
                        <p>Có các loại gói cà phê làm sẵn từ hạt cà phê.</p>
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <img src="images/base-4.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Đồ Ăn Kèm</h3>
                        <p>Có các món đồ ăn kèm</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- coffee base section ends-->


    

    <!-- footer section starts -->
    <?php 
        include '../Customer/components/footer.php';
    ?>


    <script src="script.js"></script>

</body>
</html>