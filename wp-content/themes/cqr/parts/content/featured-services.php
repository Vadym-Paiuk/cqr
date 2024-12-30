<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="industries block">
	<div class="container">
		<?php if ( ! empty( $section['subtitle'] ) ): ?>
			<div class="pre-title text-center"
			     data-aos="fade-down">
				<?php echo $section['subtitle']; ?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $section['title'] ) ): ?>
			<h2 class="text-center"
			    data-aos="fade-up">
				<?php echo $section['title']; ?>
			</h2>
		<?php endif; ?>
		<?php if ( ! empty( $section['list'] ) ): ?>
			<div class="industries__categories">
				<div class="swiper swiper-industries-categories">
					<div class="swiper-navigation">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
					<div class="swiper-wrapper">
						<?php foreach ( $section['list'] as $item ): ?>
							<?php if ( ! empty( $item['title'] ) ): ?>
								<div class="swiper-slide">
									<div class="tab-btn">
										<div class="tab-btn-content">
											<?php echo $item['title']; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="industries__details">
				<div class="swiper swiper-industries-details">
					<div class="swiper-wrapper">
						<?php foreach ( $section['list'] as $item ): ?>
							<div class="swiper-slide">
								<?php if ( ! empty( $item['title'] ) ): ?>
									<h3>
										<?php echo $item['title']; ?>
									</h3>
								<?php endif; ?>
								<div class="row align-items-center">
									<div class="col-12 col-md-6">
										<?php if ( ! empty( $item['features'] ) ): ?>
											<ul class="check-list">
												<?php foreach ( $item['features'] as $feature ): ?>
													<li>
														<?php if ( ! empty( $feature['title'] ) ): ?>
															<h4>
																<?php echo $feature['title']; ?>
															</h4>
														<?php endif; ?>
														<?php if ( ! empty( $feature['description'] ) ): ?>
															<p>
																<?php echo $feature['description']; ?>
															</p>
														<?php endif; ?>
													</li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
									<div class="col-12 col-md-6">
										<div class="text-center">
											<?php
											if ( ! empty( $item['image'] ) ) {
												echo wp_get_attachment_image( $item['image'], 'full' );
											}
											?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
