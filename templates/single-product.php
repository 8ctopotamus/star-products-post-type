<?php
  get_header();
 ?>
 <div id="main-content">
   <div class="container">
     <div id="content-area" class="clearfix">
       <div id="left-area">
         <h1><?php the_title(); ?></h1>
         <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" style="width: 200px; float: right;" />
         <?php the_content(); ?>
       </div>
     </div>
  </div>
</div>

<?php get_footer(); ?>
