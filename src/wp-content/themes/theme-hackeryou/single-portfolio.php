<?php get_header(); ?>

<div class="main clearfix">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-content">
            <h5><?php the_field('client_name'); ?></h5>
            <p><?php the_field('short_desc'); ?></p>
            <?php the_terms($post->ID, 'technology'); ?>
            <?php the_content(); ?>
            
            <div class="gallery"> <!-- anything that happens in this loop, happens 4 times -->
              <?php while(has_sub_field('gallery_images')): ?>
                <div class="gallery-item">
                  <?php $image = get_sub_field('image'); ?>
                  
                  <?php $image_src = $image['sizes']['thumbnail']; ?>
                  
                  <img src="<?php echo $image_src ?>" alt="">
                                 <!--  display an array content with pre tag -->
                  <!-- <pre> -->
                  <?php // print_r($image); ?>
                  <!-- </pre> -->
                  <p><?php the_sub_field('caption'); ?></p>
                  <a href="<?php echo get_permalink(); ?>"> Read More...</a>
                </div>
              <?php endwhile; ?>  
            </div>


            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
              )); ?>
            </div><!-- .entry-content -->


          </div><!-- #post-## -->

          <div id="nav-below" class="navigation">
            <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
            <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
          </div><!-- #nav-below -->

          <?php comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>

      </div> <!-- /.content -->



    </div> <!-- /.container -->
  </div> <!-- /.main -->

  <?php get_footer(); ?>