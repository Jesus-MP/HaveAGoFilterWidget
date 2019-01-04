<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

?>
<div class="la-threesixty-container">
    <div data-la_component="WooThreeSixty" class="js-el la-threesixty threesixty">
        <input type="hidden" class="la_360_vars" value="<?php echo esc_attr(wp_json_encode($la_threesixty_vars)) ?>"/>
        <div class="spinner"><span>0%</span></div>
        <ol class="threesixty_images"></ol>
    </div>
</div>