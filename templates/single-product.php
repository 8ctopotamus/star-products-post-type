<?php
  get_header();
 ?>
 <div id="main-content">
   <div class="container">
     <div id="content-area" class="clearfix">

       <div class=" et_pb_row et_pb_row_2">
         <div class="et_pb_column et_pb_column_1_2">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" style="width: 100%;" />
         </div>
         <div class="et_pb_column et_pb_column_1_2">
           <h1><?php the_title(); ?></h1>
           <?php the_content(); ?>
         </div>
       </div>
     </div>
  </div>
</div>

<?php get_footer(); ?>
