<?php $related = alx_related_posts(); ?>

<?php if ( $related->have_posts() ): ?>

<h4 class="heading">
	<i class="fa fa-hand-o-right"></i><?php _e('You may also like...','blogline'); ?>
</h4>

<ul class="related-posts group">
	
	<?php while ( $related->have_posts() ) : $related->the_post(); ?>
	<li class="related post-hover">
		<article <?php post_class(); ?>>

			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail('thumb-medium'); ?>
					<?php elseif ( ot_get_option('placeholder') != 'off' ): ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/thumb-medium.png" alt="<?php the_title(); ?>" />
					<?php endif; ?>
					<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fa fa-play"></i></span>'; ?>
					<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fa fa-volume-up"></i></span>'; ?>
					<?php if ( is_sticky() ) echo'<span class="thumb-icon small"><i class="fa fa-star"></i></span>'; ?>
				</a>
			</div><!--/.post-thumbnail-->
			
			<div class="related-inner">
				
				<h4 class="post-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h4><!--/.post-title-->
				
				<div class="post-meta group">
					<p class="post-date"><?php the_time('j M, Y'); ?></p>
				</div><!--/.post-meta-->
			
			</div><!--/.related-inner-->

		</article>
	</li><!--/.related-->
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

</ul><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_query(); ?>