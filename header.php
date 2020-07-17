<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head() ?>

</head>

<body>
<!-- header
================================================== -->
<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-md-auto">
                <div class="img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo"
                         title="Site logo">
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto center">
                <h1 class="welcome">РЕАЛИЗУЕМ КРУПНЕЙШИЕ <br/>ПРОЕКТЫ В МИРЕ</h1>
                <p class="welcome_label">стадионы, газопроводы, мосты, детские песочницы</p>
            </div>
        </div>
    </div>
</header>