<?php get_header(); ?>   
		<div class="content">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post-main"> 
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php the_date(); ?></span></h1>
				<div class="post">
					<?php the_content(); ?>
					<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'wshop' ),
					'after'  => '</div>',) );	?>
						<div class="categories"><div class="tagi"><?php the_tags(); ?></div>	<?php _e( 'Categories:', 'wshop' ); ?> <?php the_category(' '); ?></div>
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wshop' ) . '</span> %title' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wshop' ) . '</span>' ); ?></span>
					<?php comments_template(); ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
<div class="row">
	<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
		<div class="sidebar-right1 span2">
			<?php dynamic_sidebar( 'sidebar-left' ); ?>
		</div>
	<?php endif; ?>
</div>
</div>
</div> <div class="greyt"> </div><div class="grey"> </div>
<?php get_footer(); ?>