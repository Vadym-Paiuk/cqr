<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}

$assets_pass = get_template_directory_uri() . '/assets/build/';
?>
	
	<section class="intro block"
	         id="blog">
		<?php
		if ( ! empty( $section['image'] ) ) {
			$atts = [ 'class' => 'intro__bg' ];
			echo wp_get_attachment_image( $section['image'], 'full', false, $atts );
		}
		?>
		<div class="container">
			<?php if ( ! empty( $section['title'] ) ): ?>
				<h1 class="text-center"
				    data-aos="fade-left">
					<?php echo $section['title']; ?>
				</h1>
			<?php endif; ?>
			<?php if ( ! empty( $section['posts'] ) ): ?>
				<div class="row">
					<?php
					foreach ( $section['posts'] as $key => $post ) {
						if ( $key === 0 ) {
							get_template_part( 'parts/preview/post', 'large' );
						} else {
							get_template_part( 'parts/preview/post', 'small' );
						}
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	</section>
	
	<section class="blog block">
		<div class="container">
			<?php if ( ! empty( $section['title'] ) ): ?>
				<h2 class="text-center"
				    data-aos="fade-left">
					<?php echo $section['title']; ?>
				</h2>
			<?php endif; ?>
			<div class="blog__categories">
				<div class="swiper swiper-blog-categories">
					<div class="swiper-navigation">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
					<?php
					$args = array(
						'taxonomy'   => 'category',
						'hide_empty' => true,
					);
					
					$all_categories = get_categories( $args );
					?>
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="tab-btn active"><span class="tab-btn-content"
							                                  data-cat="all">View all</span></div>
						</div>
						<?php
						if ( ! empty( $all_categories ) ):
							foreach ( $all_categories as $category ):
								?>
								<div class="swiper-slide">
									<div class="tab-btn">
										<?php echo '<span class="tab-btn-content" data-cat="' . esc_html( $category->term_id ) . '">' . esc_html( $category->name ) . '</span>'; ?>
									</div>
								</div>
							<?php
							endforeach;
						endif;
						?>
					</div>
				</div>
			</div>
			<div class="blog__search">
				<div class="row justify-content-end">
					<div class="col-8 col-md-6 col-xl-4">
						<form action=""
						      class="blog-search-form">
							<div class="input-icon-wrap">
								<img class="input-icon"
								     src="<?php echo $assets_pass; ?>img/search.svg"
								     alt="">
								<input type="search"
								       placeholder="Search"
								       name="s"
								>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="blog__details">
				<?php
				$args = [
					'cat'   => false,
					's'     => false,
					'paged' => 1,
				];
				get_template_part( 'parts/ajax/blog', 'results', $args );
				?>
			</div>
		</div>
	</section>

<?php
// Reset post data so other queries remain unaffected
wp_reset_postdata();
?>