<?php
$context = Timber::get_context();

$args = array(
    'post_type' => 'post'
);

$context['posts'] = Timber::get_posts($args);

Timber::render('page-blog.twig', $context);
