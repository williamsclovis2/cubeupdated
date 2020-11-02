<?php
require_once 'core/init.php';

if(!$user->isLoggedIn()) {
    Redirect::to('admin/login');
}
$controller = new Controller();
$page = "home";
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head-index.php"; ?>
</head>

<body>
    <div id="wrapper">
        
        <?php include "includes/nav.php"; ?>

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php linkto("pages/users/users"); ?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-eye"></i> View</a>
                            <h5>Users</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                <?php
                                    $user->get('users', '*', NULL, "", '');
                                    echo $user->count();
                                ?>
                            </h1>
                            <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                            <small>Users</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Messages</h5>
                            <div class="ibox-tools">
                                <span class="label label-warning-light" style="background-color: #f8ac59;"><?php $user->get('contact', '*', NULL, "", ''); echo $user->count();?> Messages</span>
                               </div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <?php 
                                $controller->get('contact', '*', NULL, "", 'id DESC LIMIT 5');
                                $i = 0;
                                if (!$controller->count()) {
                                    Danger("No message received");
                                } else {
                                    foreach ($controller->data() as $resMsg) { 
                                ?>
                                <div class="feed-activity-list">
                                    <div class="feed-element">
                                        <div class="media-body">
                                            <small class="pull-right"><?php echo time_elapsed_string($resMsg->send_date); ?></small>
                                            <strong><?php echo $resMsg->firstname." ".$resMsg->lastname; ?></strong> <?php echo $resMsg->org_name; ?>
                                        </div>
                                    </div>
                                </div>
                                 <?php } }?>
                                <a href="messages" class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
        <?php include "includes/footer-index.php"; ?>

        </div>
    </div>
</body>
</html>