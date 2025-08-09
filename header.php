<?php

/**
 * Header for wordpress theme
 * its must include only head and body tags
 * header templates located in /partials/header/
 * @package CyanTheme
 */

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$render_template = $args['render_template'] ?? true;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body class="overflow-x-hidden">
	<?php wp_body_open(); ?>

	<?php if ($render_template) : ?>

		<div class="icon hidden size-6" id="chevron-down">
			<?php Icon::print('Arrow-28') ?>
		</div>

		<header class="container mt-9 max-md:mt-6 mb-6">
			<?php Templates::getPart('header-desktop'); ?>
			<?php Templates::getPart('header-mobile'); ?>
		</header>
	<?php endif; ?>