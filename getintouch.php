<?php
require_once 'admin/core/init.php';
$controller = new Controller();
$errmsg  = "";
$succmsg  = "";
if (Input::exists()) {
//    if(Token::check(Input::get('token'))) {
        $errmsg  = "success";
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'firstname' => array(
                'firstname' => 'First name',
                'required' => true,
                'min' => 2,
            ),
            'lastname' => array(
                'lastname' => 'Last name',
                'required' => true,
                'min' => 2,
            ),
            'telephone' => array(
                'telephone' => 'Telephone',
                'required' => true,
                'min' => 2,
            ),
            'email' => array(
                'email' => 'Email',
                'required' => true,
                'min' => 2
            ),
            'organisation-name' => array(
                'organisation-name' => 'Organization name',
                'required' => true,
                'min' => 2,
            ),
           
            'country' => array(
                'country' => 'country',
                'required' => true,
                'min' => 2,
            ),
            'product' => array(
                'product' => 'product',
                'required' => true,
            )
        ));
         //your site secret key
            $secret = '6LfPH94ZAAAAACGcyDXp5lG6hg_dGxlX0OEYYspv';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
//        if ($validate->passed()  && $responseData->success ) {
        if ($validate->passed()) {
                $errmsg  = "success";
            try {
                $controller->create('contact', array(
                    'firstname'    => escape(Input::get('firstname')),
                    'lastname'     => escape(Input::get('lastname')),
                    'telephone'    => Input::get('telephone'),
                    'email'        => Input::get('email'),
                    'org_name'     => escape(Input::get('organisation-name')),
                    'country'      => Input::get('country'),
                    'product'      => Input::get('product'),
                    'send_date'    => date('Y-m-d H:i:s')
                ));
            
                $message = '                    
                <html>
                    <body style="font-family: helvetica;">
                        <section style="background: #e7e9ea; padding: 0 100px;">
                            <center>
                                <article style="border-top: 3px solid #f47821; border-radius: 0px; background: #ffffff;">
                                    <div style="background: #000; padding: 10px 0; height: auto; overflow: auto; color: #ffffff;">
                                        <img src="img/logo/logo.png " class="img img-responsive" style="float: left; margin-left: 10px; height: 40px;">
                                        <h1 style="font-weight: 400; text-transform: uppercase;">Contact details</h1>
                                    </div>
                                    <div style="padding: 20px 0;">
                                        <table rules="all" style="border-color: #666; color:#000;" cellpadding="10" class="table_mail">
                                            <tr><td><strong>First name:</strong> </td><td>' . Input::get('firstname') . '</td></tr>
                                            <tr><td><strong>Last name:</strong> </td><td>' . Input::get('lastname') . '</td></tr>
                                            <tr><td><strong>Telephone:</strong> </td><td>' . Input::get('telephone') . '</td></tr>
                                            <tr><td><strong>Email:</strong> </td><td>' . Input::get('email') . '</td></tr>
                                            <tr><td><strong>Organization name:</strong> </td><td>' . Input::get('organisation-name') . '</td></tr>
                                            <tr><td><strong>Country:</strong> </td><td>' . Input::get('country') . '</td></tr>
                                            <tr><td><strong>Area of Interest:</strong> </td><td>'. Input::get('product') . '</td></tr>
                                        </table>
                                    </div>
                                </article>
                            </center>
                        </section>
                    </body>
                </html>';
                
                $email = "clovismul@gmail.com";        
                $subject = "Contact Us";          
                $user->send_mail($email,$message,$subject);
                
                $user_subject ='Thank you for reaching out to Cube ';
                $user_message ='
                <html>
                <body>
                    <section style="background-color:#eee; padding:80px;">
                        <div class="email-content">
                            <p>Thank you for getting in touch with Cube. <br>We will get back to you shortly.<br>In the meantime, please take a minute to follow us on our social media accounts: </p>
                            
                            <ul class="">
                                <li style="display:inline-block;">
                                  <a href="https://www.facebook.com/CubeRwanda" target="_blank" style="text-decoration: none !important;">
                                    <img src="img/logo/clients/fb.png" style="height:30px;">
                                  </a>
                                </li>
                                <li style="display:inline-block;">
                                  <a href="https://twitter.com/cuberwanda?lang=en" target="_blank" style="text-decoration: none !important;">
                                    <img src="img/logo/clients/twit.png" style="height:30px;">
                                  </a>
                                </li>
                               <li style="display:inline-block;">
                                  <a href="https://instagram.com/cube__rwanda?igshid=ufdv2zvcxaws" target="_blank" style="text-decoration: none !important;">
                                    <img src="img/logo/clients/insta.png" style="height:30px;">
                                  </a>
                                </li>
                              </ul>
                            <p>Warm wishes,<br>
                            <a href="tel:+250733110110 " style="color:#f47821 !important;">+250 733 110 110 </a><br>
                            <a href="mailto:info@cube.rw " style="color:#f47821 !important;">info@cube.rw </a><br>
                            <a href="https://cube.rw/" style="color:#f47821 !important;">www.cube.rw</a></p>
                        </div>
                    </section>
                </body>
            </html>';
            $user->send_mail($email, $user_message, $user_subject);

                Redirect::to('notification');

            } catch(Exception $e) {
                $errmsg .= $e . '<br />';
            }
        } else {
            foreach ($validate->errors() as $error) {
                $errmsg .= $error . '<br />';
            }
        }
