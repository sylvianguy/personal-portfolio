<?php //index.php is the last resort template, if no other templates match ?>
 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
 <div class="hero" style="background-image: url(<?php echo $image ?>)">
 	<h1><?php the_title(); ?></h1>
<?php get_header(); ?>

<div class="main">

	<div class="container">

		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('large', array('class' => 'postHeader'));
			// else (the_post_thumbnail()('large', array('class' => 'postHeader')));
		}  ?>

		<div class="content">
			<?php get_template_part( 'loop', 'index' );	?>
			<?php the_post_thumbnail('large'); ?>
			<p>WHATS UP YOYOYOYOYOYO</p>
		</div> <!--/.content -->

		

	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>