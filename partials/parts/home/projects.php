<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

// Get projects for home page
Templates::getPart('projects', [
    'page_id' => get_option('page_on_front'),
    'posts_per_page' => 4
]);
