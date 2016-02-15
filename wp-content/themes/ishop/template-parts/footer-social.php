<?php

/* 
* @ iShop theme
* Social profiles
*/
    echo '<ul class="social">';

 if( get_theme_mod('ishop_facebook') ):
            echo '<a target="_blank" alt="Facebook" href="'.esc_url(__(get_theme_mod('ishop_facebook','ishop'))).'"><i class="fa fa-facebook"></i></a>';
    endif;
    /* twitter */
    if(get_theme_mod('ishop_twitter') ):
            echo '<a target="_blank" href="'.esc_url(__(get_theme_mod('ishop_twitter','ishop'))).'"><i class="fa fa-twitter"></i></a>';
    endif;
    /* googleplus */
    if(get_theme_mod('ishop_googleplus') ):
            echo '<a target="_blank" href="'.esc_url(__(get_theme_mod('ishop_googleplus','ishop'))).'"><i class="fa fa-google-plus"></i></a>';
    endif;
    /* linkedin */
    if( get_theme_mod('ishop_linkedin') ):
            echo '<a target="_blank" href="'.esc_url(__(get_theme_mod('ishop_linkedin','ishop'))).'"><i class="fa fa-linkedin"></i></a>';
    endif;
    /* More only for Premium */
   
    
    echo '</ul>';
