<?php
/*
 * Template Post Type: post
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area"> 
    <!-- main row Begin -->
    <div class="row"> 
      <!-- #main col Begin-->
      <div class="col-sm-8 col-xxl-9"> 
        <!-- #main Section Start-->
        <main id="main" class="site-main">
          <div class="container">
            <div class="row w-100">
              <div class="col-sm-12">
                <header class="entry-header">
                  <?php  the_post(); ?>
                  <?php
                  /* bootscore_category_badge();
                                   <?php the_title('<h1>', '</h1>'); ?>
                                   <p class="entry-meta"> <small class="text-muted">
                                     <?php
                                     bootscore_date();
                                     _e( ' by ', 'bootscore' );
                                     the_author_posts_link();
                                     bootscore_comment_count();
                                     ?>
                                     </small> </p> */
                  ?>
                  <?php bootscore_post_thumbnail(); ?>
                </header>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col">
                <?php if ( have_rows( 'post_field_repeater' ) ) : ?>
                <?php while ( have_rows( 'post_field_repeater' ) ) : the_row(); ?>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php the_sub_field( 'post_section_text' ); ?>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                      <?php $post_repeater_image = get_sub_field( 'post_repeater_image' ); ?>
                      <?php if ( $post_repeater_image ) : ?>
                      <img src="<?php echo esc_url( $post_repeater_image['url'] ); ?>" alt="<?php echo esc_attr( $post_repeater_image['alt'] ); ?>" />
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php $post_repeater_link = get_sub_field( 'post_repeater_link' ); ?>
                      <?php if ( $post_repeater_link ) : ?>
                      <a href="<?php echo esc_url( $post_repeater_link['url'] ); ?>" target="<?php echo esc_attr( $post_repeater_link['target'] ); ?>"><?php echo esc_html( $post_repeater_link['title'] ); ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php $post_repeater_material = get_sub_field( 'post_repeater_material' ); ?>
                      <?php if ( $post_repeater_material ) : ?>
                      <div class="container">
                        <div class="row justify-content-center">
                          <?php foreach ( $post_repeater_material as $post ) : ?>
                          <div class="col-sm-3">
                            <?php setup_postdata ( $post ); ?>
                            <div class="card text-center mb-2 ">
                              <div class="card-body">
                                <?php bootscore_post_thumbnail(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-warning text-white mt-2">More Info </a> </div>
                            </div>
                          </div>
                          <?php endforeach; ?>
                          <?php wp_reset_postdata(); ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php $post_repeater_person = get_sub_field( 'post_repeater_person' ); ?>
                      <?php if ( $post_repeater_person ) : ?>
                      <div class="container">
                        <div class="row justify-content-center">
                          <?php foreach ( $post_repeater_person as $post ) : ?>
                          <div class="col-sm-3">
                            <?php setup_postdata ( $post ); ?>
                            <div class="card text-center mb-2">
                              <div class="card-body">
                                <?php bootscore_post_thumbnail(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-warning text-white mt-2">More Info </a> </div>
                            </div>
                          </div>
                          <?php endforeach; ?>
                          <?php wp_reset_postdata(); ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php $post_repeater_place = get_sub_field( 'post_repeater_place' ); ?>
                      <?php if ( $post_repeater_place ) : ?>
                      <?php foreach ( $post_repeater_place as $post ) : ?>
                      <?php setup_postdata ( $post ); ?>
                      <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                      </a>
                      <?php endforeach; ?>
                      <?php wp_reset_postdata(); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php $post_repeater_event = get_sub_field( 'post_repeater_event' ); ?>
                      <?php if ( $post_repeater_event ) : ?>
                      <?php foreach ( $post_repeater_event as $post ) : ?>
                      <?php setup_postdata ( $post ); ?>
                      <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                      </a>
                      <?php endforeach; ?>
                      <?php wp_reset_postdata(); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <?php $post_repeater_story = get_sub_field( 'post_repeater_story' ); ?>
                      <?php if ( $post_repeater_story ) : ?>
                      <div class="container">
                        <div classs="row">
                          <?php foreach ( $post_repeater_story as $post ) : ?>
                          <div class="col-sm-4">
                            <?php setup_postdata ( $post ); ?>
                            <div class="card text-center mb-2">
                              <h5 class="card-header">
                                <?php the_title(); ?>
                              </h5>
                              <div class="card-body"> <?php bootscore_post_thumbnail();  ?> <a href="<?php the_permalink(); ?>" class="btn btn-warning text-white mb-2">View Story</a> </div>
                            </div>
                            <?php endforeach; ?>
                          </div>
                          <?php wp_reset_postdata(); ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <?php // no rows found ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-- #main End--> 
        </main>
        
        <!-- Main Content Col End --> 
      </div>
      <!-- Sidebar Area --> 
      <!-- Sidebar Col Start -->
      <div class="col-sm-4 col-xxl-3">
        <div class="container">
          <div class="row">
            <div class="col">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Sidebar Col End --> 
    </div>
    <!-- Row End --> 
  </div>
  <!-- #Primary End--> 
</div>
<!-- #content -->
</div>
<?php get_footer(); ?>
