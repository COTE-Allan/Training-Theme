<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <?php wp_head(); ?>
</head>

<body <?php body_class("is-preload"); ?>>

    <?php wp_body_open(); ?>
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <h1><a href="<?= home_url() ?>"><?php echo get_bloginfo("name") ?></a></h1>
            <nav class="links">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'main',
                        'container' => 'ul', // afin d'éviter d'avoir une div autour 
                    )
                ); ?>
            </nav>
            <nav class="main">
                <ul>
                    <li class="search">
                        <a class="fa-search" href="#search">Search</a>
                        <form id="search" method="get">
                            <input type="text" name="s" placeholder="Search" />
                        </form>
                    </li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Menu -->
        <section id="menu">

            <!-- Search -->
            <section>
                <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </section>

            <!-- Links -->
            <section>
                <?php
                add_filter('walker_nav_menu_start_el', 'prefix_nav_description', 10, 4);
                wp_nav_menu(
                    array(
                        'theme_location' => 'main',
                        'container' => 'ul', // afin d'éviter d'avoir une div autour
                        'menu_class' => 'links',
                    )
                );
                ?>
            </section>

            <!-- Actions -->
            <section>
                <ul class="actions stacked">
                    <li><a href="#" class="button large fit">Log In</a></li>
                </ul>
            </section>

        </section>