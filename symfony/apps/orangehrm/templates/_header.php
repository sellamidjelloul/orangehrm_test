<!DOCTYPE html>
<?php
$cultureElements = explode('_', $sf_user->getCulture());
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $cultureElements[0]; ?>" lang="<?php echo $cultureElements[0]; ?>">

    <head>

        <title>OrangeHRM</title>

        <?php include_http_metas() ?>
        <?php include_metas() ?>

        <link rel="shortcut icon" href="<?php echo theme_path('images/favicon.ico')?>" />

        <!-- Custom CSS files -->
        <link href="<?php echo theme_path('css/fontawesome.min.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo theme_path('css/bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo theme_path('css/main_new.css')?>" rel="stylesheet" type="text/css"/>

        <!-- Custom JavaScript files -->
        <script src="<?php echo theme_path('js/jquery.min.js')?>"></script>
        <script src="<?php echo theme_path('js/popper.min.js')?>"></script>
        <script src="<?php echo theme_path('js/bootstrap.min.js')?>"></script>
        <script src="<?php echo theme_path('js/bsadmin.js')?>"></script>