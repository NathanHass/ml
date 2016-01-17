<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
    'post_type' => 'post'
);

$context['options'] = get_fields('options');
$context['posts'] = Timber::get_posts($args);

Timber::render('page-blog.twig', $context);
