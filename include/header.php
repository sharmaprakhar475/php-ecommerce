<?php
    include './conn.php';
    include './constants.php';
    include './functions/currencies.php';
    $admin_query=mysqli_query($conn,"select * from admin_settings ");
    $admin_arr=mysqli_fetch_assoc($admin_query);
    $admin_id=$admin_arr['id'];
    $admin_name=$admin_arr['name'];
    $admin_email=$admin_arr['email'];
    $admin_mobile=$admin_arr['mobile'];
    $admin_address1=$admin_arr['address_1'];
    $admin_address2=$admin_arr['address_2'];
    $admin_city=$admin_arr['city'];
    $admin_pincode=$admin_arr['pincode'];
    $admin_logo_url=$admin_arr['logo_url'];
    $admin_logo_title=$admin_arr['logo_title'];
    $admin_site_title=$admin_arr['site_title'];
?>
  <!--Search Form Drawer-->
  <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="#">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->
        <!--Top Header-->
        <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                    <!-- <div class="currency-picker">
                    
                        <span class="selected-currency">INR</span>
                        <ul id="currencies">
                            <li data-currency="INR" class=""><?php echo "INR"; ?></li> -->
                            <!-- <li data-currency="GBP" class="">GBP</li>
                            <li data-currency="CAD" class="">CAD</li>
                            <li data-currency="USD" class="">USD</li>
                            <li data-currency="AUD" class="">AUD</li>
                            <li data-currency="EUR" class="">EUR</li>
                            <li data-currency="JPY" class="">JPY</li> -->
                        <!-- </ul>
                    </div> -->
                    <!-- <div class="language-dropdown"> -->
                        <!-- <span class="language-dd">English</span> -->
                        <!-- <ul id="language">
                            <li class="">German</li>
                            <li class="">French</li>
                        </ul> -->
                    <!-- </div> -->
                    <p class="phone-no"><i class="anm anm-phone-s"></i>+91 <?php echo $admin_mobile; ?></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	<!-- <div class="text-center"><p class="top-header_middle-text"> Worldwide Express Shipping</p></div> -->
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                      <?php if(!isset($_SESSION['user_id']) && !isset($_SESSION['name'])){ ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Create Account</a></li>
                      <?php }?>

                      <?php if(isset($_SESSION['name'])){ ?>
                        <li><a>Hi <?php echo $_SESSION['name']." !";?></a></li>
                      <?php } ?>
                      
                      <?php if(isset($_SESSION['user_id']) && isset($_SESSION['name'])){ ?>
                        <li><a href=""onclick="logout()">Logout</a></li>
                      <?php }?>

                      <?php if(isset($_SESSION['user_id']) && isset($_SESSION['name'])){?>
                        <li><a href="./my-orders.php">My orders</a></li>
                      <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <!--End Top Header-->
    
        <!--Header-->
        <div class="header-wrap animated d-flex">
            <div class="container-fluid">        
                <div class="row align-items-center">
                    <!--Desktop Logo-->
                    <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                        <a href="index.php">
                            <img src="<?php echo  $base_url.$admin_logo_url; ?>" alt="<?php echo  $admin_logo_title; ?>" title="<?php echo  $admin_logo_title; ?>" />
                        </a>
                    </div>
                    <!--End Desktop Logo-->
                    <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                        <div class="d-block d-lg-none">
                            <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                                <i class="icon anm anm-times-l"></i>
                                <i class="anm anm-bars-r"></i>
                            </button>
                        </div>
                        <!--Desktop Menu-->
                        <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                            <ul id="siteNav" class="site-nav medium center hidearrow">
                                <li class="lvl1 parent megamenu"><a href="./index.php">Home <i class="anm anm-angle-down-l"></i></a>
                                    <!-- <div class="megamenu style1">
                                        <ul class="grid mmWrapper">
                                            <li class="grid__item large-up--one-whole">
                                                <ul class="grid">
                                                    <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Home Group 1</a>
                                                        <ul class="subLinks">
                                                          <li class="lvl-2"><a href="index.html" class="site-nav lvl-2">Home 1 - Classic</a></li>
                                                          <li class="lvl-2"><a href="home2-default.html" class="site-nav lvl-2">Home 2 - Default</a></li>
                                                          <li class="lvl-2"><a href="home15-funiture.html" class="site-nav lvl-2">Home 15 - Furniture <span class="lbl nm_label1">New</span></a></li>
                                                          <li class="lvl-2"><a href="home3-boxed.html" class="site-nav lvl-2">Home 3 - Boxed</a></li>
                                                          <li class="lvl-2"><a href="home4-fullwidth.html" class="site-nav lvl-2">Home 4 - Fullwidth</a></li>
                                                          <li class="lvl-2"><a href="home5-cosmetic.html" class="site-nav lvl-2">Home 5 - Cosmetic</a></li>
                                                          <li class="lvl-2"><a href="home6-modern.html" class="site-nav lvl-2">Home 6 - Modern</a></li>
                                                          <li class="lvl-2"><a href="home7-shoes.html" class="site-nav lvl-2">Home 7 - Shoes</a></li>
                                                        </ul>
                                                      </li>
                                                    <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Home Group 2</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="home8-jewellery.html" class="site-nav lvl-2">Home 8 - Jewellery</a></li>
                                                            <li class="lvl-2"><a href="home9-parallax.html" class="site-nav lvl-2">Home 9 - Parallax</a></li>
                                                            <li class="lvl-2"><a href="home10-minimal.html" class="site-nav lvl-2">Home 10 - Minimal</a></li>
                                                            <li class="lvl-2"><a href="home11-grid.html" class="site-nav lvl-2">Home 11 - Grid</a></li>
                                                            <li class="lvl-2"><a href="home12-category.html" class="site-nav lvl-2">Home 12 - Category</a></li>
                                                            <li class="lvl-2"><a href="home13-auto-parts.html" class="site-nav lvl-2">Home 13 - Auto Parts</a></li>
                                                            <li class="lvl-2"><a href="home14-bags.html" class="site-nav lvl-2">Home 14 - Bags <span class="lbl nm_label1">New</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">New Sections</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="home11-grid.html" class="site-nav lvl-2">Image Gallery</a></li>
                                                            <li class="lvl-2"><a href="home5-cosmetic.html" class="site-nav lvl-2">Featured Product</a></li>
                                                            <li class="lvl-2"><a href="home7-shoes.html" class="site-nav lvl-2">Columns with Items</a></li>
                                                            <li class="lvl-2"><a href="home6-modern.html" class="site-nav lvl-2">Text columns with images</a></li>
                                                            <li class="lvl-2"><a href="home2-default.html" class="site-nav lvl-2">Products Carousel</a></li>
                                                            <li class="lvl-2"><a href="home9-parallax.html" class="site-nav lvl-2">Parallax Banner</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">New Features</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="home13-auto-parts.html" class="site-nav lvl-2">Top Information Bar <span class="lbl nm_label1">New</span></a></li>
                                                            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Age Varification <span class="lbl nm_label1">New</span></a></li>
                                                            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Footer Blocks</a></li>
                                                            <li class="lvl-2"><a href="#" class="site-nav lvl-2">2 New Megamenu style</a></li>
                                                            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Show Total Savings <span class="lbl nm_label3">Hot</span></a></li>
                                                            <li class="lvl-2"><a href="#" class="site-nav lvl-2">New Custom Icons</a></li>
                                                            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Auto Currency</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div> -->
                                </li>
                                <li class="lvl1 parent megamenu"><a href="./categories.php">Category <i class="anm anm-angle-down-l"></i></a>
                                    <!-- <div class="megamenu style4">
                                        <ul class="grid grid--uniform mmWrapper">
                                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Shop Pages</a>
                                                <ul class="subLinks">
                                                    <li class="lvl-2"><a href="shop-left-sidebar.html" class="site-nav lvl-2">Left Sidebar</a></li>
                                                    <li class="lvl-2"><a href="shop-right-sidebar.html" class="site-nav lvl-2">Right Sidebar</a></li>
                                                    <li class="lvl-2"><a href="shop-fullwidth.html" class="site-nav lvl-2">Fullwidth</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-3.html" class="site-nav lvl-2">3 items per row</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-4.html" class="site-nav lvl-2">4 items per row</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-5.html" class="site-nav lvl-2">5 items per row</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-6.html" class="site-nav lvl-2">6 items per row</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-7.html" class="site-nav lvl-2">7 items per row</a></li>
                                                    <li class="lvl-2"><a href="shop-listview.html" class="site-nav lvl-2">Product Listview</a></li>
                                                </ul>
                                            </li>
                                            <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Shop Features</a>
                                                <ul class="subLinks">
                                                    <li class="lvl-2"><a href="shop-left-sidebar.html" class="site-nav lvl-2">Product Countdown <span class="lbl nm_label3">Hot</span></a></li>
                                                    <li class="lvl-2"><a href="shop-right-sidebar.html" class="site-nav lvl-2">Infinite Scrolling</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-3.html" class="site-nav lvl-2">Pagination - Classic</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-6.html" class="site-nav lvl-2">Pagination - Load More</a></li>
                                                    <li class="lvl-2"><a href="product-labels.html" class="site-nav lvl-2">Dynamic Product Labels</a></li>
                                                    <li class="lvl-2"><a href="product-swatches-style.html" class="site-nav lvl-2">Product Swatches <span class="lbl nm_label2">Sale</span></a></li>
                                                    <li class="lvl-2"><a href="product-hover-info.html" class="site-nav lvl-2">Product Hover Info</a></li>
                                                    <li class="lvl-2"><a href="shop-grid-3.html" class="site-nav lvl-2">Product Reviews</a></li>
                                                    <li class="lvl-2"><a href="shop-left-sidebar.html" class="site-nav lvl-2">Discount Label <span class="lbl nm_label1">New</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="grid__item lvl-1 col-md-6 col-lg-6">
                                                <a href="#"><img src="assets/images/megamenu-bg1.jpg" alt="" title="" /></a>
                                            </li>
                                        </ul>
                                    </div> -->
                                </li>
                            <li class="lvl1 parent megamenu"><a href="./products.php?search=">Product <i class="anm anm-angle-down-l"></i></a>
                                <!-- <div class="megamenu style2">
                                    <ul class="grid mmWrapper">
                                        <li class="grid__item one-whole">
                                            <ul class="grid">
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Product Page</a>
                                                    <ul class="subLinks">
                                                        <li class="lvl-2"><a href="product-layout-1.html" class="site-nav lvl-2">Product Layout 1</a></li>
                                                        <li class="lvl-2"><a href="product-layout-2.html" class="site-nav lvl-2">Product Layout 2</a></li>
                                                        <li class="lvl-2"><a href="product-layout-3.html" class="site-nav lvl-2">Product Layout 3</a></li>
                                                        <li class="lvl-2"><a href="product-with-left-thumbs.html" class="site-nav lvl-2">Product With Left Thumbs</a></li>
                                                        <li class="lvl-2"><a href="product-with-right-thumbs.html" class="site-nav lvl-2">Product With Right Thumbs</a></li>
                                                        <li class="lvl-2"><a href="product-with-bottom-thumbs.html" class="site-nav lvl-2">Product With Bottom Thumbs</a></li>
                                                    </ul>
                                                </li>
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Product Features</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="short-description.html" class="site-nav lvl-2">Short Description</a></li>
                                                      <li class="lvl-2"><a href="product-countdown.html" class="site-nav lvl-2">Product Countdown</a></li>
                                                      <li class="lvl-2"><a href="product-video.html" class="site-nav lvl-2">Product Video</a></li>
                                                      <li class="lvl-2"><a href="product-quantity-message.html" class="site-nav lvl-2">Product Quantity Message</a></li>
                                                      <li class="lvl-2"><a href="product-visitor-sold-count.html" class="site-nav lvl-2">Product Visitor/Sold Count <span class="lbl nm_label3">Hot</span></a></li>
                                                      <li class="lvl-2"><a href="product-zoom-lightbox.html" class="site-nav lvl-2">Product Zoom/Lightbox <span class="lbl nm_label1">New</span></a></li>
                                                    </ul>
                                                  </li>
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Product Features</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="product-with-variant-image.html" class="site-nav lvl-2">Product with Variant Image</a></li>
                                                      <li class="lvl-2"><a href="product-with-color-swatch.html" class="site-nav lvl-2">Product with Color Swatch</a></li>
                                                      <li class="lvl-2"><a href="product-with-image-swatch.html" class="site-nav lvl-2">Product with Image Swatch</a></li>
                                                      <li class="lvl-2"><a href="product-with-dropdown.html" class="site-nav lvl-2">Product with Dropdown</a></li>
                                                      <li class="lvl-2"><a href="product-with-rounded-square.html" class="site-nav lvl-2">Product with Rounded Square</a></li>
                                                      <li class="lvl-2"><a href="swatches-style.html" class="site-nav lvl-2">Product Swatches All Style</a></li>
                                                    </ul>
                                                </li>
                                                <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Product Features</a>
                                                    <ul class="subLinks">
                                                      <li class="lvl-2"><a href="product-accordion.html" class="site-nav lvl-2">Product Accordion</a></li>
                                                      <li class="lvl-2"><a href="product-pre-orders.html" class="site-nav lvl-2">Product Pre-orders <span class="lbl nm_label1">New</span></a></li>
                                                      <li class="lvl-2"><a href="product-labels-detail.html" class="site-nav lvl-2">Product Labels</a></li>
                                                      <li class="lvl-2"><a href="product-discount.html" class="site-nav lvl-2">Product Discount In %</a></li>
                                                      <li class="lvl-2"><a href="product-shipping-message.html" class="site-nav lvl-2">Product Shipping Message</a></li>
                                                      <li class="lvl-2"><a href="size-guide.html" class="site-nav lvl-2">Size Guide <span class="lbl nm_label1">New</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="grid__item large-up--one-whole imageCol"><a href="#"><img src="assets/images/megamenu-bg2.jpg" alt=""></a></li>
                                    </ul>
                                </div> -->
                            </li>
                            <li class="lvl1 parent dropdown"><a href="">Pages <i class="anm anm-angle-down-l"></i></a>
                              <ul class="dropdown">
	                            <li><a href="./cart.php" class="site-nav">Cart Page 
                                <!-- <i class="anm anm-angle-right-l"></i> -->
                              </a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                                        <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
                                     </ul> -->
                                </li>
                                <!-- <li><a href="compare-variant1.html" class="site-nav">Compare Product 
                                  <i class="anm anm-angle-right-l"></i>
                                </a> -->
                                    <!-- <ul class="dropdown">
                                        <li><a href="compare-variant1.html" class="site-nav">Compare Variant1</a></li>
                                        <li><a href="compare-variant2.html" class="site-nav">Compare Variant2</a></li>
                                     </ul> -->
                                </li>
								                <li><a href="./checkout.php" class="site-nav">Checkout</a></li>
                                <?php 
                                    $query=mysqli_query($conn,"select * from custom_pages where status=1");
                                    while($arr=mysqli_fetch_assoc($query)){
                                        $title=$arr['title'];
                                        $url=$arr['url'];
                                ?>
                                <li><a href="<?php echo $url; ?>" class="site-nav"><?php echo $title; ?> <span class="lbl nm_label1">New</span> </a></li>
                                <?php }?>
                                <li><a href="./index.php" class="site-nav">About Us <span class="lbl nm_label1">New</span> </a></li>
                                <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
                                <!-- <li><a href="faqs.html" class="site-nav">FAQs</a></li>
                                <li><a href="lookbook1.html" class="site-nav">Lookbook<i class="anm anm-angle-right-l"></i></a> -->
                                  <!-- <ul>
                                    <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                                    <li><a href="lookbook2.html" class="site-nav">Style 2</a></li>
                                  </ul> -->
                                </li>
                                <!-- <li><a href="404.html" class="site-nav">404</a></li>
                                <li><a href="coming-soon.html" class="site-nav">Coming soon <span class="lbl nm_label1">New</span> </a></li>
                              </ul> -->
                            </li>
                            <!-- <li class="lvl1 parent dropdown"><a href="#">Blog <i class="anm anm-angle-down-l"></i></a>
                          <ul class="dropdown">
                            <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                            <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
                            <li><a href="blog-grid-view.html" class="site-nav">Gridview</a></li>
                            <li><a href="blog-article.html" class="site-nav">Article</a></li>
                          </ul>
                        </li> -->
                        <!-- <li class="lvl1"><a href="#"><b>Buy Now!</b> <i class="anm anm-angle-down-l"></i></a></li> -->
                          </ul>
                        </nav>
                        <!--End Desktop Menu-->
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                          
                          <div class="logo">
                            <a href="index.php">
                                <img src="<?php echo  $base_url.$admin_logo_url; ?>" alt="<?php echo  $admin_logo_title; ?>" title="<?php echo  $admin_site_title; ?>" />
                            </a>
                        </div>
                    </div>
                    <?php
                        $j=0;
                        if(!isset($_SESSION['cart_items'])){
                          $_SESSION['cart_items']=[];
                        }
                        foreach($_SESSION['cart_items'] as $i => $cart_row)
                        {
                            $j++;
                        }   
                    ?>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2" >
                        
                        <div class="site-cart">
                            <input type="text" onkeypress="checkEnterClick(event)" class=""  style="width:150px;" id="search" value="" placeholder="Search..." required="">
                            <button type="button" class="" style="border:none;font-size:18px;" onclick="search()"><i class="icon anm anm-search-l"></i></button>
                            <a href="./cart.php" class="site-header__cart" title="Cart">
                                <i class="icon anm anm-bag-l"></i>
                                <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count"><?php echo $j; ?></span>
                            </a>
                            <!--Minicart Popup-->
                        <div id="header-cart" class="block block-cart">
                        	<ul class="mini-products-list">
                                <?php $subtotal=0;?>
                            <?php
                                foreach($_SESSION['cart_items'] as $i => $cart_row)
                                {   
                                    $j=$cart_row['item_id'];
                                    $qt=$cart_row['qty'];
                                    $pquery=mysqli_query($conn,"select * from product p where p.id=$j;");
                                    $pquery_img=mysqli_query($conn,"select * from product_images pi where pi.product_id=$j limit 1;");
                                    $parr_img=mysqli_fetch_assoc($pquery_img);
                                    $cart_product_row_arr=mysqli_fetch_assoc($pquery);
                                    $product_id=$cart_product_row_arr['id'];
                                    $product_title=$cart_product_row_arr['title'];
                                    $product_price=$cart_product_row_arr['price'];
                                    $product_mrp=$cart_product_row_arr['mrp'];
                                    $product_wgt=$cart_product_row_arr['weight'];
                                    $product_img=$parr_img['img_path'];
                                ?>
                                <li class="item">
                                	<a class="product-image" href="./cart.php">
                                    	<img src="<?php echo $base_url.$product_img; ?>" alt="<?php echo $product_title; ?>" title="" />
                                    </a>
                                    <div class="product-details">
                                    	<a href="" class="remove" onclick="removeItem(<?php echo $j; ?>)"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="./cart.php" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="./cart.php"><?php echo $product_title; ?></a>
                                        <div class="variant-cart">Blue</div>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                            	<span class="label">Qty:</span>
                                                <!-- <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a> -->
                                                <input type="text" id="Quantity" name="quantity" onchange="changeItemQty($(this),<?php echo $product_id;?>)" value="<?php echo $qt;?>" class="product-form__input qty">
                                                <!-- <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a> -->
                                            </div>
                                        </div>
                                        <div class="priceRow">
                                        	<div class="product-price">
                                            	<span class="money"><?php echo ($product_price*$qt); ?></span>
                                            </div>
                                         </div>
									                  </div>
                                </li>
                                <?php $subtotal=($subtotal+$product_price*$qt);?>
                                     <?php }?>
                                     <!--
                                <li class="item">
                                	<a class="product-image" href="#">
                                    	<img src="assets/images/product-images/cape-dress-2.jpg" alt="Elastic Waist Dress - Black / Small" title="" />
                                    </a>
                                    <div class="product-details">
                                    	<a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="cart.html">Elastic Waist Dress</a>
                                        <div class="variant-cart">Gray / XXL</div>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                            	<span class="label">Qty:</span>
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                       	<div class="priceRow">
                                            <div class="product-price">
                                                <span class="money">$99.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                            <div class="total">
                            	<div class="total-in">
                                	<span class="label">Cart Subtotal:</span><span class="product-price"><span class="money"><?php echo "Rs. ".$subtotal; ?></span></span>
                                </div>
                                 <div class="buttonSet text-center">
                                    <a href="./cart.php" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="./checkout.php" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!--End Minicart Popup-->
                        </div>
                        
                        <div class="site-header__search" >
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header-->
        <!--Mobile Menu-->
        <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
      <ul id="MobileNav" class="mobile-nav">
        <li class="lvl1 parent megamenu"><a href="./index.php">Home </a>
          <!-- <ul>
            <li><a href="#" class="site-nav">Home Group 1<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="index.html" class="site-nav">Home 1 - Classic</a></li>
                <li><a href="home2-default.html" class="site-nav">Home 2 - Default</a></li>
                <li><a href="home15-funiture.html" class="site-nav">Home 15 - Furniture </a></li>
                <li><a href="home3-boxed.html" class="site-nav">Home 3 - Boxed</a></li>
                <li><a href="home4-fullwidth.html" class="site-nav">Home 4 - Fullwidth</a></li>
                <li><a href="home5-cosmetic.html" class="site-nav">Home 5 - Cosmetic</a></li>
                <li><a href="home6-modern.html" class="site-nav">Home 6 - Modern</a></li>
                <li><a href="home7-shoes.html" class="site-nav last">Home 7 - Shoes</a></li>
              </ul> -->
            <!-- </li>
            <li><a href="#" class="site-nav">Home Group 2<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="home8-jewellery.html" class="site-nav">Home 8 - Jewellery</a></li>
                <li><a href="home9-parallax.html" class="site-nav">Home 9 - Parallax</a></li>
                <li><a href="home10-minimal.html" class="site-nav">Home 10 - Minimal</a></li>
                <li><a href="home11-grid.html" class="site-nav">Home 11 - Grid</a></li>
                <li><a href="home12-category.html" class="site-nav">Home 12 - Category</a></li>
                <li><a href="home13-auto-parts.html" class="site-nav">Home 13 - Auto Parts</a></li>
                <li><a href="home14-bags.html" class="site-nav last">Home 14 - Bags</a></li>
              </ul> -->
            <!-- </li>
            <li><a href="#" class="site-nav">New Sections<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="home11-grid.html" class="site-nav">Image Gallery</a></li>
                <li><a href="home5-cosmetic.html" class="site-nav">Featured Product</a></li>
                <li><a href="home7-shoes.html" class="site-nav">Columns with Items</a></li>
                <li><a href="home6-modern.html" class="site-nav">Text columns with images</a></li>
                <li><a href="home2-default.html" class="site-nav">Products Carousel</a></li>
                <li><a href="home9-parallax.html" class="site-nav last">Parallax Banner</a></li>
              </ul> -->
            <!-- </li>
            <li><a href="#" class="site-nav">New Features<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="home13-auto-parts.html" class="site-nav">Top Information Bar </a></li>
                <li><a href="#" class="site-nav">Age Varification </a></li>
                <li><a href="#" class="site-nav">Footer Blocks</a></li>
                <li><a href="#" class="site-nav">2 New Megamenu style</a></li>
                <li><a href="#" class="site-nav">Show Total Savings </a></li>
                <li><a href="#" class="site-nav">New Custom Icons</a></li>
                <li><a href="#" class="site-nav last">Auto Currency</a></li>
              </ul> -->
            <!-- </li>
          </ul> -->
        </li>
        	<li class="lvl1 parent megamenu"><a href="./categories.php">Category</a>
          <!-- <ul>
            <li><a href="#" class="site-nav">Shop Pages<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="shop-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                <li><a href="shop-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                <li><a href="shop-fullwidth.html" class="site-nav">Fullwidth</a></li>
                <li><a href="shop-grid-3.html" class="site-nav">3 items per row</a></li>
                <li><a href="shop-grid-4.html" class="site-nav">4 items per row</a></li>
                <li><a href="shop-grid-5.html" class="site-nav">5 items per row</a></li>
                <li><a href="shop-grid-6.html" class="site-nav">6 items per row</a></li>
                <li><a href="shop-grid-7.html" class="site-nav">7 items per row</a></li>
                <li><a href="shop-listview.html" class="site-nav last">Product Listview</a></li>
              </ul> -->
            <!-- </li>
            <li><a href="#" class="site-nav">Shop Features<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="shop-left-sidebar.html" class="site-nav">Product Countdown </a></li>
                <li><a href="shop-right-sidebar.html" class="site-nav">Infinite Scrolling</a></li>

                <li><a href="shop-grid-3.html" class="site-nav">Pagination - Classic</a></li>
                <li><a href="shop-grid-6.html" class="site-nav">Pagination - Load More</a></li>
                <li><a href="product-labels.html" class="site-nav">Dynamic Product Labels</a></li>
                <li><a href="product-swatches-style.html" class="site-nav">Product Swatches </a></li>
                <li><a href="product-hover-info.html" class="site-nav">Product Hover Info</a></li>
                <li><a href="shop-grid-3.html" class="site-nav">Product Reviews</a></li>
                <li><a href="shop-left-sidebar.html" class="site-nav last">Discount Label </a></li>
              </ul> -->
            <!-- </li>
          </ul> -->
        </li>
        	<li class="lvl1 parent megamenu"><a href="./products.php?search=">Product </a>
          <!-- <ul>
            <li><a href="product-layout-1.html" class="site-nav">Product Page<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="product-layout-1.html" class="site-nav">Product Layout 1</a></li>
                <li><a href="product-layout-2.html" class="site-nav">Product Layout 2</a></li>
                <li><a href="product-layout-3.html" class="site-nav">Product Layout 3</a></li>
                <li><a href="product-with-left-thumbs.html" class="site-nav">Product With Left Thumbs</a></li>
                <li><a href="product-with-right-thumbs.html" class="site-nav">Product With Right Thumbs</a></li>
                <li><a href="product-with-bottom-thumbs.html" class="site-nav last">Product With Bottom Thumbs</a></li>
              </ul> -->
            <!-- </li> -->
            <!-- <li><a href="short-description.html" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="short-description.html" class="site-nav">Short Description</a></li>
                <li><a href="product-countdown.html" class="site-nav">Product Countdown</a></li>
                <li><a href="product-video.html" class="site-nav">Product Video</a></li>
                <li><a href="product-quantity-message.html" class="site-nav">Product Quantity Message</a></li>
                <li><a href="product-visitor-sold-count.html" class="site-nav">Product Visitor/Sold Count </a></li>
                <li><a href="product-zoom-lightbox.html" class="site-nav last">Product Zoom/Lightbox </a></li>
              </ul>
            </li> -->
            <!-- <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="product-with-variant-image.html" class="site-nav">Product with Variant Image</a></li>
                <li><a href="product-with-color-swatch.html" class="site-nav">Product with Color Swatch</a></li>
                <li><a href="product-with-image-swatch.html" class="site-nav">Product with Image Swatch</a></li>
                <li><a href="product-with-dropdown.html" class="site-nav">Product with Dropdown</a></li>
                <li><a href="product-with-rounded-square.html" class="site-nav">Product with Rounded Square</a></li>
                <li><a href="swatches-style.html" class="site-nav last">Product Swatches All Style</a></li>
              </ul>
            </li> -->
            <!-- <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="product-accordion.html" class="site-nav">Product Accordion</a></li>
                <li><a href="product-pre-orders.html" class="site-nav">Product Pre-orders </a></li>
                <li><a href="product-labels-detail.html" class="site-nav">Product Labels</a></li>
                <li><a href="product-discount.html" class="site-nav">Product Discount In %</a></li>
                <li><a href="product-shipping-message.html" class="site-nav">Product Shipping Message</a></li>
                <li><a href="product-shipping-message.html" class="site-nav last">Size Guide </a></li>
              </ul>
            </li> -->
          <!-- </ul> -->
        </li>
        <li class="lvl1 parent megamenu"><a href="">Pages <i class="anm anm-plus-l"></i></a>
          <ul>
          	<li><a href="./cart.php" class="site-nav">Cart Page</a>
                <!-- <ul class="dropdown">
                    <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                    <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
                 </ul> -->
            </li>
            <!-- <li><a href="compare-variant1.html" class="site-nav">Compare Product <i class="anm anm-plus-l"></i></a>
                <ul class="dropdown">
                    <li><a href="compare-variant1.html" class="site-nav">Compare Variant1</a></li>
                    <li><a href="compare-variant2.html" class="site-nav">Compare Variant2</a></li>
                 </ul>
            </li> -->
		      	<li><a href="./checkout.php" class="site-nav">Checkout</a></li>
            <li><a href="./index.php" class="site-nav">About Us<span class="lbl nm_label1">New</span></a></li>
            <!-- <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
            <li><a href="faqs.html" class="site-nav">FAQs</a></li>
            <li><a href="lookbook1.html" class="site-nav">Lookbook<i class="anm anm-plus-l"></i></a> -->
              <!-- <ul>
                <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                <li><a href="lookbook2.html" class="site-nav last">Style 2</a></li>
              </ul>
            </li>
            <li><a href="404.html" class="site-nav">404</a></li>
            <li><a href="coming-soon.html" class="site-nav">Coming soon<span class="lbl nm_label1">New</span></a></li> -->
          </ul>
        </li>
        	<!-- <li class="lvl1 parent megamenu"><a href="blog-left-sidebar.html">Blog <i class="anm anm-plus-l"></i></a>
          <ul>
            <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
            <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
            <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
            <li><a href="blog-grid-view.html" class="site-nav">Gridview</a></li>
            <li><a href="blog-article.html" class="site-nav">Article</a></li>
          </ul>
        </li> -->
        	<!-- <li class="lvl1"><a href="#"><b>Buy Now!</b></a>
        </li> -->
      </ul>
	</div>
  
        <!--End Mobile Menu-->

<script src="assets/js/general_functions.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>

function removeItem(item_id){  
    if (confirm("Do you want to delete?") == true) {
        axios.post('./controller/cart.php', {
        item_id,
        function:'removeItemFromCart'
        }).then(res => {
            res_data=res.data;
            alertMsg(res_data['msg'],res_data['error']);
            setTimeout(() => {
                window.location=window.location.href;
            }, 2000);

        }).catch(err => {
            alert(err.response.data);
        })
    }
}
function logout(){
    if (confirm("Do you want to logout?") == true) {
        axios.post('./controller/user.php', {
            function:'userLogout'
        }).then(res => {
            res_data=res.data;
            alertMsg(res_data['msg'],res_data['error']);
            if(!res_data['error']){
                setTimeout(() => {
                  window.location="./login.php";
                }, 2000); 
            }
        }).catch(err => {
            alert(err.response.data);
        })
    } 
}

function changeItemQty(a,b){
    const q = a.val();  
    axios.post('./controller/cart.php', {
    item_id:b,
    qty:q,
    function:'updateQty'
    }).then(res => {
      res_data=res.data;
      alertMsg(res_data['msg'],res_data['error']);
      setTimeout(() => {
          window.location=window.location.href;
      }, 2000); 
    }).catch(err => {
        alert(err.response.data);
    })
}

function search(){
    const value=document.getElementById("search").value
    window.location="./products.php?search="+value
}  

// function toggleSearch() {
//     $("#search").toggle();
// }
    
function checkEnterClick(e){
    if(e.keyCode == 13){
        search();
    }
}
</script>
<script type="text/javascript">
    axios.post('./controller/user.php', {
    function:'chatTawk'
    }).then(res => {
        res_data=res.data;
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src=res_data['msg'];
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    }).catch(err => {
        alert(err.response.data);
    })
    
</script>