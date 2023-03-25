<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>    
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title> Online Book Store Project </title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    </head>
    <body>

    <!--header section starts-->
        <header class="header">
            <div class="header-1">
                <a href="#" class="logo"><i class="fas fa-book"></i> BOOK STORE </a>
                <form action=" " class="search-form">
                    <input type="search" name=" " placeholder="search here..." id="search-box" onkeyup="search()">
                    <label for="search-box" class="fas fa-search"></label>
                </form>
                <div class="icons">
                    <div id="search-btn" class="fas fa-search"></div>
                    <a href="#" class="fas fa-heart"></a>
                    <?php
                    $select_cart_number=mysqli_query($conn,"SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
                    $cart_rows_number=mysqli_num_rows($select_cart_number);
                    ?>
                    <a href="cart.php"> <i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_rows_number; ?>)</span></a>
                    <div id="login-btn" class="fas fa-user"></div>
                </div>
            </div>
                <div class="header-2">
                    <nav class="navbar">
                        <a href="OBS.php"> Home </a>
                        <a href="about.php"> About </a>
                        <a href="shop.php"> Shop </a>
                        <a href="contact.php"> Contacts </a>
                        <a href="orders.php"> Orders </a>
                    </nav>
                </div>
        </header>
    <!--header section ends-->

    <!--bottom navbar starts-->
        <nav class="bottom-navbar">
            <a href="#home" class="fas fa-home"></a>
            <a href="#featured" class="fas fa-list"></a>
            <a href="#arrivals" class="fas fa-tags"></a>
            <a href="#reviews" class="fas fa-comments"></a>
            <a href="#blogs" class="fas fa-blog"></a>
        </nav>
    <!--bottom navbar ends-->

    <!--login form section starts-->
        <div class="login-form-container">
            <div id="close-login-btn" class="fas fa-times"></div>
                <form action=" " method="post">
                <h3> sign in </h3>
                <span> username </span>
                <input type="email"  name="" class="box" placeholder="Enter your email" id="">
                <span> password </span>
                <input type="password" name="" class="box" placeholder="Enter your password" id="">
                <span> activity status </span>
                <select name="user_type" class="box">
                    <option value="user"> user </option>
                    <option value="admin"> admin </option>
                </select>
                <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me"> remember me </label>
            </div>
            <input type="submit" value="sign in" class="btn">
            <p> forget password ? <a href="#"> Click here </a></p>
            <p> don't have an account ? <a href="#"> create one </a></p>
        </form>
        </div>
    <!--login form section ends-->

    <!--home section starts-->
        <section class="home" id="home">
            <div class="row">
                <div class="content">
                    <h3> upto 50% off </h3>
                    <p> Discover the latest deals save upto 50% on selected ebooks or whole categories.Browes our offers and save up today!</p>
                    <a href="shop.php" class="btn"> shop now </a>
                </div>

                <div class="swiper books-slider">
                    <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"> <img src="http://localhost/OBS/book-24.jpg" alt=""> </a>
                    <a href="#" class="swiper-slide"> <img src="http://localhost/OBS/book-21.jpg" alt=""> </a>
                    <a href="#" class="swiper-slide"> <img src="http://localhost/OBS/book-32.jpg" alt=""> </a>
                    <a href="#" class="swiper-slide"> <img src="http://localhost/OBS/book-22.jpg" alt=""> </a>
                    <a href="#" class="swiper-slide"> <img src="http://localhost/OBS/book-26.jpg" alt=""> </a>
                    </div>
                    <img src="http://localhost/OBS/stand.png" class="stand" alt="">
                </div>
            </div>
        </section>
    <!--home section ends-->

    <!--icons section starts-->
        <section class="icons-container">
            <div class="icons">
                <i class="fas fa-plane"></i>
                    <div class="content">
                    <h3> free shipping </h3>
                    <p> order over $100 </p>
                </div>
            </div>

            <div class="icons">
                <i class="fas fa-lock"></i>
                    <div class="content">
                    <h3> secure payment </h3>
                    <p> 100 secure payment </p>
                </div>
            </div>

            <div class="icons">
                <i class="fas fa-redo-alt"></i>
                <div class="content">
                    <h3> easy returns </h3>
                    <p> 7 days returns </p>
                </div>
            </div>

            <div class="icons">
                <i class="fas fa-headset"></i>
                <div class="content">
                    <h3> 24/7 support </h3>
                    <p> call us anytime </p>
                </div>
            </div>
        </section>
    <!--icons section ends-->
               
    <!--fstory section starts-->
        <section class="featured" id="featured">
            <h1 class="heading"> <span> Story books </span> </h1>
            <div class="swiper featured-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/ES.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> EXPLORER STORIES </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.132.5 INR* <span> Rs.265 INR* </span> </div>
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-23.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> UNICORN HORN </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.232 INR* <span> Rs.465 INR* </span> </div>
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-28.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> PURPLE TEDDY BEAR </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.65 INR* <span> Rs.130 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-29.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> GLIDDING HOODS </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.165 INR* <span> Rs.330 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/spider.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> SPIDER MAN </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.70 INR* <span> Rs.140 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/H&T.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> HARE AND TORTOISE </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.50 INR* <span> Rs.100 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/Bible.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> BIBLE STORIES </h3>
                            <h4> story books </h4>
                            <div class="price"> Rs.150 INR* <span> Rs.300 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>
                </div>    

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>
        </section>
    <!--story section ends-->

    <!--featured section starts-->
    <section class="featured" id="featured">
            <h1 class="heading"> <span> University books </span> </h1>
            <div class="swiper featured-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> OPERATING SYSTEMS </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.132.5 INR* <span> Rs.265 INR* </span> </div>
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                            
                        </div>
                
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-2.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> OBJECT ORIENTED </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.232 INR* <span> Rs.465 INR* </span> </div>
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-3.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> BLOCKCHAIN TECHNOLOGY </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.65 INR* <span> Rs.130 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-4.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> COMPUTER NETWORKS-I </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.165 INR* <span> Rs.330 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-5.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> EMBEDDED SYSTEM DESIGN </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.70 INR* <span> Rs.140 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-6.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> DESCRIPTIVE STATISTICS</h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.50 INR* <span> Rs.100 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-7.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> PYTHON PROGRAMMING </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.150 INR* <span> Rs.300 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-8.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> WEB TECHNOLOGIES-I </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.150 INR* <span> Rs.300 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-9.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> C - PROGRAMMING </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.123.5 INR* <span> Rs.247 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="http://localhost/OBS/book-10.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3> DATA SCIENCE </h3>
                            <h4> featured books </h4>
                            <div class="price"> Rs.100 INR* <span> Rs.200 INR* </span> </div>
                            <a href="#" class="btn"> add to cart </a>
                        </div>
                    </div>
                </div>
                
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>
        </section>
    <!--featured section ends-->


    <!--newsletter section starts-->
      
    <!--newsletter section ends-->
            
    <!--arrivals section starts-->
        <section class="arrivals" id="arrivals">
            <h1 class="heading"> <span> new arrivals </span> </h1>
                <div class="swiper arrivals-slider">
                    <div class="swiper-wrapper">
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-11.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> OPERATIONS RESEARCH </h3>
                                <div class="price"><span> Rs.290 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-12.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> DATABASE MANAGEMENT SYSTEMS </h3>
                                <div class="price"><span> Rs.200 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-13.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> PRINCIPLES OF DIGITAL ELECTRONICS </h3>
                                <div class="price"><span> Rs.190 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-14.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> DATA STRUCTURES & ALGORITHMS-II </h3>
                                <div class="price"><span> Rs.160 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-15.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> THEORETICAL COMPUTER SCIENCE </h3>
                                <div class="price"><span> Rs.140 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="swiper arrivals-slider">
                    <div class="swiper-wrapper">
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-16.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> SOFTWARE ENGINEERING </h3>
                                <div class="price"><span> Rs.100 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-17.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> RELATIONAL DATABASE MANAGEMENT SYSTEMS </h3>
                                <div class="price"><span> Rs.100 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-18.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> DIGITAL COMMUNICATION & NETWORKING </h3>
                                <div class="price"><span> Rs.300 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-19.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> COMPUTATIONAL GEOMETRY </h3>
                                <div class="price"><span> Rs.245 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/book-20.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> WIRELESS COMMUNICATION & INTERNET OF THINGS </h3>
                                <div class="price"><span> Rs.200 INR* </span> </div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        </section>
    <!--arrivals section ends-->

    <!--deal section starts-->
        <section class="deal">
            <div class="content">
                <h3> deal of the day </h3>
                <h1> upto 10% off </h1>
                <p> {Set of 3 books} B.Sc.Computer Science - Mathematics - FY Semester 1 [MATRIX ALGEBRA,DISCRIPTIVE MATHEMATICS,ALGEBRA & CALCULAS USING MAXIMA SOFTWARE] </p>
                <div class="price"> Rs.360 INR* <span> Rs.400 INR* </span> </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="shop.php" class="btn"> shop now </a>
            </div>
            <div class="image">
                <img src="http://localhost/OBS/deal.jpg" alt="">
            </div>
        </section>
    <!--deal section ends-->

    <!--reviews section starts-->
        <section class="reviews" id="reviews">
            <h1 class="heading"> <span> client's reviews </span> </h1>
                <div class="swiper reviews-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide box">
                            <img src="http://localhost/OBS/pic-1.png" alt="">
                            <h3> SAEE </h3>
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.  </p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    
                        <div class="swiper-slide box">
                            <img src="http://localhost/OBS/pic-2.png" alt="">
                            <h3> SWAYAM </h3>
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic. </p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                        </div>
    
                        <div class="swiper-slide box">
                            <img src="http://localhost/OBS/pic-3.png" alt="">
                            <h3> SANIKA </h3>
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic. </p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                        </div>
                            
                        <div class="swiper-slide box">
                            <img src="http://localhost/OBS/pic-4.png" alt="">
                            <h3> SWAPNIL </h3>
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic. </p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                        </div>
    
                        <div class="swiper-slide box">
                            <img src="http://localhost/OBS/pic-5.png" alt="">
                            <h3> DIPTI </h3>
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic. </p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                        </div>
    
                        <div class="swiper-slide box">
                            <img src="http://localhost/OBS/pic-6.png" alt="">
                            <h3> MAYUR </h3>
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic. </p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                        </div>
                    </div>
                </div>  
        </section>
    <!--reviews section ends-->

    <!--blogs section starts-->
        <section class="blogs" id="blogs">
            <h1 class="heading"> <span> our blogs </span> </h1>
                <div class="swiper blogs-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/blog-1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> blog title goes here </h3>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio. </p>
                                <a href="#" class="btn"> read more </a>
                            </div>
                        </div>

                        <div class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/blog-2.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> blog title goes here </h3>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio. </p>
                                <a href="#" class="btn"> read more </a>
                            </div>
                        </div>
    
                        <div class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/blog-3.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> blog title goes here </h3>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio. </p>
                                <a href="#" class="btn"> read more </a>
                            </div>
                        </div>
                        
                        <div class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/blog-4.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> blog title goes here </h3>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio. </p>
                                <a href="#" class="btn"> read more </a>
                            </div>
                        </div>
    
                        <div class="swiper-slide box">
                            <div class="image">
                                <img src="http://localhost/OBS/blog-5.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3> blog title goes here </h3>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio. </p>
                                <a href="#" class="btn"> read more </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    <!--blogs section ends-->
    
    <!--footer section starts-->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3> our locations </h3>
                    <a href="#"> <i class="fas fa-map-marker-alt"> </i> india </a>
                </div>
            
                <div class="box">
                    <h3> quick links </h3>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> home </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> featured </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> arrivals </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> reviews </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> blogs </a>
                </div>
    
                <div class="box">
                    <h3> extra links </h3>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> account info </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> ordered items </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> privacy policy </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> payment method </a>
                    <a href="#"> <i class="fas fa-arrow-right"> </i> our serivces </a>
                </div>
    
                <div class="box">
                    <h3> contact info </h3>
                    <a href="#"> <i class="fas fa-phone"> </i> +123-456-7890 </a>
                    <a href="#"> <i class="fas fa-phone"> </i> +111-222-3333 </a>
                    <a href="#"> <i class="fas fa-envelope"> </i> bookstore@gmail.com </a>
                    <img src="http://localhost/OBS/worldmap.png" class="map" alt="">
                </div>
            </div>
            
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <div class="credit"> created by <span> Miss.Pawase Siddhi & Miss.Mandlik Prajakta </span> </div>
        </section>
    <!--footer section ends-->

    <!--loader section starts-->
        
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!--loader section ends-->

    <!--custom js file link-->
        <script src="script.js"></script>
    </body>
</html>   