<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<div class="main">
	<div class="container">
		<div class="block">
			<h2>hello</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus ab, dicta officia adipisci laboriosam cumque neque id tempora optio, assumenda.</p>
		</div>
		<div class="block">
			<h2>hello</h2>
			<p>Esse sed assumenda expedita totam aut, laudantium nihil corporis qui debitis pariatur, fuga culpa facere quasi. Omnis, repellendus quaerat sit.</p>
		</div>
		<div class="block">
			<h2>hello</h2>
			<p>Ipsam impedit nesciunt numquam dicta reprehenderit illo suscipit quas voluptate veritatis quam? Modi cum officiis, velit excepturi et minima. Blanditiis.</p>
		</div>

		<div class="content">
			<?php get_template_part( 'loop', 'index' );	?>
		</div> <!--/.content -->

		

	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>