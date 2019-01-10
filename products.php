<?php
// Add Video Review Tabs
add_filter('woocommerce_product_tabs', 'woo_new_product_tab');

function woo_new_product_tab($tabs)
{    
// Adds the new tab
    
    $tabs['video_tab'] = array(
        'title' => __('Video Reviews', 'woocommerce'),
        'priority' => 50,
        'callback' => 'woo_new_product_tab_content'
    );

    return $tabs;
    
}
//Adds the Content for Video Tab
function woo_new_product_tab_content()
{
    include_once('video-reviews.php');
}   

//Add and Remove Hooks for Product Page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 60 ); 
 
//Add Product Images on Top for Mobile
add_action('woocommerce_before_single_product', 'get_images');
function get_images()
{
    //
    if (has_post_thumbnail($product->id)) {
        $attachment_ids[0] = get_post_thumbnail_id($product->id);
        $attachment        = wp_get_attachment_image_src($attachment_ids[0], 'full');
    }
?>
	<div class="slideshow-container">
    	<div class="mySlides fade">
            <img src="<?php echo $attachment[0]; ?>" style="width:100%">
        </div>
    <?php
        global $product;
        $attachment_ids = $product->get_gallery_attachment_ids();
        foreach ($attachment_ids as $attachment_id) {
            //Get URL of Gallery Images - default wordpress image sizes
            $full_url = wp_get_attachment_image_src($attachment_id, 'full');
            $full_url = $full_url[0];
    ?>
    	<div class="mySlides fade">
            <img src="<?php echo $full_url; ?>" style="width:100%">
      	</div>
    <?php
        }
    ?>
      <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
    </div>
<br>
<div class="slider_pagination" style="text-align:center">
<?php
    $n = 0;
    foreach ($attachment_ids as $attachment_id) {
        $n = $n + 1;
	echo '<span class="bullet" onclick="currentSlide('.$n.'"></span>';
    }
echo '</div>';
}

// Adds Quick Specs	
add_action('woocommerce_single_product_summary', 'product_specs');
function product_specs()
{
        echo '<p class="quick_specs"><b>'; 
        the_field('product_distance');
        echo '</b>&nbsp; &bull; &nbsp; <b>';
        the_field('product_speed'); 
        echo '</b> &nbsp; &bull; &nbsp; <b>';
        the_field('product_weight');
        echo'</b></p>';       
}

//Adds Product Specs Category
add_action('woocommerce_product_meta_start', 'add_product_specs');
function add_product_specs($categories)
{
    // vars
    $categories = array("performance", "comfort", "capabilities", "body", "quality", "capacity", "safety", "tech", "battery", "manufacturer");
    
    foreach ($categories as $category ):
    $field = get_field($category);
?>
        <h3 class="accordion" style="text-transform: uppercase;"><span><?php echo $category; ?></span></h3>
        <ul class="panel">
<?php
    if (have_rows($category)):

        while (have_rows($category)):
        	the_row();
        	// vars
            $name = $category.'_field_name';
            $input = $category.'_field_input';
            $name  = get_sub_field($name);
            $input = get_sub_field($input);
?>
            <?php
            if ($input):
                echo "<li><b>" . $name . "</b>:&nbsp;" . $input . "</li>";
            endif;
        endwhile;
    endif;
    echo '</ul>';
    endforeach;
}

add_action('woocommerce_after_single_product', 'script');
function script()
{
    echo '<script>';
    include_once('js/product-script.js');
    echo '</script>';
}
//Remove Other Hooks
add_filter( 'wc_product_sku_enabled', '__return_false' );