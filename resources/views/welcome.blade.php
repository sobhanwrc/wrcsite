<!DOCTYPE HTML>
<html lang="en-US" prefix="og: http://ogp.me/ns#">

<head>
    <title>WRC Technologies Pvt. Ltd.</title>
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta property="og:image" content="http://wrctpl.com/storage/sites/images/inner_header.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    {{-- <meta http-equiv="refresh" content="0;url=http://wrctpl.com/view-job-details/2"> --}}
    <base href="/">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {!! Html::style('storage/sites/css/bootstrap.min.css') !!}
    {!! Html::style('storage/sites/css/style.css') !!}
    {!! Html::style('storage/sites/css/owl.carousel.min.css') !!}
    {!! Html::style('storage/sites/css/owl.theme.min.css') !!}
    {!! Html::style('storage/sites/css/font-awesome.min.css') !!}
    {!! Html::style('storage/sites/css/animate.css') !!}
    {!! Html::style('storage/sites/css/responsive.css') !!}

    {!! Html::style('storage/sites/home_slider/responsiveslides.css') !!}
    {!! Html::style('storage/sites/home_slider/demo.css') !!}



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-route.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-sanitize.js"></script>
    {!! Html::script('storage/sites/angular/ng-sweet-alert.js') !!}
    {!! Html::script('storage/sites/angular/SweetAlert.min.js') !!}
    {!! Html::style('storage/sites/css/sweet-alert.css') !!}
    {!! Html::script('storage/sites/angular/angular-socialshare/dist/angular-socialshare.js')!!}    
    {!! Html::script('storage/sites/angular/appRoutes.js') !!}
    {!! Html::script('storage/sites/angular/app.js') !!}
    {!! Html::script('storage/sites/angular/angular-recaptcha/release/angular-recaptcha.js')!!}

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.5.8/script.min.js"></script>

    
   
</head>

<body elem-ready ng-app="appWrc" ng-controller="MainController" ng-init="company_details();loadHomeSection();">
    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '1976355635939442',
            xfbml: true,
            version: 'v2.7'
        });
    };
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>

    <div id="loader_image" style=" width: 100%; height: 800px; position: absolute; top: 0; left: 0; padding-top: 15%; text-align: center; overflow-y: hidden !important; overflow-x: hidden !important; background: #fff; z-index: 99999999999">
        <img style="width: 100px; height:100px" src="/storage/sites/images/Custom-loader-ABT.gif" alt="" class="" />

    </div>

    <my-navbar></my-navbar>
    <div ng-view></div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="LN wow fadeInDown top">
                                <img src="/storage/sites/images/ln.png" />
                                <h3>Recent News</h3>
                                <p>Be informed about the latest news and
                                    <br> innovations in software.</p>
                                <p>SEO, mobile apps and hot gossip from
                                    <br> the WRC team, right here.</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="LN2 wow fadeInDown top">
                                <img src="storage/sites/images/call.png" />
                                <h3>Contact Details</h3>
                                <p>We are here to guide you! Contact us if you wish to reinvent your business and work for prolific outcomes. Please call us at: </p>
                                <p>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> +91 @{{contact_details[0].company_phone_no}}
                                    <br>
                                    <i class="fa fa-envelope-open-o yellow" aria-hidden="true"></i> <a href="mailto:info@wrctechnologies.com">@{{contact_details[0].company_email}}</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="LN1 wow fadeInDown top">
                                <img src="/storage/sites/images/share.png" />
                                <h3>Follow Us</h3>
                                <p>Update yourself with industry developments
                                    <br> and special announcements and
                                    <br> offers from the WRC team through any of
                                    <br> these popular networks.</p>
                                <a href="@{{contact_details[0].company_fb_link}}" class="fb_links"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="@{{contact_details[0].company_twiter_link}}" class="tw_links"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="@{{contact_details[0].company_linkin_link}}" class="ln_links"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_down wow fadeIn">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer_links">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="testimonials.html">Testimonials</a></li>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="contact-us.html">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="copy">Copyright&copy;wrctechnologies.com. All rights reserved</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {!! Html::script('storage/sites/home_slider/responsiveslides.min.js') !!}
   

    {!! Html::script('storage/sites/js/bootstrap.min.js') !!}
    {!! Html::script('storage/sites/js/wow.min.js') !!}
    
    {!! Html::script('storage/sites/js/jquery.filterizr.min.js') !!}
    {!! Html::script('storage/sites/js/controls.js') !!}
    
    {!! Html::script('storage/sites/js/jquery.jcarousel.min.js') !!}
    {!! Html::script('storage/sites/js/jcarousel.responsive.js') !!}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
</body>
</html>
