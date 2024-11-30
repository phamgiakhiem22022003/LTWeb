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
        <h1>Customer's Review</h1>
    </div>

    <!-- end -->

    <!-- review section starts -->

    <section class="review">

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/quote-left.png" width="25" height="25" alt="">
                    <img src="../image/ze.jpg" alt="" class="user">
                    <img src="images/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Khim</h3>
                <h4>satisfied client</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>Cà phê ở đây thật sự rất tuyệt! Hương vị đậm đà, đúng chất nguyên bản, đặc biệt phù hợp với những ai yêu thích vị cà phê truyền thống</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/quote-left.png" width="25" height="25" alt="">
                    <img src="../image/1.jfif" alt="" class="user">
                    <img src="images/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Sơn</h3>
                <h4>satisfied client</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>Mỗi tách cà phê đều được pha chế rất tỉ mỉ, mang đến một cảm giác vừa ấm áp, vừa trọn vẹn trong từng ngụm đầu tiên. Tôi cũng rất ấn tượng với sự sáng tạo trong các món cà phê hiện đại tại đây, chẳng hạn như cà phê dừa hay latte với lớp foam siêu mịn.</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/quote-left.png" width="25" height="25" alt="">
                    <img src="../image/2.jpg" alt="" class="user">
                    <img src="images/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Quốc</h3>
                <h4>satisfied client</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>Không gian quán thoải mái, thiết kế hiện đại nhưng vẫn giữ được sự gần gũi. Đội ngũ nhân viên thì thân thiện, chu đáo, luôn sẵn sàng giải thích chi tiết từng loại cà phê cho khách. Nếu bạn đang tìm kiếm một nơi để thư giãn và tận hưởng ly cà phê chất lượng, đây chính là nơi lý tưởng!</p>
            </div>

        </div>

    </section>


    <!-- review section ends -->

    
    <!-- footer section starts -->

    <?php 
        include '../Customer/components/footer.php';
    ?>

    <script src="script.js"></script>

</body>
</html>