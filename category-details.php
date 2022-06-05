<?php include './conn.php';?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<?php 
$id=$_GET['id'];
$cquery=mysqli_query($conn,"select * from category c where c.id='".$id."' limit 1");
$carr=mysqli_fetch_assoc($cquery);
$c_name=$carr['name'];
$c_banner_url=$carr['banner_url'];
$c_des=$carr['description'];
$admin_query=mysqli_query($conn,"select * from admin_settings ");
$admin_arr=mysqli_fetch_assoc($admin_query);
$admin_site_title=$admin_arr['site_title'];
$admin_logo_url=$admin_arr['logo_url'];
?>
<!-- belle/home14-bags.html   11 Nov 2019 12:35:19 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $c_name." - ".$admin_site_title ; ?></title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $admin_logo_url; ?>" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="template-index home14-bags">
<div id="pre-loader">
    <img src="assets/images/loader.gif" alt="Loading..." />
</div>
<div class="pageWrapper">
	<?php include './include/header.php'?>
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Image Banners-->
    	<div class="section imgBanners">
        	<div class="imgBnrOuter">
            	<div class="container">
                	<div class="row">
                    	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        	<div class="inner">
                            	<a href="#">	
                               		<img data-src="<?php echo $c_banner_url; ?>" src="<?php echo $c_banner_url; ?>" alt="<?php echo $c_name; ?>" title="" class="blur-up lazyload" />
                                </a>
                             </div>
                             <!-- <div class="custom-text text-center">
                                <h4 class="h3"><a href="#"> Discover the latest bag collections and a constantly growing assortment at BELLE</a></h4>
                                <div class="rte-setting">
                                <p>You know best what makes your perfect bag, so BELLE offers a wide selection for every taste! Choose your favourite <a href="https://www.wardow.com/en/leather-bags">leather bag</a> with matching purse from over 120 brands!</p>
                                </div>
                                <br>
                                <a class="btn" href="#">Discover Now</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Image Banners-->
        <div class="section">
        	<div class="container section-header">
                <h2 class="h2 text-center">Description</h2>
                <p><?php echo $c_des; ?></p>
            </div>
        </div>
        <div class="section">
        	<div class="container">

            	<div class="row">

                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <?php 
                                $chquery1=mysqli_query($conn,"select * from category where parent_id='".$id."'");
                                if(mysqli_num_rows($chquery1)>0){
                            ?>
                            <h2 class="h2">Sub Categories</h2>
                        </div>
                        <div class="container collection-box">
                            <div class="row">
                                <?php
                                    $cquery1=mysqli_query($conn,"select * from category where parent_id='".$id."' ");
                                    while($carr1=mysqli_fetch_assoc($cquery1)){
                                        $c_id=$carr1['id'];
                                        $c_name=$carr1['name'];
                                        $c_img=$carr1['img_path'];
                                        $c_des=$carr1['description']; 
                                ?>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="colletion-item">
                                        <a href="<?php echo "./category-details.php?id=$c_id"; ?>">
                                            <img class="blur-up lazyload" data-src="<?php echo $c_img; ?>" src="<?php echo $c_img; ?>" alt="image" title="">
                                            <span class="title"><span><?php echo $c_name; ?></span></span>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $cquery=mysqli_query($conn,"select * from category c where c.id='".$id."' limit 1");
            $carr=mysqli_fetch_assoc($cquery);
            $c_name=$carr['name'];
            $c_banner_url=$carr['banner_url'];        
        ?>
        <!--Bestselling Bags-->
        <div class="section">
        	<div class="container">

            	<div class="row">

                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                       
                            <h2 class="h2"><?php echo $c_name; ?></h2>
                        </div>
						<div class="productSlider grid-products grid-products-hover-btn">
                        <?php
                        $pquery1=mysqli_query($conn,"select * from product p where p.category_id='".$id."' limit 12");
                        $pquery2=mysqli_query($conn,"select * from product p join product_images pi on p.id=pi.product_id and p.category_id='".$id."' limit 12 ");
                        while ($parr1=mysqli_fetch_assoc($pquery1)){
                            $parr2=mysqli_fetch_assoc($pquery2);
                            $p_id=$parr1['id'];
                            $p_title=$parr1['title'];
                            $p_price=$parr1['price'];
                            $p_img=$parr2['img_path'];
                        ?>
                            
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="./product-layout-2.php?id=<?php echo $p_id; ?>" class="grid-view-item__link">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="<?php echo $p_img ;?>" src="<?php echo $p_img ;?>" alt="<?php echo $p_title ;?>" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="<?php echo $p_img ;?>" src="<?php echo $p_img ;?>" alt="<?php echo $p_title ;?>" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.php'"method="post">
                                        <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                    </form>
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        <div class="compare-btn">
                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                <i class="icon anm anm-random-r"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-layout-1.html"><?php echo $p_title ;?></a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">₹ <?php echo $p_price ;?></span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>
                        <?php
                            };
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Bestselling Bags-->
        
        <!-- <div class="section video-section">
        	<div class="container">
            	<div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="video-wrapper">
                            <iframe src="http://player.vimeo.com/video/187978982?byline=0&amp;portrait=0&amp;badge=0" allowfullscreen="" width="850" height="480"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!--End Body Content-->
    
    <?php include './include/footer.php';?>
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
    <!--Quick View popup-->
    <div class="modal fade quick-view-popup" id="content_quickview">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-body">
                    <div id="ProductSection-product-template" class="product-template__container prstyle1">
                <div class="product-single">
                <!-- Start model close -->
                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a>
                <!-- End model close -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="pl-20">
                                <img src="assets/images/product-detail-page/camelia-reversible-big1.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h2 class="product-single__title">Product Quick View Popup</h2>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">$500.00</span></span>
                                    </span>
                                </p>
                                <div class="product-single__description rte">
                                    Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                                </div>
                                
                            <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                    <div class="product-form__item">
                                      <label class="header">Color: <span class="slVariant">Red</span></label>
                                      <div data-value="Red" class="swatch-element color red available">
                                        <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);" title="Red"></label>
                                      </div>
                                      <div data-value="Blue" class="swatch-element color blue available">
                                        <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);" title="Blue"></label>
                                      </div>
                                      <div data-value="Green" class="swatch-element color green available">
                                        <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);" title="Green"></label>
                                      </div>
                                      <div data-value="Gray" class="swatch-element color gray available">
                                        <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);" title="Gray"></label>
                                      </div>
                                    </div>
                                </div>
                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                    <div class="product-form__item">
                                      <label class="header">Size: <span class="slVariant">XS</span></label>
                                      <div data-value="XS" class="swatch-element xs available">
                                        <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                                      </div>
                                      <div data-value="S" class="swatch-element s available">
                                        <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                                      </div>
                                      <div data-value="M" class="swatch-element m available">
                                        <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                                      </div>
                                      <div data-value="L" class="swatch-element l available">
                                        <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                                      </div>
                                    </div>
                                </div>
                                <!-- Product Action -->
                                <div class="product-action clearfix">
                                    <div class="product-form__item--quantity">
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="product-form__item--submit">
                                        <button type="button" name="add" class="btn product-form__cart-submit">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Product Action -->
                            </form>
                            <div class="display-table shareRow">
                                    <div class="display-table-cell">
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
                <!--End-product-single-->
                </div>
            </div>
        		</div>
        	</div>
        </div>
    </div>
    <!--End Quick View popup-->
    
    <!-- Newsletter Popup -->
	<div class="newsletter-wrap" id="popup-container">
      <div id="popup-window">
        <a class="btn closepopup"><i class="icon icon anm anm-times-l"></i></a>
        <!-- Modal content-->
        <div class="display-table splash-bg">
          <div class="display-table-cell width40"><img src="assets/images/newsletter-img.jpg" alt="Join Our Mailing List" title="Join Our Mailing List" /> </div>
          <div class="display-table-cell width60 text-center">
            <div class="newsletter-left">
              <h2>Join Our Mailing List</h2>
              <p>Sign Up for our exclusive email list and be the first to know about new products and special offers</p>
              <form action="#" method="post">
                <div class="input-group">
                  <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required="">
                  <span class="input-group__btn">
                  <button type="submit" class="btn newsletter__submit" name="commit" id="subscribeBtn"> <span class="newsletter__submit-text--large">Subscribe</span> </button>
                  </span> </div>
              </form>
              <ul class="list--inline site-footer__social-icons social-icons">
                <li><a class="social-icons__link" href="#" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                <li><a class="social-icons__link" href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a class="social-icons__link" href="#" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a class="social-icons__link" href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a class="social-icons__link" href="#" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                <li><a class="social-icons__link" href="#" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
	<!-- End Newsletter Popup -->
    
     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
     <!--For Newsletter Popup-->
     <script>
		jQuery(document).ready(function(){  
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });
		  
		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits')); 
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		}); 
		
		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
		
		/*--------------------------------------
			Promotion / Notification Cookie Bar 
		  -------------------------------------- */
		  if(Cookies.get('promotion') != 'true') {   
			 $(".notification-bar").show();         
		  }
		  $(".close-announcement").on('click',function() {
			$(".notification-bar").slideUp();  
			Cookies.set('promotion', 'true', { expires: 1});  
			return false;
		  });
	</script>
    <!--End For Newsletter Popup-->
</div>
</body>

<!-- belle/home14-bags.html   11 Nov 2019 12:37:31 GMT -->
</html>