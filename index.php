<?php

?>
<?php get_header(); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



    <!-- Main Content -->    

  <article>
    
  
      <div class="small-12 she-blue-background text-center">
                <BR>
            <?php the_title('<h1>','</h1>' ); ?><BR><Br>
      </div>
      <div class="small-12 she-white-background">
        <div class="she-blue-triangle"></div>

 
          <div class="small-10 small-offset-1 medium-8 medium-offset-2">
            
            <?php the_content(); ?>
          </div>


      </div>
      <div class="row"><BR><BR><BR><BR><BR><BR><BR><BR><BR></div>
  


  </article>


        <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>    
    <!-- End Main Content -->
<?php get_footer(); ?>