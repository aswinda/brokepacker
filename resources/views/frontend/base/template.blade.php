<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Voyage Website Template | Home :: w3layouts</title>
        <link href="{{ URL::to('web/css/style.css') }}" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        </script>
        <script src="{{ URL::to('web/js/jquery.min.js') }}"></script>
        <!---script---->
        <link rel="stylesheet" href="{{ URL::to('web/css/jquery.bxslider.css') }}" type="text/css" />
        <script src="{{ URL::to('web/js/jquery.bxslider.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.bxslider').bxSlider({
                         auto: true,
                         autoControls: true,
                         minSlides: 4,
                         maxSlides: 4,
                         slideWidth:450,
                         slideMargin: 10
                    });
                });
            </script>
        <!---//script---->
        <!---smoth-scrlling---->
            <script type="text/javascript">
                $(document).ready(function(){
                                    $('a[href^="#"]').on('click',function (e) {
                                        e.preventDefault();
                                        var target = this.hash,
                                        $target = $(target);
                                        $('html, body').stop().animate({
                                            'scrollTop': $target.offset().top
                                        }, 1000, 'swing', function () {
                                            window.location.hash = target;
                                        });
                                    });
                                });
                </script>
        <!---//smoth-scrlling---->
        <!---webfonts---->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!---webfonts---->
        <!---calender-style---->
        <link rel="stylesheet" href="{{ URL::to('web/css/jquery-ui.css') }}" />
        <!---//calender-style---->
        <script src="{{ URL::to('web/js/responsiveslides.min.js') }}"></script>
        <script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
         nav: true,
         speed: 500,
         namespace: "callbacks",
      });
    });
  </script>
    </head>
    <body>

    <!----start-wrap---->
      <!----start-top-header----->
      <div class="top-header" id="header">
        <div class="wrap">
        <div class="top-header-left">
          <ul>
            <li><a href="{{ URL::to('login') }}"><span> </span>Login</a></li>
            <li><p><span> </span>Not a Member ? </p>&nbsp;<a class="reg" href="#"> Register</a></li>
            <li><p class="contact-info">Call Us Now :815-123-4567</p></li>
            <div class="clear"> </div>
          </ul>
        </div>
        <div class="top-header-right">
          <ul>
            <li><a class="face" href="#"><span> </span></a></li>
            <li><a class="twit" href="#"><span> </span></a></li>
            <li><a class="thum" href="#"><span> </span></a></li>
            <li><a class="pin" href="#"><span> </span></a></li>
            <div class="clear"> </div>
          </ul>
        </div>
        <div class="clear"> </div>
      </div>
      </div>
      <!----//End-top-header----->
      <!---start-header---->
      <div class="header">
        <div class="wrap">
        <!--- start-logo---->
        <div class="logo">
          <a href="{{ URL::to('/') }}"><img src="{{ URL::to('web/images/logo.png') }}" title="voyage" /></a>
        </div>
        <!--- //End-logo---->
        <!--- start-top-nav---->
        <div class="top-nav">
            <div class="navigation">
    <span class="menu"></span> 
      <ul class="navig cl-effect-16">
        <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
        <li><div class="menu-top">
                    <a href="destinations.html" >Destinations</a>
                    <ul class="sub">
                      <li><a href="#">Dropdown item</a></li>
                      <li><a href="#">Dropdown item</a></li>  
                      <li>
                        <div class="menu-top">
                    <a href="destinations.html" >Dropdown item</a>
                    <ul class="sub sub2">
                      <li><a href="#">Dropdown item</a></li>
                      <li><a href="#">Dropdown item</a></li>  
                      <li><a href="#">Dropdown item</a></li>
                      <li><a href="#">Dropdown item</a></li>
                      <li><a href="#">Dropdown item</a></li>
                    </ul>
                  </div>
                      </li>
                      <li><a href="#">Dropdown item</a></li>
                      <li><a href="#">Dropdown item</a></li>
                    </ul>
                  </div>
        </li>
        <li><a href="{{ URL::to('/') }}">Cruises</a></li>
        <li><a href="{{ URL::to('/') }}">Specials</a></li>
        <li><a href="{{ URL::to('booking') }}">Booking</a></li>
      </ul>
  </div>
            <div class="search-box">
              <div id="sb-search" class="sb-search">
                <form>
                  <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                  <input class="sb-search-submit" type="submit" value="">
                  <span class="sb-icon-search"> </span>
                </form>
              </div>
            </div>
            <!----search-scripts---->
            <script src="web/js/modernizr.custom.js"></script>
            <script src="web/js/classie.js"></script>
            <script src="web/js/uisearch.js"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) );
            </script>
            <!----//search-scripts---->
        </div>
        <!--- //End-top-nav---->
        <div class="clear"> </div>
      </div>
      <!---//End-header---->
    </div>
    <!--script-for-menu-->
    <script>
      $("span.menu").click(function(){
        $(" ul.navig").slideToggle("slow" , function(){
        });
      });
    </script>

	@yield('content')

    </body>
</html>

