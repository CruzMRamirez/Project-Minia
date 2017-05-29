<?php $classLoop = 0;?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php
		if ($classLoop  <= 1) {
			$className = "current-quest";
			$col = "6";
			$classLoop++;
		} else if ($classLoop  == 2) {
			$className = "finished-quest";
			$col = "12";
		} 
	?>

	<div class="col-lg-<?php echo $col;?>">
	<!-- if has thumbnail -->
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0]; ?>
		<?php else :
		$image = get_bloginfo( 'stylesheet_directory') . '/images/myimage.jpg'; ?>
		<?php endif; ?>
		<!-- end if has thumbnail -->		
		<div class="<?php echo $className; ?> text-center" style="background-image: url('<?php echo $image; ?>') !important;" >
			<!-- post title -->
			<h1 style="font-weight:bold; font-size: 48px;">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<!-- /post title -->
		</div> 
	</div>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
