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
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php /*
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
*/ ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="description" content="My name is Andy Stone, and I run a design agency called Emerson Stone in Boulder, CO. I work on websites, branding projects, and iPhone apps for both startups and national brands.">
<meta name="keywords" content="design, freelance, contract, designer, boulder, colorado, denver, iphone, android, ios, app, responsive web design, branding, logo, logo designer, branding, user interfaces, user experience design">
<meta name="author" content="Andy Stone">
<link rel="shortcut icon" href="/favicon.ico">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="container">
		<div class="content">
			<div class="hero<?php echo is_front_page() ? ' heroimage' : '';?>">
				<div class="topbar">
					<a href="javascript:;" id="menu-toggle">Menu <span class="mobile-nav">%</span></a>
				</div>
				<div class="logo">
					<a href="/">
						<span class="rabbit">"</span>
						<h3>From The Desk <span class="raise">of</span></h3>
						<h1>Andy Stone</h1>
					</a>
				</div>
			</div>
			<div class="bottomborder <?php echo is_front_page() ? ' noimage' : '';?>"></div>

