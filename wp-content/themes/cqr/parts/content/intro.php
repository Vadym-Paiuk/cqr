<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="intro block"
         id="<?php echo $section['id']; ?>">
	<?php
	if ( ! empty( $section['image'] ) ) {
		$atts = [ 'class' => 'intro__bg' ];
		echo wp_get_attachment_image( $section['image'], 'full', false, $atts );
	}
	?>
	<div class="container">
		<?php if ( ! empty( $section['title'] ) ): ?>
			<h1 class="intro__title"
			    data-aos="fade-left"
			    data-aos-delay="400">
				<?php echo $section['title']; ?>
			</h1>
		<?php endif; ?>
		<?php if ( ! empty( $section['description'] ) ): ?>
			<p class="intro__subtitle text-center"
			   data-aos="fade-up"
			   data-aos-delay="400">
				<?php echo $section['description']; ?>
			</p>
		<?php endif; ?>
		<?php if ( ! empty( $section['companies'] ) ): ?>
			<div class="intro__trusted text-center">
				<div class="trusted"
				     data-aos="zoom-in">
					<?php if ( ! empty( $section['companies']['title'] ) ): ?>
						<p class="text-center text-secondary">
							<?php echo $section['companies']['title']; ?>
						</p>
					<?php endif; ?>
					<?php if ( ! empty( $section['companies']['list'] ) ): ?>
						<div class="trusted__row row justify-content-center">
							<?php foreach ( $section['companies']['list'] as $company ): ?>
								<div class="col-auto">
									<div class="company">
										<?php
										if ( ! empty( $company['image'] ) ) {
											echo wp_get_attachment_image( $company['image'], 'full' );
										}
										?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $section['link'] ) ): ?>
			<div class="intro__btn text-center">
				<a class="btn btn-primary btn-arrow"
				   href="<?php echo $section['link']['url']; ?>"
				   target="<?php echo $section['link']['target']; ?>"
				   data-aos="flip-up"><?php echo $section['link']['title']; ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>
