<?php
/**
 * Woocommerce Compare page
 *
 * @author Your Inspiration Themes
 * @package YITH Woocommerce Compare
 * @version 1.1.4
 */

// remove the style of woocommerce
if( defined('WOOCOMMERCE_USE_CSS') && WOOCOMMERCE_USE_CSS ) wp_dequeue_style('woocommerce_frontend_styles');

$is_iframe = (bool)( isset( $_REQUEST['iframe'] ) && $_REQUEST['iframe'] );

wp_enqueue_script( 'jquery-fixedheadertable', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.dataTables.min.js', array('jquery'), '1.3', true );
wp_enqueue_script( 'jquery-fixedcolumns', YITH_WOOCOMPARE_ASSETS_URL . '/js/FixedColumns.min.js', array('jquery', 'jquery-fixedheadertable'), '1.3', true );

$widths = array();
foreach( $products as $product ) $widths[] = '{ "sWidth": "205px", resizeable:true }';

$table_text = get_option( 'yith_woocompare_table_text' );
do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_table_text', $table_text );
$localized_table_text = apply_filters ( 'wpml_translate_single_string', $table_text, 'Plugins', 'plugin_yit_compare_table_text' );

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if !IE]>
<html <?php language_attributes() ?>>
<![endif]-->

<!-- START HEAD -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width , initial-scale=1" />
    <title><?php _e( 'Product Comparison', 'yith-woocommerce-compare' ) ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_head() ?>

    <?php do_action( 'yith_woocompare_popup_head' ) ?>    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" />
    <link rel="stylesheet" href="<?php echo $this->stylesheet_url() ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/colorbox.css"/>
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/jquery.dataTables.css"/>
    
    <style type="text/css">
        body.loading {
            background: url("<?php echo YITH_WOOCOMPARE_URL ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
        }
		
    </style>
	
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<!-- END HEAD -->

<?php global $product; ?>

<!-- START BODY -->
<body <?php body_class('woocommerce') ?>>

<h1>
    <?php echo $localized_table_text ?>
    <?php if ( ! $is_iframe ) : ?><a class="close" href="#"><?php _e( 'Close window [X]', 'yith-woocommerce-compare' ) ?></a><?php endif; ?>
</h1>
	

<?php do_action( 'yith_woocompare_before_main_table' ); ?>

<table class="compare-list" cellpadding="0" cellspacing="0"<?php if ( empty( $products ) ) echo ' style="width:100%"' ?>>
    <thead>
    <tr>
		
        <th>&nbsp;</th>
        <?php foreach( $products as $product_id => $product ) : ?>
            <td></td>
        <?php endforeach; ?>
    </tr>
		
    </thead>
	
	
    <tfoot>
    <tr>
        <th>&nbsp;</th>
        <?php foreach( $products as $product_id => $product ) : ?>
            <td></td>
		  
        <?php endforeach; ?>
    </tr>
		
    </tfoot>
    <tbody>

    <?php if ( empty( $products ) ) : ?>

        <tr class="no-products">
            <td><?php _e( 'No products added in the compare table.', 'yith-woocommerce-compare' ) ?></td>
        </tr>

    <?php else : ?>
        <tr class="remove">
            <th>&nbsp;</th>
            <?php
            $index = 0;
            foreach( $products as $product_id => $product ) :
                $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
                <td class="<?php echo $product_class; ?>">
                    <a href="<?php echo add_query_arg( 'redirect', 'view', $this->remove_product_url( $product_id ) ) ?>" data-product_id="<?php echo $product_id; ?>"><?php _e( 'Remove', 'yith-woocommerce-compare' ) ?> <span class="remove">x</span></a>
                </td>
                <?php
                ++$index;
            endforeach;
            ?>
        </tr>

		
	
		
        <?php 
		global $wpdb;
						
						
			$p_id =$product_id;
		
		$compare= array("picture","name","price","Performance","Comfort","Capabilities","Body","Quality","Capacity","Safety","Tech","Battery","Manufacturer");
		$i=0;
		
		
		
		
		#multiple queries for all the performance values
		$performance_fields=8;
		$comfort_fields=18;
		$capability_fields=10;
		$body_fields=14;
		$quality_fields=7;
		$capacity_fields=3;
		$safety_fields=5;
		$tech_fields=10;
		$battery_fields=11;
		$manufacturer_fields=6;
		
		#subcategory array to store all values limited by number of performance 
		$subcategory;
		$subinput;
		
		#function to print out all the inputs
		#takes the product id and returns the proper input field
		function print_fields($id,$wpdb,$loop_limit,$field_type)
		{
		$performance_fields=8;
		for($x=0;$x<$loop_limit-1;$x++)
		{
			
			#input field part
		$subinput[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$id AND meta_key='".$field_type."_".$x."_".$field_type."_field_input'");
		
			
		#replace empty string with n/a
			if($subinput[$x]=='')
			{
				$subinput[$x]='N/A';
			}
	    echo '<tr><td>'.$subinput[$x].'</td></tr>';	
			
		}
		}
		
		#loop for the performance section
		for($x=0;$x<$performance_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='performance_".$x."_performance_field_name'");
	    $sub_text.='<tr><td>'.$subcategory[$x].'</td></tr>';
	
		}
		
		
		#loop for the Comfort section
		
		for($x=0;$x<$comfort_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='comfort_".$x."_comfort_field_name'");
	    $sub_text_comfort.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		

		#loop for Capability section
		for($x=0;$x<$capability_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='capabilities_".$x."_capabilities_field_name'");
	    $sub_text_capabilities.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		
		
		#loop for the Body section
		for($x=0;$x<$body_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='body_".$x."_body_field_name'");
	    $sub_text_body.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		
		
		#loop for the Quality section
		for($x=0;$x<$body_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='quality_".$x."_quality_field_name'");
	    $sub_text_quality.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		#loop for the Capacity section
						
		for($x=0;$x<$capacity_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='capacity_".$x."_capacity_field_name'");
	    $sub_text_capacity.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		#loop for the Safety section
						
		for($x=0;$x<$safety_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='safety_".$x."_safety_field_name'");
	    $sub_text_safety.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		#loop for the Tech section
						
		for($x=0;$x<$tech_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='tech_".$x."_tech_field_name'");
	    $sub_text_tech.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		
		#loop for the Battery section
						
		for($x=0;$x<$battery_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='battery_".$x."_battery_field_name'");
	    $sub_text_battery.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}
		
		
		#loop for the Manufacturer section
						
		for($x=0;$x<$manufacturer_fields-1;$x++)
		{
			
		$subcategory[$x] = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id=$p_id AND meta_key='manufacturer_".$x."_manufacturer_field_name'");
	   $sub_text_manufacturer.='<tr><td>'.$subcategory[$x].'</td></tr>';
		
			
		}	
		
		
	 
			
		
		
		array_push($fields,'','','');
		
		foreach ( $fields as $field => $name ) : ?>

            <tr class="<?php echo $field ?>">

                <th>
	
					
                    <?php 
						
	                   $category=$compare[$i++];
				
				       
				         
				
				
	                    switch($category)
						{
								
							case 'Performance':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				             
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text.
				
								'</table>';	
				
								break;
							
							case 'Comfort':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_comfort.
				
								'</table>';	
				
								break;
								
							case 'Capabilities':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_capabilities.
				
								'</table>';	
				
								break;
								
							case 'Body':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_body.
				
								'</table>';	
				
								break;
								
							case 'Quality':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_quality.
				
								'</table>';	
				
								break;
								
							case 'Capacity':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_capacity.
				
								'</table>';	
				
								break;
								
							case 'Safety':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_safety.
				
								'</table>';	
				
								break;
								
							case 'Tech':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_tech.
				
								'</table>';	
				
								break;
								
							case 'Battery':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_battery.
				
								'</table>';	
				
								break;
								
							case 'Manufacturer':
								
								echo '<button type="button" id="'.$category.'button" class="btn btn-info" data-toggle="collapse" data-target="#'.$category.'">'.$category.'</button>' ;
				               
				       
								echo '<table id="'.$category.'" class="collapse">'
	
								.$sub_text_manufacturer.
				
								'</table>';	
				
								break;	
							
							default:
							break;
						}
						
						
					
				
					
				
					?>
					
                    <?php if ( $field == 'image' ) echo '<div class="fixed-th"></div>'; ?>
                </th>
				
				<script>
	
	
	
	
	
	function hider(id)
	{
		var performance_switch=0;
		var comfort_switch=0;
		var capabilities_switch=0;
		var body_switch=0;
		var quality_switch=0;
		var capacity_switch=0;
		var safety_switch=0;
		var tech_switch=0;
		var battery_switch=0;
		var manufactuter_switch=0;
		
		
		
	var button_names=["Performancebutton","Comfortbutton","Capabilitiesbutton","Bodybutton","Qualitybutton",
	"Capacitybutton","Safetybutton","Techbutton","Batterybutton","Manufacturerbutton"];
		
		
	var names=["Performance","Comfort","Capabilities","Body","Quality","Capacity","Safety","Tech","Battery","Manufacturer"];	
		
	
		
	//Performance button click events
	$( "#"+button_names[0] ).click(function() {
		
		
		if (performance_switch==0)
			{
 $('#'+names[0]+id).removeClass("hidden");
		performance_switch=1;
		return;
			}
			
		if (performance_switch==1)
			{
 $('#'+names[0]+id).addClass("hidden");
		performance_switch=0;
		return;
			}
	
});
		
		
//Comfort button click events		
$( "#"+button_names[1] ).click(function() {
		
		
		if (comfort_switch==0)
			{
 $('#'+names[1]+id).removeClass("hidden");
		comfort_switch=1;
		return;
			}
			
		if (comfort_switch==1)
			{
 $('#'+names[1]+id).addClass("hidden");
		comfort_switch=0;
		return;
			}
	
});
		
		
//Capabilities button click events
		
$( "#"+button_names[2] ).click(function() {
		
		
		if (capabilities_switch==0)
			{
 $('#'+names[2]+id).removeClass("hidden");
		capabilities_switch=1;
		return;
			}
			
		if (capabilities_switch==1)
			{
 $('#'+names[2]+id).addClass("hidden");
		capabilities_switch=0;
		return;
			}
	
});		
		

//Body button click events		
		
$( "#"+button_names[3] ).click(function() {
		
		
		if (body_switch==0)
			{
 $('#'+names[3]+id).removeClass("hidden");
		body_switch=1;
		return;
			}
			
		if (body_switch==1)
			{
 $('#'+names[3]+id).addClass("hidden");
		body_switch=0;
		return;
			}
	
});				
		
		
//Quality button click events			
		
$( "#"+button_names[4] ).click(function() {
		
		
		if (quality_switch==0)
			{
 $('#'+names[4]+id).removeClass("hidden");
		quality_switch=1;
		return;
			}
			
		if (quality_switch==1)
			{
 $('#'+names[4]+id).addClass("hidden");
		quality_switch=0;
		return;
			}
	
});				
		

//Capacity button click events			
		
$( "#"+button_names[5] ).click(function() {
		
		
		if (capacity_switch==0)
			{
 $('#'+names[5]+id).removeClass("hidden");
		capacity_switch=1;
		return;
			}
			
		if (capacity_switch==1)
			{
 $('#'+names[5]+id).addClass("hidden");
		capacity_switch=0;
		return;
			}
	
});						
		
		
//Safety button click events			
		
$( "#"+button_names[6] ).click(function() {
		
		
		if (safety_switch==0)
			{
 $('#'+names[6]+id).removeClass("hidden");
		safety_switch=1;
		return;
			}
			
		if (safety_switch==1)
			{
 $('#'+names[6]+id).addClass("hidden");
		safety_switch=0;
		return;
			}
	
});
		
		
//Tech button click events			
		
$( "#"+button_names[7]).click(function() {
		
		
		if (tech_switch==0)
			{
 $('#'+names[7]+id).removeClass("hidden");
		tech_switch=1;
		return;
			}
			
		if (tech_switch==1)
			{
 $('#'+names[7]+id).addClass("hidden");
		tech_switch=0;
		return;
			}
	
});				
		
//Battery button click events			
$( "#"+button_names[8] ).click(function() {
		
		
		if (battery_switch==0)
			{
 $('#'+names[8]+id).removeClass("hidden");
		battery_switch=1;
		return;
			}
			
		if (battery_switch==1)
			{
 $('#'+names[8]+id).addClass("hidden");
		battery_switch=0;
		return;
			}
	
});					
		
		
			
//Manufacturer button click events			
		
$( "#"+button_names[9] ).click(function() {
		
		
		if (manufactuter_switch==0)
			{
 $('#'+names[9]+id).removeClass("hidden");
		manufactuter_switch=1;
		return;
			}
			
		if (manufactuter_switch==1)
			{
 $('#'+names[9]+id).addClass("hidden");
		manufactuter_switch=0;
		return;
			}
	
});					
		
			
	}
				</script>

                <?php
                $index = 0;
				
				$peformance_field='performance_field';
                foreach( $products as $product_id => $product ) :
                    $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id; ?>
				     
                    <td class="<?php echo $product_class; ?>">
						<?php
						#loop for the performance section
		
                        switch( $field ) {

                            case 'image':
                                echo '<div class="image-wrap">' . wp_get_attachment_image( $product->fields[$field], 'yith-woocompare-image' ) . '</div>';
                                break;

                            case 'add-to-cart':
                                #woocommerce_template_loop_add_to_cart();
								
								echo '<div id="Performance'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,8,'performance');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								
                                break;
							
							case 'description':
								echo '<div id="Comfort'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,18,'comfort');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							
							case 'sku':
								echo '<div id="Capabilities'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,10,'capabilities');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							case 'stock':
								echo '<div id="Body'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,14,'body');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							case 'weight':
								echo '<div id="Quality'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,7,'quality');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							case 'dimensions':
								echo '<div id="Capacity'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,3,'capacity');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							case 'pa_color':				
								echo '<div id="Safety'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,5,'safety');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							
								
		
								
							case 1:
							
								echo '<div id="Battery'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,11,'battery');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
							case 2:
								echo '<div id="Manufacturer'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,6,'manufacturer');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
								
						
							default:
								echo empty( $product->fields[$field] ) ? '&nbsp;' : $product->fields[$field];
                                break;
								
							
                        }
						
						
		                switch($compare[$i])
						{
								
								case'Battery':
								echo '<div id="Tech'.$product_id.'" class="hidden">';
								echo '<table>';
								echo '<tr><td>'.''.'</td></tr>';
								print_fields($product_id,$wpdb,10,'tech');
								echo '</table>';
								echo '<div>';
								echo '<script type="text/javascript">
								hider('.$product_id.');';
								echo '</script>';
								break;
								
								
							default:
								break;
						}
						
						
			
		
						
						
						
						
                        ?>
                    </td>
                    <?php
                    ++$index;
                endforeach; ?>

            </tr>

        <?php endforeach; ?>

        <?php if ( $repeat_price == 'yes' && isset( $fields['price'] ) ) : ?>
            <tr class="price repeated">
                <th><?php echo $fields['price'] ?></th>

                <?php
                $index = 0;
                foreach( $products as $product_id => $product ) :
                    $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
                    <td class="<?php echo $product_class ?>"><?php echo $product->fields['price'] ?></td>
				
				 
                    <?php
                    ++$index;
                endforeach; ?>

            </tr>
        <?php endif; ?>

        <?php if ( $repeat_add_to_cart == 'yes' && isset( $fields['add-to-cart'] ) ) : ?>
            <tr class="add-to-cart repeated">
                <th><?php echo $fields['add-to-cart'] ?></th>

                <?php
                $index = 0;
                foreach( $products as $product_id => $product ) :
                    $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
                    <td class="<?php echo $product_class ?>">
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </td>
                    <?php
                    ++$index;
                endforeach; ?>

            </tr>
        <?php endif; ?>

    <?php endif; ?>

    </tbody>
