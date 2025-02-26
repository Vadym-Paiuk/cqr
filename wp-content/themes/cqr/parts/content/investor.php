<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="investors block"
         id="investors">
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
						<h3 class="text-center">
							<?php echo $section['title']; ?>
						</h3>
					<?php endif; ?>
					<?php if ( ! empty( $section['link'] ) ): ?>
						<div class="text-center">
							<a href="<?php echo $section['link']['url']; ?>"
							   target="<?php echo $section['link']['target']; ?>"
							   class="btn btn-primary btn-arrow"><?php echo $section['link']['title']; ?></a>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $section['list'] ) ): ?>
				<div class="col-xl-8">
					<div class="row">
						<?php foreach ( $section['list'] as $item ): ?>
						<div class="col-6 col-sm-4">
							<?php if ( ! empty( $item['link'] ) ): ?>
							<a href="<?php echo $item['link']; ?>"
							   target="_blank"
							   class="card card--white">
								<?php else: ?>
								<div class="card card--white">
									<?php endif; ?>
									<div class="card-body">
										<div class="investor">
											<?php
											if ( ! empty( $item['image'] ) ) {
												echo wp_get_attachment_image( $item['image'], 'full' );
											}
											?>
										</div>
									</div>
									<?php if ( ! empty( $item['link'] ) ): ?>
							</a>
							<?php else: ?>
						</div>
					<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	</div>
</section>