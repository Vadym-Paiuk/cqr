<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="why block">
	<div class="container">
		<?php if ( ! empty( $section['title'] ) ): ?>
			<h2 class="text-center"
			    data-aos="fade-left">
				<?php echo $section['title']; ?>
			</h2>
		<?php endif; ?>
		<?php if ( ! empty( $section['list'] ) ): ?>
			<div class="row"
			     data-aos="zoom-in">
				<?php foreach ( $section['list'] as $item ): ?>
					<div class="col-12 col-md-6 col-lg-3">
						<div class="card card--green">
							<div class="card-body">
								<p class="card-text">
									<?php
									if ( ! empty( $item['image'] ) ) {
										echo wp_get_attachment_image( $item['image'], 'full' );
									}
									?>
								</p>
								<?php if ( ! empty( $item['title'] ) ): ?>
									<h5 class="card-title">
										<?php echo $item['title']; ?>
									</h5>
								<?php endif; ?>
								<?php if ( ! empty( $item['description'] ) ): ?>
									<p class="card-text">
										<?php echo $item['description']; ?>
									</p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>