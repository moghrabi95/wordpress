<?php get_header(); ?>

<?php  if( function_exists('nicdark_page')){ do_action("nicdark_page_nd"); }else{ ?>

<!--start section-->
<div class="nicdark_section nicdark_border_bottom_1_solid_grey">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_grid_12">

            <div class="nicdark_section nicdark_height_80"></div>

            <h1 class="nicdark_font_size_50 nicdark_font_size_40_all_iphone nicdark_line_height_40_all_iphone"><?php the_title(); ?></h1>

            <div class="nicdark_section nicdark_height_80"></div>

        </div>

    </div>
    <!--end container-->

</div>
<!--end section-->

<div class="nicdark_section nicdark_height_50"></div>

<!--start nicdark_container-->
<div class="nicdark_container nicdark_clearfix">

    
    <!--start all posts previews-->
    <?php if ( is_active_sidebar( 'nicdark_sidebar' ) ) { ?>  
        <div class="nicdark_grid_8"> 
    <?php }else{ ?>

        <div class="nicdark_grid_12">
    <?php } ?>    


    <?php if(have_posts()) :
        while(have_posts()) : the_post(); ?>
            
            <!--#post-->
            <div class="nicdark_section nicdark_container_page_php" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!--start content-->
                <?php the_content(); ?>
                <!--end content-->

            </div>
            <!--#post-->


            <div class="nicdark_section">

                 
                <?php $args = array(
                    'before'           => '<!--link pagination--><div id="nicdark_link_pages" class="nicdark_section"><p class="nicdark_margin_top_20 nicdark_first_font nicdark_color_greydark nicdark_border_1_solid_grey nicdark_display_inline nicdark_padding_8_20 nicdark_border_radius_15">',
                    'after'            => '</p></div><!--end link pagination-->',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'nextpagelink'     => esc_html__('Next page', 'charityfoundation'),
                    'previouspagelink' => esc_html__('Previous page', 'charityfoundation'),
                    'pagelink'         => '%',
                    'echo'             => 1
                ); ?>
                <?php wp_link_pages( $args ); ?>

            
                <?php if(has_tag()) { ?>  
                    <!--tag-->
                    <div id="nicdark_tags_list" class="nicdark_section">
                         <?php the_tags( esc_html__('Tags : ', 'charityfoundation'),'',''); ?>
                    </div>
                    <!--END tag-->
                <?php } ?>
                

                <?php 

                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                     
                ?>
                

            </div>


        
        <?php endwhile; ?>
    <?php endif; ?>



    </div>


    <!--sidebar-->
    <?php if ( is_active_sidebar( 'nicdark_sidebar' ) ) { ?>  
        
        <div class="nicdark_grid_4">
            <?php if ( ! get_sidebar( 'nicdark_sidebar' ) ) : ?><?php endif ?>
            <div class="nicdark_section nicdark_height_50"></div>
        </div>
        
    <?php } ?>
    <!--end sidebar-->



</div>
<!--end container-->


<div class="nicdark_section nicdark_height_60"></div> 

<?php } ?>
 <?php
  if ( is_page('cart') ) {
  ?>
  <div class="nd_options_container nd_options_padding_0_15 nd_options_box_sizing_border_box nd_options_clearfix">
     <!--post-->
     <div style="float:left; width:100%;" id="post-681" class="post-681 page type-page status-publish hentry">
        <!--automatic title-->
        <!--start content-->
        <div class="woocommerce-custom">
           <form class="woocommerce-cart-form" action="http://localhost/cart/" method="post">
              <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                 <thead>
                    <tr>
                       <th class="product-remove">&nbsp;</th>
                       <th class="product-name">Product</th>
                       <th class="product-price">Price</th>
                       <th class="product-quantity">Quantity</th>
                       <th class="product-subtotal">Total</th>
                    </tr>
                 </thead>
                 <tbody class="main-table">

                 </tbody>
              </table>
           </form>
           <div class="cart-collaterals">
              <div class="cart_totals ">
                 <h2>Cart totals</h2>
                 <table cellspacing="0" class="shop_table shop_table_responsive">
                    <tbody class="total-cart">

                    </tbody>
                 </table>
                 <div class="wc-proceed-to-checkout">
                    <a href="http://localhost/checkout/" class="checkout-button button alt wc-forward">
                    Proceed to checkout</a>
                 </div>
              </div>
           </div>
        </div>
        <!--end content-->
     </div>
     <!--post-->
  </div>

   <?php } ?>

<?php get_footer(); ?>