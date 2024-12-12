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
  <link rel="shortcut icon" href="Tachs.png" type="image/x-icon">
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
  
</head>

<body class=".animation-delay"> 
  <div class="loader_bg">
    <div class="loader"><img src="Tachs.png" alt="" /></div>
</div>
<!-- Hidden input field to store login status -->
<input type="hidden" id="loginStatus" value="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'true' : 'false'; ?>">

  <div style="position: fixed;margin-left: 8px;margin-top: 4px;">
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
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="#home">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#shop">
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
          </ul>
          <div class="user_option">
          <form style="margin-right: 8px;" action="search.php" method="get" class="d-flex" role="search">
           <input style="width: 250px;" class="form-control me-2" type="search" name="query" placeholder="Search products,brands" aria-label="Search">
           <button style="background-color: #fdcc0d;" class="btn btn-outline-secondary" type="submit">Search</button>
          </form>
            <nav>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a style="text-decoration: none;" href="logout.php">
                <i class='fa fa-user'></i>
                <span><?php echo htmlspecialchars($_SESSION['name']); ?> | LOGOUT</span>
            </a>
        <?php else: ?>
            <a style="text-decoration: none;" href="login.html">
                <i class='fa fa-user'></i>
                <span>LOGIN</span>
            </a>
        <?php endif; ?>
    </nav>
          <a style="text-decoration: none;" href="tracking.html">
          <i class="fa fa-map-marker-alt"></i>
          </a>
            </div>
            <!-- <div class="nav container">  -->
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
    <!-- slider section -->

    <section id="home" class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1 style="font-family: poopin;font-weight: 400;text-transform: uppercase;">
                        Welcome To TACHS <br>
                        Online Store
                      </h1>
                      <p>
                        Welcome to TACHS, your premier online shopping destination!

                        We're thrilled to have you join our community of customers who trust us for an exceptional online shopping experience. <br>At TACHS, we're passionate about providing: <br>

                        - A vast selection of high-quality products <br>
                        - Competitive prices and exclusive deals <br>
                        - Fast and reliable shipping options <br>
                        - Easy returns and refunds <br>
                        - Exceptional customer service</p>
                      <a style="text-decoration: none;width: 200px;" href="index.php">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width: 300px;height: 300px;" src="Tachs.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1><span style="font-family: poopin;font-weight: 400;text-transform: uppercase;">Fast Delivery<br>Free Shipping</span>
                    </h1>
                    <p>We are Reliable,Tested and Trusted. <br>We offer fast Delivery nationwide and we also offer free delivery to customers within our location.</p>
                      <a style="text-decoration: none;width: 200px;" href="shipping.html">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width: 400px;height: 400px;" src="images/photo-7362948-removebg-preview.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1 style="font-family: poopin;font-weight: 400;text-transform: uppercase;">Dream Pearl Straps Pointed <br> Heel Pumps
                    </h1>
                    <p>Bigtree Ladies Heels Metallic Carved Suede Bride Sandals Black</p>
                      <a style="text-decoration: none;width: 180px;" class="btn btn-primary" href="shop.php">
                        Shop Now
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width: 400px;height: 400px;" src="images/ladies shoes.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1 style="font-family: poopin;font-weight: 400;text-transform: uppercase;">Tommy Hilfiger polo
                    </h1>
                    <p>Limited items available in stock</p>
                      <a style="text-decoration: none;width: 180px;" class="btn btn-primary" href="shop.php">
                        Shop Now
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width: 400px;height: 400px"; src="Saved Pictures/Polo shirts/tommy hilfiger 5.jpg" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1 style="font-family: poopin;font-weight: 400;">ATTACK AIR<br>MONARCH IV SE</h1>
                      <p>Lightweight cushioning and durable support with a Phylon midsole
                      </p>
                      <a style="text-decoration: none;width: 180px;" href="shop.php">
                        Shop Now
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width: 400px;height: 400px;" src="images/snik-removebg-preview.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel_btn-box">
            <a style="text-decoration: none;" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <img src="images/line.png" alt="" />
            <a style="text-decoration: none;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
     <section id="shop" class="shop container">
      <h2 class="section-title" id="wecan">Shop products</h2>
        <!-- content -->
         <div class="shop-content">
            <!-- box 1 -->
            <div class="product-box">
              <div class="new">
                <span>
                  New
                </span>
              </div>
                <a href="shop.php"><img src="Saved Pictures/Polo shirts/ralph lauren black polo.jpg" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Polo & T-Shirts</h2>
                <span class="price">₦23,000</span>
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
              <div class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <a href="shop.php"><img src="Saved Pictures/hoodie/pink hoodie.jpg" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Jackets & Hoodies</h2>
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
             <!-- box 3 -->
             <div class="product-box">
              <div class="new">
                <span>
                  New
                </span>
              </div>
                <a href="shop.php"><img src="Saved Pictures/shoes/blackshoe.jpg" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Sneakers & Shoes</h2>
                <span class="price">&#8358;30,000</span>
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
              <div class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <a href="shop.php"><img src="Saved Pictures/beanie/beanie3.jpg" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Beanies & Caps</h2>
                <span class="price">&#8358;7,000</span>
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
              <div class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <a href="shop.php"><img src="Saved Pictures/Suit/blue suit.jpg" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Suits & Tuxedos</h2>
                <span class="price">&#8358;150,000</span>
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
              <div class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <a href="shop.php"><img src="Saved Pictures/combo/IMG_6662.JPG" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Ladies Combo</h2>
                <span class="price">&#8358;115,000</span>
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
              <div class="product-box">
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
                <a href="shop.php"><img src="Saved Pictures/trousers/blacktrousers.jpg" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">Trousers & Shorts</h2>
                <span class="price">&#8358;18,000</span>
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
             <div class="product-box">
              <div class="new">
                <span>
                  New
                </span>
              </div>
                <a href="shop.php"><img src="Saved Pictures/FEMALE SKIRT/IMG_6156.JPG" alt="" class="product-img"></a>
                <i class="fa fa-heart heart-icon" onclick="toggleFavorite(this)"></i>
                <h2 class="product-title">skirts</h2>
                <span class="price">&#8358;50,000</span>
                <div class="rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="rating-value"><span class="ratingValue">0</span></span>
              </div>
                <i class='bx bx-shopping-bag add-cart'></i>
             </div>
         </div>
              <div style="margin-bottom: 5px;" class="btn-box">
               <a href="shop.php">
               View All Products
                </a>
              </div>
        </div>
    </div>
  </section>
  
  
  <!-- end shop section -->
  <!-- saving section -->

  <section class="saving_section ">
    <div class="box">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="img-box">
              <img src="images/saving-img.png" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2 style="text-transform: uppercase;font-weight: 500;font-family: poopins;">
                  Best Savings on <br>
                  new arrivals
                </h2>
              </div>
              <p style="font-size: 12px;font-family: italic;color: black;">
              Here are some tips for getting the best savings on new arrival goods and products: <br>
                1. Sign up for newsletters: Get notified about new arrivals, promotions, and discounts from your favorite retailers. <br>
                2. Follow social media: Stay updated on new releases and limited-time offers. <br>
                3. Use coupons and promo codes: Look for codes online or sign up for rewards programs. <br>
                4. Buy during sales tax holidays: Take advantage of tax-free shopping on certain products. <br>
                5. Consider pre-orders: Get discounts or exclusive offers by pre-ordering new arrivals. <br>
                6. Look for bundle deals: Buy multiple items together at a discounted price. <br>
                7. Shop during off-peak seasons: Avoid buying during peak seasons to get better prices. <br>
                8. Use cashback apps: Earn rewards or cashback on your purchases. <br>
                9. Negotiate prices: Ask retailers if they can offer a discount or price match. <br>
                10.Use price comparison tools: Compare prices across different retailers to find the best deals. <br>
               Remember to always read reviews, check product details, and understand return policies before making a purchase.
              </p>
              <div class="btn-box">
                <a style="text-decoration: none"; href="arrivals.php" class="btn1">
                  Buy Now
                </a>
                <a style="text-decoration: none"; href="arrivals.php" class="btn2">
                  See More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end saving section -->
   <!-- sponsorship -->
  <div style="background-color: #fdcc0d;" id="sponsor">
  <div><img src="images/logo_1.png" alt="" class="sponsors"></div>
  <div><img src="images/logo_2.png" alt="" class="sponsors"></div>
  <div><img src="images/logo_3.png" alt="" class="sponsors"></div>
  <div><img src="images/logo_4.png" alt="" class="sponsors"></div>
  <div><img src="images/logo_5.png" alt="" class="sponsors"></div>
  <div><img src="images/logo_6.png" alt="" class="sponsors"></div>
