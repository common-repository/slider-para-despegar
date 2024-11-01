<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $options_seted;
$plugin_dir = plugin_dir_path().'/html';
?>

#first-container{
background-image: url('<?php echo esc_url($plugin_dir) ?>/img/background-plugin.jpg');
}

html, body {
overflow-x: hidden;
}

#box-container-despegar{
width: <?php echo esc_html($options_seted['box_width']) ?>px;
<?php 
if($options_seted['position'] == '3'){
	echo 'margin-left: auto;';
	echo 'margin-right: 10px;';
}else if($options_seted['position'] == '1'){
	echo 'margin-right: auto;';
	echo 'margin-left: 10px;';
}else{
	echo 'margin: auto;';
}
?>
margin-bottom: 0px;
padding-bottom: 0px;
}
.container-all-Slider-Despegar{ 
margin: 0 -9999rem;
/* add back negative margin value */
padding: 0.25rem 9999rem;
<?php 
if(!$options_seted['back_transparente']){
	echo 'background: '.esc_html($options_seted['color_back_1']).'; ';
}

if(!$options_seted['back_transparente'] && $options_seted['back_style'] == 2){
	echo 'background: -webkit-linear-gradient('.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: -o-linear-gradient('.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: -moz-linear-gradient('.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: linear-gradient('.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
}else if(!$options_seted['back_transparente'] && $options_seted['back_style'] == 3){
	echo 'background: -webkit-linear-gradient(-90deg,'.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: -o-linear-gradient(-90deg,'.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: -moz-linear-gradient(-90deg,'.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: linear-gradient(-90deg,'.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
}else if(!$options_seted['back_transparente'] && $options_seted['back_style'] == 4){
	echo 'background: -webkit-linear-gradient(left top, '.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: -o-linear-gradient(bottom right, '.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: -moz-linear-gradient(bottom right, '.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
	echo 'background: linear-gradient(to bottom right, '.esc_html($options_seted['color_back_1']).', '.esc_html($options_seted['color_back_2']).'); ';
}

if ($options_seted['back_img']) {
	echo 'background-image: url("'.esc_url($options_seted['back_img']).'"); ';
	echo 'background-position: top center; ';
	echo 'background-repeat: no-repeat; ';
	echo '-webkit-background-size: 100%; ';
	echo '-webkit-background-size: cover; ';
	echo '-moz-background-size: 100%; ';
	echo '-moz-background-size: cover; ';
	echo 'background-size: 100%; ';
	echo 'background-size: cover; ';
}
?>
width: 100%;
margin: 0px;
padding: 10px;
height: auto;
}

@media(max-width:768px){


#box-container-despegar{
margin: auto;
width: 100%;
<?php
if($options_seted['back_img_mobile']){
	echo 'background-image: url("'.esc_url($options_seted['back_img_mobile']).'"); ';
	echo 'background-position: top center; ';
	echo 'background-repeat: no-repeat; ';
	echo '-webkit-background-size: 100%; ';
	echo '-webkit-background-size: cover; ';
	echo '-moz-background-size: 100%; ';
	echo '-moz-background-size: cover; ';
	echo 'background-size: 100%; ';
	echo 'background-size: cover; ';
}
?>
}


.searchboxContainer{
font-family: inherit;
}
