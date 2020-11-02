<?php
require_once 'core/init.php';

if(!$user->isLoggedIn()) {
    Redirect::to('login');
}

$errmsg  = "";
$succmsg  = "";
$page = $link = "users";

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'current_password' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password_again' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'new_password'
            )
        ));
    }

    if($validate->passed()) {
        if(Hash::make(Input::get('current_password'), $user->data()->salt) !== $user->data()->password) {
            $errmsg .= 'Your current password is wrong.';
        } else {
            $salt = Hash::salt(32);
            $user->update(array(
                'password' => Hash::make(Input::get('new_password'), $salt),
                'salt' => $salt
            ));

            $succmsg .='Your password has been changed!';
        }
    } else {
        foreach($validate->errors() as $error) {
            $errmsg .= $error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include $INC_DIR . "head.php"; ?>
</head>

<body>
    <div id="wrapper">

        <?php include $INC_DIR . "nav.php"; ?>
            
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Update Password</h5>
                        </div>
                        <div class="ibox-content" style="overflow: auto;">
                            <form id="userForm" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-4 control-label">Current Password</label>
                                    <div class="col-sm-8"><input type="password" required="required" class="form-control" name="current_password"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-4 control-label">New Password</label>
                                    <div class="col-sm-8"><input type="password" required="required" class="form-control" name="new_password"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-4 control-label">New Password Again</label>
                                    <div class="col-sm-8"><input type="password" required="required" name="new_password_again" class="form-control"></div>
                                </div>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                <div style="float: right; margin-top: 10px;">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        
        <?php include $INC_DIR . "footer.php"; ?>

        </div>
        </div>
</body>

</html>
