<?php
// Input code to echo video custom fields
    if (have_rows('video_review')):
        while (have_rows('video_review')):
            the_row();
            
            // vars
            $link        = get_sub_field('embedded_link');
            $title       = get_sub_field('video_title');
            $description = get_sub_field('video_description');
            
?>
    <div class="vc_row wpb_row vc_row-fluid la_fp_slide la_fp_child_section">
    
    <div class="wpb_column vc_column_container vc_col-sm-6">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="wpb_single_image wpb_content_element vc_align_left">
                        <div class="embed-container">
                            <?php
            // get iframe HTML
            //$iframe = get_sub_field($link);
            
            
            // use preg_match to find iframe src
            preg_match('/src="(.+?)"/', $link, $matches);
            $src = $matches[1];
            
            
            // add extra params to iframe src
            $params = array(
                'controls' => 0,
                'hd' => 1,
                'autohide' => 1
            );
            
            $new_src = add_query_arg($params, $src);
            
            $link = str_replace($src, $new_src, $link);
            
            
            // add extra attributes to iframe html
            $attributes = 'frameborder="0"';
            
            $link = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $link);
            
            
            // echo $link
            echo $link;
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wpb_column vc_column_container vc_col-sm-6">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="wpb_text_column wpb_content_element ">
                    <div class="wpb_wrapper">
                        <h3><?php
                            echo $title;
                        ?></h3>
                        <p><?php
                            echo $description;
                        ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

 </div>

<?php
        endwhile;

    else: 
        echo '<h3>Check back later for this products video review!</h3>';
?>
<?php
    endif;
?>