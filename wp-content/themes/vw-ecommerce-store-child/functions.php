<?php

function add_custom_styles(){

    wp_enqueue_style('parent_style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('slick_css', get_stylesheet_directory_uri() . '/includes/slick_slider/slick/slick.css');
    wp_enqueue_script('slick_js', get_stylesheet_directory_uri() . '/includes/slick_slider/slick/slick.min.js');
    
    
    wp_enqueue_style('custom_style', get_stylesheet_directory_uri() . '/css/custom.css');
    wp_enqueue_script('custom_script', get_stylesheet_directory_uri() . '/js/custom.js');

}

add_action('wp_enqueue_scripts', 'add_custom_styles');


function productCategoriesSlider()
{
    $orderby = 'name';
    $order = 'asc';
    $hide_empty = false ;
    $cat_args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
    );
 
    $product_categories = get_terms( 'product_cat', $cat_args );

    // $all_categories = get_categories( $args );
    $html .= '<div class="category_slider">';
        foreach( $product_categories as $category )
        {
            // var_dump($category);die();
            $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
            $thumbnail_image = wp_get_attachment_url( $thumbnail_id );
            
            $html .= '<div class="category_slide">';
                $html .= '<div class="category_image">';
                    $html .= '<a href="'. home_url() . '/product_cat/' . $category->slug .'">';
                        if( $thumbnail_image )
                        {
                            $html .= '<img src="'. $thumbnail_image .'" alt="'. $category->name .'">';
                        }
                        else{
                            $html .= '<span class="placeholder_cat_text">No Image</span>';
                        }
                    $html .= '</a>';
                $html .= '</div>';
                $html .= '<div class="category_name">';
                    $html .= '<p><a href="'. home_url() . '/product_cat/' . $category->slug .'">'. $category->name .'</a></p>';
                $html .= '</div>';
            $html .= '</div>';
        }
    $html .= '</div>';

    echo $html;
}

add_shortcode('categories_slider', 'productCategoriesSlider');