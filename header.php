<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agenda
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/foundation.min.css">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,600,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <?php wp_head(); ?>

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/slick.css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/custom.css" />

    <style media="screen">
    html, body {
      height: 100%;
      }
      body {
      display: flex;
      flex-direction: column;
      }
      .content-wrap {
      flex: 1 0 auto;
      }
      .footer {
      flex-shrink: 0;
      }
    </style>



</head>

<body>
    <header class="site-header">
        <div class="grid-container">
            <!-- <div class="cell large-12 p-relative"> -->
                <div class="header-wrapper">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a class="logo" href="<?= get_site_url(); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/img/main-logo.svg" alt="logo of agenda website">
                    </a>
                    <?php
                        $locations = get_nav_menu_locations();
                        $menu_items = wp_get_nav_menu_items($locations["main-menu"]);
                    ?>
                    <ul class="menu hidden">
                        <li class="close-wrap">
                            <span class="close-text">Stäng</span>
                            <a href="#" class="close-icon nav-link"></a>
                        </li>
                        <?php
                            // print_r(rtrim($_SERVER['REQUEST_URI'],"/"));
                            foreach ($menu_items as $key => $value) {
                                // $current = ( $_SERVER['REQUEST_URI'] == (parse_url( $value->url, PHP_URL_PATH )."/") ) ? 'active' : '';

                                if(strcmp( rtrim($_SERVER['REQUEST_URI'],"/"),parse_url( $value->url, PHP_URL_PATH ))==0)
                                {
                                    $current = 'active';

                                }
                                else
                                {
                                    $current = '';
                                }
                                // print_r(parse_url( $value->url, PHP_URL_PATH ));

                        ?>
                            <li><a href="<?= $value->url; ?>" class="nav-link <?= $current; ?>"><?= $value->title; ?></a></li>
                        <?php
                            }
                        ?>

                        <!-- <li><a href="<?= get_site_url(); ?>/organisations" class="nav-link">Organisationer</a></li>
                        <li><a href="<?= get_site_url(); ?>/publish-event-organisation" class="nav-link">Publicera </a></li>
                        <li><a href="<?= get_site_url(); ?>/about" class="nav-link">Om Agenda: Jämlikhet</a></li> -->
                        <!-- <li><a href="" class="nav-link">Kontakta </a></li> -->
                        <li class="search-item">
                            <div class="search-toggle">
                                <a href="#" class="search nav-link" title="search button">SÖK</a>
                            </div>
                        </li>
                    </ul>
                    <div class="mobile-search-bar">
                        <div class="search-toggle">
                            <a href="#" class="search-mobile"> <img src="<?= get_template_directory_uri(); ?>/img/search.svg" alt="image of search icon"></a>
                        </div>
                    </div>
                </div>
                <div class="search-container">
                    <?= get_search_form(); ?>
                    <!-- <form>
                        <input type="text" name="s" id="search-terms" placeholder="Ange ord som ska sökas." />
                        <input type="hidden" name="post_type" value="event_listing">
                        <input type="hidden" name="post_type" value="organisations">
                        <button type="submit" name="submit" class="search-icon"><i class="fa fa-fw fa-search"></i></button>
                        <a href="#" class="search-close"><img src="<?= get_template_directory_uri(); ?>/img/close-icon.svg" alt="close-button"></a>
                    </form> -->
                </div>
                <div class="clear"></div>
            <!-- </div> -->
        </div>
    </header>

    <div class="content-wrap">
