<?php
/**
 * The header for our theme
 * @author Arnaud Martin
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header"  role="banner">

		<div class="logo">
			<a href="<?php echo home_url(); ?>">
				<img src="<?= THEMEURL . DIST_PATH ; ?>img/logo.svg" alt="Logo" class="logo-img">
			</a>
		</div>
			
		<nav class="nav"  role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav>
		
	</header>

	<div class="site-main">
