<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
    'post_type' => 'leadership',
);

$args2 = array(
    'post_type' => 'advisors',
);

$context['options'] = get_fields('options');
$context['leaders'] = Timber::get_posts($args);
$context['advisors'] = Timber::get_posts($args2);

Timber::render('page-team.twig', $context);
