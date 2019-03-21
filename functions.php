<?php


function my_theme_enqueue_styles()
{
   

   

    $parent_style = 'la-zyra-style';
    
	
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(
        $parent_style
    ), wp_get_theme()->get('Version'));

 wp_enqueue_style( 'slider-style', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.1.0/nouislider.min.css');

}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');



// Add Product Template //
include('product-template/products.php');

function my_enqueue() {

	wp_enqueue_script( 'widget_script', get_template_directory_uri() . '/../la-zyra-child/assets/widget.js',  array ( 'jquery' ), 1.1, true);

	wp_enqueue_script( 'jNoui','https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.1.0/nouislider.min.js', null, null, true );
	wp_enqueue_script( 'wNumb','https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js', null, null, true );



     wp_localize_script( 'widget_script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	
   
 }
 add_action( 'wp_enqueue_scripts', 'my_enqueue' );




function haveago_register_widget() {
register_widget( 'haveago_widget' );
}

add_action( 'widgets_init', 'haveago_register_widget' );

class haveago_widget extends WP_Widget {




function __construct() {


parent::__construct(
// widget ID
'haveago_widget',
// widget name
__('Have A Go Filter', ' haveago_widget_domain'),
// widget description
array( 'description' => __( 'Have A Go', 'haveago_widget_domain' ), )
);
}
	
	
	
//contains the output of the widget	
public function widget( $args, $instance ) {
	



	//gets the title that the user assigns
$title = apply_filters( 'widget_title', $instance['title'] );

$min_range=apply_filters('widget_min_range',$instance['min_range']);
$max_range=apply_filters('widget_max_range',$instance['max_range']);


	
	
$title2 = apply_filters( 'widget_title2', $instance['title2'] );
$min_range2=apply_filters('widget_min_range2',$instance['min_range2']);
$max_range2=apply_filters('widget_max_range2',$instance['max_range2']);
	
$title3 = apply_filters( 'widget_title3', $instance['title3'] );
$min_range3=apply_filters('widget_min_range3',$instance['min_range3']);
$max_range3=apply_filters('widget_max_range3',$instance['max_range3']);
	
	
	
	
$title4 = apply_filters( 'widget_title4', $instance['title4'] );
$min_range4=apply_filters('widget_min_range4',$instance['min_range4']);
$max_range4=apply_filters('widget_max_range4',$instance['max_range4']);
	
$title5 = apply_filters( 'widget_title5', $instance['title5'] );
$min_range5=apply_filters('widget_min_range5',$instance['min_range5']);
$max_range5=apply_filters('widget_max_range5',$instance['max_range5']);
	
$title6 = apply_filters( 'widget_title6', $instance['title6'] );
$min_range6=apply_filters('widget_min_range6',$instance['min_range6']);
$max_range6=apply_filters('widget_max_range6',$instance['max_range6']);
	
	
$Capabilities='Capabilities';
$Comfort='Comfort';
$Design='Design';
$Tech='Tech';
$GreatFor='Great For';






echo $args['before_widget'];
	
	
	
	
?>
<div class="sliders-box">

<?php  	
//if title is present
if ( ! empty( $title ) )

	?>
<div class="slider-container">

	<?php
//contains the ouput of multiple widgets		
echo $args['before_title'] . $title . $args['after_title'];
//output

?>
<div class="rangeslider">
	<p>
		<span class="range_min light "></span>
	    <span class="range_min light " id="span_min"><?php echo '$'.$min_range ?></span>
		<span class="range_min light rightp">-</span>
	    <span class="range_max light right" id="span_max"><?php echo '$'.$max_range ?></span>
    </p>
	<div id="priceSlider" class="noUiSlider""></div>
                              
                                <!-- <input class="min" name="range_1" type="range" min="<?php echo $min_range ?>" max="<?php echo $max_range ?>" value="<?php echo $min_range ?>" id="min_slider"/>
                                <input class="max" name="range_2" type="range" min="<?php echo $min_range ?>" max="<?php echo $max_range ?>" value="<?php echo $max_range ?>" id="max_slider"/> -->
</div></br></br></div>
                      


<?php

//if title is present
if ( ! empty( $title2 ) )

	?>
<div class="slider-container">
<?php 	
//contains the ouput of multiple widgets		
echo $args['before_title'] . $title2 . $args['after_title'];
?>
<div class="rangeslider">
	<p>
		<span class="range_min light "></span>
        <span class="range_min light left" id="span_min_weight"><?php echo $min_range2.'&nbsp;lbs' ?></span>
		<span class="range_min light rightp ">-</span>
        <span class="range_max light right" id="span_max_weight"><?php echo $max_range2.'&nbsp;lbs' ?></span>
    </p>
	<div id="weightSlider" class="noUiSlider""></div>
                                
                                <!-- <input class="min" name="range_1" type="range" min="<? echo $min_range2 ?>" max="<? echo $max_range2 ?>" value="<?php echo $min_range2 ?>" id="min_slider_weight"/>
                                <input class="max" name="range_1" type="range" min="<? echo $min_range2 ?>" max="<? echo $max_range2 ?>" value="<?php echo $max_range2 ?>" id="max_slider_weight"/> -->
                            </div></br></br></div>
<?php	
//if title is present
if ( ! empty( $title4 ) )
?>

<div class="slider-container">

	<?php 
//contains the ouput of multiple widgets		
echo $args['before_title'] . $title4 . $args['after_title'];
//output

?>
<div class="rangeslider">
	<p>
		<span class="range_min light "></span>
        <span class="range_min light left" id="span_min_range"><?php echo $min_range4.'&nbsp;miles' ?></span>
		<span class="range_min light rightt ">-</span>
        <span class="range_max light right" id="span_max_range"><?php echo $max_range4.'&nbsp;miles' ?></span>
    </p>
	<div id="rangeSlider" class="noUiSlider""></div> 
                                
                                <!-- <input class="min" name="range_1" type="range" min="<?php echo $min_range4 ?>" max="<?php echo $max_range4 ?>" value="<?php echo $min_range4 ?>"id="min_slider_range" />
                                <input class="max" name="range_1" type="range" min="<?php echo $min_range4 ?>" max="<?php echo $max_range4 ?>" value="<?php echo $max_range4 ?>"id="max_slider_range" /> -->
                            </div></br></br></div>

<?php
//if title is present
if ( ! empty( $title3 ) )

	?>
<div class="slider-container">
<?php 
//contains the ouput of multiple widgets		
echo $args['before_title'] . $title3 . $args['after_title'];
//output

?>
<div class="rangeslider">
	<p>
		<span class="range_min light "></span>
	    <span class="range_min light left" id="span_min_topspeed"><?php echo $min_range3.'&nbsp;mph' ?></span>
		<span class="range_min light rightt ">-</span>
	    <span class="range_max light right" id="span_max_topspeed"><?php echo $max_range3.'&nbsp;mph' ?></span>
    </p>
	<div id="speedSlider" class="noUiSlider""></div>
                                
                                <!-- <input class="min" name="range_1" type="range" min="<? echo $min_range3 ?>" max="<? echo $max_range3 ?>" value="<?php echo $min_range3 ?>"id="min_slider_topspeed" />
                                <input class="max" name="range_1" type="range" min="<? echo $min_range3 ?>" max="<? echo $max_range3 ?>" value="<?php echo $max_range3 ?>"id="max_slider_topspeed" /> -->
</div></br></br></div>


 <?php                            
//if title is present
if ( ! empty( $title6 ) )

	?>
<div class="slider-container">

	<?php
//contains the ouput of multiple widgets		
echo $args['before_title'] . $title6 . $args['after_title'];


//output
?>
<div class="rangeslider">
	<p>
		<span class="range_min light "></span>
        <span class="range_min light left" id="span_min_batterysize"><?php echo $min_range6.'&nbsp;Wh' ?></span>
		<span class="range_min light rightt ">-</span>
        <span class="range_max light right" id="span_max_batterysize"><?php echo $max_range6.'&nbsp;Wh' ?></span>
    </p>
	<div id="batterySlider" class="noUiSlider""></div>
                                
                                <!-- <input class="min" name="range_1" type="range" min="<?php echo $min_range6 ?>" max="<?php echo $max_range6 ?>" value="<?php echo $min_range6 ?>"id="min_slider_batterysize" />
                                <input class="max" name="range_1" type="range" min="<?php echo $min_range6 ?>" max="<?php echo $max_range6 ?>" value="<?php  echo $max_range6 ?>"id="max_slider_batterysize" /> -->
</div></br></br></div>

<?php
//if title is present
if ( ! empty( $title5 ) )

	?>
<div class="slider-container">
	<?php
//contains the ouput of multiple widgets		
echo $args['before_title'] . $title5 . $args['after_title'];
//output
?>
<div class="rangeslider">
	<p>
		<span class="range_min light "></span>
        <span class="range_min light left" id="span_min_motorpower"><?php echo $min_range5.'&nbsp;W' ?></span>
		<span class="range_min light rightt ">-</span>
        <span class="range_max light right" id="span_max_motorpower"><?php echo $max_range5.'&nbsp;W' ?></span>
    </p>
	<div id="motorSlider" class="noUiSlider"></div>
                                
                               <!--  <input class="min" name="range_1" type="range" min="<?php echo $min_range5 ?>" max="<?php echo $max_range5 ?>" value="<?php echo $min_range5 ?>"id="min_slider_motorpower" />
                                <input class="max" name="range_1" type="range" min="<?php echo $min_range5 ?>" max="<?php echo $max_range5 ?>" value="<?php echo $max_range5 ?>"id="max_slider_motorpower" /> -->
</div></br></br></div>


</div>

<div class="tags-box">
<?php 
$Capabilities='Capabilities';
$Comfort='Comfort';
$Design='Design';
$Tech='Tech';
$GreatFor='Great For';
?>

<div class="Capabilities">
	<?php
echo $args['before_title'] . $Capabilities. $args['after_title'];
?>
<a  class="capabilities-a" id="Portable">Portable</a></br>
<a  class="capabilities-a" id="Rollable">Rollable</a></br>
<a  class="capabilities-a" id="Cargo">Cargo</a></br>
<a  class="capabilities-a" id="Hill Capable">Hill Capable</a></br>
<a  class="capabilities-a" id="Off-Road">Off-Road Capable</a></br>
<a  class="capabilities-a" id="Weather">Weather</a></br>
<a  class="capabilities-a" id="Unique">Unique Design</a></br>
</div>





<div class="Comfort">
	<?php
echo $args['before_title'] . $Comfort. $args['after_title'];
?>
<a  class="comfort-a" id="Seat">Seat</a></br>
<a  class="comfort-a" id="Suspension">Suspension</a></br>
<a  class="comfort-a" id="Powerful Brakes">Powerful Brakes</a></br>
<a  class="comfort-a" id="Lights">Lights</a></br>
<a  class="comfort-a" id="Horn/Bell">Horn/Bell</a></br>
<a  class="comfort-a" id="step-thru">Step-Thru (For Bikes)</a></br>
</div>




<div class="Tech">
	<?php
echo $args['before_title'] . $Tech. $args['after_title'];
?>
<!-- <a  class="tech-a"id="Anti-Theft">Anti-Theft</a></br> -->
<a  class="tech-a" id="Swappable Battery">Swappable Battery</a></br>
<a  class="tech-a" id="USB Charger">USB Charger</a></br>
<a  class="tech-a" id="Smartphone App">Smartphone App</a></br>
</div>


<div class="Great For">
<?php
echo $args['before_title'] . $GreatFor. $args['after_title'];
?>
<a  class="greatfor-a" id="Fun">Fun/Recreation</a></br>
<a  class="greatfor-a" id="Exercise">Exercise</a></br>
<a  class="greatfor-a" id="Commuting">Commuting</a></br>
<a  class="greatfor-a" id="Groceries">Groceries</a></br>
<a  class="greatfor-a" id="Metro">Metro/Bus</a></br>
</div>
</div>


<!--Search Button-->
<div class="controls">
<a href="#la_shop_products"><button type="button" class="btn btn-primary" id="submit_filters">Search</button></a>
<a href="#la_shop_products"><button type="button" class="btn" id="clear_filters">Reset Filters</button></a>
</div>

<?php
echo $args['after_widget'];

?>

<?php
}
	
//	Determines widget settings in WordPress Dashboard
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) )
$title = $instance[ 'title' ];
else
$title = __( 'Default Title', 'haveago_widget_domain' );

