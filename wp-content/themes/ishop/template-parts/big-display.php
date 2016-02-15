<?php

/* 
 *@pacage iShop
 */
?>


<?php if(get_theme_mod('featured_image') !='' || get_theme_mod('featured_textarea')!=''){ ?>
<div id="big-display" class="large-12 columns">
    <div class="large-4 columans">

<img src="<?php echo esc_url(get_theme_mod('featured_image')); ?>" />
    </div>

    <div class="large-8 columns">
        <?php echo esc_html(get_theme_mod('featured_textarea')); ?>

    </div>
    
       
    
</div>
<?php }?>