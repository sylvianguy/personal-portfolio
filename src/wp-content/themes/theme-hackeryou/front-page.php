<?php
/*
Template Name: STATIC PAGE
*/get_header();  ?>
 <div class="hero">
 	<h1 class="heroTitle"><?php the_title(); ?></h1>
 	<h2 class="heroTitle2">Front-end Developer</h2>	
 	<div class="icon">
 		<svg class"tri" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 		viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
 		<path d="M60.518,53.177L38.966,18.397l-4.62,7.46l-9.313-15.034L3.825,45.052l-0.342,0.552h18.628l-4.692,7.573H60.518z
 		M19.577,51.978l19.389-31.301l19.394,31.301H19.577z M5.64,44.403l19.393-31.3l8.607,13.894L22.857,44.403H5.64z"/>
 	</svg>
 </div>

 <div class="button">
 	<a href="#header" id="view"><h4>VIEW PORTFOLIO</h4></a>
 </div>
 
</div>
<!-- <div class="border1"></div> -->
</div>

<div class="sticky" id="sticky"></div>

<div class="nav" id=""><?php get_template_part( 'nav'); ?></div>

<div class="main">
	<div class="container">

		<div class="myWork" id="myWork">
			<div class="boxthingy">
				<h2>Portfolio</h2>
				<h2 class="boxthing">view my live sites here</h2>
			</div>

			<?php $newWorkQuery = new WP_Query(
				array( 
					'posts_per_page' => 5, 
					'post_type' => 'portfolio'
					) 
					); ?>
					<?php if ( $newWorkQuery->have_posts() ) : ?>
						<?php while ( $newWorkQuery->have_posts() ) : $newWorkQuery->the_post(); ?>

							<?php if (has_post_thumbnail() ): ?>
								<?php $postImage = wp_get_attachment_image_src(get_post_thumbnail_id($newWorkQuery->post->ID),'large'); ?>

								<div class="square" data-sr style="background-image: url('<?php echo $postImage[0]; ?> ')">
									<a href="<?php the_field('website_url'); ?>">
										<h2><?php the_title(); ?></h2> 
										<div class="border1"></div>
									</a>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else:  ?>
						<p>Didn't find any portfolio items. :(</p>
					<?php endif; ?>
				</div>


				<div class="personal" id="about">
					<h2>ABOUT ME</h2>
					<div class="bioBlock">
						<div class="profileBlock">
							<div class="profileImg"></div>
						</div>

						<div class="bio">
						
							<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<?php the_content();?>
						<?php endwhile; ?>
							</div>
						</div>
					</div>

					<div class="skills">
						<h2>SKILLS</h2>
						<?php while( has_sub_field('skill_list') ): ?>
							<div class="skill">
								<div class="skillIcon"><?php the_sub_field('skill_icon'); ?></div>
								<h3><?php the_sub_field('skill_title'); ?></h3>
								<p><?php the_sub_field('skill_desc'); ?></p>
							</div>

						<?php endwhile; ?>

					</div>
					
					<div class="blogIntro">
						<h2>Featured Posts</h2>
					</div>

					<div class="featuredBlog">
						<?php $newQuery = new WP_Query(
							array( 
								'posts_per_page' => 3, 
								'post_type' => 'post', 
								) 
								); ?>
								<?php if ( $newQuery->have_posts() ) : ?>
									<?php while ( $newQuery->have_posts() ) : $newQuery->the_post(); ?>

										<?php if (has_post_thumbnail() ): ?>
											<?php $postImage = wp_get_attachment_image_src(get_post_thumbnail_id($newQuery->post->ID),'large'); ?>
											<div class="blogs blog1 blog2 blog3" data-sr style="background-image: url('<?php echo $postImage[0]; ?> ')">
												<a href="<?php echo get_permalink(); ?>">
													<div class="black">
														<div class="fBlog">
															<h3><?php the_title(); ?></h3> 
															<p><?php the_date(); ?></p>
														</div>
														<div class="border"></div>
													</div>
												</a>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								<?php else:  ?>
									<p>Didn't find any portfolio items. :(</p>
								<?php endif; ?> 
							</div>

							<div class="social" id="contact">
								<h2>Keep in touch</h2>
								<div class="socialBlock" data-sr>
									<h3>Twitter</h3>
									<a href="http://twitter.com/sylviacreates" target="_blank"><span>@SylviaCreates</span><i class="fa fa-twitter"></i></a>
								</div>
								<div class="socialBlock">
									<h3>github</h3>
									<a href="https://github.com/sylvianguy" target="_blank">SylviaNguy<i class="fa fa-github-square"></i></a>
								</div>
								<div class="socialBlock">
									<h3>Email</h3>
									<a href="mailto:sylvia@sylvia.io">Sylvia@sylvia.io<i class="fa fa-envelope"></i></a>
								</div>
							</div>

							<div class="form">

							</div>
























						</div> <!-- /.container -->
					</div> <!-- /.main -->

					<?php get_footer(); ?>
