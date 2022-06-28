<!--Footer-->
<?php
    include "./conn.php";
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
    $admin_facebook_link=$admin_arr['facebook_link'];
    $admin_twitter_link=$admin_arr['twitter_link'];
    $admin_instagram_link=$admin_arr['instagram_link'];
    $admin_youtube_link=$admin_arr['youtube_link'];
    $admin_copyright=$admin_arr['copyright'];
?>

<footer id="footer">
        <div class="newsletter-section">
            <div class="container">
                <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                            <div class="display-table">
                                <div class="display-table-cell footer-newsletter">
                                    <div class="section-header text-center">
                                        <label class="h2"><span>sign up for </span>newsletter</label>
                                    </div>
                                    <form action="">
                                        <div class="input-group">
                                            <input type="email" class="input-group__field newsletter__input" id="EMAIL" value="" placeholder="Email address" required="">
                                            <span class="input-group__btn">
                                                <button type="button" class="btn newsletter__submit" name="commit" id="Subscribe" onclick="subscribe()"><span class="newsletter__submit-text--large">Subscribe</span></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                            <div class="footer-social">
                                <ul class="list--inline site-footer__social-icons social-icons">
                                    <?php if($admin_facebook_link!=""){?>
                                    <li><a class="social-icons__link" href="<?php echo $admin_facebook_link ;?>" target="_blank" title="Facebook"><i class="icon icon-facebook"></i><span class="icon__fallback-text">Facebook</span></a></li>
                                    <?php }?>
                                    <?php if($admin_twitter_link!=""){?>
                                    <li><a class="social-icons__link" href="<?php echo $admin_twitter_link ;?>" target="_blank" title="Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                    <?php }?>
                                    <!-- <li><a class="social-icons__link" href="#" target="_blank" title="Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li> -->
                                    <?php if($admin_instagram_link!=""){?>
                                    <li><a class="social-icons__link" href="<?php echo $admin_instagram_link ;?>" target="_blank" title="Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                    <?php }?>
                                    <!-- <li><a class="social-icons__link" href="#" target="_blank" title="Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li> -->
                                    <?php if($admin_youtube_link!=""){?>
                                    <li><a class="social-icons__link" href="<?php echo $admin_youtube_link ;?>" target="_blank" title="YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                    <?php }?>
                                    <!-- <li><a class="social-icons__link" href="#" target="_blank" title="Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>    
        </div>
        <div class="site-footer">
        	<div class="container">
     			<!--Footer Links-->
            	<div class="footer-top">
                	<div class="row">
                    	<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Quick Shop</h4>
                            <ul>
                            	<li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Sportswear</a></li>
                                <li><a href="#">Sale</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Informations</h4>
                            <ul>
                            	<li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Terms &amp; condition</a></li>
                                <li><a href="#">My Account</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Customer Services</h4>
                            <ul>
                            	<li><a href="#">Request Personal Data</a></li>
                                <li><a href="#">FAQ's</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Support Center</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        	<h4 class="h4">Contact Us</h4>
                            <ul class="addressFooter">
                            	<li><i class="icon anm anm-map-marker-al"></i><p><?php echo $admin_address1.",<br>".$admin_address2.", ".$admin_city." - ".$admin_pincode; ?></p></li>
                                <li class="phone"><i class="icon anm anm-phone-s"></i><p><?php echo "+91 ".$admin_mobile; ?></p></li>
                                <li class="email"><i class="icon anm anm-envelope-l"></i><p><?php echo $admin_email; ?></p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Footer Links-->
                <hr>
                <div class="footer-bottom">
                	<div class="row">
                    	<!--Footer Copyright-->
	                	<div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left"><span></span> <a href="templateshub.net"><?php echo $admin_copyright ;?></a></div>
                        <!--End Footer Copyright-->
                        <!--Footer Payment Icon-->
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
                        	<ul class="payment-icons list--inline">
                        		<li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <!--End Footer Payment Icon-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->
    <script>
        function subscribe(){
            const email=document.getElementById("EMAIL").value;
            axios.post('./controller/user.php', {
            email,
            function:'subscribe'
            }).then(res => {
            res_data=res.data;
            alertMsg(res_data['msg'],res_data['error']);
            $("#EMAIL").val(null);
            // setTimeout(() => {
            //     window.location=window.location.href;
            // }, 2000); 
            }).catch(err => {
                alert(err.response.data);
            })
        }
    </script>