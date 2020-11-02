<?php
require_once 'core/init.php';

if ($user->isLoggedIn()) {
    Redirect::to('admin/index.php');
}
$errmsg  = "";
$succmsg  = "";

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login) {
                Redirect::to('admin/index');
            } else {
                // echo '<p>Incorrect username or password</p>';
                $error = "Incorrect username or password";
                $errmsg .= $error . '<br />';
            }
        } else {
            foreach($validate->errors() as $error) {
                // echo $error, '<br>';
                $errmsg .= $error . '<br />';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AGRF</title>
    <link rel="icon" type="image/png" href="img/u.gif">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg" style="background-image: url(img/bg.JPG);">

    <div class="middle-box text-center loginscreen  animated fadeInDown" style="top: 60%; background: #000; padding: 30px;">
        <div>
            <img src="img/logo.png" class="img-responsive" alt="logo">
            <?php if ($errmsg != ''): ?><p style="color: red; text-align: center;"><?php echo $errmsg; ?></p><?php endif; ?>
            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <div class="field" style="display: none;">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember">Remember me
                    </label>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!-- <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form>
            <p class="m-t"> <small>CUBE Digital Team &copy; <?php echo date("Y"); ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
