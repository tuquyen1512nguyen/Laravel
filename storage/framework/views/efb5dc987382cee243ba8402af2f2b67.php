 
 <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="<?php echo e(asset('frontend/images/home/logo.png')); ?>" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                               
                                <?php
                                    use Illuminate\Support\Facades\Session;
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                  <li><a href="<?php echo e(URL::to('/checkout')); ?>"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                
                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                 <li><a href="<?php echo e(URL::to('/payment')); ?>"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                 <?php 
                                }else{
                                ?>
                                 <li><a href="<?php echo e(URL::to('/login-checkout')); ?>"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                 }
                                ?>
                                

                                <li><a href="<?php echo e(URL::to('/show-cart')); ?>"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   //$customer_name = Session::get('customer_name');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  <li><a href="<?php echo e(URL::to('/logout-checkout')); ?>"><i class="fa fa-lock"></i> Đăng xuất </a></li>
                                   <li><a href="<?php echo e(URL::to('/taikhoan')); ?>"><i class="fa fa-lock"></i>Thông tin của <?php echo e(Session::get('customer_name')); ?>   </a></li>
                                 
                                
                                <?php
                            }else{
                                 ?>
                                 <li><a href="<?php echo e(URL::to('/login-checkout')); ?>"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                 <?php 
                             }
                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?php echo e(URL::to('/trang-chu')); ?>" class="active">Home</a></li>
                                <li class="dropdown"><a href="<?php echo e(URL::to('/product')); ?>">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?php echo e(URL::to('/product')); ?>">Sản phẩm</a></li>
                                        <li><a href="product-details.html">Product Details</a></li> 
                                        <li><a href="checkout.html">Checkout</a></li> 
                                        <li><a href="cart.html">Cart</a></li> 
                                        <li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="<?php echo e(URL::to('/news')); ?>">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                               
                                <li><a href="<?php echo e(URL::to('/contact')); ?>">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
              
                    <div class="col-sm-4">
                        <form action="<?php echo e(URL::to('/tim-kiem')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header--><?php /**PATH C:\Users\doann\Music\test-web-laravel\test-web-laravel\resources\views/elements/top.blade.php ENDPATH**/ ?>