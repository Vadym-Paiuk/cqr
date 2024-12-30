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
					'taxonomy'   => 'category',  // Default for post categories
					'hide_empty' => false,       // Set to true to only show categories that have posts
				);
				
				$all_categories = get_categories( $args );
				?>
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="tab-btn active"><a class="tab-btn-content"
						                               href="#">View all</a></div>
					</div>
					<?php
					if ( ! empty( $all_categories ) ):
						foreach ( $all_categories as $category ):
							?>
							<div class="swiper-slide">
								<div class="tab-btn">
									<?php echo '<a class="tab-btn-content" href="' . esc_html( $category->term_id ) . '">' . esc_html( $category->name ) . '</a>'; ?>
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
					<form action="">
						<div class="input-icon-wrap"><img class="input-icon"
						                                  src="<?php echo $assets_pass; ?>img/search.svg"
						                                  alt=""><input type="search"
						                                                placeholder="Search"
						                                                required></div>
					</form>
				</div>
			</div>
		</div>
		<div class="blog__details">
			<div class="row">
				<?php
				$args = array(
					'post_type'      => 'post',    // Only fetch blog posts
					'posts_per_page' => 9,         // Limit to 9 posts
					'orderby'        => 'date',    // Order by publish date
					'order'          => 'DESC',    // Show newest first
				);
				
				$the_query = new WP_Query( $args );
				
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						get_template_part( 'parts/preview/post', 'default' );
					endwhile;
				
				// Optionally display pagination here (if needed)
				else :
					// If no posts found, you can output a "No posts" message
					echo '<p>No posts found.</p>';
				endif;
				
				// Reset post data so other queries remain unaffected
				wp_reset_postdata();
				?>
			</div>
			<nav class="blog__pagination"
			     aria-label="...">
				<ul class="pagination">
					<li class="pagination-item disabled"><a class="btn btn-primary btn-sm"
					                                        href="">
							<svg class="text-icon"
							     width="11"
							     height="12"
							     viewBox="0 0 11 12"
							     fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<path d="M10.166 6L0.832682 6M0.832682 6L5.49935 10.6667M0.832682 6L5.49935 1.33333"
								      stroke="currentColor"
								      stroke-width="1.33333"
								      stroke-linecap="round"
								      stroke-linejoin="round"></path>
							</svg>
							Prev</a></li>
					<li class="pagination-item"><a class="pagination-link"
					                               href="#">1</a></li>
					<li class="pagination-item active"><span class="pagination-link">2</span></li>
					<li class="pagination-item"><a class="pagination-link"
					                               href="#">3</a></li>
					<li class="pagination-item"><span>...</span></li>
					<li class="pagination-item"><a class="pagination-link"
					                               href="#">5</a></li>
					<li class="pagination-item"><a class="btn btn-primary btn-sm"
					                               href="#">Next
							<svg class="text-icon"
							     width="17"
							     height="16"
							     viewBox="0 0 17 16"
							     fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<path d="M3.83398 8H13.1673M13.1673 8L8.50065 3.33333M13.1673 8L8.50065 12.6667"
								      stroke="currentColor"
								      stroke-width="1.33333"
								      stroke-linecap="round"
								      stroke-linejoin="round"></path>
							</svg>
						</a></li>
				</ul>
			</nav>
		</div>
	</div>
</section>
