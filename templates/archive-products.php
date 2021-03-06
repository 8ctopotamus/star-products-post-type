<?php
  get_header();

  $cats = get_terms( array(
    'taxonomy' => 'product_categories',
    'parent'   => 0
  ) );
?>

<div id="main-content">
  <div class="container">
    <div id="content-area" class="clearfix">

        <?php if (have_posts()) : ?>
          <div class="filter-button-group">
            <?php
              echo '<button type="button" class="et_pb_button active" name="all">All</button>';
              foreach($cats as $cat) {
                echo '<button type="button" class="et_pb_button" name="'. $cat->slug .'">'. $cat->name .'</button>';
              }
            ?>
          </div>
          <div class="row star-plastics-shuffle-container">
            <!-- the posts -->
            <?php while (have_posts()) : the_post();
                $terms = get_the_terms( $post->ID , array( 'product_categories') );
                $terms_arr = [];
                $i = 1;
                foreach ( $terms as $term ) {
                  $term_link = get_term_link( $term, array( 'product_categories') );
                  if( is_wp_error( $term_link ) )
                    continue;
                  array_push($terms_arr, '"'.$term->slug.'"');
                  $i++;
                }
                $groups = implode(", ", $terms_arr)
              ?>
                <figure class="col-4@sm picture-item column" data-groups='[<?php echo $groups; ?>]' data-date-created="2015-10-20" data-title="<?php echo the_title(); ?>">
                   <div class="aspect aspect--16x9">
                     <div class="aspect__inner">
                       <a href="<?php the_permalink(); ?>">
                         <?php echo the_post_thumbnail( 'thumbnail' ); ?>
                       </a>
                     </div>
                   </div>
                   <figcaption><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></figcaption>
                </figure>
              <?php endwhile; ?>
              <div class="col-1@sm star-plastics-sizer-element"></div>
            </div>
          <?php else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
          <?php endif; ?>

      </div>
    </div>
  </div>

<?php get_footer(); ?>
