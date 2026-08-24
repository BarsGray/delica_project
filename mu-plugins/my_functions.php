<?php
/* Plugin Name: My Custom Functions */

if (!defined('ABSPATH')) {exit;}
if (!defined('_S_VERSION')) {define('_S_VERSION', '0.0.1');}
if (!defined('FRONT_PAGE')) {define('FRONT_PAGE', get_option('page_on_front'));}
if (!defined('TEMPLATE_URL')) {define('TEMPLATE_URL', get_template_directory_uri());}

if (!defined('SVG_PHONE')) {define('SVG_PHONE', '<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.74562 6.20156C7.23384 4.61058 9.13097 3.67252 10.9826 4.10562L14.5289 4.93512C15.9554 5.26878 17.0098 6.31491 17.1906 7.57671L17.6547 10.8148C17.807 11.8782 17.3126 12.9236 16.3609 13.5885L16.1646 13.7161L15.2019 14.2987C14.4756 14.7385 14.263 15.5863 14.7126 16.254L16.5318 18.9563L16.6217 19.0763C17.1007 19.6539 17.9954 19.869 18.7537 19.5693L19.8238 19.146C21.0246 18.6714 22.4363 18.8042 23.5005 19.4913L26.5408 21.4546C27.7257 22.2196 28.2567 23.5246 27.8808 24.7502L26.945 27.7976C26.457 29.3884 24.5606 30.3275 22.7087 29.8945C10.7378 27.0944 3.59065 16.4864 6.74562 6.20156ZM8.56587 6.62733C5.67584 16.0485 12.2228 25.7657 23.1884 28.3306C24.0347 28.5284 24.9017 28.0992 25.1248 27.3718L26.0605 24.3245C26.2403 23.7383 25.9866 23.114 25.4201 22.7482L22.3786 20.7854C21.8696 20.4568 21.1952 20.3934 20.6214 20.6199L19.5514 21.0432L19.5503 21.0438C17.86 21.7116 15.8454 21.1557 14.9057 19.7609L13.0865 17.0586C12.1475 15.6647 12.5898 13.8918 14.111 12.9706L15.0736 12.388L15.1677 12.3265C15.593 12.0293 15.8273 11.5741 15.7976 11.1023L15.7869 11.0007L15.3219 7.7624C15.2354 7.15892 14.7314 6.65856 14.0491 6.49898L10.5029 5.66949C9.65627 5.47147 8.78907 5.90027 8.56587 6.62733Z" fill="#383838"/></svg>');}
if (!defined('SVG_MENU_BTN')) {define('SVG_MENU_BTN', '<svg class="ham hamRotate ham7" viewBox="0 0 100 100" width="35"><path class="line top" d="m 63,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013"></path><path class="line middle" d="m 70,50 h -40"></path><path class="line bottom" d="m 63.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40"></path></svg>');}
if (!defined('SVG_BREAD_BTN')) {define('SVG_BREAD_BTN', '<svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 11L1 6L6 1M1 6H14" stroke="#383838" stroke-linecap="round" stroke-linejoin="round"/></svg>');}

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

// add_filter('site_transient_update_plugins','filter_plugin_updates');
// function filter_plugin_updates($value){
// 	unset($value->response['all-in-one-seo-pack/all_in_one_seo_pack.php']);
// 	return $value;
// }

add_action('admin_head','admin_head');
function admin_head(){
	echo '<style type="text/css">#wpwrap #edittag{max-width:100%;}.term-description-wrap{display:none;}</style>';
}

function breadcrumbs($sep = ' / ', $args = array(), $l10n = array())
{
	static $inst;
	if (!$inst)
		$inst = new Breadcrumbs();
	if (is_array($sep)) {
		$args = $sep;
		$sep = isset($args['sep']) ? $args['sep'] : ' / ';
	}
	echo $inst->get_crumbs($sep, $l10n, $args);
}

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
