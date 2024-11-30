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
        <h1>our blog</h1>
    </div>

    <!-- end -->

    <!-- blog section starts -->

    <section class="blog">

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/blog-1.webp" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-calendar"></i> 19th September 2024</a>
                        <a href="#"> <i class="fas fa-heart"></i> 10 million</a>
                    </div>
                    <h3>Kho tàng những câu chuyện phong phú</h3>
                    <p>Tìm hiểu về cách thưởng thức cà phê ở các quốc gia như Ý, Việt Nam, Nhật Bản, hoặc Thổ Nhĩ Kỳ.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-2.webp" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-calendar"></i> 18th September 2024</a>
                        <a href="#"> <i class="fas fa-heart"></i> 5 million</a>
                    </div>
                    <h3>Cà phê và nghệ thuật</h3>
                    <p>Khám phá mối liên kết giữa cà phê và nghệ thuật sáng tạo, như âm nhạc, văn học hay hội họa.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-3.webp" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-calendar"></i> 4th September 2024</a>
                        <a href="#"> <i class="fas fa-heart"></i> 1 million</a>
                    </div>
                    <h3>Trải nghiệm không gian</h3>
                    <p>Chia sẻ cảm nhận về thiết kế, ánh sáng, âm nhạc và cách bài trí tại các quán.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-4.webp" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-calendar"></i> 5th October 2024</a>
                        <a href="#"> <i class="fas fa-heart"></i> 7 million</a>
                    </div>
                    <h3>Công nghệ trong cà phê</h3>
                    <p>Những phát minh mới, như máy pha cà phê tự động hay dịch vụ giao hàng qua ứng dụng.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-5.webp" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-calendar"></i> 10th July 2024</a>
                        <a href="#"> <i class="fas fa-heart"></i> 6 million</a>
                    </div>
                    <h3>Khách hàng</h3>
                    <p>Những kỷ niệm đáng nhớ giữa khách hàng và nhân viên quán.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-6.webp" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-calendar"></i> 15th March 2024</a>
                        <a href="#"> <i class="fas fa-heart"></i> 9 million</a>
                    </div>
                    <h3>Cà phê bền vững</h3>
                    <p>Tìm hiểu về cà phê hữu cơ, công bằng thương mại và các sáng kiến bảo vệ môi trường.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

    </section>

    <!-- blog section ends -->


    <!-- footer section starts -->

    <?php 
        include '../Customer/components/footer.php';
    ?>


    <script src="script.js"></script>

</body>
</html>