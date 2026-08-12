<?php
/* Plugin Name: My Custom Functions */

if (!defined('ABSPATH')) {exit;}
if (!defined('_S_VERSION')) {define('_S_VERSION', '0.0.1');}
if (!defined('FRONT_PAGE')) {define('FRONT_PAGE', get_option('page_on_front'));}
if (!defined('TEMPLATE_URL')) {define('TEMPLATE_URL', get_template_directory_uri());}

// if (!defined('SVG_PHONE')) {define('SVG_PHONE', '<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 5.29536C3 4.02755 4.02776 3.00001 5.29536 3H7.50403C8.47711 3.00008 9.35232 3.59248 9.71371 4.49597L10.5605 6.6119C10.8854 7.42416 10.7376 8.34914 10.1784 9.02016L9.72278 9.56653C9.44832 9.89634 9.47069 10.382 9.7752 10.6865L11.3135 12.2258C11.6174 12.5297 12.1029 12.5516 12.4335 12.2762L12.9798 11.8206C13.6514 11.2609 14.5757 11.1151 15.3871 11.4395L17.504 12.2863L17.6694 12.3599C18.4791 12.7573 19 13.5836 19 14.496V16.7046L18.9879 16.9395C18.8703 18.0967 17.8931 18.9999 16.7046 19C9.13601 19 3.00006 12.8641 3 5.29536ZM4.54839 5.29536C4.54845 12.009 9.99119 17.4516 16.7046 17.4516C17.1169 17.4515 17.4516 17.1173 17.4516 16.7046V14.496C17.4516 14.156 17.2449 13.8502 16.9294 13.7238L14.8125 12.877C14.5289 12.7636 14.2062 12.8149 13.9718 13.0101L13.4254 13.4657C12.5391 14.2043 11.2607 14.1961 10.3871 13.4748L10.2177 13.3206L8.67944 11.7812C7.80976 10.9114 7.74484 9.52073 8.53327 8.5746L8.98891 8.02823C9.16022 7.82257 9.22146 7.54983 9.15827 7.29536L9.12298 7.1875L8.27621 5.07157C8.14996 4.75593 7.84394 4.54847 7.50403 4.54839H5.29536C4.88273 4.54839 4.54839 4.88288 4.54839 5.29536Z" fill="#282828" /></svg>');}
// if (!defined('SVG_MENU_BTN')) {define('SVG_MENU_BTN', '<svg class="ham hamRotate ham7" viewBox="0 0 100 100" width="40"><path class="line top" d="m 63,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013" /><path class="line middle" d="m 70,50 h -40" /><path class="line bottom" d="m 63.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40" /></svg>');}

add_filter('wp_speculation_rules_configuration',function(){return null;});
add_filter('wp_img_tag_add_auto_sizes','__return_false');
add_action('after_setup_theme', function() { add_theme_support( 'html5', [ 'script', 'style' ] ); } );

add_theme_support('post-thumbnails');
// add_image_size( 'custom-gallery-thumb_10_7', 1024, 720, true );
// add_image_size( 'custom-gallery-thumb_5_3', 500, 300, true );
// // add_image_size( 'custom-gallery-thumb_35_30', 350, 300, true );
// add_image_size( 'custom-gallery-thumb_40_30', 400, 300, true );
register_nav_menus();

add_action('wp_enqueue_scripts', 'tehmonolit_th_scripts_style');
function tehmonolit_th_scripts_style()
{
	wp_enqueue_script('swiper', TEMPLATE_URL . '/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox', TEMPLATE_URL . '/js/fancybox.umd.js', array('jquery'), null, true);
	wp_enqueue_script('main', TEMPLATE_URL . '/js/main.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_style('swiper-bundle', TEMPLATE_URL . '/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('fancybox', TEMPLATE_URL . '/css/fancybox.css', array(), null, 'all');
	wp_enqueue_style('tehmonolit_th-style', get_stylesheet_uri(), array(), _S_VERSION);
}

add_filter('site_transient_update_plugins','filter_plugin_updates');
function filter_plugin_updates($value){
	unset($value->response['all-in-one-seo-pack/all_in_one_seo_pack.php']);
	return $value;
}

add_action('admin_head','admin_head');
function admin_head(){
	echo '<style type="text/css">#wpwrap #edittag{max-width:100%;}.term-description-wrap{display:none;}</style>';
}

// function breadcrumbs($sep = ' • ', $args = array(), $l10n = array())
// {
// 	static $inst;
// 	if (!$inst)
// 		$inst = new Breadcrumbs();
// 	if (is_array($sep)) {
// 		$args = $sep;
// 		$sep = isset($args['sep']) ? $args['sep'] : ' • ';
// 	}
// 	echo $inst->get_crumbs($sep, $l10n, $args);
// }

// add_action('kama_breadcrumbs_home_after','add_tax_custom',10,5);
// function add_tax_custom($false,$linkpatt,$sep,$ptype,$q_obj){
// 	if(!is_search()){
// 		$data_taxs=array(
// 			'service' => 11,
// 		);
// 		foreach($data_taxs as $post_type=>$id_page){
// 			if(isset($ptype->name) && $ptype->name==$post_type){
// 				$page=get_post($id_page);
// 				if($q_obj->name==$post_type)
// 					return $home_after=sprintf($linkpatt,get_permalink($page),$page->post_title); 
// 				else
// 					return $home_after=sprintf($linkpatt,get_permalink($page),$page->post_title) . $sep;
// 			}
// 		}
// 	}
// }


function merge_numbers($num) {
  return str_replace([' ', '-', '(', ')'],'',(string) ($num ?? ''));
}

// function register_avtopark()
// {
// 	$post_labels = array(
// 		'name' => 'Автопарк',
// 		'singular_name' => 'Услуга',
// 		'add_new' => 'Добавить новую',
// 		'add_new_item' => 'Добавить новую услугу',
// 		'edit_item' => 'Редактировать услугу',
// 		'menu_name' => 'Автопарк'
// 	);

// 	$post_args = array(
// 		'labels' => $post_labels,
// 		'public' => true,
// 		'has_archive' => 'services',
// 		'menu_position' => 5,
// 		'menu_icon' => 'dashicons-admin-network',
// 		'supports' => array('title', 'editor', 'thumbnail'),
// 		'rewrite' => array('slug' => 'services'),
// 		'show_in_rest' => true,
// 		'capability_type' => 'post',
// 	);

// 	register_post_type('service', $post_args);
// }
// add_action('init', 'register_avtopark');