//    }
}
?>
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
   <link rel="stylesheet" href="js/contact/dependancies/bootstrap-select-1.12.4/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="intlTelInput/css/intlTelInput.css">
    <link rel="stylesheet" href="css/contact/bootstrap.min.css">
  <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
  <!-- Web fonts and Web Icons -->
  <link rel="stylesheet" href="fonts/opensans/stylesheet.css">
  <link rel="stylesheet" href="fonts/bebas/stylesheet.css">
  <link rel="stylesheet" href="fonts/ionicons.min.css">
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="shortcut icon" href="img/logo/Cube_U_6.gif">
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
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body id="menu" class="body-page">
  <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <!-- Page Loader : just comment these lines to remove it -->

  <!-- BEGIN OF site header Menu -->
   <header class="page-header page-header-gallery navbar page-header-alpha scrolled-white menu-right topmenu-right">

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
    <a class="navbar-brand contact-logo" href="index">
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
              <a href="https://www.facebook.com/CubeRwanda" target="_blank">
                <i class="icon fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/cuberwanda?lang=en" target="_blank">
                <i class="icon fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="https://instagram.com/cube__rwanda?igshid=ufdv2zvcxaws" target="_blank">
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
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index">Home</a>
          </li>
          <hr class="hr-two">
          <li class="nav-item">
            <a class="nav-link" href="value">Our values</a>
          </li>
          <hr class="hr-two">
          <li class="nav-item">
            <a class="nav-link" href="ourwork">Our work</a>
          </li>
          <hr class="hr-two">
          <li class="nav-item">
            <a class="nav-link" href="getintouch">Get in touch </a>
          </li>
          
        </ul>
      </nav>
      <!-- End of hamburger mainmenu menu -->

    </div>
    <!-- end of menu wrapper -->

  </header>

  <!--END OF page cover -->

  <!-- BEGIN OF page main content -->
  <main class="page-main page-fullpage main-anim" id="">

   <div class="section section-contact fp-auto-height-responsive no-slide-arrows " data-section="contact" id="contact-form">
      <!-- section cover -->
    

      <!-- Begin of slide section wrapper -->
      <div class="section-wrapper fullwidth anim  with-margin">
        <!-- main content -->
        <div class="row" id="contact-form-o">
            <div class="contact-c" style="width:100%;">
                <div class="col-md-6 col-lg-6 right" id="with-form">
                     <div class="form-container form-container-card anim-3">
                      <form class="send_message_form message message form" validate="true" method="post" action=""
                      id="message_form">
                        <?php if ($errmsg != ''): ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $errmsg; ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($succmsg != ''): ?>
                        <div class="alert alert-success" role="alert" style="text-align: center;">
                        <?php echo $succmsg; ?>
                        </div>
                        <?php endif; ?>
                          
                        <p class="" style="font-size:20px !important; margin:unset !important;"> Fill in the details below and we’ll set up a call with you. </p>
                        <p style="margin-bottom:20px;">*Mandatory fields</p>
                        
                        <div class="form-group" style="">
                            <div class="col-md-6" id="n-pd-l">
                                 <input id="mes-namemes-name" name="firstname" type="text" placeholder="First name*" class="form-control form-control-outline thick form-success-clean"
                          required>
                            </div>
                            <div class="col-md-6" id="n-pd-r">
                                 <input id="mes-lastname" name="lastname" type="text" placeholder="Last name*" class="form-control form-control-outline thick form-success-clean"
                          required>
                            </div>
                        </div>
                        <div class="form-group name">
                          <div class="country-code">
                            <div class="col-md-6 col-p-left" style="margin-top:15px;">
                                <div class="span8">
                                    <div class=" input-mc">
                                        <label>Telephone <span>*</span></label><br>
                                        <input id="phone" name="telephone" class="input" value="" type="tel" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-p-right" style="margin-top:15px;">
                                <div class="select input-mc">
                                    <label>Country <span>*</span></label><br>
                                    <div class="select-country">
                                        <select class="selectpicker countrypicker c-size" name="country" data-default="RWANDA" id="country" data-live-search="true" data-flag="true" required  style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                          </div>
                          
                        </div>
                          
                        <div class="form-group email">
                          <input id="mes-email" type="email" placeholder="Email address*" name="email" class="form-control form-control-outline thick form-success-clean" required>
                        </div>
                          
                        <div class="form-group name">
                          <input id="mes-organisation-name" name="organisation-name" type="text" placeholder="Organisation  name*" class="form-control form-control-outline thick form-success-clean" required>
                        </div>
                          
                        <div class="form-group name">
                          <input id="id1" name="website" type="text" placeholder="Website" class="form-control form-control-outline thick form-success-clean">
                        </div>
                          
                        <div class="form-group name" style="margin-bottom:10px;">
                          <select  name="product"   class="form-control form-control-outline thick form-success-clean"  id="select-bx" required>
                            <option hidden="hidden"  value="" style="" default> Select area of interest <span>*</span></option>
                             <option value="PR, Advertising & Digital ">PR, Advertising & Digital </option>
                             <option value="Hybrid Conferences & Exhibitions  ">Hybrid Conferences & Exhibitions</option>
                             <option value="VIP Concierge Conference Services ">VIP Concierge Conference Services </option>
                             <option value="All Services">All Services </option>
                        </select>
                        </div> 
                        <div class="form-group">
                          <label for="" class="ckeck-b" style="font-weight:unset;"><input type="checkbox" id="" value="yes" name="privacy_policy" data-uid="undefined-field-8">
                          Yes, I agree to receive updates from Cube Communications Ltd by email  </label>
                            <label for="" class="ckeck-b" style="font-weight:unset; margin-top:-19px; ">
                                <input type="checkbox" id="mes-privacy_policy" value="yes" name="privacy_policy" data-uid="undefined-field-8" required>
                                   Yes, I agree to the  
                                <a href="privacy" style="color:#f47821; font-style:bold;"> Privacy policy</a> 
                            </label>
                        </div>
                        <div class="btns text-right">
                         <div class="g-recaptcha" data-sitekey="6LfPH94ZAAAAAB6R7dhmBdbDNzT63y2cOElTMlsB"></div>
                          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                          <button id="submit-message" class="btn btn-outline-white btn-round btn-fullNot email_b"
                          name="" type="submit" style="margin-top:15px;">
                            <span class="txt">Submit</span>
                          </button>
                        </div>
                      </form>
                    </div>
                </div>
               <div class="col-12 col-lg-6 left" anim-4 id="with-content" >
                    <div class="col-cont">
                         <div class="col-md-12 gmt-col" style="">
                             <h4>Want to chat right now?  </h4>
                              <p>Call us on <a href="tel:+250733110110" style="text-decoration:none;color:#fff;">+250 733 110 110</a>
                                <br>9am – 5pm (GMT+2)
                              </p>
                         </div>
                          <div class="col-md-12">
                             <h4>Want to visit us? </h4>
                              <p>
                                8th Floor, Bodifa House 
                                <br>KN5, Kigali
                                <br>Rwanda
                              </p>
                         </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- aside content -->
        
      </div>
      <!-- End of slide section wrapper -->

    </div>
    <!-- End of register/login/signin section -->

    <!-- End of contact section -->
  </main>
  <!-- END OF page main content -->

  <!-- BEGIN OF page footer -->
 <script src="js/contact/jquery.1.11.1.min.js"></script>

    <!--[if lt IE 10]>
            <script src="j-folder/js/jquery.placeholder.min.js"></script>
        <![endif]-->

    <script>
        $(document).ready(function(){

            // Phone masking
            $('#phone').mask('(999) 999-9999', {placeholder:'x'});

            // Post code masking
            $('#post').mask('999-9999', {placeholder:'x'});

        });
    </script>

    <!-- intl-tel-input-master -->
    <script src="intlTelInput/js/intlTelInput.js"></script>
   
    <script>
        var input2 = document.querySelector("#phone");
        window.intlTelInput(input2, {
            nationalMode: false,
            preferredCountries: [''],
            initialCountry: "rw",
            utilsScript: "intlTelInput/js/utils.js",
        });


        // isValidNumber

        var input = document.querySelector("#telephone1"),
          errorMsg = document.querySelector("#error-msg"),
          validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        // initialise plugin
        var iti = window.intlTelInput(input, {
            nationalMode: false,
            preferredCountries: [''],
          utilsScript: "intlTelInput/js/utils.js?1562189064761"
        });

        var reset = function() {
          input.classList.remove("error");
          errorMsg.innerHTML = "";
          errorMsg.classList.add("hide");
          validMsg.classList.add("hide");
        };

        // on blur: validate
        input.addEventListener('blur', function() {
          reset();
          if (input.value.trim()) {
            if (iti.isValidNumber()) {
              validMsg.classList.remove("hide");
            } else {
              input.classList.add("error");
              var errorCode = iti.getValidationError();
              errorMsg.innerHTML = errorMap[errorCode];
              errorMsg.classList.remove("hide");
            }
          }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
    </script>
    <script>
        $(document).ready(function (){
  
   $("#select-bx").change(function() {
       var val = $(this).val();
       
       if(val == "")
       {
           $(this).addClass("default");
       }
       else
       {
          $(this).removeClass("default");
       }
    });

});
    </script>
    <script src="js/contact/jquery.min.js"></script>
    <script src="js/contact/bootstrap.min.js"></script>
    <script src="js/contact/dependancies/bootstrap-select-1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script src="js/contact/countrypicker.min.js"></script>
    <!-- end countrypicker -->

    <!-- form validation -->
<!--
    <script src="js/contact/jquery-simple-validator.min.js"></script>

  
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/slick/slick.min.js"></script>
  <script src="js/vendor/parallax.min.js"></script>
  <script src="js/vendor/scrolloverflow.min.js"></script>
  <script src="js/vendor/all.js"></script>
-->
<!--  <script src="js/particlejs/particles.min.js"></script>-->

  <!-- Countdown script -->
<!--  <script src="js/jquery.downCount.js"></script>-->

  <!-- Form script -->
<!--  <script src="js/form_script.js"></script>-->

  <!-- Javascript main files -->
  <script src="js/main.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery-simple-validator.min.js"></script>
  
</body>


<!-- Mirrored from demo.highhay.com/casely/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 15:12:31 GMT -->
</html>