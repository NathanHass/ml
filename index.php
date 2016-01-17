<?php
$context = Timber::get_context();
$post = new TimberPost();

$args = array(
    'post_type' => 'partners',
);

$context['options'] = get_fields('options');
$context['partners'] = Timber::get_posts($args);

Timber::render('index.twig', $context);
