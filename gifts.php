<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="css/shoppingcart.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>
  TACHS ONLINE STORE
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- link github -->
  <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  <link rel="stylesheet" href="save_cart.php">
</head>

<body class=".animation-delay">
  <div style="position: fixed;margin-left: 2px;margin-top: 4px;">
    <img style="width: 5rem;border-radius: 30px;" src="Tachs.png" alt="" class="logo">
  </div>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div style="text-align: center;">
      <span id="waving-effect" style="color: #6200ea;font-size: 50px;text-shadow: 0 5px black;">TAC</span><span id="waving-effect" style="color:#fdcc0d;font-size: 50px;text-shadow: 0 5px black;">HS</span>
    </div>
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <!-- <span id="waving-effect" style="color: brown;font-size: 50px;text-shadow: 0 5px black;">TAC</span><span id="waving-effect" style="color:goldenrod;font-size: 50px;text-shadow: 0 5px black;">CH</span> -->
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="shop.php">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.php">
                Reviews
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="shipping.html">
                Shipping
              </a>
            </li> -->
          </ul>
          <div class="user_option">
          <form style="margin-right: 8px;" action="search.php" method="get" class="d-flex" role="search">
           <input style="width: 250px;" class="form-control me-2" type="search" name="query" placeholder="Search products,brands" aria-label="Search">
           <button style="background-color: #fdcc0d;" class="btn btn-outline-secondary" type="submit">Search</button>
          </form>
            <nav>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a style="text-decoration: none;" href="logout.php">
                <i class='fas fa-user'></i>
                <span><?php echo htmlspecialchars($_SESSION['name']); ?> | LOGOUT</span>
            </a>
        <?php else: ?>
            <a style="text-decoration: none;" href="login.html">
            <i class='fas fa-user'></i>
                <span>LOGIN</span>
            </a>
        <?php endif; ?>
    </nav>
         <a style="text-decoration: none;" href="tracking.html">
          <i class="fas fa-map-marker-alt"></i>
          </a>
            </div>
            <!-- <div class="nav container"> -->
              <div class="cart-container" style="position: relative; display: inline-block;">
                <!-- cart icon -->
                <i class="bx bx-cart bx-flip-horizontal" id="cart-icon"></i>
                <span class="cart-count">0</span>
                <!-- <span style="font-weight: 400; color: black;">CART</span> -->
            </div>
            <!-- cart -->
            <div class="cart">
              <h2 class="cart-title">Your cart</h2>
              <!-- cart content -->
            <div class="list-cart">
               <div class="cart-content">
                  
               </div>
               <div class="total">
                  <div class="total-title">Total</div>
                  <div class="total-price">₦0</div>
               </div>
              </div>
               <!-- buy button -->
                <!-- Conditionally display Buy Now button -->
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
              <button type="button" class="btn-buy" onclick="submitCart()">Buy Now</button>
            <?php else: ?>
              <p style="color: red; font-weight: bold;">Please <a href="login.html">log in</a> to complete your purchase.</p>
            <?php endif; ?>
                    <!-- cart Close -->
                    <i class='bx bx-x' id="close-cart" ></i>
               </div>
          <!-- </div> -->
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
  <!-- shop section -->
     <section class="shop container">
      <h2 class="section-title" id="wecan">Gifts for loved ones</h2>
        <!-- content -->
         <div class="shop-content">
            <!-- box 1 -->
             <div style="height: 450px;" class="product-box">
              <div class="new">
                <span>
                  New
                </span>
              </div>
                <img style="height: 260px;" src="images/gift.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Gift 1</h2>
                <span class="price">₦25,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
              <!-- box 2 -->
              <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 260px;" src="Saved Pictures/socks/socks14.jpg" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 2</h2>
                <span class="price">₦4,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <!-- box 3 -->
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 260px;" src="images/gifts/1-removebg-preview (1).png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 3</h2>
                <span class="price">₦18,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
              <!-- box 4 -->
              <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 260px;" src="images/gifts/1__10_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 4</h2>
                <span class="price">₦25,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
              <!-- box 5 -->
              <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="Saved Pictures/glasses/sunglasses13.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 5</h2>
                <span class="price">₦10,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
              <!-- box 6 -->
              <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__12_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 6</h2>
                <span class="price">₦25,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
              <!-- box 7 -->
              <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__13_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 7</h2>
                <span class="price">₦18,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <!-- box 8-->
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__1_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 8</h2>
                <span class="price">₦20,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__2_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 9</h2>
                <span class="price">₦35,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__3_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 10</h2>
                <span class="price">₦38,000</span>
                <ul style="justify-content: center;padding: 0;margin: 0;">
                  <li><i class="fa fa-star checked"></i></li>
                  <li><i class="fa fa-star checked"></i></li>
                  <li><i class="fa fa-star checked"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__4_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 11</h2>
                <span class="price">₦38,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="Saved Pictures/FEMALE SHOE/IMG_6656.JPG" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 12</h2>
                <span class="price">₦29,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__6_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 13</h2>
                <span class="price">₦29,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__7_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 14</h2>
                <span class="price">₦28,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__8_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 15</h2>
                <span class="price">₦28,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__9_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 16</h2>
                <span class="price">₦26,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__10_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 17</h2>
                <span class="price">₦20,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="Saved Pictures/Boxers&Briefs/boxersss.jpg" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 18</h2>
                <span class="price">₦28,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="Saved Pictures/Boxers&Briefs/brieefss.jpg" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 19</h2>
                <span class="price">₦28,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
             <div style="height: 450px;" class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <img style="height: 250px;" src="images/gifts/1__9_-removebg-preview.png" alt="" class="product-img">
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">gift 20</h2>
                <span class="price">₦28,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bxs-shopping-bag add-cart'></i>
             </div>
         </div>
              <div style="margin-bottom: 5px;" class="btn-box">
              </div>
        </div>
    </div>
  </section>
  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
       <h6 style="text-align:center;">join us on</h6>
      <div class="social_box">
        <a style="text-decoration: none"; href="https://www.facebook.com/login.php/">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a style="text-decoration: none"; href="https://x.com/twitt_login">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a style="text-decoration: none"; href="https://www.instagram.com/accounts/login/?hl=en">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a style="text-decoration: none"; href="https://www.youtube.com/">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="inform_container">
      <div class="container">
        <div style="justify-content: space-around;gap:20px" class="row">
          <div class="col-md-6 col-lg-3">
              <img style="width: 70%;" src="Tachs.png" alt="">
          </div>
          <div class="col-md-6 col-lg-3">
          <div class="f-g">
                <div class="flex-container">
                  <img src="Tachs.png" alt="">
                  <div class="ff-g">
                    <h3 style="font-size:13px;">DOWNLOAD TACHS FREE APP</h3>
                    <h3 style="font-size:11px;"><em>Get access to exclusive offers!</em></h3>
                  </div>
                </div>
            </div>
            <div style="gap:20px;" class="svg_icon">
              <a href="https://apps.apple.com/us/app/example-app/id1234567890" target="_blank">
                <svg width="135" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 135 50">
                  <rect width="135" height="50" rx="10" fill="rgba(0, 0, 0, 0.527)"/>
                  <!-- Apple logo -->
                  <svg x="5" y="7" width="30" height="30" viewBox="0 0 24 24" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7 15.5c-.3.8-.7 1.6-1.1 2.3-.4.7-1.1 1.8-2 1.8-.8 0-1.3-.5-2.4-.5s-1.5.5-2.4.5c-1 0-1.7-1.1-2.2-1.9-1.2-2.1-2.1-5.8-.9-8.3.6-1.2 1.6-2 2.9-2 .9 0 1.7.5 2.3.5.6 0 1.5-.5 2.5-.5.6 0 2.1.1 3.1 1.5-2.8 1.4-2.3 5.8.2 7zm-5.5-12.5c.5-.7.9-1.7.7-2.7-.7.1-1.9.5-2.5 1.1-.5.5-1 1.4-.8 2.3.8.1 1.7-.4 2.6-.7z"/>
                  </svg>
                  <!-- Adjusted text positions to create space between icon and text -->
                  <text x="40" y="20" font-family="Arial, sans-serif" font-size="10" fill="#FFF">
                    Download on the
                  </text>
                  <text x="40" y="35" font-family="Arial, sans-serif" font-size="15" fill="#FFF" font-weight="bold">
                    App Store
                  </text>
                </svg>
              </a>
              <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank">
                <svg width="180" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 50">
                  <!-- Background Rectangle -->
                  <rect width="180" height="50" rx="10" fill="rgba(0, 0, 0, 0.527)" />
                  
                  <!-- Google Play Icon -->
                  <!-- Triangular part of the logo -->
                  <polygon points="15,15 15,45 40,30" fill="#34A853" />
                  <polygon points="40,30 55,40 55,20" fill="#FBBC05" />
                  <polygon points="15,15 55,20 40,30" fill="#EA4335" />
                  <polygon points="15,45 55,40 40,30" fill="#4285F4" />
                  
                  <!-- Text "GET IT ON" -->
                  <text x="70" y="25" font-family="Arial, sans-serif" font-size="12" fill="#FFF">
                    GET IT ON
                  </text>
                  
                  <!-- Text "Google Play" -->
                  <text x="70" y="45" font-family="Arial, sans-serif" font-size="15" fill="#FFF" font-weight="bold">
                    Google Play
                  </text>
                </svg>
              </a>          
            </div>
        </div>
        </div>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p style="font-size: 12px;">
              Welcome to TACHS, your premier online shopping destination!
              We're thrilled to have you join our community of customers who trust us for an exceptional online shopping experience. <br>At TACHS, we're passionate about providing: <br>
              -A vast selection of high-quality products <br>
              - Competitive prices and exclusive deals <br>
              - Fast and reliable shipping options <br>
              - Easy returns and refunds <br>
              - Exceptional customer service <br>
             Our mission is to make online shopping easy, convenient, and enjoyable for you. We strive to build long-lasting relationships with our customers, and we're committed to exceeding your expectations.
             Explore our website, discover new products, and enjoy a seamless shopping experience. Thank you for choosing TACHS!"
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
          <form action="subscribe.php" method="POST">
            <h6>
                NEWSLETTER
              </h6>
              <h5 style="font-family: 'Times New Roman', Times, serif;font-size: 15px;">NEW TO TACHS?</h5>
              <em style="font-size:12px;">Subscribe to our newsletter to get updates on our latest offers!</em>
              <div class="mycontainer">
               <div class="inputs-container">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your E-mail Address" required>
            </div>
            <div class="button_gender">
                <label>
                    <input type="radio" name="gender" value="Male" required> MALE
                </label>
                <label>
                    <input type="radio" name="gender" value="Female" required> FEMALE
                </label>
            </div>
        </div>
        <span class="checkbox-container">
            <input type="checkbox" name="agree" id="agree" required>
            <p>I agree to Tachs's Policy and Cookie Policy. You can Unsubscribe at any time.</p>
        </span>
        <div class="link">
            <a href="privacy.html">I accept the Legal Terms</a>
        </div>
        <button style="color:#fff; background-color:#fdcc0d;margin-left:70px;width: 100px;height: 40px;border-radius:5px;" type="submit">Subscribe</button>
         </form>
         </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              - Account Management <br>
              - Order Management <br>
              - Payment and Shipping <br>
              - Returns and Refunds <br>
              - Product Information

            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a style="text-decoration: none"; href="https://www.google.com/maps/dir/Odi-Olowo%2FOjuwoye+LCDA,+Odi-Olowo,+36+Town+Planning+Way,+Ojuwoye+LCDACDA,+Ilupeju,+Lagos+100001,+Lagos/Odi-Olowo%2FOjuwoye+LCDA,+Odi-Olowo,+36+Town+Planning+Way,+Ojuwoye+LCDACDA,+Ilupeju,+Lagos+100001,+Lagos/">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Odi-Olowo ICT Workstation, Ilupeju, 10/12 Ajenifuja St, Shyllon St, off Adeshiyan Street, PalmGroove, Lagos 102215, Lagos, Nigeria</span>
              </a>
              <a style="text-decoration: none"; href="+2348089231475">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  <span>+234 8112948939</span>
                  <span style="font-size: 10px;">(Monday - Friday, 9am - 5pm)</span>
                </span>
              </a>
              <a style="text-decoration: none"; href="www.gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> Tachs@gmail.com</span>
              </a>
              <a style="text-decoration: none"; href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>www.Tachs.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul style="display: flex;gap: 20px;;"  class="footer-selector clearfix">
						<li>
							<div style="margin-top: 25px" class="styled-select lang-selector">
								<select>
									<option value="en">English</option>
                  <option value="fr">French</option>
                  <option value="es">Spanish</option>
                  <option value="de">German</option>
                  <option value="it">Italian</option>
                  <option value="pt">Portuguese</option>
                  <option value="zh">Chinese</option>
                  <option value="ja">Japanese</option>
                  <option value="ko">Korean</option>
                  <option value="ar">Arabic</option>
                  <option value="ru">Russian</option>
								</select>
							</div><br>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="USD">US Dollar (USD)</option>
                  <option value="EUR">Euro (EUR)</option>
                  <option value="GBP">British Pound (GBP)</option>
                  <option value="JPY">Japanese Yen (JPY)</option>
                  <option value="CNY">Chinese Yuan (CNY)</option>
                  <option value="AUD">Australian Dollar (AUD)</option>
                  <option value="CAD">Canadian Dollar (CAD)</option>
                  <option value="CHF">Swiss Franc (CHF)</option>
                  <option value="INR">Indian Rupee (INR)</option>
                  <option value="BRL">Brazilian Real (BRL)</option>
                  <option value="NGN">Nigerian Naria (NGN)</option>
                  <option value="KSH">Kenyan Shillings (KSH)</option>
                  <option value="RND">South African Rand (RND)</option>
								</select>
							</div>
						</li>
            <li style="padding-bottom: 50px;">
              <h6 style="font-size: 15px;font-weight: 500;">payment methods</h6>
              <a style="text-decoration: none;" href="https://www.visa.com" title="Visa">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="38" height="38">
                  <path fill="#1A1F71" d="M0 0h48v48H0z"/>
                  <path fill="#fff" d="M11.194 15.923c-.53 0-1.165.01-1.88.035v2.293h-1.707v-3.95h1.946c1.53 0 2.586.708 2.586 1.842 0 .91-.508 1.644-1.357 1.925L14.094 21.02h-2.083l-1.124-1.915h-2.068v1.915H7.59V15.923h3.68c1.082 0 1.832.548 1.832 1.365 0 .824-.642 1.348-1.532 1.348l-.002.002zM16.498 12.549c.703 0 1.36.038 1.917.107v2.452h-1.62v-1.801h-2.078v1.801h-1.62v-2.452c.621-.062 1.284-.105 1.92-.105zm-1.924 3.32c1.44 0 2.593-.886 2.593-2.146 0-1.14-1.136-2.016-2.616-2.016-.918 0-1.576.415-1.876.796v1.96c.287.375.937.84 1.892.84zm6.775-3.507h.016v-.006h.035c.05.1.178.383.335.636l2.572 4.558h-2.017l-2.48-4.54c-.218-.379-.429-.745-.6-1.02-.085-.188-.146-.334-.186-.464v2.477h-1.648v-6.562h1.949c.264 0 .596.108.746.341.228.271.354.629.354.98zM23.95 15.52c-.136-.232-.451-.388-.748-.388-.583 0-1.043.386-1.043.849 0 .487.401.87.978.87.238 0 .431-.063.58-.154.152-.097.336-.245.454-.391.026-.037.049-.069.071-.102l-.006-.015c.07-.108.104-.229.104-.346 0-.43-.308-.74-.732-.74-.366 0-.635.137-.846.344l-.025.029c-.079.086-.146.177-.208.274-.066.093-.106.22-.106.353zM27.956 19.568l1.85 2.82h-2.014l-1.673-2.567c-.089-.146-.208-.292-.331-.396-.287-.225-.64-.342-1.047-.342-.927 0-1.633.562-1.633 1.308 0 .639.568 1.116 1.12 1.116.522 0 .915-.174 1.22-.466l.048-.058h.014c.087-.126.165-.259.221-.38zm4.897-1.963c.146.259.384.492.716.654.32.152.675.22 1.02.22.614 0 1.05-.313 1.05-.779 0-.441-.391-.757-.897-.757-.382 0-.692.125-.912.284-.211.15-.37.351-.492.582l-.017.03-.002.006c-.112.207-.188.442-.188.678v.001c.001.59.53 1.037 1.097 1.037.674 0 1.09-.283 1.274-.447.194-.17.293-.397.293-.661h.002c-.003-.183-.033-.365-.099-.545-.092-.26-.24-.506-.458-.717zm-9.458-.645v-1.569h.002l-2.265-.027v-.83l2.211-.034v-.941h-2.219v-.752l2.197-.029v-1.273h1.873v4.62h-1.797zm-7.495 2.323c-.441-.328-.918-.594-1.434-.777l-.11-.033c-.457-.136-.876-.344-1.23-.615-.368-.278-.671-.622-.897-1.014-.209-.363-.287-.74-.287-1.14 0-.868.405-1.496 1.089-1.896.703-.409 1.522-.641 2.452-.641.771 0 1.447.187 2.036.507.569.318 1.074.754 1.486 1.29.428.552.64 1.18.64 1.841 0 .584-.23 1.21-.622 1.684-.433.51-.993.889-1.616 1.134l-.086.042c-.41.188-.823.363-1.242.527-.352.158-.698.308-1.035.437zm5.563-6.774h-.004v-.018h.023c.015.028.051.083.1.158.042.061.085.122.124.187l2.014 3.718h-2.13l-1.742-3.269c-.211-.393-.388-.693-.53-.903-.057-.073-.107-.147-.146-.225-.042-.079-.081-.157-.103-.239v2.297h-1.547v-5.084h1.821c.076.273.233.556.434.823.168.233.326.459.492.678.137.193.291.385.43.552l.048.068c.087-.138.174-.28.261-.423.086-.141.171-.278.273-.414z"/>
                  <text x="50%" y="42" fill="#ffffff" font-size="15" text-anchor="middle" font-family="Arial, sans-serif">Visa</text>
                </svg>
              </a>              
              <a style="text-decoration: none;" href="https://www.mastercard.com" title="Mastercard">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                  <rect width="48" height="48" fill="#F79E1B"/>
                  <circle cx="19" cy="24" r="13" fill="#EA001B"/>
                  <circle cx="29" cy="24" r="13" fill="#FF5F00"/>
                  <g fill="#FFF">
                    <path d="M23.8 24a11.976 11.976 0 01-3.8-8 11.976 11.976 0 013.8-8 11.976 11.976 0 013.8 8 11.976 11.976 0 01-3.8 8z"/>
                  </g>
                  <text x="50%" y="40" text-anchor="middle" fill="#FFF" font-size="8" font-family="Arial, sans-serif">
                    Mastercard
                  </text>
                </svg>
              </a>
              <a style="text-decoration: none;" href="https://www.verveinternational.com" title=" Verve">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                  <!-- Background circle -->
                  <circle cx="24" cy="24" r="24" fill="#EF2929"/>
                  
                  <!-- Verve Logo Design -->
                  <!-- Outer circle -->
                  <circle cx="24" cy="24" r="10" fill="#ffffff"/>
                  <!-- Inner smaller circle and "V" design -->
                  <circle cx="26" cy="22" r="5" fill="#EF2929"/>
                  <path d="M20 28 L22 18 L24 18 L26 28 Z" fill="#000000" />
              
                  <!-- Text "Verve" below the logo -->
                  <text x="50%" y="42" fill="#ffffff" font-size="8" text-anchor="middle" font-family="Arial, sans-serif">Verve</text>
                </svg>
              </a>
              <a style="text-decoration: none;" href="https://www.example.com/payment-on-delivery" title="Pay on Delivery">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="35" height="35">
                  <!-- Delivery Truck Icon -->
                  <!-- Truck body -->
                  <rect x="10" y="22" width="30" height="20" fill="#3498db" />
                  <!-- Truck cabin -->
                  <rect x="0" y="28" width="12" height="14" fill="#2980b9" />
                  <!-- Truck window -->
                  <rect x="2" y="30" width="8" height="8" fill="#ffffff" />
                  <!-- Truck wheels -->
                  <circle cx="15" cy="48" r="5" fill="#2c3e50" />
                  <circle cx="35" cy="48" r="5" fill="#2c3e50" />
                  <!-- Money icon -->
                  <text x="25" y="36" fill="#ffffff" font-size="10" font-family="Arial, sans-serif">$</text>
                  
                  <!-- Text "Pay on Delivery" below the icon -->
                  <text x="50%" y="58" fill="#000000" font-size="6" text-anchor="middle" font-family="Arial, sans-serif">Pay on Delivery</text>
                </svg>
              </a>
            </li> 
					</ul>
				</div>
				<div class="col-lg-6">
					<ul style="display: flex;gap: 20px;margin-top: 50px;"  class="additional_links">
						<li><a style="text-decoration: none;" href="terms.html">Terms and conditions</a></li>
						<li><a style="text-decoration: none"; href="privacy.html">Privacy</a></li>
						<li><span>© 2024 ALL Right Resvered</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
    <!-- footer section -->
     <!-- got to top button -->
     <button id="goTopBtn" class="go-top-button">&uarr;</button>
  </section>
  <!-- end info section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <script src="js/main.js"></script>
  <script src="js/php.js"></script>
</body>

</html>
