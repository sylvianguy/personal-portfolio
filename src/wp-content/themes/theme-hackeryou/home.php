<?php get_header(); ?>
<?php get_template_part( 'nav'); ?>

 	<!-- <h1><?php the_title(); ?></h1> -->
 	

</div>
<div class="main mainBlog">
	<div class="container">

		<?php if ( has_post_thumbnail() ) {
			
		}  ?>

		<div class="content contentBlog">
			<?php get_template_part( 'loop', 'index' );	?>
		
			

		</div> <!--/.content -->

		

	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>