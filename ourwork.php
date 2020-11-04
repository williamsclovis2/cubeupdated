<?php 
  require_once("admin/core/init.php");
  require_once("admin/classes/DB.php");

?>


<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <!-- Page Title Here -->
  <title>Cube communication</title>

  <!-- Meta -->
  <!-- Page Description Here -->
  <meta name="description" content="A beautiful and creative portfolio template. It is mobile friend (responsive) and comes with smooth animations">

  <!-- Disable screen scaling-->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">

  <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
  <!-- Web fonts and Web Icons -->
  <link rel="stylesheet" href="fonts/opensans/stylesheet.css">
  <link rel="stylesheet" href="fonts/bebas/stylesheet.css">
  <link rel="stylesheet" href="fonts/ionicons.min.css">
  <link rel="stylesheet" href="fonts/font-awesome.min.css">

  <!-- Vendor CSS style -->
  <link rel="stylesheet" href="css/pageloader.css">

  <!-- Uncomment below to load individualy vendor CSS -->
  <link rel="stylesheet" href="work/css/bootstrap.min.css">
  <link rel="stylesheet" href="js/vendor/swiper.min.css">
  <link rel="stylesheet" href="js/vendor/jquery.fullpage.min.css">
  <link rel="stylesheet" href="js/vegas/vegas.min.css">
  <link rel="shortcut icon" href="img/logo/Cube_U_6.gif">

  <!-- Main CSS files -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/aos.css">
  <!-- add alt layout here -->
  <link rel="stylesheet" href="css/style-default.css">
  <link rel="stylesheet" href="work/css/work.css">
  <script src="js/vendor/modernizr-2.7.1.min.js"></script>
  <link rel="stylesheet" href="css/animate.css">
</head>

