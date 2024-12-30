<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>
	
	<section class="intro block"
	         id="contacts">
		<div class="container">
			<?php if ( ! empty( $section['title'] ) ): ?>
				<h1 class="text-center"
				    data-aos="fade-left">
					<?php echo $section['title']; ?>
				</h1>
			<?php endif; ?>
			<?php if ( ! empty( $section['subtitle'] ) ): ?>
				<p class="intro__subtitle text-center"
				   data-aos="fade-up"
				   data-aos-delay="400">
					<?php echo $section['subtitle']; ?>
				</p>
			<?php endif; ?>
			<div class="text-center">
				<picture>
					<source srcset="img/map-mob.png"
					        media="(max-width: 575px)">
					<?php
					if ( ! empty( $section['image_mobile'] ) ) {
						echo '<source srcset="' . wp_get_attachment_image_src( $section['image_mobile'], 'full' )[0] . '"media="(max-width: 575px)">';
					}
					
					if ( ! empty( $section['image'] ) ) {
						echo wp_get_attachment_image( $section['image'], 'full' );
					}
					?>
				</picture>
			</div>
			<div class="row">
				<?php if ( ! empty( $section['location'] ) ): ?>
					<div class="col-12 col-md-4">
						<div class="contact">
							<?php if ( ! empty( $section['location']['title'] ) ): ?>
								<h5 class="contact-title"><?php echo $section['location']['title']; ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['location']['description'] ) ): ?>
								<h5 class="contact-text"><?php echo $section['location']['description']; ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['location']['link'] ) ): ?>
								<a class="contact-link link link-arrow"
								   href="<?php echo $section['location']['link']['url']; ?>"
								   target="<?php echo $section['location']['link']['target']; ?>">
									<?php echo $section['location']['link']['title']; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $section['email_us'] ) ): ?>
					<div class="col-12 col-md-4">
						<div class="contact">
							<?php if ( ! empty( $section['email_us']['title'] ) ): ?>
								<h5 class="contact-title"><?php echo $section['email_us']['title']; ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['email_us']['email'] ) ): ?>
								<h5 class="contact-text"><?php echo $section['email_us']['email']; ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['email_us']['link'] ) ): ?>
								<a class="contact-link link link-arrow"
								   href="mailto:<?php echo $section['email_us']['email']; ?>">
									<?php echo $section['email_us']['link']; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $section['phone'] ) ): ?>
					<div class="col-12 col-md-4">
						<div class="contact">
							<?php if ( ! empty( $section['phone']['title'] ) ): ?>
								<h5 class="contact-title"><?php echo $section['phone']['title']; ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['phone']['tel'] ) ): ?>
								<h5 class="contact-text"><?php echo $section['phone']['tel']; ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $section['phone']['link'] ) ): ?>
								<?php
								$clean_phone = preg_replace( '/\D/', '', $section['phone']['tel'] );
								?>
								<a class="contact-link link link-arrow"
								   href="tel:<?php echo $clean_phone; ?>">
									<?php echo $section['email_us']['link']; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php if ( ! empty( $section['contact_form'] ) ): ?>
	<section class="block">
		<div class="container">
			<div class="wrap wrap--white"
			     data-aos="zoom-in">
				<div class="row">
					<div class="col-12 col-md-6">
						<?php if ( ! empty( $section['contact_form']['subtitle'] ) ): ?>
							<div class="pre-title"><?php echo $section['contact_form']['subtitle']; ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $section['contact_form']['title'] ) ): ?>
							<h2 class="mb-0"><?php echo $section['contact_form']['title']; ?></h2>
						<?php endif; ?>
						<br>
						<?php if ( ! empty( $section['contact_form']['description'] ) ): ?>
							<div><?php echo $section['contact_form']['description']; ?></div>
						<?php endif; ?>
					</div>
					<div class="col-12 col-md-6">
						<?php
						if ( ! empty( $section['contact_form']['shortcode'] ) ) {
							echo do_shortcode( $section['contact_form']['shortcode'] );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>