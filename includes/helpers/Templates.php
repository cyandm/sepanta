<?php

/**
 * Templates helper
 * for every folder on partial you must create a function
 * @package CyanTheme
 */

namespace Cyan\Theme\Helpers;

class Templates
{

	public static function getPart($partial, $args = [])
	{
		get_template_part('partials/parts/' . $partial, null, $args);
	}

	public static function getCard($partial)
	{
		get_template_part('partials/cards/' . $partial);
	}

	public static function getPopup($partial, $args = [])
	{
		get_template_part('partials/popups/' . $partial, null, $args);
	}
}
