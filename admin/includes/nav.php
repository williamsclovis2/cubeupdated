<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span style="padding: 3px 4px 3px 7px; text-align: center; border-radius: 100%;background: #0e6838;; color: #fff; font-size: 20px; font-weight: 600; width: 35px; height: 35px; margin-right: 10px;">
                            <?php echo substr($user->data()->username,0,1);?>
                        </span>
                        <span class="m-t-xs">
                            <strong class="font-bold"><?php echo escape($user->data()->name); ?></strong>
                        </span>
                    </a>
                </div>
            </li>
            <li class="<?php echo ($page == "home" ? "active" : "")?>">
                <a href="<?php linkto(''); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?php echo ($page == "users" ? "active" : "")?>">
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo ($link == "users" ? "active" : "")?>"><a href="<?php linkto("pages/users/users"); ?>">Users</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header visible-xs">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning" style="background-color: #f8ac59;"><?php $user->get('contact', '*', NULL, "", ''); echo $user->count();?></span>
                    </a>
                </li>
                <li><a href="<?php linkto('logout'); ?>" style="color: #0e6838;"><i class="fa fa-sign-out"></i> Log out</a></li>
            </ul>
            <img src="<?php linkto('img/logo3.png'); ?>" class="img-responsive" alt="logo" style="height: 70px;">
            <span class="col-md-4"></span>
            <span class="col-md-4" style="text-align: center;">
                <?php if ($errmsg != ''): ?>
                <?php echo Danger($errmsg); ?>
                <?php endif; ?>
                <?php if ($succmsg != ''): ?>
                <?php echo Success($succmsg); ?>
                <?php endif; ?>
            </span>
            <span class="col-md-4"></span>
        </nav>
    </div>