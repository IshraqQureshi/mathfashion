<?php

// Plugin Name: Custom Main Slider
// Description: Add Slides
// Author: Ishraq Qureshi
// Version: 1.0


/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Slides', 'Post Type General Name', 'vw-ecommerce-store' ),
            'singular_name'       => _x( 'Slides', 'Post Type Singular Name', 'vw-ecommerce-store' ),
            'menu_name'           => __( 'Slider', 'vw-ecommerce-store' ),
            'parent_item_colon'   => __( 'Parent Slide', 'vw-ecommerce-store' ),
            'all_items'           => __( 'All Slides', 'vw-ecommerce-store' ),
            'view_item'           => __( 'View Slide', 'vw-ecommerce-store' ),
            'add_new_item'        => __( 'Add New Slide', 'vw-ecommerce-store' ),
            'add_new'             => __( 'Add New', 'vw-ecommerce-store' ),
            'edit_item'           => __( 'Edit Slide', 'vw-ecommerce-store' ),
            'update_item'         => __( 'Update Slide', 'vw-ecommerce-store' ),
            'search_items'        => __( 'Search Slide', 'vw-ecommerce-store' ),
            'not_found'           => __( 'Not Found', 'vw-ecommerce-store' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'vw-ecommerce-store' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'slides', 'vw-ecommerce-store' ),
            'description'         => __( 'Main Slider', 'vw-ecommerce-store' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title' ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,            
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'slides', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
    add_action( 'init', 'custom_post_type', 0 );
     

add_shortcode('main_slider', 'main_slider_shortcode');

function main_slider_shortcode(){

    $args = array(
        'post_type' => 'slides',
        'post_status' => 'publish',
        'post_per_page' => '-1',
    );

    $query = new WP_Query($args);

    if( $query->have_posts() ):
        
        $html = '<div class="main_slider_wrapper">';

        while( $query->have_posts() ): $query->the_post();

            $sub_heading_1 = get_field('sub_heading_1');
            $sub_heading_2 = get_field('sub_heading_2');
            $main_heading = get_field('main_heading');
            $button_text = get_field('button_text');
            $button_url = get_field('button_url');
            $image_url = get_field('slider_image');

            $html .= '<div class="main_slider-slide">';
                $html .= '<div class="main_slider-slide_images">';
                    $html .= '<img src="'. $image_url .'" alt="'. get_the_title() .'">';
                $html .= '</div>';
                $html .= '<div class="main_slider-slide_content">';
                    $html .= '<h3 class="main_slider-slide_content_sub_heading_1 heading h3">'. $sub_heading_1 .'</h3>';
                    $html .= '<h2 class="main_slider-slide_content_main_heading heading h2">'. $main_heading .'</h3>';
                    $html .= '<h3 class="main_slider-slide_content_sub_heading_2 heading h3">'. $sub_heading_2 .'</h3>';
                    $html .= '<a class="btn" href="' . $button_url . '">'. $button_text .'</a>';
                $html .= '</div>';
            $html .= '</div>';

        endwhile;
        $html .= '</div>';
    endif;

    return $html;
}