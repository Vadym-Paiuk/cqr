<?php $footer = get_field( 'footer', 'options' ); ?>
<footer class="footer block">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-6">
				<?php if ( ! empty( $footer['subtitle'] ) ): ?>
					<div class="pre-title">
						<?php echo $footer['subtitle']; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $footer['title'] ) ): ?>
					<h3>
						<?php echo $footer['title']; ?>
					</h3>
				<?php endif; ?>
				<?php if ( ! empty( $footer['link'] ) ): ?>
					<a class="btn btn-primary btn-arrow"
					   href="<?php echo $footer['link']['url']; ?>"
					   target="<?php echo $footer['link']['target']; ?>">
						<?php echo $footer['link']['title']; ?>
					</a>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-6 col-lg-4 col-xl-3">
				<?php if ( ! empty( $footer['image'] ) ): ?>
					<?php
					$attr = [ 'class' => 'footer__img' ];
					echo wp_get_attachment_image( $footer['image'], 'full', false, $attr );
					?>
				<?php endif; ?>
			</div>
		</div>
		<br>
		<div class="row justify-content-between">
			<div class="col-12 col-md-3">
				<div class="logo footer__logo">
					<?php the_custom_logo(); ?>
				</div>
				<?php if ( ! empty( $footer['description'] ) ): ?>
					<div>
						<?php echo $footer['description']; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php
			$menu_name = 'bottom';
			if ( has_nav_menu( $menu_name ) ):
				?>
				<div class="col-4 col-md-3 col-xl-2">
					<?php
					wp_nav_menu( [
						'theme_location'  => $menu_name,
						'menu'            => '',
						'menu_class'      => 'menu company-menu',
						'menu_id'         => 'company-menu',
						'container'       => 'div',
						'container_class' => 'menu-company-menu-container',
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
			<?php endif; ?>
			
			<div class="col-4 col-md-3 col-xl-2">
				<?php if ( ! empty( $footer['follow_us'] ) ): ?>
					<?php if ( ! empty( $footer['follow_us']['title'] ) ): ?>
						<h6>
							<?php echo $footer['follow_us']['title']; ?>
						</h6>
					<?php endif; ?>
					<?php if ( ! empty( $footer['follow_us']['socials'] ) ): ?>
						<nav>
							<?php foreach ( $footer['follow_us']['socials'] as $social ): ?>
								<a href="<?php echo $social['url']; ?>"
								   target="_blank">
									<?php if ( ! empty( $social['image'] ) ): ?>
										<?php
										echo wp_get_attachment_image( $social['image'], 'full' );
										?>
									<?php endif; ?>
								</a>
							<?php endforeach; ?>
						</nav>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="hr"></div>
		<div class="row justify-content-between">
			<div class="col-6">
				<?php if ( ! empty( $footer['copyright'] ) ): ?>
					<div>
						<?php
						$start_year   = '2024';
						$current_year = date( 'Y' );
						$replace_year = $start_year;
						
						if ( $start_year !== $current_year ) {
							$replace_year .= ' - ' . $current_year;
						}
						
						echo str_replace( '{YEAR}', $replace_year, $footer['copyright'] );
						?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-auto">
				<div class="row">
					<?php
					$menu_name = 'privacy';
					if ( has_nav_menu( $menu_name ) ):
						?>
						<div class="col-auto">
							<?php
							wp_nav_menu( [
								'theme_location'  => $menu_name,
								'menu'            => '',
								'menu_class'      => 'menu privacy-menu',
								'menu_id'         => 'privacy-menu',
								'container'       => '',
								'container_class' => '',
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
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>