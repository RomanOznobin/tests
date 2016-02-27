<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.js"></script>
    <![endif]-->

	<meta name="description" content="<?php bloginfo('description'); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script type='text/javascript' src='http://sili.moscow-n.ru/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>

   <!-- WP_Head -->
    	<?php wp_head(); ?>
   <!-- /WP_Head -->
   
   <!-- Scrol element - Menu -->
   <script>var scrollFloat = function() {
    'use strict';

    var app = {};

    app.init = function init(node) {
        if (!node || node.nodeType !== 1) {
            throw new Error(node + ' is not DOM element');
        }
        handleWindowScroll(node);
    };

    function handleWindowScroll(floatElement) {
        window.onscroll = function() {
            if (window.scrollY > floatElement.offsetTop) {
               // alert(floatElement.style.position);
                if (floatElement.style.position !== 'fixed') {
                    floatElement.style.position = 'fixed';
                    floatElement.style.top = '0';
                    floatElement.style.right = '0px';
                    floatElement.style.backgroundColor = 'rgba(0, 0, 0, 0.08)';
                }
            } else {
                if (floatElement.style.position === 'fixed') {
                    floatElement.style.position = 'relative';
                    floatElement.style.top = '';
                    floatElement.style.right = '';
                    floatElement.style.backgroundColor = 'rgba(0, 0, 0, 0.04)';
                }
            }
        };
    }

    return app;
}();</script>
   <!-- /Scrol element - Menu -->


</head>



<body <?php body_class(); ?>>



	<div id="wrap">

            <header id="header">
                <div class="container">
                    <div class="row">

                        <div class="ql_logo_nav col-md-9 col-xs-12">

                            <div class="logo_container">
                                <a href="<?php echo home_url(); ?>/" class="ql_logo google-font">
                                <img src="http://sili.moscow-n.ru/wp-content/images/logo2.png" />
                                <?php // bloginfo('name'); ?>
                                </a>
                                <button id="ql_nav_btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ql-navigation" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                </button>
                            </div><!-- /logo_container -->

                            <div class="collapse navbar-collapse" id="ql-navigation">
                                <nav id="jqueryslidemenu" class="jqueryslidemenu navbar " role="navigation">
                                    <?php            
                                    if ( has_nav_menu( 'menu-1' ) ){ 
                                            wp_nav_menu( array(                     
                                            'theme_location'  => 'menu-1',
                                            'depth'             => 3,
                                            'menu_class'        => 'nav navbar-nav',
                                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                            'walker'            => new wp_bootstrap_navwalker()
                                        )); 
                                    }else{
                                        echo "<ul id='nav' class='nav navbar-nav'>";
                                        wp_list_pages( array(
                                            'title_li'     => ''
                                            )
                                        );
                                        echo "</ul>";
                                    }; 
                                    ?>
                                </nav>
                            </div>
                            <div class="clearfix"></div>

                        </div><!-- col-md-8 -->
                        
                        <?php 
                        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                        ?>
                            <div id="my_scroll_menu" class="login_cart_wrap col-md-3 col-xs-12">
                                
                             <a title="Корзина" href="http://sili.moscow-n.ru/cart/">
                                <div class="ql_cart_wrap">
                                    <button href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="ql_cart-btn">
                                        <?php echo wp_kses_post( WC()->cart->get_cart_total() ); ?>
                                        <span class="count">(<?php echo esc_html( WC()->cart->cart_contents_count );?>)</span>
                                        <i class="ql-bag"></i><i class="ql-chevron-down"></i>
                                    </button>

                                    <div id="ql_woo_cart">
                                        <?php global $woocommerce; ?>
                                        
                                        <?php the_widget('WC_Widget_Cart');  ?>
                                    </div><!-- /ql_woo_cart --> 
                                </div>
                             </a>
                                <div class="login_btn_wrap">
                                    <?php if ( is_user_logged_in() ) { ?>
                                        <a class="ql_login-btn" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="Личный Кабинет<?php //esc_attr_e( 'My Account', 'shophistic-lite' ); ?>">Личный Кабинет<?php // esc_html_e( 'My Account', 'shophistic-lite' ); ?></a>
                                     <?php } 
                                     else { ?>
                                        <a class="ql_login-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="Вход в личный кабинет<?php // esc_attr_e( 'Login', 'shophistic-lite' ); ?>">Войти в личный кабинет<?php // esc_html_e( 'Login', 'shophistic-lite' ); ?></a>
                                     <?php } ?>
                                </div>
        <script>
            var el = document.getElementById('my_scroll_menu');
            scrollFloat.init(el);
            
        </script>
                                <div class="clearfix"></div>
                            </div><!-- col-md-4 -->
                        <?php } //if WooCommerce active ?>

                    </div><!-- row-->
                </div><!-- /container -->

            </header>

    <div class="clearfix"></div>