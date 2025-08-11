<?php /* Template Name: Home */ ?>

<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

get_header(); ?>



<?php
Templates::getPart('home/hero');
Templates::getPart('projects');
Templates::getPart('services', ['page_id' => get_option('page_on_front'), 'posts_per_page' => 8]);
Templates::getPart('home/video');
Templates::getPart('home/engineers');
Templates::getPart('home/vision');
Templates::getPart('testimonials');
Templates::getPart('faq');
Templates::getPart('home/article');
?>




<?php get_footer(); ?>