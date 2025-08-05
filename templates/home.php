<?php /* Template Name: Home */ ?>

<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

get_header(); ?>



<?php
Templates::getPart('home/hero');
Templates::getPart('home/projects');
Templates::getPart('home/services');
Templates::getPart('home/video');
Templates::getPart('home/engineers');
Templates::getPart('home/vision');
Templates::getPart('home/testimonials');
?>




<?php get_footer(); ?>