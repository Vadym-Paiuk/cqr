<div class="col-12 col-md-4">
	<div class="card card--green">
		<div class="card-body">
			<p><span class="badge">News</span></p>
			<p class="card-text"><?php echo get_the_excerpt(); ?></p>
		</div>
		<div class="card-footer">
			<a class="link link-arrow"
			   href="<?php the_permalink(); ?>">Read more
			</a>
		</div>
	</div>
</div>