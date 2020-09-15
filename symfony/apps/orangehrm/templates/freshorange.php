<?php

// Allow header partial to be overridden in individual actions
// Can be overridden by: slot('header', get_partial('module/partial'));
include_slot('header', get_partial('global/header'));
$subscribed = $sf_user->isSubscribed();
?>

    </head>
    <body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars fa-2x"></i></a>
        <a class="navbar-brand" href="http://www.orangehrm.com/" target="_blank"><h1>Emploitic</h1></a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <?php if(!$subscribed) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <button id="MP_link" class="btn btn-secondary"><?php echo __('Marketplace'); ?></button>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a id="MP_btn" class="nav-link" href="#">
                        <button id="Subscriber_link" class="btn btn-success"><?php echo __('Subscribe'); ?></button>
                    </a>
                </li>
                <?php } else {?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <button id="MP_link" class="btn btn-secondary"><?php echo __('Marketplace'); ?></button>
                    </a>
                </li>
                <?php } ?>

                <script>
                    var marketplaceURL = "<?php echo url_for('marketPlace/ohrmAddons'); ?>";
                    var SubscriberURL = "<?php echo url_for('pim/subscriber'); ?>";
                </script>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="fa fa-user"></i> <?php echo __("Welcome %username%", array("%username%" => $sf_user->getAttribute('auth.firstName'))); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo url_for('pim/viewMyDetails'); ?>"><?php echo __('About'); ?></a>
                        <a class="dropdown-item" href="<?php echo url_for('admin/changeUserPassword'); ?>"><?php echo __('Change Password'); ?></a>
                        <a class="dropdown-item" href="<?php echo url_for('auth/logout'); ?>"><?php echo __('Logout'); ?></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="main_content" class="d-flex">
        <nav class="sidebar">
            <?php include_component('core', 'mainMenu'); ?>
        </nav>
        <div id="main_container" class="container p-3">
            <?php echo $sf_content ?>
            <div class="row">
                <div id="footer" class="col-12">
                    <?php include_partial('global/copyright');?>
                </div>
            </div>
        </div>
    </div>

<?php include_slot('footer', get_partial('global/footer'));?>