</div>
<!-- end sponsorship -->
  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Shop With Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <a href="tracking.html"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392
                 V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017
                 c4.427,0,8.017-3.589,8.017-8.017V110.63c0-0.295,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.239,0.534,0.534v145.372
                 c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.008,0,0.014,0.002,0.021,0.002
                 c0.008,0,0.015-0.001,0.022-0.001c11.637,0.008,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102
                 c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.883-25.787-34.205-47.982-34.205
                 s-41.097,14.322-47.982,34.205h-3.86v-60.393c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817
                 c-6.886-19.883-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637
                 h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017c-4.427,0-8.017,3.589-8.017,8.017
                 s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304c-0.002,0.178-0.014,0.355-0.014,0.534
                 c0,27.996,22.777,50.772,50.772,50.772s50.772-22.776,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h180.67
                 c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.996,22.777,50.772,50.772,50.772c27.995,0,50.772-22.776,50.772-50.772
                 c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511C512,251.989,496.423,234.448,476.158,231.363z
                  M375.182,144.301h60.392c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V144.301z M375.182,230.881v-52.376h71.235
                 l13.094,52.376H375.182z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739s15.584-34.739,34.739-34.739
                 c19.155,0,34.739,15.583,34.739,34.739S163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739
                 s15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739S446.178,401.904,427.023,401.904z M495.967,299.29h-9.086
                 c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V299.29z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M144.835,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                 c9.136,0,16.568-7.432,16.568-16.568C161.403,358.029,153.971,350.597,144.835,350.597z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M427.023,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                 c9.136,0,16.568-7.432,16.568-16.568C443.591,358.029,436.159,350.597,427.023,350.597z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M332.96,316.393H213.244c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H332.96
                 c4.427,0,8.017-3.589,8.017-8.017S337.388,316.393,332.96,316.393z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M127.733,282.188H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614
                 c4.427,0,8.017-3.589,8.017-8.017S132.16,282.188,127.733,282.188z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M278.771,173.37c-3.13-3.13-8.207-3.13-11.337,0.001l-71.292,71.291l-37.087-37.087c-3.131-3.131-8.207-3.131-11.337,0
                 c-3.131,3.131-3.131,8.206,0,11.337l42.756,42.756c1.565,1.566,3.617,2.348,5.668,2.348s4.104-0.782,5.668-2.348l76.96-76.96
                 C281.901,181.576,281.901,176.501,278.771,173.37z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg></a>
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                In today's fast-paced world, convenience is key. With the rise of e-commerce, <br> consumers expect quick and efficient delivery options. <br> Fast delivery is no longer a luxury, but a necessity which we Deliver.

              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <a href="shipping.html"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 490.667 490.667;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M138.667,192H96c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
                 v-74.667h32c5.888,0,10.667-4.779,10.667-10.667S144.555,192,138.667,192z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M117.333,234.667H96c-5.888,0-10.667,4.779-10.667,10.667S90.112,256,96,256h21.333c5.888,0,10.667-4.779,10.667-10.667
                 S123.221,234.667,117.333,234.667z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                 S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                 S368.853,469.333,245.333,469.333z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M386.752,131.989C352.085,88.789,300.544,64,245.333,64s-106.752,24.789-141.419,67.989
                 c-3.691,4.587-2.965,11.307,1.643,14.997c4.587,3.691,11.307,2.965,14.976-1.643c30.613-38.144,76.096-60.011,124.8-60.011
                 s94.187,21.867,124.779,60.011c2.112,2.624,5.205,3.989,8.32,3.989c2.368,0,4.715-0.768,6.677-2.347
                 C389.717,143.296,390.443,136.576,386.752,131.989z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M376.405,354.923c-4.224-4.032-11.008-3.861-15.061,0.405c-30.613,32.235-71.808,50.005-116.011,50.005
                 s-85.397-17.771-115.989-50.005c-4.032-4.309-10.816-4.437-15.061-0.405c-4.309,4.053-4.459,10.816-0.405,15.083
                 c34.667,36.544,81.344,56.661,131.456,56.661s96.789-20.117,131.477-56.661C380.864,365.739,380.693,358.976,376.405,354.923z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M206.805,255.723c15.701-2.027,27.861-15.488,27.861-31.723c0-17.643-14.357-32-32-32h-21.333
                 c-5.888,0-10.667,4.779-10.667,10.667v42.581c0,0.043,0,0.107,0,0.149V288c0,5.888,4.779,10.667,10.667,10.667
                 S192,293.888,192,288v-16.917l24.448,24.469c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.136
                 c4.16-4.16,4.16-10.923,0-15.083L206.805,255.723z M192,234.667v-21.333h10.667c5.867,0,10.667,4.779,10.667,10.667
                 s-4.8,10.667-10.667,10.667H192z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M309.333,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S315.221,192,309.333,192h-42.667
                 c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                 S315.221,277.333,309.333,277.333z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M288,234.667h-21.333c-5.888,0-10.667,4.779-10.667,10.667S260.779,256,266.667,256H288
                 c5.888,0,10.667-4.779,10.667-10.667S293.888,234.667,288,234.667z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M394.667,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S400.555,192,394.667,192H352
                 c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                 S400.555,277.333,394.667,277.333z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M373.333,234.667H352c-5.888,0-10.667,4.779-10.667,10.667S346.112,256,352,256h21.333
                 c5.888,0,10.667-4.779,10.667-10.667S379.221,234.667,373.333,234.667z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg></a>
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
                Free shipping has become a coveted perk in the world of online shopping. <br> It's a simple yet effective way to boost sales, increase customer satisfaction, <br> and stay competitive in a crowded market.We are here to make our customers happy
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <a href="shop.php"><svg id="_30_Premium" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" data-name="30_Premium">
                <g id="filled">
                  <path d="m252.92 300h3.08a124.245 124.245 0 1 0 -4.49-.09c.075.009.15.023.226.03.394.039.789.06 1.184.06zm-96.92-124a100 100 0 1 1 100 100 100.113 100.113 0 0 1 -100-100z" />
                  <path d="m447.445 387.635-80.4-80.4a171.682 171.682 0 0 0 60.955-131.235c0-94.841-77.159-172-172-172s-172 77.159-172 172c0 73.747 46.657 136.794 112 161.2v158.8c-.3 9.289 11.094 15.384 18.656 9.984l41.344-27.562 41.344 27.562c7.574 5.4 18.949-.7 18.656-9.984v-70.109l46.6 46.594c6.395 6.789 18.712 3.025 20.253-6.132l9.74-48.724 48.725-9.742c9.163-1.531 12.904-13.893 6.127-20.252zm-339.445-211.635c0-81.607 66.393-148 148-148s148 66.393 148 148-66.393 148-148 148-148-66.393-148-148zm154.656 278.016a12 12 0 0 0 -13.312 0l-29.344 19.562v-129.378a172.338 172.338 0 0 0 72 0v129.38zm117.381-58.353a12 12 0 0 0 -9.415 9.415l-6.913 34.58-47.709-47.709v-54.749a171.469 171.469 0 0 0 31.467-15.6l67.151 67.152z" />
                  <path d="m287.62 236.985c8.349 4.694 19.251-3.212 17.367-12.618l-5.841-35.145 25.384-25c7.049-6.5 2.89-19.3-6.634-20.415l-35.23-5.306-15.933-31.867c-4.009-8.713-17.457-8.711-21.466 0l-15.933 31.866-35.23 5.306c-9.526 1.119-13.681 13.911-6.634 20.415l25.384 25-5.841 35.145c-1.879 9.406 9 17.31 17.367 12.618l31.62-16.414zm-53-32.359 2.928-17.615a12 12 0 0 0 -3.417-10.516l-12.721-12.531 17.658-2.66a12 12 0 0 0 8.947-6.5l7.985-15.971 7.985 15.972a12 12 0 0 0 8.947 6.5l17.658 2.66-12.723 12.535a12 12 0 0 0 -3.417 10.516l2.928 17.615-15.849-8.231a12 12 0 0 0 -11.058 0z" />
                </g>
              </svg></a>
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                In today's fast-paced and competitive market,quality is a crucial differentiator that sets exceptional products and services apart from the rest.Best quality is not just a goal,<br>but a continuous journey of improvement and excellence.<br>We are here to serve you better.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why section -->

  <!-- gift section -->

  <section class="gift_section layout_padding-bottom">
    <div class="box ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="img_container">
              <div class="img-box">
                <img src="images/gifts.png" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="detail-box">
              <div class="heading_container">
                <h2 style="text-transform: uppercase;font-weight: 500;font-family: poopins;">
                  Gifts for your <br>
                  loved ones
                </h2>
              </div>
              <p style="font-size: 15px;">
                Are you struggling to find the perfect gift for your loved ones? Look no further! Our shop is filled with a wide range of thoughtful and unique gift ideas that will show your loved ones just how much you care. <br>
                Our friendly and knowledgeable staff are happy to help you find the perfect gift for your loved ones. Visit us today and discover a world of gift ideas that will make your loved ones feel special.
              </p>
              <div class="btn-box">
                <a style="text-decoration: none"; href="gifts.php" class="btn1">
                  Buy Now
                </a>
                <a style="text-decoration: none"; href="gifts.php" class="btn2">
                  See More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end gift section -->


  <!-- contact section -->

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Odi-Olowo+ICT+Workstation,+Ilupeju,+10/12+Ajenifuja+St,+Shyllon+St,+off+Adeshiyan+Street,+PalmGroove,+Lagos+102215,+Lagos,+Nigeria"  width="100%" height="600" frameborder="0" 
               style="border:0; width: 100%; height: 100%; max-width: 600px; max-height: 400px;" 
              allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="submit_form.php" method="post">
            <div>
                <input type="text" name="name" placeholder="Name"  required/>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email"  required/>
            </div>
            <div>
                <input type="text" name="phone" placeholder="Phone" required />
            </div>
            <div>
                <input type="text" class="message-box" name="message" placeholder="Message" required />
            </div>
            <div class="d-flex">
                <button type="submit">
                    SEND
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Reviews
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Owolabi Hanifa
                  </h5>
                  <h6>
                    owolabihanifa223@yupmail.com
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                I had an amazing shopping experience at "TACHS"! The staff were incredibly friendly and helpful, and the selection of products was vast and varied. I was able to find exactly what I was looking for, and the prices were very reasonable. The store was well-organized and easy to navigate, making it a pleasure to shop there. I was also impressed with the fast and efficient checkout process. Overall, I would highly recommend "TACHS" to anyone looking for a great shopping experience. 5 stars!"
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Odunaike Oluwatobiloba
                  </h5>
                  <h6>
                    oluwatobiloba123@yahoo.com
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "I recently shopped at "TACHS" and was blown away by the exceptional customer service! The team went above and beyond to help me find the perfect gift, and even offered personalized recommendations. The store's atmosphere was welcoming and modern, making it a joy to browse. The quality of the products was top-notch, and the prices were unbeatable. I've never had a better shopping experience anywhere else. Thank you, "TACHS", for exceeding my expectations!"
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Smith Abdulakeem
                  </h5>
                  <h6>
                    smithabdulakeem001@gmail.com
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "I was impressed by the vast selection of products at "TACHS". The staff were knowledgeable and helped me find exactly what I needed. The prices were competitive, and the checkout process was seamless. I'll definitely be back!"
              </p>
            </div>
          </div>
        </div>
        
        <div class="carousel_btn-box">
          <a style="text-decoration: none"; class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a style="text-decoration: none"; class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

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
                    Download on
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
                   Playstore
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
        <button style="color:#000; margin-top:5px; background-color:#fdcc0d;margin-left:70px;width: 100px;height: 40px;border-radius:5px;" type="submit">Subscribe</button>
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
              <a style="text-decoration: none"; href="+2348087442557">
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
                <i class="fa fa-globe" aria-hidden="true"></i>
                <span>www.tachs.com</span>
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
  <button id="goTopBtn" class="go-top-button">&uarr;</button>
    <!-- footer section -->
     <!-- got to top button -->
  </section>
  <!-- end info section -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/main.js"></script>
  <script src="js/php.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>