<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="<?= esc_url(get_theme_file_uri('/favicon.ico')) ?>" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">
            <h1 class="logo"><img src="<?= esc_url(get_theme_file_uri('/images/sitelogo2.png')) ?>" alt=""></h1>

            <!-- ハンバーガーボタン -->
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="site-nav">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#works">Works</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>