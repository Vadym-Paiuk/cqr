<div class="col-12 col-md-4">
	<div class="card card--green">
		<div class="card-body">
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
			<p class="card-text"><?php echo get_the_excerpt(); ?></p>
		</div>
		<div class="card-footer">
			<a class="link link-arrow"
			   href="<?php the_permalink(); ?>">Read more
			</a>
		</div>
	</div>
</div>