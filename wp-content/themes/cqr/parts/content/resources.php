<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="block resources"
         data-aos="zoom-in">
	<div class="container">
		<div class="wrap wrap--green">
			<?php if ( ! empty( $section['subtitle'] ) ): ?>
				<div class="pre-title text-center">
					<?php echo $section['subtitle']; ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $section['title'] ) ): ?>
				<h2 class="text-center">
					<?php echo $section['title']; ?>
				</h2>
			<?php endif; ?>
			<?php if ( ! empty( $section['list'] ) ): ?>
				<div class="row">
					<?php foreach ( $section['list'] as $item ): ?>
						<div class="col-12 col-lg-4">
							<div class="card card--white">
								<div class="card-body">
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
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