</table>

<?php do_action( 'yith_woocompare_after_main_table' ); ?>

<?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?><?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?>
<?php print_footer_scripts(); ?>

<script type="text/javascript">

    jQuery(document).ready(function($){
        $('a').attr('target', '_parent');

        var oTable;
        $('body').on( 'yith_woocompare_render_table', function(){
            if( $( window ).width() > 767 ) {
                oTable = $('table.compare-list').dataTable( {
                    "sScrollX": "100%",
                    //"sScrollXInner": "150%",
                    "bScrollInfinite": true,
                    "bScrollCollapse": true,
                    "bPaginate": false,
                    "bSort": false,
                    "bInfo": false,
                    "bFilter": false,
                    "bAutoWidth": false
                } );

                new FixedColumns( oTable );
                $('<table class="compare-list" />').insertAfter( $('h1') ).hide();
            }
        }).trigger('yith_woocompare_render_table');

        // add to cart
        var redirect_to_cart = false,
            body             = $('body');

        // close colorbox if redirect to cart is active after add to cart
        body.on( 'adding_to_cart', function ( $thisbutton, data ) {
            if( wc_add_to_cart_params.cart_redirect_after_add == 'yes' ) {
                wc_add_to_cart_params.cart_redirect_after_add = 'no';
                redirect_to_cart = true;
            }
        });

        body.on('wc_cart_button_updated', function( ev, button ){
            $('a.added_to_cart').attr('target', '_parent');
        });

        // remove add to cart button after added
        body.on('added_to_cart', function( ev, fragments, cart_hash, button ){

            $('a').attr('target', '_parent');

            if( redirect_to_cart == true ) {
                // redirect
                parent.window.location = wc_add_to_cart_params.cart_url;
                return;
            }

            // Replace fragments
            if ( fragments ) {
                $.each(fragments, function(key, value) {
                    $(key, window.parent.document).replaceWith(value);
                });
            }
        });

        // close window
        $(document).on( 'click', 'a.close', function(e){
            e.preventDefault();
            window.close();
        });

        $(window).on( 'yith_woocompare_product_removed', function(){
            if( $( window ).width() > 767 ) {
                oTable.fnDestroy(true);
            }
            $('body').trigger('yith_woocompare_render_table');
        });

    });

	
</script>

</body>
</html>