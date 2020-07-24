<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Ecommerce Store
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
	  	<meta charset="<?php bloginfo( 'charset' ); ?>">
	  	<meta name="viewport" content="width=device-width">
	  	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) )
		{
			wp_body_open();
		}else{
			do_action('wp_body_open');
		}
	?>
	
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'vw-ecommerce-store' ); ?></a>

		<?php get_template_part( 'template-parts/header/top-shop-now' ); ?>
		<div class="home-page-header">
			<?php get_template_part('template-parts/header/top-header'); ?>
			<?php get_template_part('template-parts/header/middle-header'); ?>
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>
	</header>	
	<?php if(class_exists('woocommerce')){ ?>
		<div class="cart_box">
			<a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','vw-ecommerce-store' ); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_ecommerce_store_cart_icon','fas fa-shopping-basket')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','vw-ecommerce-store' );?></span></a>
			<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
		</div>
	<?php } ?>      

	<?php if(get_theme_mod('vw_ecommerce_store_loader_enable',true)==1){ ?>
	  	<div id="preloader">
		    <div id="status">
		      	<?php $vw_ecommerce_store_theme_lay = get_theme_mod( 'vw_ecommerce_store_loader_icon','Two Way');
		        if($vw_ecommerce_store_theme_lay == 'Two Way'){ ?>
		        	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/two-way.gif" alt="" role="img"/>
		      	<?php }else if($vw_ecommerce_store_theme_lay == 'Dots'){ ?>
		        	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/dots.gif" alt="" role="img"/>
		      	<?php }else if($vw_ecommerce_store_theme_lay == 'Rotate'){ ?>
		        	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/rotate.gif" alt="" role="img"/>
		      	<?php } ?>
		    </div>
	 	</div>
	<?php } ?>