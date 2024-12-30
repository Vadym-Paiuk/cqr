<?php $assets_pass = get_template_directory_uri() . '/assets/build/'; ?>

<div class="col-12 col-sm-6 col-lg-4">
	<a class="card card--green"
	   href="<?php the_permalink(); ?>">
		<div class="card-body">
			<?php
			$attr = [ 'class' => 'card-img' ];
			the_post_thumbnail( 'full', $attr );
			?>
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
			<h5 class="card-title"><?php the_title(); ?></h5>
			<p class="card-text"><?php echo get_the_excerpt(); ?></p>
		</div>
		<div class="card-footer"><img class="text-icon"
		                              src="<?php echo $assets_pass; ?>img/calendar.svg"
		                              alt=""> <?php the_date( 'd M Y' ); ?>
		</div>
	</a>
</div>