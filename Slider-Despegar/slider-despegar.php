<?php
/*
Plugin Name: Slider-Despegar
Plugin URI: http://bootweb.com.ar
Description: Plugin para agregar el Slider de despegar
Version: 1.0
Author: Bootweb
Author URI: http://bootweb.com.ar
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if (isset($_GET['page']) && ($_GET['page'] == 'slider-despegar')){
	add_action('admin_print_scripts', 'spdespegar_admin_scripts');
	add_action('admin_print_styles', 'spdespegar_admin_styles'); 
}

if (!function_exists('spdespegar_slider_despegar_menu')){
	function spdespegar_slider_despegar_menu(){
		add_menu_page('Slider Despegar', 'Slider Despegar', 'read','slider-despegar', 'spdespegar_slider_despegar_menu_opciones', 'dashicons-megaphone', '99');
	}
}

if (!function_exists('spdespegar_slider_despegar_menu_opciones')){
	function spdespegar_slider_despegar_menu_opciones(){
		if(isset($_POST['script-despegar'])){
			if ( ! isset( $_POST['insert_plugin_nonce'] ) || ! wp_verify_nonce( $_POST['insert_plugin_nonce'], 'insert_plugin' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				if(get_option('script_despegar_plugin')){
					add_option('script_despegar_plugin', htmlspecialchars($_POST['script-despegar']));
				}else{
					update_option('script_despegar_plugin', htmlspecialchars($_POST['script-despegar']));
				}
				spdespegar_main_page_plugin();
			}

		}else{
			$script = get_option('script_despegar_plugin');

			if($script){
				spdespegar_main_page_plugin();
			}else{
				include("html/insert-plugin.php");
			}
		}
	}
}

if (!function_exists('spdespegar_main_page_plugin')){
	function spdespegar_main_page_plugin(){
		global $wpdb;
		global $options_seted; 
		global $sections;

		$table_name = $wpdb->prefix . 'slider_despegar';
		$resultados = $wpdb->get_results("SELECT * FROM `".$table_name."` WHERE 1 LIMIT 1", ARRAY_A);

		$options_seted = $resultados[0];
		$sections = spdespegar_get_sections();

		include("html/plugin-options.php");
	}
}

if (!function_exists('spdespegar_shortcode_handler')){
	function spdespegar_shortcode_handler(){
		spdespegar_generate_css_with_tag();
		include("html/box-content.php");
	}
}

if (!function_exists('spdespegar_generate_css_with_tag')){
	function spdespegar_generate_css_with_tag(){
		echo '<style type="text/css" media="screen" id="style-sheet">';
		echo spdespegar_generate_css();
		echo '</style>';
	}
}

if (!function_exists('spdespegar_generate_css')){
	function spdespegar_generate_css($tag = false){
		global $wpdb;
		$table_name = $wpdb->prefix . 'slider_despegar';

		$resultados = $wpdb->get_results("SELECT * FROM `".$table_name."` WHERE 1 LIMIT 1", ARRAY_A);

		global $options_seted; 
		$options_seted = $resultados[0];

		ob_start();
		include("html/generate-css.php");
		return ob_get_clean();
	}
}

if (!function_exists('spdespegar_get_sections')){
	function spdespegar_get_sections(){
		$sections = array();
		ob_start();
		include("html/options.php");
		$sections['options'] = ob_get_clean();
		ob_start();
		include("html/options-advanced.php");
		$sections['options_advanced'] = ob_get_clean();
		ob_start();
		include("html/script.php");
		$sections['script'] = ob_get_clean();
		ob_start();
		include("html/generate-css.php");
		$sections['css_generated'] = ob_get_clean();
		ob_start();
		include("html/box-content.php");
		$sections['container_box'] = ob_get_clean();
		return $sections;
	}
}

if (!function_exists('spdespegar_save_script_ajax')){
	function spdespegar_save_script_ajax(){
		print_r($_POST);
		if (isset($_POST['data'])) {
			$params = array();
			parse_str($_POST['data'], $params);
			if ( ! isset( $params['save_script_nonce'] ) || ! wp_verify_nonce( $params['save_script_nonce'], 'save_script' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				global $wpdb;
				$table_name = $wpdb->prefix . 'slider_despegar';
				update_option('script_despegar_plugin', htmlspecialchars(sanitize_text_field($params['script-despegar'])));
				echo "ok";
			}
		}
		wp_die();
	}
}

if (!function_exists('spdespegar_save_form_ajax')){
	function spdespegar_save_form_ajax(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'slider_despegar';

		if (isset($_POST['data'])){
			$params = array();
			parse_str($_POST['data'], $params);
			if ( ! isset( $params['options_nonce'] ) || ! wp_verify_nonce( $params['options_nonce'], 'options' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {

				if(isset($params['back-transparente']) && $params['back-transparente'] == 'on') 
					$params['back-transparente'] = 1;
				else
					$params['back-transparente'] = 0;

				if(!isset($params['width-box']) | $params['width-box'] <= 300){
					$params['width-box'] = 350;
				}

				$wpdb->update($table_name,
					array('back_img' => sanitize_text_field($params['background-img']),
						'position' =>  sanitize_text_field($params['position-box']),
						'back_transparente' => sanitize_text_field($params['back-transparente']),
						'color_back_1' => sanitize_text_field($params['color-1']),
						'color_back_2' => sanitize_text_field($params['color-2']),
						'back_style' => sanitize_text_field($params['back-style']),
						'back_img_mobile' => sanitize_text_field($params['background-img-mobile']),
						'box_width' => sanitize_text_field($params['width-box'])),
					array('updates' => 1)
					);

				echo spdespegar_generate_css();
				wp_die();
			}
		}
	}
}

if (!function_exists('spdespegar_admin_scripts')){
	function spdespegar_admin_scripts() {
		wp_register_script('bootstrap',plugins_url( '/html/js/boostrap.js', __FILE__ ), array('jquery'));
		wp_register_script('flat-ui', plugins_url( '/html/js/flat-ui.min.js', __FILE__ ), array('jquery'));
		wp_register_script('pnotify', plugins_url( '/html/js/pnotify.js', __FILE__ ), array('jquery'));
		wp_register_script('despegar-plugin-script', plugins_url( '/html/js/script.js', __FILE__ ), array('jquery', 'wp-color-picker'));

		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');

		wp_enqueue_script('pnotify');
		wp_enqueue_script('flat-ui');
		wp_enqueue_script('despegar-plugin-script');
	}
}

if (!function_exists('spdespegar_admin_styles')){
	function spdespegar_admin_styles() {
		wp_enqueue_style('thickbox');
		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_style('bootstrap', plugins_url( '/html/css/bootstrap.min.css', __FILE__ ));
		wp_enqueue_style('bootstrap-theme', plugins_url( '/html/css/bootstrap-theme.min.css', __FILE__ ));
		wp_enqueue_style('flat-ui',  plugins_url( '/html/css/flat-ui.min.css', __FILE__ ));
		wp_enqueue_style('slider-despegar-style', plugins_url('/html/css/style.css', __FILE__ ));
		wp_enqueue_style('pnotify', plugins_url( '/html/css/pnotify.css', __FILE__ ));
	}
}

if (!function_exists('spdespegar_slider_despegar_activate')){
	function spdespegar_slider_despegar_activate() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'slider_despegar';

		$charset_collate = $wpdb->get_charset_collate();

		if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
			$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			back_img varchar(140),
			position varchar(1) DEFAULT 'i',
			back_transparente boolean DEFAULT '1',
			color_back_1 varchar(8) DEFAULT '#FFFFFF',
			color_back_2 varchar(8) DEFAULT '#FFFFFF',
			back_style tinyint(1) DEFAULT '1',
			back_img_mobile varchar(140),
			box_width int(4) DEFAULT '350',
			updates boolean DEFAULT '1',
			UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}
}

if (!function_exists('spdespegar_slider_despegar_install_data')){
	function spdespegar_slider_despegar_install_data() {
		global $wpdb;

		$table_name = $wpdb->prefix . 'slider_despegar';
		$cantidad = $wpdb->get_var("SELECT COUNT(*) FROM " . $table_name);

		if($cantidad == 0){

			$wpdb->insert( 
				$table_name, 
				array( 
					'position' => 'i', 
					'color_back_1' => "#FFFFFF",
					'color_back_2' => "#FFFFFF",
					'back_style' => 1,
					) 
				);

		}
	}
}

add_shortcode( 'Slider-Despegar', 'spdespegar_shortcode_handler' );
register_activation_hook( __FILE__, 'spdespegar_slider_despegar_activate' );
register_activation_hook( __FILE__, 'spdespegar_slider_despegar_install_data' );
add_action('admin_menu','spdespegar_slider_despegar_menu'); 
add_action('wp_ajax_save_form', 'spdespegar_save_form_ajax' );
add_action('wp_ajax_save_script', 'spdespegar_save_script_ajax' );

?>