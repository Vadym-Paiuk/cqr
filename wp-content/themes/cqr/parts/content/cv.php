<?php
$section = $args;

if ( empty( $section ) ) {
	return;
}
?>

<section class="vacancy block">
	<div class="container">
		<?php if ( ! empty( $section['title'] ) ): ?>
			<h2 class="h3 text-center">
				<?php echo $section['title']; ?>
			</h2>
		<?php endif; ?>
		<?php if ( ! empty( $section['description'] ) ): ?>
			<div class="text-center">
				<?php echo $section['description']; ?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $section['link'] ) ): ?>
			<div class="text-center">
				<a class="btn btn-primary btn-arrow"
				   href="<?php echo $section['link']['url']; ?>"
				   target="<?php echo $section['link']['target']; ?>"><?php echo $section['link']['title']; ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>
