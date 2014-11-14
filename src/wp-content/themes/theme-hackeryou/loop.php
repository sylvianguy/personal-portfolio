<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>


  	<?php $postImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large'); ?>
	<div class="postContainer"  style="background-image: url(<?php echo $postImage[0]; ?>)">
	</div>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
			</a>
			<?php the_title(); ?>
		</h2>
		<div class="nameDate">
			<p class="dateName"><?php the_date('M j, Y'); ?></p>
			<p class="dateName2">BY <?php the_author(); ?> NGUYEN</p>
			<!-- <p class="comments"><?php comments_popup_link('Comments ', '1 Response &raquo;', '% Responses &raquo;'); ?></p> -->
		</div>

		<div class="bottomPost">
			<footer class="postedIn">
			    <p><?php the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?></p>			
			</footer>
		</div>
	
		<div class="byLine">
			<h3><?php the_field('byline'); ?></h3>
		</div>

		<section class="entry-content">
			<div class="continue"><?php the_content('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-link"> Pages:',
				'after' => '</div>'
				)); ?>
		</section><!-- .entry-content -->
			
	</article><!-- #post-## -->

<?php comments_template( '', true ); ?>




<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
	<p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>


