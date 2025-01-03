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
					<p id="start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper mattis lorem non. Ultrices praesent amet ipsum justo massa. Eu dolor aliquet risus gravida nunc at feugiat consequat purus. Non massa enim vitae duis mattis. Vel in ultricies vel fringilla.</p>
					<hr>
					<h3 id="introduction">Introduction</h3>
					<p>Mi tincidunt elit, id quisque ligula ac diam, amet. Vel etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id. Eget quis mi enim, leo lacinia pharetra, semper. Eget in volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat. </p>
					<p><img class="img-center"
					        src="img/blog-img-2.jpg"
					        alt=""></p>
					<blockquote>
						<p class="text-uppercase">“In a world older and more complete than ours they move finished and complete, gifted with extensions of the senses we have lost or never attained, living by voices we shall never hear.”</p>
						<div><small> <i>— Olivia Rhye, Product Designer</i></small></div>
					</blockquote>
					<p>Dolor enim eu tortor urna sed duis nulla. Aliquam vestibulum, nulla odio nisl vitae. In aliquet pellentesque aenean hac vestibulum turpis mi bibendum diam. Tempor integer aliquam in vitae malesuada fringilla.<br>Elit nisi in eleifend sed nisi. Pulvinar at orci, proin imperdiet commodo consectetur convallis risus. Sed condimentum enim dignissim adipiscing faucibus consequat, urna. Viverra purus et erat auctor aliquam. Risus, volutpat vulputate posuere purus sit congue convallis aliquet. Arcu id augue ut feugiat donec porttitor neque. Mauris, neque ultricies eu vestibulum, bibendum quam lorem id. Dolor lacus, eget nunc lectus in tellus, pharetra, porttitor.<br>Ipsum sit mattis nulla quam nulla. Gravida id gravida ac enim mauris id. Non pellentesque congue eget consectetur turpis. Sapien, dictum molestie sem tempor. Diam elit, orci, tincidunt aenean tempus. Quis velit eget ut tortor tellus. Sed vel, congue felis elit erat nam nibh orci.
					</p>
					<h3 id="software">Software and tools</h3>
					<p>Pharetra morbi libero id aliquam elit massa integer tellus. Quis felis aliquam ullamcorper porttitor. Pulvinar ullamcorper sit dictumst ut eget a, elementum eu. Maecenas est morbi mattis id in ac pellentesque ac.</p>
					<h3 id="other">Other resources</h3>
					<p>Sagittis et eu at elementum, quis in. Proin praesent volutpat egestas sociis sit lorem nunc nunc sit. Eget diam curabitur mi ac. Auctor rutrum lacus malesuada massa ornare et. Vulputate consectetur ac ultrices at diam dui eget fringilla tincidunt. Arcu sit dignissim massa erat cursus vulputate gravida id. Sed quis auctor vulputate hac elementum gravida cursus dis.</p>
					<ol>
						<li>Lectus id duis vitae porttitor enim gravida morbi.</li>
						<li>Eu turpis posuere semper feugiat volutpat elit, ultrices suspendisse. Auctor vel in vitae placerat.</li>
						<li>Suspendisse maecenas ac donec scelerisque diam sed est duis purus.</li>
					</ol>
					<p><img class="img-center"
					        src="img/blog-img-3.jpg"
					        alt=""></p>
					<p>Lectus leo massa amet posuere. Malesuada mattis non convallis quisque. Libero sit et imperdiet bibendum quisque dictum vestibulum in non. Pretium ultricies tempor non est diam. Enim ut enim amet amet integer cursus. Sit ac commodo pretium sed etiam turpis suspendisse at.<br>Tristique odio senectus nam posuere ornare leo metus, ultricies. Blandit duis ultricies vulputate morbi feugiat cras placerat elit. Aliquam tellus lorem sed ac. Montes, sed mattis pellentesque suscipit accumsan. Cursus viverra aenean magna risus elementum faucibus molestie pellentesque. Arcu ultricies sed mauris vestibulum.
					</p>
					<h3 id="conclusion">Conclusion</h3>
					<p>Morbi sed imperdiet in ipsum, adipiscing elit dui lectus. Tellus id scelerisque est ultricies ultricies. Duis est sit sed leo nisl, blandit elit sagittis. Quisque tristique consequat quam sed. Nisl at scelerisque amet nulla purus habitasse.<br>Nunc sed faucibus bibendum feugiat sed interdum. Ipsum egestas condimentum mi massa. In tincidunt pharetra consectetur sed duis facilisis metus. Etiam egestas in nec sed et. Quis lobortis at sit dictum eget nibh tortor commodo cursus.<br>Odio felis sagittis, morbi feugiat tortor vitae feugiat fusce aliquet. Nam elementum urna nisi aliquet erat dolor enim. Ornare id morbi eget ipsum. Aliquam senectus neque ut id eget consectetur dictum. Donec posuere pharetra odio consequat scelerisque et, nunc tortor.<br>Nulla adipiscing erat a erat. Condimentum lorem posuere gravida enim posuere cursus diam.
					</p>
					<hr>
				</div>
			</div>
		</div>
	</div>
</section>