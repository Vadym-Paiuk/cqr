<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="about block">
	<div class="container">
		<div class="wrap wrap--white"
		     data-aos="zoom-in">
			<div class="row align-items-center">
				<div class="col-12 col-md-6">
					<?php if ( ! empty( $section['subtitle'] ) ): ?>
						<div class="pre-title">
							<?php echo $section['subtitle']; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $section['title'] ) ): ?>
						<h2>
							<?php echo $section['title']; ?>
						</h2>
					<?php endif; ?>
					<?php if ( ! empty( $section['description'] ) ): ?>
						<p>
							<?php echo $section['description']; ?>
						</p>
					<?php endif; ?>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-center">
						<?php
						if ( ! empty( $section['image'] ) ) {
							echo wp_get_attachment_image( $section['image'], 'full' );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
