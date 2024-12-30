<div class="col-12">
	<div class="card card--green">
		<div class="card-body">
			<div class="row">
				<div class="col-12 col-md-6">
					<?php
					$attr = [ 'class' => 'card-img mb-0' ];
					the_post_thumbnail( 'full', $attr );
					?>
				</div>
				<div class="col-12 col-md-6">
					<p><span class="badge">News</span></p>
					<h4 class="card-title"><?php the_title(); ?></h4>
					<p class="card-text">
						<?php echo get_the_excerpt(); ?>
					</p>
					<a class="btn btn-primary btn-arrow"
					   href="<?php the_permalink(); ?>">LEARN MORE</a>
				</div>
			</div>
		</div>
	</div>
</div>