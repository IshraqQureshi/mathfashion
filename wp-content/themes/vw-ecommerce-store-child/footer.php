<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Ecommerce Store
 */
?>
    <footer role="contentinfo">        
        <div id="footer-2">
            <div class="container">
                <div class="footer_logo <?php if ( !is_active_sidebar( 'footer-1' ) ){ echo "footer_hide"; }else{ echo "$colmd"; } ?> col-xs-12 footer-block">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="copyright_wrapper">
                    <p><?php echo esc_html(get_theme_mod('vw_ecommerce_store_footer_text',__('By VWThemes','vw-ecommerce-store'))); ?></p>
                </div>
                <div class="<?php if ( !is_active_sidebar( 'footer-2' ) ){ echo "footer_hide"; }else{ echo "$colmd"; } ?> col-xs-12 footer-block">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>                
            </div>
        </div>        
    </footer>

        <?php wp_footer(); ?>

    </body>
</html>