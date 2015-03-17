<?php

/*
	Template Name: Custom Home Page
*/

get_header();  ?>

<div class="main">
  <div class="container">
  	<section class="portMain">
		<div class="portRowTop clearfix">
			<div class="mainInfo">
			    <?php // Start the loop ?>
			    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			      <h2><?php the_title(); ?></h2>
			      <?php the_content(); ?>

			    <?php endwhile; // end the loop?>
		    </div>
		    <figure class='portMainPic'>
		    	<img src="wp-content/themes/theme-hackeryou/img/headphones-edit.png" alt="">
		    </figure>
	    </div>
	    <div class="portRowBottom clearfix">
	    	<figure class='portMainPic'>
		    	<img src="wp-content/themes/theme-hackeryou/img/cable.png" alt="">
	    	</figure>
	    	<div class="skills">
	    		<div class="skillSection clearfix">
				    <?php //we are going to pull in our latest four blog posts ?>
				    <?php $latestPosts = new WP_Query(array(
				    	'post_type' => 'skills', //we only want blog posts
				    	'posts_per_page' => -1
				    )); ?>


					<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
						<div class="skill">
							<div class="skillTitle clearfix">
								<div class="skillIcon">
									<?php the_field('skills_font_image') ?>
								</div>
								<h4><?php the_title(); ?></h4>
							</div>
							<?php the_content(); ?>
						</div>
					<?php endwhile; //end custom loop?>
					<?php wp_reset_postdata(); // return env back to regular?>
				</div>
			</div>
		</div>
	</section>
	</div>
<div class="aboutMe" id="aboutme">
	<div class="container clearfix about"> 
		<div class="aboutInfo">
	        <?php //we are going to pull in our latest four blog posts ?>
	        <?php $latestPosts = new WP_Query(array(
	        	'post_type' => 'about', //we only want blog posts
	        	'posts_per_page' => -1
	        )); ?>


	    	<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
	    		<h2><?php the_title(); ?></h2>
	    		<?php the_content(); ?>
	    	<?php endwhile; //end custom loop?>
	    	<?php wp_reset_postdata(); // return env back to regular?>
		</div>
		<div class="headshot">
			<img src="wp-content/themes/theme-hackeryou/img/headshotbw.jpg" alt="">
		</div>
	</div> 
</div> 
<div class="container portfolio" id='portfolio'>
	<div class="portPieces clearfix"> 
		<h2>Portfolio</h2>
	    <?php //we are going to pull in our latest four blog posts ?>
	    <?php $latestPosts = new WP_Query(array(
	    	'post_type' => 'portfolio', //we only want blog posts
	    	'posts_per_page' => 4
	    )); ?>


		<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
			<div class="portPiece clearfix">
				  <?php while( has_sub_field('images') ): ?>
				    <div class="image">
				      <a class='portLink' target="_blank" href="<?php the_field('live_link'); ?>">
					      <div class="imageBox">
						      <h3>See it Live</h3>
					      </div>
				      </a>
				      <?php $image = get_sub_field('image'); ?>
				      <img src="<?php echo $image['sizes']['large'] ?>">
				    </div>
				  <?php endwhile; ?>
				<div class="portInfo">
					<h4 class='portTitle'><?php the_title(); ?></h4>
					<p class="tags"><?php the_terms( $post->ID, 'technologies','&#x276f;', ' '); ?></p>
					<div class="portDesc">
						<?php the_content(); ?>
						<a class='liveLink' href="<?php the_field('live_link'); ?>">See It Live</a> 
					</div>	
				</div> 
			</div>
		<?php endwhile; //end custom loop?>
		<?php wp_reset_postdata(); // return env back to regular?>
	</div>	
</div>
<div class="social" id='contact'>
	<div class="socialInfo container clearfix">
		<h2>Say Hello</h2>
		
		    <?php //we are going to pull in our latest four blog posts ?>
		    <?php $latestPosts = new WP_Query(array(
		    	'post_type' => 'social', //we only want blog posts
		    	'posts_per_page' => -1
		    )); ?>


			<?php if($latestPosts->have_posts()) while($latestPosts ->have_posts()) : $latestPosts->the_post(); ?>
				<div class="socialSection">
					<?php the_field('font_markup') ?>
					<div class="socialText">
						<p><?php the_content(); ?></p>
						<p><a class="socialLink" href="<?php the_field('url')?>"><?php the_field('linktext')?></a></p> 
					</div>
				</div>
			<?php endwhile; //end custom loop?>
			<?php wp_reset_postdata(); // return env back to regular?>
	</div>
</div>


</div> <!-- /.main -->

<?php get_footer(); ?>