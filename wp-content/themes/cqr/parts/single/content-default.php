<?php
$assets_pass = get_template_directory_uri() . '/assets/build/';

$post_content    = apply_filters( 'the_content', get_the_content() );
$updated_content = inject_heading_ids( $post_content );
$toc_html        = generate_toc_html( $updated_content );
?>

<section class="intro block">
	<img class="intro__bg"
	     src="<?php echo $assets_pass; ?>img/blog-intro-bg.svg"
	     alt=""
	     loading="lazy">
	<div class="container">
		<div class="card card--green"
		     data-aos="zoom-in">
			<div class="card-body">
				<div class="row justify-content-between row-reverse">
					<div class="col-12 col-md-6 col-xl-5">
						<?php
						$attr = [ 'class' => 'card-img mb-0' ];
						the_post_thumbnail( 'full', $attr );
						?>
					</div>
					<div class="col-12 col-md-6">
						<?php
						$post_id    = get_the_ID();
						$categories = get_the_category( $post_id );
						if ( ! empty( $categories ) ) :
							?>
							<p>
								<?php foreach ( $categories as $category ): ?>
									<span class="badge"><?php echo esc_html( $category->name ); ?></span>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
						<p><img class="text-icon"
						        src="<?php echo $assets_pass; ?>img/calendar.svg"
						        alt=""><?php the_date( 'd M Y' ); ?></p>
						<h4 class="card-title"><?php the_title(); ?></h4>
						<p class="card-text">
							<?php echo get_the_excerpt(); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="post block">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 col-xl-3">
				<div class="sidebar">
					<hr>
					<?php echo wp_kses_post( $toc_html ); ?>
					<hr>
					<nav class="socials">
						<a href="<?php linkedin_social_button(); ?>"
						   target="_blank">
							<img src="<?php echo $assets_pass; ?>img/linkedin-green.svg"
							     alt="">
						</a>
						<a href="<?php echo facebook_social_button(); ?>"
						   target="_blank">
							<img src="<?php echo $assets_pass; ?>img/facebook-green.svg"
							     alt="">
						</a>
						<a href="<?php x_social_button(); ?>"
						   target="_blank">
							<img src="<?php echo $assets_pass; ?>img/twitter-green.svg"
							     alt="">
						</a>
						<a href="<?php the_permalink(); ?>"
						   class="copy-current-link">
							<img src="<?php echo $assets_pass; ?>img/share-green.svg"
							     alt="">
						</a>
					</nav>
				</div>
			</div>
			<div class="col-12 col-md-8 col-xl-9">
				<div class="content">
					<?php echo wp_kses_post( $updated_content ); ?>
				</div>
			</div>
		</div>
	</div>
</section>