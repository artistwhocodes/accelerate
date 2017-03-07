 
<?php
/** 
 * Template Name: About My Work
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?> 

<section id="about"> 
 <div class="home-page">
	<div class="site-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class='homepage-hero'>
				<h3><?php the_title(); ?></h3>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .container -->
</div><!-- .home-page -->


<div id="primary" class="site-content">
    <div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); 
            $size = "full"; 
            $image_01 = get_field("image_01"); 
            $services = get_field('services');
            $para = get_field('para');
            $image_02 = get_field("image_02");
            $services_02 = get_field('services_02');
            $para_02 = get_field('para_02');
            $image_03 = get_field("image_03");
            $services_03 = get_field('services_03');
            $para_03 = get_field('para_03'); 
            $image_04 = get_field("image_04");
            $services_04 = get_field('services_04');
            $para_04 = get_field('para_04');
            $contact = get_field('contact');
            $services_05 = get_field('services_05');
        ?>
            <article class="about-work">
                 <aside class="about-work-sidebar">
                    <?php the_content(); ?> 
                </aside>
                
                <aside class="about-work-sidebar">
                      <div class="about-work-images alignleft" >
                         <a href="<?php echo the_permalink(); ?>" >
                            <?php  if($image_01) { 
                                    echo wp_get_attachment_image( $image_01, $size );
                                } ?>
                        </a>    
                                   
                      </div>
                    <div class="para">
                    <h2> <?php echo $services; ?> </h2> 
                     <?php echo $para; ?></div> 
                </aside>
                
                
                <aside class="about-work-sidebar">
                    <div class="about-work-images alignright"> 
                        <a href="<?php echo the_permalink(); ?>" >
                            <?php  if($image_02) { 
                                    echo wp_get_attachment_image( $image_02, $size );
                                } ?>
                        </a> 
                    </div>
                    <div class="para_02">
                    <h2><?php echo $services_02; ?></h2> 
                    <?php echo $para_02; ?>
                    </div> 
                </aside> 
                
                <aside class="about-work-sidebar">
                    <div class="about-work-images alignleft" >
                         <a href="<?php echo the_permalink(); ?>" >
                            <?php  if($image_03) { 
                                    echo wp_get_attachment_image( $image_03, $size );
                                } ?>
                        </a>           
                    </div>
                    <div class="para_03">
                    <h2> <?php echo $services_03; ?> </h2> 
                     <?php echo $para_03; ?>
                    </div> 
                </aside>     
                
                <aside class="about-work-sidebar">
                    <div class="about-work-images alignright" >
                         <a href="<?php echo the_permalink(); ?>" >
                            <?php  if($image_04) { 
                                    echo wp_get_attachment_image( $image_04, $size );
                                } ?>
                        </a>               
                    </div>
                    <div class="para_04">
                    <h2> <?php echo $services_04; ?> </h2> 
                     <?php echo $para_04; ?>
                    </div> 
                </aside>
                
                <aside class="about-work-footer "> 
                    
                    <h2> <?php echo $services_05; ?>  </h2>
                    <a class="button" href="<?php echo home_url(  'contact-us' ); ?>">
                            <?php echo $contact; ?>
                        </a>
                     
                </aside>
             
  
            </article>    
        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->
</section>
<?php get_footer(); ?>