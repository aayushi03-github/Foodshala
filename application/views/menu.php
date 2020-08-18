<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>FoodShala</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url()?>/assets/img/core-img/favicon-img.png">

    <!-- Core Stylesheet -->
    <link href="<?php echo base_url()?>/assets/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?php echo base_url()?>/assets/css/responsive/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/assets/album.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>
    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="<?php echo base_url('signup');?>">Sign Up</a>
                            </div>
                            <div class="register">
                                <a href="<?php echo base_url('login');?>">LogIn</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
               
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="<?php echo base_url();?>" class="yummy-logo">Food Shala</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>">Menu <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                    <div class="dropdown-menu" aria-labelledby="yummyDropdown">
                                        <a class="dropdown-item" href="">Veg</a>
                                        <a class="dropdown-item" href="">Non Veg</a>
                                    </div>
                                </li>
                                  <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">My Orders</a>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ****** Header Area End ****** -->
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url(assets/img/bg-img/slide-4.jpg);">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area section_padding_80">
        <div class="container">
        <div class="row">
        
            <!-- Single Post -->
             <?php 
             $message ="No Items Available Now";
                if($itemData !=0){
                    foreach ($itemData as $key) {
                        ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                           <img src="<?php echo base_url().'assets/uploads/'.$key['image']?>" width="200px" height="200px" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                                <h4 class="post-headline"><?php echo $key['item_name']?></h4>
                                <p><?php echo $key['restaurant_name'];?></p>
                            <p>Rs.<?php echo $key['price']?>  </p>
                            <a href="<?php echo base_url('order/'.$key['item_id']);?>" class="card-link">Order Now </a>
                           <!--  <a href="<?php echo base_url('cart')?>" class="card-link">Add to Cart</a> -->
                        </div>
                    </div>
                </div>

                <?php  } 
                }?>
                </div>
                <!-- Single Post -->
        </section>
        <!-- ****** Archive Area End ****** -->

        <!-- ****** Footer Menu Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Copywrite Text -->
                        <div class="copy_right_text text-center">
                            <p>Copyright @2020 All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by FoodShala</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Menu Area End ****** -->

        <!-- Jquery-2.2.4 js -->
        <script src="<?php echo base_url()?>/assets/js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="<?php echo base_url()?>/assets/js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap-4 js -->
        <script src="<?php echo base_url()?>/assets/js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins JS -->
        <script src="<?php echo base_url()?>/assets/js/others/plugins.js"></script>
        <!-- Active JS -->
        <script src="<?php echo base_url()?>/assets/js/active.js"></script>
    </body>
    </html>