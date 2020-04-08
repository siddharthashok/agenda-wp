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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/foundation.min.css">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css?v=2">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/slick.css" />
    <title>Agenda</title>
</head>

<body>
    <header class="site-header">
        <div class="grid-container">
            <div class="cell large-12">
                <div class="header-wrapper">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a class="logo" href="<?= get_site_url(); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/img/main-logo.svg" alt="logo of agenda website">
                    </a>
                    <ul class="menu hidden">
                        <li class="close-wrap">
                            <span class="close-text">Stäng</span>
                            <a href="#" class="close-icon nav-link"></a>
                        </li>
                        <li><a href="<?= get_site_url(); ?>/events" class="nav-link">Event kalender</a></li>
                        <li><a href="<?= get_site_url(); ?>/organisations" class="nav-link">Organisationer</a></li>
                        <li><a href="#" class="nav-link">Publicera </a></li>
                        <li><a href="#" class="nav-link">Om Agenda: Jämlikhet</a></li>
                        <li><a href="#" class="nav-link">Kontakta </a></li>
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
                    <form>
                        <input type="text" name="q" id="search-terms" placeholder="SÖK" />
                        <button type="submit" name="submit" value="Go" class="search-icon"><i class="fa fa-fw fa-search"></i></button>
                        <a href="#" class="search-close"><img src="<?= get_template_directory_uri(); ?>/img/close-icon.svg" alt="close-button"></a>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>