$min_range= $instance['min_range'];
$max_range= $instance['max_range'];	
	
	
//Second Title	
if ( isset( $instance[ 'title2' ] ) )
$title2 = $instance[ 'title2' ];
else
$title2 = __( 'Default Title2', 'haveago_widget_domain' );
$min_range2= $instance['min_range2'];
$max_range2= $instance['max_range2'];
	
//Third Title	
if ( isset( $instance[ 'title3' ] ) )
$title3 = $instance[ 'title3' ];
else
$title3 = __( 'Default Title3', 'haveago_widget_domain' );
$min_range3= $instance['min_range3'];
$max_range3= $instance['max_range3'];	
	
//Fourth Title	
if ( isset( $instance[ 'title4' ] ) )
$title4= $instance[ 'title4' ];
else
$title4 = __( 'Default Title4', 'haveago_widget_domain' );
$min_range4= $instance['min_range4'];
$max_range4= $instance['max_range4'];		
//Fifth Title	
if ( isset( $instance[ 'title5' ] ) )
$title5= $instance[ 'title5' ];
else
$title5 = __( 'Default Title5', 'haveago_widget_domain' );
$min_range5= $instance['min_range5'];
$max_range5= $instance['max_range5'];	
	
//Sixth Title
if ( isset( $instance[ 'title6' ] ) )
$title6= $instance[ 'title6' ];
else
$title6 = __( 'Default Title6', 'haveago_widget_domain' );
$min_range6= $instance['min_range6'];
$max_range6= $instance['max_range6'];
	
	
	
	
?>
<p>
	
	
<h2> Price Widget:</h2>	
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'min_range' ); ?>"><?php _e( 'min-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'min-range' ); ?>" name="<?php echo $this->get_field_name( 'min_range' ); ?>" type="text" value="<?php echo esc_attr( $min_range ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'max_range' ); ?>"><?php _e( 'max-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'max_range' ); ?>" name="<?php echo $this->get_field_name( 'max_range' ); ?>" type="text" value="<?php echo esc_attr( $max_range ); ?>" />

	
	
	
	
	
	
<h2> Weight Widget:</h2>		

<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e( 'Second Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />


<label for="<?php echo $this->get_field_id( 'min_range2' ); ?>"><?php _e( 'min-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'min-range2' ); ?>" name="<?php echo $this->get_field_name( 'min_range2' ); ?>" type="text" value="<?php echo esc_attr( $min_range2 ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'max_range2' ); ?>"><?php _e( 'max-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'max_range2' ); ?>" name="<?php echo $this->get_field_name( 'max_range2' ); ?>" type="text" value="<?php echo esc_attr( $max_range2 ); ?>" />
	







<h2> Top Speed Widget:</h2>	
<label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e( 'Third Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
<label for="<?php echo $this->get_field_id( 'min_range3' ); ?>"><?php _e( 'min-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'min-range3' ); ?>" name="<?php echo $this->get_field_name( 'min_range3' ); ?>" type="text" value="<?php echo esc_attr( $min_range3 ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'max_range3' ); ?>"><?php _e( 'max-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'max_range3' ); ?>" name="<?php echo $this->get_field_name( 'max_range3' ); ?>" type="text" value="<?php echo esc_attr( $max_range3 ); ?>" />






	
<h2> Range Widget:</h2>	
<label for="<?php echo $this->get_field_id( 'title4' ); ?>"><?php _e( 'Fourth Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />

<label for="<?php echo $this->get_field_id( 'min_range4' ); ?>"><?php _e( 'min-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'min-range4' ); ?>" name="<?php echo $this->get_field_name( 'min_range4' ); ?>" type="text" value="<?php echo esc_attr( $min_range4 ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'max_range4' ); ?>"><?php _e( 'max-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'max_range4' ); ?>" name="<?php echo $this->get_field_name( 'max_range4' ); ?>" type="text" value="<?php echo esc_attr( $max_range4 ); ?>" />








<h2> Motor Power Widget:</h2>	
<label for="<?php echo $this->get_field_id( 'title5' ); ?>"><?php _e( 'Fifth Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title5' ); ?>" name="<?php echo $this->get_field_name( 'title5' ); ?>" type="text" value="<?php echo esc_attr( $title5 ); ?>" />


<label for="<?php echo $this->get_field_id( 'min_range5' ); ?>"><?php _e( 'min-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'min-range5' ); ?>" name="<?php echo $this->get_field_name( 'min_range5' ); ?>" type="text" value="<?php echo esc_attr( $min_range5 ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'max_range5' ); ?>"><?php _e( 'max-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'max_range5' ); ?>" name="<?php echo $this->get_field_name( 'max_range5' ); ?>" type="text" value="<?php echo esc_attr( $max_range5 ); ?>" />








<h2>Battery Power Widget:</h2>
<label for="<?php echo $this->get_field_id( 'title6' ); ?>"><?php _e( 'Sixth Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title6' ); ?>" name="<?php echo $this->get_field_name( 'title6' ); ?>" type="text" value="<?php echo esc_attr( $title6 ); ?>" />


<label for="<?php echo $this->get_field_id( 'min_range' ); ?>"><?php _e( 'min-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'min-range6' ); ?>" name="<?php echo $this->get_field_name( 'min_range6' ); ?>" type="text" value="<?php echo esc_attr( $min_range6 ); ?>" />
	

<label for="<?php echo $this->get_field_id( 'max_range' ); ?>"><?php _e( 'max-range:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'max_range6' ); ?>" name="<?php echo $this->get_field_name( 'max_range6' ); ?>" type="text" value="<?php echo esc_attr( $max_range6 ); ?>" />

	
	
	
	
	
	
</p>







<?php
	
}
	
//updates the widget settings	
	
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title']=strip_tags($new_instance['title']);
$instance['min_range']=strip_tags($new_instance['min_range']);
$instance['max_range']=strip_tags($new_instance['max_range']);
$instance['min_range2']=strip_tags($new_instance['min_range2']);
$instance['max_range2']=strip_tags($new_instance['max_range2']);
$instance['min_range3']=strip_tags($new_instance['min_range3']);
$instance['max_range3']=strip_tags($new_instance['max_range3']);
$instance['min_range4']=strip_tags($new_instance['min_range4']);
$instance['max_range4']=strip_tags($new_instance['max_range4']);
$instance['min_range5']=strip_tags($new_instance['min_range5']);
$instance['max_range5']=strip_tags($new_instance['max_range5']);
$instance['min_range6']=strip_tags($new_instance['min_range6']);
$instance['max_range6']=strip_tags($new_instance['max_range6']);
$instance['title2']=strip_tags($new_instance['title2']);
$instance['title3']=strip_tags($new_instance['title3']);	
$instance['title4']=strip_tags($new_instance['title4']);
$instance['title5']=strip_tags($new_instance['title5']);
$instance['title6']=strip_tags($new_instance['title6']);
return $instance;
}


}

	
//include('product-template/products.php');

//needed for ajax calls
add_action('wp_ajax_filter_action','filter_action',30);
add_action( 'wp_ajax_nopriv_filter_action', 'filter_action',40);
add_filter('myspeed','echo_name');




//

 
//edits the output of woocomerce product loop



function  filter_action()
{

//echo site_url();


 $term=$_GET['term'];
 $max_price=$_GET['max_price'];
 $min_price=$_GET['min_price'];
 $max_weight=$_GET['max_weight'];
 $min_weight=$_GET['min_weight'];
 $min_speed=$_GET['min_speed'];
 $max_speed=$_GET['max_speed'];
 $min_range=$_GET['min_range'];
 $max_range=$_GET['max_range'];
 $min_motorpower=$_GET['min_motorpower'];
 $max_motorpower=$_GET['max_motorpower'];
 $min_batterysize=$_GET['min_batterysize'];
 $max_batterysize=$_GET['max_batterysize'];


 $slider_array=array($max_price,$min_price,$max_weight,$min_weight,$min_speed,$max_speed,$min_range,$max_range,$min_motorpower,$max_motorpower,$min_batterysize,$max_batterysize);

$count=0;
$slider;

 foreach ($slider_array as $element) {
 	
 	if($element == '')
 	{
 		$count++;


 	}
 	
 }

if($count >0)
 	{
 		$slider=true;

 	}

 $tag=$_GET['tag'];
 $clear=$_GET['clear'];



$tag_array=array();
//echo $lights;
foreach ($tag as $key) {

 $tag_array[]=$key;
	
}

// foreach($tag_array as $key)
// {
// 	echo $key.',';
// }

//Debugger
// echo 'Term:'.$term.'</br>';
// echo 'Max_Price:'.$max_price.'</br>';
// echo 'Min_Price:'.$min_price.'</br>';
// echo 'Max_Weight:'.$max_weight.'</br>';
// echo 'Min_Weight:'.$min_weight.'</br>';
// echo 'Max_Speed:'.$max_speed.'</br>';
// echo 'Min_Speed:'.$min_speed.'</br>';
// echo 'Max_Range:'.$max_range.'</br>';
// echo 'Min_Range:'.$min_range.'</br>';
// echo 'max_motorpower:'.$max_motorpower.'</br>';
// echo 'Min_motorpower:'.$min_motorpower.'</br>';
// echo 'Max_batterysize:'.$max_batterysize.'</br>';
// echo 'Min_batterysize:'.$min_batterysize.'</br>';
// echo 'Tag:'.$tag.'<br>';
// echo 'Clear:'.$clear.'</br>';






echo '<div class="text-center hidden load-div"><img src="../../../wp-content/uploads/2018/11/loader.gif" class="loading" /></div>';


echo '<ul class="products products-grid grid-space-default products-grid-1 grid-items xlg-grid-3-items lg-grid-3-items md-grid-3-items sm-grid-2-items xs-grid-1-items mb-grid-1-items" data-item_selector=".product_item" data-item_margin="0" data-item-width="270" data-item-height="450" data-md-col="3" data-sm-col="2" data-xs-col="1" data-mb-col="1" data-la_component="" data-la-effect="sequencefade">';



$all_the_products=array('post_type' => 'product',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'showposts' => -1,

		'tax_query' => array(
         array(
            'taxonomy' => 'product_cat',
             'field' => 'slug',
             'terms' => $term,
           'include_children'=>true,
         ),
		),

			
		);




$product_category=[];








if($clear)
{

	


		$loop = new WP_Query( $all_the_products );
		if ( $loop->have_posts() ) {
			
			while ( $loop->have_posts() ) : $loop->the_post(); 
				global $product;
				global $post;

				echo wc_get_template_part( 'content','product');
           





			endwhile;
		}
wp_reset_postdata();
die();


}

else
{


if($tag)
{
   $product_category['product_tag']=$tag;
   $all_the_products=array_merge($all_the_products,$product_category);

}



if($slider)
{
	

   $all_the_products['meta_query']=array();

    if($min_price || $max_price)

    {
   $price_array=array(
             'key' => '_price',
             'value' => array($min_price,$max_price),
             'compare' => 'BETWEEN',
             'type' => 'NUMERIC'
         );


   array_push($all_the_products['meta_query'],$price_array);
}



if($min_weight || $max_weight)

    {
  $weight_array=array(
            'key' => 'product_weight',
            'value' => array($min_weight,$max_weight),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
         );


   array_push($all_the_products['meta_query'],$weight_array);
}



if($min_speed|| $max_speed)

    {
  $speed_array=

        array(
            'key' => 'product_speed',
            'value' => array($min_speed,$max_speed),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        );

   array_push($all_the_products['meta_query'],$speed_array);
}


if($min_range|| $max_range)

    {
  $range_array=

          array(
            'key' => 'product_distance',
            'value' => array($min_range,$max_range),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        );

        

   array_push($all_the_products['meta_query'],$range_array);
}


if($min_batterysize|| $max_batterysize)

    {
  $battery_array=

       array(
            'key' => 'performance_2_performance_field_input',
            'value' => array($min_batterysize,$max_batterysize),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        );

        

   array_push($all_the_products['meta_query'],$battery_array);
}


if($min_motorpower|| $max_motorpower)

    {
  $motor_array=
array(
            'key' => 'performance_0_performance_field_input',
            'value' => array($min_motorpower,$max_motorpower),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        );
       

        

   array_push($all_the_products['meta_query'],$motor_array);
}












//Meta Query Debugger
// echo '<pre>';
// print_r($all_the_products);
// echo '</pre>';

}





$loop = new WP_Query( $all_the_products );
		if ( $loop->have_posts() ) {
			
			while ( $loop->have_posts() ) : $loop->the_post(); 
				global $product;
				global $post;

				echo wc_get_template_part( 'content','product');
           





			endwhile;
		}
		else {
			echo '<div><h2 class="text-center">No Products Found </h2></div>';
		}
		
wp_reset_postdata();
die();
}


echo '</ul>';
 la_zyra_the_pagination();

	
}
/*New Commit*/
