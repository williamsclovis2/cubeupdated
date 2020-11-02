<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/agrf/admin/core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $page = $link = "users";

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
                            <!-- <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add User</button> -->
                            <h5>Users</h5>
                        </div>
                        <div class="ibox-content">
                            <?php 
                            $user->get('users', '*', NULL, "", 'id ASC');
                            $i = 0;
                            if (!$user->count()) {
                                Danger("No user recorded");
                            } else {
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Names</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($user->data() as $resUser){
                                        $i++;
                                    ?>
                                    <tr class="gradeX" style="background: #f8f8f8; border-bottom: 2px solid #fff;">
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $resUser->username; ?></td>
                                        <td><?php echo $resUser->name; ?></td>
                                        <td><?php echo $resUser->email; ?></td>
                                        <td>
                                            <div class="ibox-tools">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #3c8dbc;">More</a>
                                                <ul class="dropdown-menu dropdown-user popover-menu-list">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="user-id" value="<?=$resUser->id?>">
                                                        <?php
                                                        $user = new User(); 
                                                        if($user->data()->id == $resUser->id){?>
                                                            <li><a class="menu" href="<?php linkto('changepassword'); ?>"><i class="fa fa-unlock-alt icon"></i> Change password</a></li>
                                                        <?php }?>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
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
