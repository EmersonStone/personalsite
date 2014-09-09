<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ais
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="description" content="My name is Andy Stone, and I am a freelance digital designer living and designing in Boulder, CO. I work on websites, branding projects, and iPhone apps. I have experience in UI, UX, IA and every other acronym that you can think of.">
<meta name="keywords" content="design, freelance, contract, designer, boulder, colorado, denver, iphone, android, ios, app, responsive web design, branding, logo, logo designer, branding, user interfaces, user experience design">
<meta name="author" content="Andy Stone">
<link rel="shortcut icon" href="ico/favicon.png">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="container">
		<div class="content">
			<div class="hero heroimage">
				<div class="topbar">
					<a href="javascript:;" id="menu-toggle">Menu <span class="mobile-nav">%</span></a>
				</div>
				<div class="logo">
					<a href="/">
						<span class="rabbit">"</span>
						<h3>The Studio <span class="raise">of</span></h3>
						<h1>Andy Stone</h1>
					</a>
				</div>
			</div>
			<div class="bottomborder noimage"></div>

