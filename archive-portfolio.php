<?php get_header(); ?>

<div class="main">
  <div class="container">
    <div class="content">

     <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
       <h2><a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
          <?php the_title(); ?>
        </a></h2>
       <p class="client"><?php the_field('client_name'); ?></p> 
        
       <div class="shortDesc">
         <?php the_field('short_desc'); ?>
       </div>
       <div class="images">
         <?php while( has_sub_field('images') ): ?>
           <div class="image">
             <p><?php the_sub_field('caption'); ?></p>
             <?php $image = get_sub_field('image'); ?>
             <img src="<?php echo $image['sizes']['square'] ?>">
           </div>
         <?php endwhile; ?>
       </div>
       <?php the_content(); ?>
       <?php the_terms($post->ID, 'technologies','','X');  ?>
     <?php endwhile; // end of the loop. ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>