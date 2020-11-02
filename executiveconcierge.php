<!doctype html>
<!--
Website By Miradontsoa / MiVFX
http://twitter.com/miradontsoa
http://miradontsoa.com
-->

<html class="no-js" lang="en">


<!-- Mirrored from demo.highhay.com/casely/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 15:10:19 GMT -->
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <!-- Page Title Here -->
  <title>Cube communication</title>

  <!-- Meta -->
  <!-- Page Description Here -->
  <meta name="description" content="A beautiful and creative portfolio template. It is mobile friend (responsive) and comes with smooth animations">

  <!-- Disable screen scaling-->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">

  <!-- Twitter Meta -->
  <meta name="twitter:site" content="@miradontsoa">
  <meta name="twitter:creator" content="@miradontsoa">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Page Title">
  <meta name="twitter:description" content="Description of the page">
  <meta name="twitter:image" content="../img/bg-default.html">

  <!-- Facebook Meta -->
  <meta property="og:url" content="your website url here">
  <meta property="og:title" content="Page Title">
  <meta property="og:description" content="Description of the page">
  <meta property="og:type" content="website">
  <meta property="og:image" content="../img/bg-default.html">
  <meta property="og:image:secure_url" content="../img/bg-default.html">
  <meta property="og:image:type" content="image/jpg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

  <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
  <!-- Web fonts and Web Icons -->
  <link rel="stylesheet" href="fonts/opensans/stylesheet.css">
  <link rel="stylesheet" href="fonts/bebas/stylesheet.css">
  <link rel="stylesheet" href="fonts/ionicons.min.css">
  <link rel="stylesheet" href="fonts/font-awesome.min.css">

  <!-- Vendor CSS style -->
  <link rel="stylesheet" href="css/pageloader.css">

  <!-- Uncomment below to load individualy vendor CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="js/vendor/swiper.min.css">
  <link rel="stylesheet" href="js/vendor/jquery.fullpage.min.css">
  <link rel="stylesheet" href="js/vegas/vegas.min.css">

  <!-- Main CSS files -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/aos.css">
  <!-- add alt layout here -->
  <link rel="stylesheet" href="css/style-default.css">

  <script src="js/vendor/modernizr-2.7.1.min.js"></script>
  <link rel="stylesheet" href="css/animate.css">
</head>

<body id="menu" class="body-page">
  <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <!-- Page Loader : just comment these lines to remove it -->

  <!-- BEGIN OF site header Menu -->
  <?php include("header.php");?>
  <!-- END OF site header Menu-->

  <!-- BEGIN OF page cover -->
  
  <!--END OF page cover -->

  <!-- BEGIN OF page main content -->
  <main class="page-main page-fullpage main-anim" id="mainpage">



    <!-- Begin of register/login/signin section -->
    <div class="section section-list-feature fp-auto-height-responsive " data-section="contactarea" id="register">
    
      <!-- Begin of section wrapper -->
            <div class="section-content anim" style="width:100%;">
            <div class="row"  style="" id="vid-div">
                <div class="press-video">
                    <video class="video" id="myAudio"   style="">  
                        <source src="vid/CUBE%20at%207.mp4" type=video/mp4>
                    </video>
                    <div class="playpause-content playpause">
                        <h1 class="">Press play</h1>
                        <a class="playpause round-button" ><i class="fa fa-play fa-2x"></i></a>
                     </div>
                    <div class="bet-btn" id="btnDisplay">
                        <p class="anim-2" id="demo"></p>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
    <!-- End of register/login/signin section -->

    <!-- End of contact section -->
  </main>
  <!-- END OF page main content -->

  <!-- BEGIN OF page footer -->
 

  <!-- scripts -->
  <!-- All Javascript plugins goes here -->
    <!-- scripts -->
  <!-- All Javascript plugins goes here -->
  
  <script src="js/jquery.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/slick/slick.min.js"></script>

  <!-- All vendor scripts -->
  <script src="js/vendor/parallax.min.js"></script>
  <script src="js/vendor/scrolloverflow.min.js"></script>
  <script src="js/vendor/all.js"></script>
  <script src="js/particlejs/particles.min.js"></script>

  <!-- Countdown script -->
  <script src="js/jquery.downCount.js"></script>

  <!-- Form script -->
  <script src="js/form_script.js"></script>

  <!-- Javascript main files -->
  <script src="js/main.js"></script>
  <script src="js/wow.js"></script>
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
  </script>
 <script>
    $('.video').parent().click(function () {
  if($(this).children(".video").get(0).paused){        $(this).children(".video").get(0).play();   $(this).children(".playpause").fadeOut();
    }else{       $(this).children(".video").get(0).pause();
  $(this).children(".playpause").fadeIn();
    }
});
</script>
<script>
var aud = document.getElementById("myAudio");
aud.onended = function() {
    document.getElementById("demo").innerHTML = "<a href='getintouch' class'btn btn-default'>Get in touch</a>";
    document.getElementById("btnDisplay").style.display = "block";
}

aud.onplay = function() {
    document.getElementById("btnDisplay").style.display = "none";
}

;
</script>
<!--
<script>
  var $video  = $('video'),
    $window = $(window); 

$(window).resize(function(){
    
    var height = $window.height();
    $video.css('height', height);
    
    var videoWidth = $video.width(),
        windowWidth = $window.width(),
    marginLeftAdjust =   (windowWidth - videoWidth) / 2;
    
    $video.css({
        'height': height, 
        'marginLeft' : marginLeftAdjust
    });
}).resize();  
    
</script>
-->

</body>


<!-- Mirrored from demo.highhay.com/casely/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 15:12:31 GMT -->
</html>