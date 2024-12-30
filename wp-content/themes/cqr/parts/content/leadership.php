<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="team block"
         data-aoz="zoom-in">
	<div class="container">
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
		<?php if ( ! empty( $section['leadership'] ) ): ?>
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 col-xl-5">
					<div class="card card--white pb-0">
						<div class="card-body">
							<?php
							if ( ! empty( $section['leadership']['image'] ) ) {
								$atts = [ 'class' => 'img-center', 'height' => 'auto' ];
								echo wp_get_attachment_image( $section['leadership']['image'], 'full', false, $atts );
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xl-5">
					<div class="card card--white">
						<div class="card-body">
							<?php if ( ! empty( $section['leadership']['title'] ) ): ?>
								<h5 class="card-title">
									<?php echo $section['leadership']['title']; ?>
								</h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['leadership']['position'] ) ): ?>
								<p class="card-text">
									<?php echo $section['leadership']['position']; ?>
								</p>
							<?php endif; ?>
							<?php if ( ! empty( $section['leadership']['socials'] ) ): ?>
								<nav class="socials">
									<?php foreach ( $section['leadership']['socials'] as $social ): ?>
										<a href="<?php echo $social['url']; ?>"
										   target="_blank">
											<?php if ( ! empty( $social['image'] ) ): ?>
												<?php
												echo wp_get_attachment_image( $social['image'], 'full' );
												?>
											<?php endif; ?>
										</a>
									<?php endforeach; ?>
								</nav>
							<?php endif; ?>
							<br>
							<?php if ( ! empty( $section['leadership']['description'] ) ): ?>
								<p class="card-text">
									<?php echo $section['leadership']['description']; ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
