<?php

	if (!class_exists('Timber')){
		add_action( 'admin_notices', function(){
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
		});
		return;
	}

	class StarterSite extends TimberSite {

		function __construct(){
			add_theme_support('post-formats');
			add_theme_support('post-thumbnails');
			add_theme_support('menus');
			add_filter('timber_context', array($this, 'add_to_context'));
			add_filter('get_twig', array($this, 'add_to_twig'));
			// add_action('pre_get_posts', 'wpa84258_admin_posts_sort_last_name');
			add_action('init', array($this, 'register_post_types'));
			add_action('init', array($this, 'register_taxonomies'));
			add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
			parent::__construct();
		}

		function my_embed_oembed_html($html, $url, $attr, $post_id) {
		  return '<div class="video-container">' . $html . '</div>';
		}

		function register_post_types(){
			register_post_type( 'news', array(
					'labels' => array(
						'name' => __( 'News' ) ,
						'singular_name' => __( 'News Item' ) ,
						'edit_item' => __( 'Edit News' )
					) ,
					'with_front' => false,
					'menu_position' => 13,
					'public' => true,
					'has_archive' => true,
					'supports' => array(
						'title',
						'revisions',
					) ,
					'rewrite' => array(
						'slug' => 'news'
					),
					'menu_icon' => 'dashicons-format-quote'
				) );
			register_post_type( 'news', array(
					'labels' => array(
						'name' => __( 'News' ) ,
						'singular_name' => __( 'News Item' ) ,
						'edit_item' => __( 'Edit News' )
					) ,
					'with_front' => false,
					'menu_position' => 13,
					'public' => true,
					'has_archive' => true,
					'supports' => array(
						'title',
						'revisions',
					) ,
					'rewrite' => array(
						'slug' => 'news'
					),
					'menu_icon' => 'dashicons-format-quote'
				) );
			register_post_type( 'jobs', array(
					'labels' => array(
						'name' => __( 'Current Jobs' ) ,
						'singular_name' => __( 'Job' ) ,
						'edit_item' => __( 'Edit Job' )
					) ,
					'with_front' => false,
					'menu_position' => 21,
					'public' => true,
					'has_archive' => true,
					'supports' => array(
						'title',
						'revisions',
					) ,
					'rewrite' => array(
						'slug' => 'jobs'
					),
					'menu_icon' => 'dashicons-hammer'
				) );
			register_post_type( 'products', array(
					'labels' => array(
						'name' => __( 'Products' ) ,
						'singular_name' => __( 'Product' ) ,
						'edit_item' => __( 'Edit Product' )
					) ,
					'with_front' => false,
					'menu_position' => 21,
					'public' => true,
					'has_archive' => true,
					'supports' => array(
						'title',
						'revisions',
						'thumbnail',
					) ,
					'rewrite' => array(
						'slug' => 'products'
					),
					'menu_icon' => 'dashicons-pressthis'
				) );
			register_post_type( 'partners', array(
					'labels' => array(
						'name' => __( 'Partners' ) ,
						'singular_name' => __( 'Partner' ) ,
						'edit_item' => __( 'Edit Partner' )
					) ,
					'with_front' => false,
					'menu_position' => 21,
					'public' => true,
					'has_archive' => true,
					'supports' => array(
						'title',
						'revisions',
					) ,
					'rewrite' => array(
						'slug' => 'partners'
					),
					'menu_icon' => 'dashicons-businessman'
				) );


		}

		function register_taxonomies(){
			//this is where you can register custom taxonomies
		}

		function add_to_context($context){
			$context['stuff'] = 'I am a value set in your functions.php file';
			$context['notes'] = 'These values are available everytime you call Timber::get_context();';
			$context['primary_nav'] = new TimberMenu('Primary Nav');
			$context['footer_nav'] = new TimberMenu('Footer Nav');
			$args = array(
			    'post_type' => 'products',
			);
			$context['products'] = Timber::get_posts($args);
			$context['site'] = $this;
			return $context;
		}

		function add_to_twig($twig){
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
			return $twig;
		}

	}

	new StarterSite();

	function myfoo($text){
    	$text .= ' bar!';
    	return $text;
	}


	Timber::add_route('guests', function($params){
          Timber::load_view('guests.php', null, 200, $params);
    });

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
		}

		function annointed_admin_bar_remove() {
		        global $wp_admin_bar;

		        /* Remove their stuff */
		        $wp_admin_bar->remove_menu('wp-logo');
		}

		function remove_menus(){
		  remove_menu_page( 'edit-comments.php' );          //Comments

		}
		add_action( 'admin_menu', 'remove_menus' );



		add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( 'Homepage' );
			acf_add_options_page( 'Products Nav' );
			acf_add_options_page( 'Products Page' );
		}

		add_filter('upload_mimes', 'cc_mime_types');
