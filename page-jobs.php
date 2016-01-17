<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
    'post_type' => 'jobs',
);

$context['options'] = get_fields('options');
$context['jobs'] = Timber::get_posts($args);

Timber::render('page-jobs.twig', $context);
