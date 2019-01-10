<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop,$wpdb;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$class = array('product_item', 'grid-item', 'product');

$loop_index 	= isset($woocommerce_loop['loop']) ? $woocommerce_loop['loop'] : 0;
$item_sizes     = !empty($woocommerce_loop['item_sizes']) ? $woocommerce_loop['item_sizes']: array();
$item_w         = 1;
$item_h         = 1;

if(!empty($item_sizes[$loop_index]['w']) && ( $_tmp_size = $item_sizes[$loop_index]['w'] )){
	$item_w = $_tmp_size;
}
if(!empty($item_sizes[$loop_index]['h']) && ( $_tmp_size = $item_sizes[$loop_index]['h'] )) {
	$item_h = $_tmp_size;
}
$max_variable=_REQUEST['max_value'];
// echo $max_variable
?>



<li <?php post_class($class); ?> data-width="<?php echo esc_attr($item_w);?>" data-height="<?php echo esc_attr($item_h);?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
	<div class="product_item--inner">
		<div class="product_item--thumbnail">
			<div class="product_item--thumbnail-holder">
				<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 * @hooked add_second_thumbnail_to_loop - 15
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			

				?>
			</div>
			<div class="product_item--action">
				<?php
				/**
				 * la_zyra/action/shop_loop_item_action hook.
				 *
				 * @hooked
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action('la_zyra/action/shop_loop_item_action_top');
				?>
			</div>
		</div>
		<div class="product_item--info">
			<div class="product_item--info-inner">
				
				<?php
				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
				

				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 * @hooked shop_loop_item_excerpt - 15
				 */
				
				do_action( 'woocommerce_after_shop_loop_item_title' );
				/* Get Quick Specs */
				$p_id = $product->id;
				$meta_key = array('product_speed', 'product_weight', 'product_distance');

				
				foreach ($meta_key as $key) {
				$temp = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='$key'");



				if($key=='product_speed')
				{
					$product_speed = $temp;
				}

				if($key=='product_weight')
				{
					$product_weight = $temp;
				}
				if($key=='product_distance')
				{
					$product_distance = $temp;
				}

				}
				
				echo '<div class="all_specs">';
				echo '<p class="quick_specs"><b>'.$product_distance.'</b> &nbsp; &bull; &nbsp; <b>'.$product_speed.'</b> &nbsp; &bull; &nbsp; <b>'.$product_weight.'</b></p>';
				//Product Spec List
				echo '<p class="list_specs">';
				    // vars
				    //$categories = array("performance", "comfort", "capabilities", "body", "quality", "capacity", "safety", "tech", "battery", "manufacturer");
				    //$categories = array("performance");
				    //foreach ($categories as $category ):
				    $field = get_field('performance');
				    $field_motor = $field[1];
				    $field_battery = $field[4];
				    
				    // Debugger
				    // echo '<pre>';
				    // print_r($field);
				    // print_r($field_motor);
				    // print_r($field_battery);
				    // echo '</pre>';

				    // if (have_rows($category)):

				    //     while (have_rows($category)):
				    //     	the_row();
				         	
				         	// vars
				    //         $name = $category.'_field_name';
				    //         $input = $category.'_field_input';
				    //         $name  = get_sub_field($name);
				    //         $input = get_sub_field($input);
				            
				    $name_motor = $field_motor['performance_field_name'];
				    $input_motor = $field_motor['performance_field_input'];
				    $name_battery = $field_battery['performance_field_name'];
				    $input_battery = $field_battery['performance_field_input'];

				            //check if there is input
				            // if ($input):
				            //     echo "<b>" . $name . "</b>:&nbsp;" . $input . "<br/>";
				            // endif;
				    if ($input_motor):
				    	echo "<b>" . $name_motor . "</b>:&nbsp;" . $input_motor . "<br/>";
				    else:
				    	echo "<b>" . $name_motor . "</b>:&nbsp;N/A<br/>";
					endif;

				    if ($input_battery):
				    	echo "<b>" . $name_battery . "</b>:&nbsp;" . $input_battery . "<br/>";
				    else:
				    	echo "<b>" . $name_battery . "</b>:&nbsp;N/A<br/>";
				    endif;

				    //endwhile;
				    //endif;
				    //endforeach;

				    //Tags List
				    $product_tags = get_terms('product_tag');
				    foreach($product_tags as $tag) {
				    	echo '<pre>'.$tag->name.'</pre>';
				    }
				    

				echo '</p></div>';  

				//$p_name = strip_tags($product->name, '');
				echo '<div class="product-external-url vc_btn3-container vc_btn3-left"><a vc_gitem-link vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat" href="'.esc_url( $product->get_product_url() ).'" target="_blank">EXPLORE ME</a></div>';
				// get product_tags of the current product
// $current_tags = get_the_terms( get_the_ID(), 'product_tag' );

// //only start if we have some tags
// if ( $current_tags && ! is_wp_error( $current_tags ) ) { 

//     //create a list to hold our tags
//     echo '<ul class="product_tags">';

//     //for each tag we create a list item
//     foreach ($current_tags as $tag) {

//         $tag_title = $tag->name; // tag name
//         $tag_link = get_term_link( $tag );// tag archive link

//         echo '<li><a href="'.$tag_link.'">'.$tag_title.'</a></li>';
//     }

//     echo '</ul>';
// }
				?>
				

			</div>
			<div class="product_item--action">
				<?php
				/**
				 * la_zyra/action/shop_loop_item_action hook.
				 *
				 * @hooked
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action('la_zyra/action/shop_loop_item_action');



				?>

			</div>
		</div>
	
	<?php
// $tax = $wp_query->get_queried_object();
// echo $tax_name = $tax->name;

// echo '<div class="page_id" id="'.$tax_name.'">'.$tax_name.'</div>';
// $current_tags = get_the_terms( get_the_ID(), 'product_tag' );
// // only start if we have some tags
// if ( $current_tags && ! is_wp_error( $current_tags ) ) {
// // create a list to hold our t,gs
// echo '<ul class="product_tags">';
// // for each tag we create , list item
// foreach ($current_tags as $tag) {
// $tag_title = $tag->name; // tag name
// $tag_link = get_term_link( $tag );// tag archive link
// echo '<li><a href="'.$tag_link.'">'.$tag_title.'</a></li>';
// }
// echo '</ul>';
// }
	/**
	 * woocommerce_after_shop_loop_item hook.
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
	</div>
</li>

