<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
    'post_type' => 'news',
    'paged' => $paged
);

query_posts($args);

$context['pagination'] = Timber::get_pagination();
$context['options'] = get_fields('options');
$context['posts'] = Timber::get_posts($args);

Timber::render('page-news.twig', $context);
