<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
    'post_type' => 'partners',
);

$context['options'] = get_fields('options');
$context['partners'] = Timber::get_posts($args);

Timber::render('page-partner.twig', $context);
