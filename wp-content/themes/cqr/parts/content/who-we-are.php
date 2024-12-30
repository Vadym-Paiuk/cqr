<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="we block">
	<div class="container">
		<div class="wrap wrap--green"
		     data-aos="zoom-in">
			<div class="row">
				<div class="col-12 col-xl-4 align-self-center">
					<?php if ( ! empty( $section['subtitle'] ) ): ?>
						<div class="pre-title text-center">
							<?php echo $section['subtitle']; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $section['title'] ) ): ?>
						<h3 class="text-center mb-0">
							<?php echo $section['title']; ?>
						</h3>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $section['list'] ) ): ?>
					<?php foreach ( $section['list'] as $item ): ?>
						<div class="col-12 col-md-6 col-xl-4">
							<div class="card card--green">
								<div class="card-body">
									<?php if ( ! empty( $item['description'] ) ): ?>
										<p class="card-text">
											<?php echo $item['description']; ?>
										</p>
									<?php endif; ?>
								</div>
								<div class="card-footer">
									<div class="text-center">
										<?php
										if ( ! empty( $item['image'] ) ) {
											$atts = [ 'class' => 'img-circled' ];
											echo wp_get_attachment_image( $item['image'], 'full', false, $atts );
										}
										?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>