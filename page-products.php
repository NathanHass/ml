<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
    'post_type' => 'products',
);

$context['options'] = get_fields('options');
$context['products'] = Timber::get_posts($args);

Timber::render('page-products.twig', $context);
