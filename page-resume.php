<?php

/*
	Template Name: Custom Resume Page
*/

get_header();  ?>

<div class="main">
  <div class="container">

    <div class="content resume clearfix">
    	<div class="resumeHead">
			<img class="resumeLogo" src="<?php bloginfo('template_directory'); ?>/img/headphonesresume.svg" alt="">
			<h2>
			  <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
			    <?php bloginfo( 'name' ); ?>
			  </a>
			</h2>
		    <?php //we are going to pull in our latest four blog posts ?>
		    <?php $latestPosts = new WP_Query(array(
		    	'post_type' => 'resumecontact', //we only want blog posts
		    	'posts_per_page' => -1
		    )); ?>


			<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
				<h3><a href="mailto:<?php the_field('resume_email') ?>"><?php the_field('resume_email') ?></a> // <a href="http://<?php the_field('resume_website') ?>"><?php the_field('resume_website') ?></a> // <?php the_field('resume_phone') ?></h3>
			<?php endwhile; //end custom loop?>
			<?php wp_reset_postdata(); // return env back to regular?>
			
    	</div>
    	<div class="skillsColumn">
          <?php $latestPosts = new WP_Query(array(
          	'post_type' => 'resumeskills', //we only want blog posts
          	'posts_per_page' => -1
          )); ?>


      	<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
      		<div class="skillList">
      		
	      		<h4><?php the_title(); ?></h4>
	      		  <?php while( has_sub_field('skills') ): ?>
	      		    <p><?php echo get_sub_field('skills') ?></p> 
	      		  <?php endwhile; ?>
	      	</div>
	      	<?php endwhile; //end custom loop?>

	      	<?php wp_reset_postdata(); // return env back to regular?>
      	</div>
		
		<div class="portColumn">
		    <?php $latestPosts = new WP_Query(array(
		    	'post_type' => 'resumeabout', //we only want blog posts
		    	'posts_per_page' => -1
		    )); ?>

			
			<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
				<h4><?php the_title(); ?></h4>
				  <?php while( the_repeater_field('content') ): ?>
				  	<?php if(get_sub_field('sub_heading')): ?>
					  	<h5><?php echo get_sub_field('sub_heading') ?></h5>
				  	<?php endif; ?>
				  	<?php if(get_sub_field('date')): ?>
					  	<p class='resumeDate'><?php echo get_sub_field('date') ?></p>
				  	<?php endif; ?>
				  	<?php if(get_sub_field('sub_content')): ?>
					   	<p><?php echo get_sub_field('sub_content') ?></p> 
				   	<?php endif; ?>
				   	<?php if(get_sub_field('portfolio_url')): ?>
					   	<a href="<?php echo get_sub_field('portfolio_url') ?>"><?php echo get_sub_field('portfolio_url') ?></a> 
				   	<?php endif; ?>
				  <?php endwhile; ?>
			<?php endwhile; //end custom loop?>
			<?php wp_reset_postdata(); // return env back to regular?>
		</div>

    </div> <!-- /,content -->
    <div class="print">
    	<a href="javascript:window.print()">
    		<i class="fa fa-print"></i>
    	</a>
    </div>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>