<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cálculo de trayectorias 
            <?php
                if (!empty($title)) {
                    echo "»".$title; 
                }
             ?>

        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php echo $layoutParams["route_css"]; ?>/normalize.min.css">
        <link rel="stylesheet" href="<?php echo $layoutParams["route_css"]; ?>/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $layoutParams["route_css"]; ?>/main.css">
        <script src="<?php echo $layoutParams["route_js"]; ?>/vendor/modernizr-2.8.3.min.js"></script>
       
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">

          <div class="row">
            <div class="col-md-12">
              <?php if (isset($flashMessage)): ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $flashMessage; ?>          
                </div>
              <?php endif; ?>
    </div>
  </div>