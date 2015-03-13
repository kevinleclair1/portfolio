<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <p>Posted on <?php the_date('F, d Y'); ?> in <?php the_category(', '); ?></p>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation clearfix">
          <div class="prev-post">
            <h4>Previous Post:</h4>
            <p class="nav-previous"><?php previous_post_link('%link', '%title'); ?></p>
          </div>
          <div class="next-post">
            <h4>Next Post:</h4>
            <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
          </div>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>