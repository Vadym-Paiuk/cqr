<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="services block">
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
		
		<?php if ( ! empty( $section['tabs'] ) ): ?>
			<div class="services__categories">
				<div class="swiper swiper-feature-service-categories">
					<div class="swiper-navigation">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
					<div class="swiper-wrapper">
						<?php foreach ( $section['tabs'] as $tab ): ?>
							<?php if ( empty( $tab['title'] ) ) {
								continue;
							} ?>
							<div class="swiper-slide">
								<div class="tab-btn">
									<div class="tab-btn-content">
										<?php echo $tab['title']; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="services__details">
				<div class="swiper swiper-feature-service-details">
					<div class="swiper-wrapper">
						<?php foreach ( $section['tabs'] as $tab ): ?>
							<?php if ( empty( $tab['title'] ) ) {
								continue;
							} ?>
							<div class="swiper-slide">
								<?php $row_reverse = false; ?>
								<?php foreach ( $tab['list'] as $key => $item ): ?>
									<?php if ( $key % 3 === 0 && $key !== 0 ) {
										echo '</div>';
										$row_reverse = ! $row_reverse;
									} ?>
									<?php if ( $key % 3 === 0 ) {
										echo '<div class="services__wraps">';
									} ?>
									<div class="wrap wrap--green services__wrap">
										<div class="row <?php if ( $row_reverse ) {
											echo 'row-reverse';
										} ?>">
											<div class="col-12 col-md-6">
												<?php if ( ! empty( $item['title'] ) ): ?>
													<h3 class="mb-0">
														<?php echo $item['title']; ?>
													</h3>
												<?php endif; ?>
											</div>
											<div class="col-12 col-md-6">
												<?php if ( ! empty( $item['features'] ) ): ?>
													<ul class="check-list">
														<?php foreach ( $item['features'] as $feature ): ?>
															<li>
																<?php if ( ! empty( $feature['title'] ) ): ?>
																	<b><?php echo $feature['title']; ?></b>
																<?php endif; ?>
																<?php if ( ! empty( $feature['description'] ) ): ?>
																	<?php echo $feature['description']; ?>
																<?php endif; ?>
															</li>
														<?php endforeach; ?>
													</ul>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<?php echo '</div>'; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
