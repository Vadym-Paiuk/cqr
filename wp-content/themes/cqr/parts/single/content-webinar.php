<?php
$assets_pass = get_template_directory_uri() . '/assets/build/';

$fields = get_field( 'fields' );
?>

<section class="intro block"><img class="intro__bg"
                                  src="<?php echo $assets_pass; ?>img/blog-intro-bg.svg"
                                  alt="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10">
				<div class="card card--green"
				     data-aos="zoom-in">
					<div class="card-body">
						<p><span class="badge">Webinar</span></p>
						<p>
							<img class="text-icon"
							     src="<?php echo $assets_pass; ?>img/calendar.svg"
							     alt="">
							<?php the_date( 'd M Y' ); ?>
						</p>
						<h4 class="card-title"><?php the_title(); ?></h4>
						<?php if ( ! empty( $fields['video'] ) ): ?>
							<video class="video-cover"
							       poster="<?php echo get_the_post_thumbnail_url( null, 'full' ); ?>"
							       controls
							       preload="none">
								<source src="<?php echo $fields['video']; ?>"
								        type="video/mp4"/>
							</video>
						<?php endif; ?>
						<!--<picture class="video-cover">
							<source srcset="img/blog-img-3-wide.jpg"
							        media="(min-width: 992px)">
							<img class="card-img mb-0"
							     src="img/blog-img-3.jpg"
							     alt=""></picture>-->
						<?php if ( ! empty( $fields['description'] ) ): ?>
							<p class="card-text"><?php echo $fields['description']; ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10">
				<div class="text-right">
					<nav class="socials">
						<a href="<?php linkedin_social_button(); ?>"
						   target="_blank">
							<img src="<?php echo $assets_pass; ?>img/linkedin-green.svg"
							     alt="">
						</a>
						<a href="<?php facebook_social_button(); ?>"
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
		</div>
	</div>
</section>