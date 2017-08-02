<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>WRC Technologies Pvt. Ltd.</title>
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
    {!! Html::script('storage/sites/angular/appRoutes.js') !!}
    {!! Html::script('storage/sites/angular/app.js') !!}

    
   
</head>

<body ng-cloak ng-app="appWrc" ng-controller="MainController" ng-init="company_details();loadHomeSection();">

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
