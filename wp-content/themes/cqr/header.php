<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible"
	      content="ie=edge">
	<meta name="theme-color"
	      content="#000">
	<link rel="preconnect"
	      href="https://fonts.googleapis.com">
	<link rel="preconnect"
	      href="https://fonts.gstatic.com"
	      crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
	      rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php $header = get_field( 'header', 'options' ); ?>
<header class="header"
        data-aos="fade-down">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-auto">
				<div class="logo header__logo">
					<?php the_custom_logo(); ?>
				</div>
			</div>
			<div class="col-auto">
				<div class="row">
					<?php if ( ! empty( $header['call_us'] ) ): ?>
						<div class="col-auto header__banner">
							<div class="banner">
								<svg class="text-icon"
								     width="24"
								     height="24"
								     viewBox="0 0 24 24"
								     fill="none"
								     xmlns="http://www.w3.org/2000/svg">
									<path d="M1 21.5H23L12 2.5L1 21.5ZM13 18.5H11V16.5H13V18.5ZM13 14.5H11V10.5H13V14.5Z"
									      fill="#98EF7E"></path>
								</svg>
								<?php if ( ! empty( $header['call_us']['description'] ) ): ?>
									<span class="text-uppercase"><?php echo $header['call_us']['description']; ?> </span>
								<?php endif; ?>
								<?php if ( ! empty( $header['call_us']['title'] ) ): ?>
									<b><?php echo $header['call_us']['title']; ?> </b>
								<?php endif; ?>
								<?php if ( ! empty( $header['call_us']['phone'] ) ): ?>
									<?php
									$original_phone = $header['call_us']['phone'];
									$clean_phone    = preg_replace( '/\D/', '', $original_phone );
									?>
									<a href="tel:<?php echo $clean_phone; ?>"><?php echo $original_phone; ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $header['button'] ) ): ?>
						<div class="col-auto header__btn">
							<a class="btn btn-primary"
							   href="<?php echo $header['button']['url']; ?>"
							   target="<?php echo $header['button']['target']; ?>"><?php echo $header['button']['title']; ?></a>
						</div>
					<?php endif; ?>
					
					<?php
					$menu_name = 'top';
					if ( has_nav_menu( $menu_name ) ):
						?>
						<div class="col-auto">
							<div class="navigation">
								<button class="navigation__btn btn btn-secondary js-navigation-btn"
								        type="button"><span class="cross"> <span> </span><span></span></span></button>
								<div class="navigation__inner">
									<?php
									wp_nav_menu( [
										'theme_location'  => $menu_name,
										'menu'            => '',
										'menu_class'      => 'menu primary-menu',
										'menu_id'         => 'primary-menu',
										'container'       => 'div',
										'container_class' => 'menu-primary-menu-container',
										'container_id'    => '',
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'echo'            => true,
										'depth'           => 0,
										'walker'          => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'item_spacing'    => 'preserve',
									] );
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
