<?php
session_start();
include 'koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengecek apakah user sudah login
if (isset($_SESSION['user_id'])) {
    // Pengguna sudah login, lakukan sesuatu jika perlu
    $user_id = $_SESSION['user_id'];
    // Ambil informasi pengguna dari database jika perlu
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
} else {
    // Pengguna belum login, lakukan sesuatu jika perlu
    // Misalnya, set default user atau tetap kosong
    $user = null;
}


$conn->close();
?>

<!DOCTYPE html> 
<head lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outspace</title>
    <link rel="icon" type="image/icon" href="/Logo Outspace - Copy.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end link  poppins -->
    <link rel="stylesheet" href="style.css">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

       
 <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar.transparent {
            background: transparent;
        }

        .navbar.white-bg {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar.transparent .nav-link,
        .navbar.transparent .navbar-toggler-icon,
        .navbar.transparent .wrapper-icon a,
        .navbar.transparent .wrapper-icon i {
            color: white;
        }

        .navbar.white-bg .nav-link,
        .navbar.white-bg .navbar-toggler-icon,
        .navbar.white-bg .wrapper-icon a,
        .navbar.white-bg .wrapper-icon i {
            color: #black;
        }

        .navbar .nav-link {
            margin: 0 15px;
            font-size: 1.1rem;
        }

        .wrapper-icon {
            display: flex;
            align-items: center;
        }

        .wrapper-icon .box {
            display: flex;
            align-items: center;
            margin-right: 15px;
            position: relative;
        }

        .wrapper-icon .box input {
            border: none;
            border-radius: 5px;
            padding: 10px;
            padding-right: 35px;
            margin-right: 5px;
            font-size: 1.1rem;
            width: 200px;
            transition: width 0.3s;
        }

        .wrapper-icon .box input:focus {
            width: 300px;
            outline: none;
        }

        .wrapper-icon .box .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        .wrapper-icon .cart a,
        .wrapper-icon .person a {
            text-decoration: none;
            color: inherit;
        }

        .wrapper-icon .sign-btn a {
            text-decoration: none;
            color: inherit;
        }

        .wrapper-icon .sign-btn {
            background-color: #023246;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 15px;
            font-size: 1.1rem;
        }

        .wrapper-icon .sign-btn:hover {
            background-color: #03456c;
        }

        section {
            padding: 100px 20px;
            min-height: 100vh;
        }

        /* Remove underline from links */
        a {
            text-decoration: none;
        }

        /* Centering navbar content */
        .navbar-nav {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    </head>
<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg fixed-top transparent">
        <div class="container-fluid">
            <img class="logo" src="Logo Outspace - Copy.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">OutSpace</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="aboutus.html">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#CU">CONTACT US</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">STORE</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="AllCol.php">ALL</a></li>
                                <li><a class="dropdown-item" href="Men.html">MALE</a></li>
                                <li><a class="dropdown-item" href="Women.html">FEMALE</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wrapper-icon">
                <div class="box">
                    <input type="text" placeholder="Search...">
                    <i class="bi bi-search search-icon"></i>
                </div>
                <div class="cart">
                    <a href="cart.php">
                        <i class="bi bi-cart3"></i>
                    </a>
                </div>
                <div class="person">
                    <a href="profile2.php">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </div>
                <?php if(isset($_SESSION['username'])): ?>
                    <li>WELCOME, <?php echo $_SESSION['username']; ?>!</li>
                    <li><a class="link" href="logout.php">Logout</a></li>
                <?php else: ?>
                <button class="sign-btn">
                    <a href="signin.php"><b>SIGN IN</b></a>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
</head>
<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-sm fixed-top transparent">
        <div class="container-fluid">
            <img class="logo" src="Logo Outspace - Copy.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">OutSpace</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="aboutus.html">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#CU">CONTACT US</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">STORE</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Allcol.php">ALL</a></li>
                                <li><a class="dropdown-item" href="Men.html">MALE</a></li>
                                <li><a class="dropdown-item" href="Women.html">FEMALE</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wrapper-icon">
                <div class="box">
                    <input type="text" placeholder="Search...">
                    <a href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
                <div class="cart">
                    <a href="cart.php">
                        <i class="bi bi-cart3"></i>
                    </a>
                </div>
                <div class="person">
                    <a href="profile2.php">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </div>
                <?php if(isset($_SESSION['username'])): ?>
                    <li>WELCOME, <?php echo $_SESSION['username']; ?>!</li>
                    <li><a class="link" href="logout.php">Logout</a></li>
                <?php else: ?>
                <button class="sign-btn">
                    <a href="signin.php"><b>SIGN IN</b></a>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
</head>
<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-sm fixed-top transparent">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img class="logo" src="Logo Outspace - Copy.png" alt="logo">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">OutSpace</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="aboutus.html">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#CU">CONTACT US</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">STORE</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Allcol.php">ALL</a></li>
                                <li><a class="dropdown-item" href="Men.html">MALE</a></li>
                                <li><a class="dropdown-item" href="Women.html">FEMALE</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wrapper-icon">
                <div class="box">
                    <input type="text" placeholder="Search...">
                    <a href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
                <div class="cart">
                    <a href="cart.php">
                        <i class="bi bi-cart3"></i>
                    </a>
                </div>
                <div class="person">
                    <a href="profile2.php">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </div>
                <?php if(isset($_SESSION['username'])): ?>
                    <li>WELCOME, <?php echo $_SESSION['username']; ?>!</li>
                    <li><a class="link" href="logout.php">Logout</a></li>
                <?php else: ?>
                <button class="sign-btn">
                    <a href="signin.php"><b>SIGN IN</b></a>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>
   
  <!-- start image header-->
  <div class="image-container">
    <img class="w-100" src="slide1.jpg" alt="tes foto">
    <div class="overlay-text">FIND UR OUR DESIGN</div>
    <button class="btn" onclick="window.location.href='AllCol.php'">VISIT NOW</button>
    <div class="card-body">
    <p class="text-light col-12 text-sm-center mt-4"><b>Trandsetter in Comfort.</b>Beauty in Simplicity</p>
    </div>
</div>
  <!-- end image header -->
  <!-- Best Seller -->
  <div class="shopnow-offer">
    <h1><B>BEST SELLER</B></h1>
    <button class="shopnow-btn" onclick="window.location.href='AllCol.php'">Shop Now</button>
  </div>

<div class="container">
    <div class="card--container">
        <article class="card--article">
            <img src="img/1700.png" alt="image" class="card--img">

            <div class="card--data">
                <h5 class="card-tittle">Cranium T-Shirt Design</h5>
                <span class="card--price">IDR Rp 145.000,00</span>
            </div>

            <!-- <img src="img/20240610_180203_0000.png" alt="image" class="card--bg"> -->

            <a href="cart.php" class="card--button">
                Shop Now
            </a>
        </article>

        <article class="card--article">
            <img src="img/1000.png" alt="image" class="card--img">

            <div class="card--data">
                <h5 class="card-tittle">Falling In Love T-Shirt Design</h5>
                <span class="card--price">IDR Rp 145.000,00</span>
            </div>

            <!-- <img src="img/20240610_180203_0000.png" alt="image" class="card--bg"> -->

            <a href="cart.php" class="card--button">
                Shop Now
            </a>
        </article>

        <article class="card--article">
            <img src="img/1100.png" alt="image" class="card--img">

            <div class="card--data">
                <h5 class="card-tittle">Good Future T-Shirt Design</h5>
                <span class="card--price">IDR Rp 150.000,00</span>
            </div>

            <!-- <img src="img/20240610_180203_0000.png" alt="image" class="card--bg"> -->

            <a href="cart.php" class="card--button">
                Shop Now
            </a>
        </article>
    </div>
</div>

<div class="banner">
    <img src="img/bg-nasa.jpg">

    <div class="banner-text">
        <a href="#" class="banner-button">
            <b>Outspace</b> <i class='bx bx-chevron-right'></i>
        </a>
        <p>
            Explores the concepts of freedom, exploration, <br>
            and boundless creativity The brand may focus on <br>
            products or service that are designed to inspire individuals <br>
            to push the boundaries, be it in lifestyle, art, technology, <br>
            or any other field.
        </p>
    </div>
</div>

<div class="liked">
    <h1> YOU MAY ALSO LIKE </h1>
    
<div class="main-liked">
    <div class="wrap-liked ">
        <img src="img/2000.png">
        <img src="img/1130.png" >
        <img src="img/1600.png" >
        <img src="img/4000.png" >
        <img src="img/2001.png" >
    </div>
</div>  
 
<div class="signup-offer">
    <h1>Sign Up to get 20% Discounts & Grab it fast!!</h1>
    <button onclick="window.location.href='signin.php'" class="signup-btn">Sign Up</button>
</div>



<!--     footer -->
      <footer class="bd-footer py-4 py-md-5  bg-body">
    <div class="container py-4 py-md-5 px-4 px-md-3 text-black">
      <div class="row">
        <div class="col-lg-2 mb-3">
          <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="/" aria-label="Outspace">
            <b>Outspace</b>
          </a>
          <p>Trensetter in Comfort<br>Beauty in Simplicity</p>
        </div>
        <div class="col-6 col-lg-3 offset-lg-1 mb-3 ">
          <b>About</b>
          <ul class="list-unstyled">
            <a href="security.html" class="text-decoration-none " ><li class="mb-2 text-black">Shipping Policy</li></a>
            <a href="security.html" class="text-decoration-none " ><li class="mb-2 text-black">Refund Policy</li></a>
            <a href="security.html" class="text-decoration-none " ><li class="mb-2 text-black">Terms of Policy</li></a>
          </ul>
        </div>
        <div class="col-6 col-lg-2 mb-3">
          <b>Navigation</b>
          <ul class="list-unstyled">
            <li class="mb-2">
              <a class="text-decoration-none text-black" href="index.php">Home</a>
            </li>
            <li class="mb-2">
              <a class="text-decoration-none text-black" href="AllCol.php">Shop</a>
            </li>
            <li class="mb-2">
              <a class="text-decoration-none text-black" href="aboutus.html">About Us</a>
            </li>
          </ul>
        </div>
        <div class="col-6 col-lg-2 mb-3" style="margin-left: 100px;">
          <b id="CU">Contact Us</b>
          <ul class="list-unstyled d-flex">
            <li class="mb-1">
              <a href="https://wa.me/0895613231486" target="_blank"><i class="bi bi-whatsapp text-black" style="padding-right: 10px; font-size: x-large;"></i></a>
            </li>
            <li class="mb-1">
              <a href="#"><i class="bi bi-instagram text-black" style="padding-right: 10px; font-size: x-large;"></i></a>
            </li>
            <li class="mb-1">
              <a href="#"><i class="bi bi-facebook text-black" style="padding-right: 10px; font-size: x-large;"></i></a>
            </li>
          </ul>
          <button type="button" class="btn border-0 bg-body" data-bs-toggle="modal" data-bs-target="#ModalForm">
            Login as Admin
          </button>
        </div>
      </div>
    </div>
  </footer>
      <!-- Button trigger" modal -->

      
<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="myform">
              <h1 class="text-center">Login Form</h1>
              <form>
                  <div class="mb-3 mt-4">
                      <label for="exampleInput" class="form-label">Id</label>
                      <input type="text" class="form-control" id="exampleInput" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <button type="submit" class="btn mt-3 login"><a href="admin_login.php">LOGIN</a></button>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
  <!-- bootstrap java -->
  <script>
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.remove('transparent');
                navbar.classList.add('white-bg');
            } else {
                navbar.classList.remove('white-bg');
                navbar.classList.add('transparent');
            }
        });

        // Initial state
        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY <= 50) {
                navbar.classList.add('transparent');
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
