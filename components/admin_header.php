<!-- Boxicons CDN Link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!-- SweetAlert CDN Link (latest version) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom JavaScript Link -->
<script src="script.js" type="text/javascript"></script>


<!----- Dropdown CSS JS ----->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">


<header class="header">
    <div class="flex">
        <a href="dashboard.php" class="logo">
            <img src="../img/logo.jfif" alt="Logo" style="width: 100px; border-radius: 50px;">
        </a>
        <nav class="navbar">
            <a href="dashboard.php" style="text-decoration: none">Dashboard</a>
            <a href="add_product.php" style="text-decoration: none">Add Product</a>
            <a href="view_product.php" style="text-decoration: none">View Product</a>
            <a href="user_account.php" style="text-decoration: none">Accounts</a>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user fa-fw"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 200px">
                            <li><a class="dropdown-item" href="#!">Profile</a></li>
                            <li><a class="dropdown-item" href="#!">Setting</a></li>
                            <li><hr class="dropdown-divider"/></li>
                            <li><a class="dropdown-item" href="../components/admin_logout.php" onclick="return confirm('Logout from this website?');" >Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
<!-- 
            <ul class="navbar-nav">
                <div class="icons">
                    <i class='bx bxs-user' id="user-btn"></i>
                    <i class='bx bx-list-plus' id="menu-btn"></i>
                </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul> -->

        

        <div class="profile-detail">
            <?php
                // Prepare statement to fetch profile data
                $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
                $select_profile->execute([$admin_id]);

                // Check if profile exists and fetch data
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                }
            ?>

            <div class="profile">
                <img src="../image/<?=$fetch_profile['profile']; ?>" class="logo-img" alt="Profile Image" style="width: 60px;">
                <p><?= htmlspecialchars($fetch_profile['name']); ?></p> <!-- Use htmlspecialchars for security -->
            </div>
            <div class="flex-btn">
                <a href="profile.php" class="btn">Profile</a>
                <a href="../components/admin_logout.php" onclick="return confirm('Logout from this website?');" class="btn">Logout</a>
            </div>
        </div>
    </div>
</header>