<body id="menu" class="body-page">


  <!-- BEGIN OF site header Menu -->

     <!-- BEGIN OF site header Menu -->
   <header class="page-header page-header-gallery navbar page-header-alpha scrolled-white menu-right topmenu-right" id="work-menu">

    <!-- Begin of menu icon toggler -->
   <button class="navbar-toggler site-menu-icon" id="navMenuIcon">
      <!-- Available class : menu-icon-dot / menu-icon-thick /menu-icon-random -->
      <span class="menu-icon menu-icon-normal">
        <span class="bars">
          <span class="bar1"></span>
          <span class="bar2"></span>
          <span class="bar3"></span>
        </span>
      </span>
    </button>
    <!-- End of menu icon toggler -->

    <!-- Begin of logo/brand -->
    <a class="navbar-brand" href="index">
      <span class="logo">
        <img class="light-logo" src="img/logo/logo.png" alt="Logo">
      </span>
    </a>
    <!-- End of logo/brand -->

    <!-- begin of menu wrapper -->
    <div class="all-menu-wrapper" id="navbarMenu">
      <!-- Begin of top menu -->
      <nav class="navbar-topmenu">
        <!-- Begin of CTA Actions, & Icons menu -->
        <div class="footer-right header-icons icons-menu">
          <ul class="social">
            <li>
              <a href="#">
                <i class="icon fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="icon fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="icon fa fa-instagram"></i>
              </a>
            </li>
          </ul>

        </div>
        <!-- End of CTA & Icons menu -->
      </nav>
      <!-- End of top menu -->

      <!-- Begin of hamburger mainmenu menu -->
      <nav class="navbar-mainmenu full-nav">
        <ul class="navbar-nav ul-menu">
          <li class="nav-item">
            <a class="nav-link" href="index">Home</a>
          </li><br>
          <hr class="">
          <li class="nav-item">
            <a class="nav-link" href="values">Our values</a>
          </li><br>
          <hr class="">
          <li class="nav-item">
            <a class="nav-link" href="ourwork">Our work</a>
          </li><br>
          <hr class="">
          <li class="nav-item">
            <a class="nav-link" href="getintouch">Get in touch </a>
          </li>
          
        </ul>
      </nav>
      <!-- End of hamburger mainmenu menu -->

    </div>
    <!-- end of menu wrapper -->
  </header>
  <div class="container-fluid" id="gall-img">
    <div class="col-md-12 col-lg-12">
        <div class="row  custom-album">
  <!-- Start of Gallery Loop -->
        <?php 
            $sql="SELECT * FROM album ORDER BY id desc LIMIT  12";
            $items=DB::getInstance()->query($sql);
            
            if($items->count()):foreach($items->results() as $item):
        ?>

         <div class="col-md-3">
            <div class="content">
                <a href="#" data-toggle="modal" data-target="#mymodal<?=$item->id?>">
                  <div class="content-overlay"></div>
                  <img src="images/ourwork/front/<?=$item->picture?>" class="content-image" style="width:100%;">
                  <div class="content-details fadeIn-bottom">
                    <h3 class="content-title"><?=$item->details?> </h3>
                  </div>
                </a>
            </div>
         </div>
         

      <section id="kwibuka">
        <div class="modal fade modal-fullscreen" id="mymodal<?=$item->id?>" role="dialog" style="background-color:#000;">
            <div class="modal-dialog modal-lg" style="boeder-raduis">
                <div class="modal-content" style="box-shadow:none; border:none;border-radius:0 !important;">
                    <div class="model-body">
                        <div class="container-fluid">
                            <a class="close" data-dismiss="modal"><img src="closeicon.png"></a>
                        <div class="row">
                        <div class="col-md-12">
                          <div id="carousel-custom-16<?=$item->id?>" class="carousel slide" data-ride="carousel" data-interval="false" >
                          <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox" id="carousel-margin">

                              <?php 
                                  $inner_sql="SELECT * FROM picture WHERE album_id=".$item->id;
                                  $inner_items=DB::getInstance()->query($inner_sql);
            
                                  if($inner_items->count()): $counter=1; $class=""; foreach($inner_items->results() as $inner_item):

                                    if($counter==1) $class="active"; else $class="";
                              ?>
                                <div class="item <?=$class?>">
                                  <img src="images/ourwork/<?=$item->name?>/<?=$inner_item->name?>" alt="..." class="img-responsive">
                                   <div class="carousel-caption hidden-xs" id="">
                                        <h3><?=$inner_item->title?></h3>
                                        <p><?=$inner_item->details?></p>
                                  </div>  
                                </div>
                                
                              <?php 
                                  $counter++;
                                endforeach;
                              endif;
                              ?>

                              </div>

                              <!-- Controls -->
                              <a class="left carousel-control" href="#carousel-custom-16<?=$item->id?>" role="button" data-slide="prev">
                                <i class="fa fa-long-arrow-left"></i>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-custom-16<?=$item->id?>" role="button" data-slide="next">
                                <i class="fa fa-long-arrow-right"></i>
                                <span class="sr-only">Next</span>
                              </a>


                              <!-- Indicators -->
                              <ol class="carousel-indicators">

                              <?php 
                                  $inner_nav_sql="SELECT * FROM picture WHERE album_id=".$item->id;
                                  $inner_nav_items=DB::getInstance()->query($inner_nav_sql);
            
                                  if($inner_nav_items->count()): $counter=0; $class=""; foreach($inner_nav_items->results() as $inner_nav_item):

                                    if($counter==1) $class="active";
                              ?>
                                  <li data-target="#carousel-custom-16<?=$item->id?>" data-slide-to="<?=$counter?>" class="<?=$class?>">
                                     <img src="images/ourwork/<?=$item->name?>/<?=$inner_nav_item->name?>" alt="..." class="img-responsive">
                                  </li>

                                  <?php 
                                  $counter++;
                                endforeach;
                              endif;
                              ?>
                                

                              </ol> 
                                <div class="visible-xs" id="cap1">
                                        <h3><?=$inner_item->title?></h3>
                                        <p><?=$inner_item->details?></p>
                                     </div>
                           </div>
                          </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
  <!-- End of Gallery Loop -->

      <?php 
        endforeach;
      endif;
      ?>

     
      </div>
      
    </div>
  </div>
  <div class="more-button"> 
     <a href="#moresection" id="loadbtn" class="btn btn-default" onclick="loadMore()"> <i class="ion ion-chevron-down"></i></a>
  </div>
    <div class="second">
       <div id="morePics">
        
        </div> 
    </div>
  <script>
    function loadMore(){
            var data="";
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                var msg = this.responseText;
                //alert(msg);
                var ms=msg.trim();
                $("#loadbtn").hide();
                    document.getElementById("morePics").innerHTML=ms;
                    
                   
                 }
            };
            /*open the http request with the Method and the sever page*/
            xhttp.open("POST", "display-data.php", true);
            /*to define the Request header*/ 
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           
            /*to define the parameters to be held in the request*/
            xhttp.send(data);
    }
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/slick/slick.min.js"></script>
  <script src="js/vendor/all.js"></script>
  <script src="js/main.js"></script>
  <script src="work/js/jquery-2.1.4.min.js"></script>
  <script src="work/js/custom.js"></script>
  <script src="work/js/bootstrap.min.js"></script>
<!--
  <script type="text/javascript">
  window.__lc = window.__lc || {};
  window.__lc.license = 12332553;
  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
</script>
<noscript>
<a href="https://www.livechatinc.com/chat-with/12332553/" rel="nofollow">Chat with us</a>,
powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
-->
<script>
    $("#loadbtn").click(function() {
    
    window.setTimeout(function(){
    $('html,body').animate({
        scrollTop: $(".second").offset().top},
        'slow');
    }, 200);    
});
</script>
</body>

</html>