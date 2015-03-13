<?php get_header(); ?>

<div class="section">
  <div class="innerWrapper">
    <div class="container">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="images">
          <?php while( has_sub_field('images') ): ?>
            <div class="image">
              <p><?php the_sub_field('caption'); ?></p>
              <?php $image = get_sub_field('image'); ?>
              <img src="<?php echo $image['sizes']['large'] ?>">
            </div>
          <?php endwhile; ?>
        </div>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <p class="tags"><?php the_terms( $post->ID, 'technologies','Technologies: ', ' '); ?></p> 
      <?php endwhile; // end of the loop. ?>
    </div>
  </div> <!-- /.innerWrapper -->
</div> <!-- /.section -->

<?php get_footer(); ?>