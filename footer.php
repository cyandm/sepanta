<?php

/**
 * Footer for wordpress theme
 * its must include only footer tag
 * footer templates located in /partials/footer/
 * @package CyanTheme
 */

use Cyan\Theme\Helpers\Templates;

$render_template = $args['render_template'] ?? true;
?>

<?php if ($render_template) : ?>
	<footer class="container my-14 max-md:my-8">
		<?php Templates::getPart('footer'); ?>
	</footer>
<?php endif; ?>

<div id="wp-footer">
	<?php wp_footer(); ?>
</div>

</body>

</html>