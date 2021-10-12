<?php

  /* Template Name: Person Archive */ 

    /** 
     * The template for displaying all pages
     *
     * This is the template that displays all pages by default.
     * Please note that this is the WordPress construct of pages
     * and that other 'pages' on your WordPress site may use a
     * different template.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Bootscore
     */
    

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area"> 
    
    <!-- Hook to add something nice -->
    <?php
    bs_after_primary();


    ?>
    <div class="row">
      <div class="col-sm-3"> <?php echo do_shortcode('[searchandfilter id="1254"]'); ?> </div>
      <div class="col-sm-9">
        <main id="main" class="site-main">
        
        <!-- Grid Layout -->
        <?php if (have_posts() ) : ?>
        <?php while ( have_posts() ): the_post(); ?>
        <div class="card" >
          <div class="card-header bg-warning">
            <p class="text-white text-center h3">
              <?php the_title(); ?>
            </p>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-sm-3">
                <?php
                if ( has_post_thumbnail() ):
                  echo '<div class="">' . get_the_post_thumbnail( null, 'thumbnail' ) . '</div>';
                ?>
                <?php else :  ?>
                <img src="<?php echo get_theme_file_uri(); ?> /img/no-photo-icon.png" class="rounded mb-3 img-fluid">
                <?php endif;?>
              </div>
              <div class="col-sm-9">
                <div class="d-flex justify-content-around">
                  <div class="p-2">
                    <h5 class="card-title">Born</h5>
                    <?php
                    $person_born = get_field( 'person_birth' );
                    if ( $person_born ): ?>
                    <?php foreach( $person_born as $post) : ?>
                    <?php setup_postdata( $post ); ?>
                    <?php if ( $event_date = get_field( 'event_date' ) ) : ?>
                    <?php echo esc_html( $event_date ); ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  </div>
                  <div class="p-2">
                    <h5 class="card-title">Died</h5>
                    <?php
                    $person_died = get_field( 'person_death' );
                    if ( $person_died ): ?>
                    <?php foreach( $person_died as $post) : ?>
                    <?php setup_postdata( $post ); ?>
                    <?php if ( $event_date = get_field( 'event_date' ) ) : ?>
                    <?php echo esc_html( $event_date ); ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  </div>
                  <div class="p-2">
                    <h5 class="card-title">Generation</h5>
                    <?php
                    $term = get_field( 'person_generation' );
                    if ( $term ): ?>
                    <h6 class="card-text text-center">
                    <?php echo esc_html( $term->name ); ?>
                    <h6>
                    <?php endif; ?>
                  </div>
                </div>
                <p class="text-center card-text h4">Family Lines</p>
                <?php
                $terms = get_field( 'person_lineage' );
                if ( $terms ): ?>
                <ul class="nav justify-content-center">
                  <?php foreach( $terms as $term ): ?>
                  <li class="nav-item border-end border-warning"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="nav-link link-warning"><?php echo esc_html( $term->name ); ?></a></li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <div class="d-flex justify-content-evenly">
                  <div class="p-2">
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#familyTree">Family Tree</button>
                  </div>
                  <!-- Button trigger modal --> 
                  <!-- Modal -->
                  <div class="modal fade" id="familyTree" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                            <p class="text-center">Parents</p>
                            <div class="d-flex justify-content-center">
                              <?php
                              $parents = get_field( 'person_parents' );
                              if ( $parents ): ?>
                              <?php
                              foreach ( $parents as $post ):
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata( $post );
                              ?>
                              <div class="p-2"> <a href="<?php the_permalink(); ?>">
                                <button type="button" class="btn btn-secondary btn-sm">
                                <?php the_title(); ?>
                                </button>
                                </a> </div>
                              <?php endforeach; ?>
                              <?php
                              // Reset the global post object so that the rest of the page works correctly.
                              wp_reset_postdata();
                              ?>
                              <?php endif; ?>
                            </div>
                            <p class="text-center">Siblings</p>
                            <div class="d-flex justify-content-evenly">
                              <?php
                              $siblings = get_field( 'person_siblings' );
                              if ( $siblings ): ?>
                              <?php
                              foreach ( $siblings as $post ):
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata( $post );
                              ?>
                              <div class="p-2"> <a href="<?php the_permalink(); ?>">
                                <button type="button" class="btn btn-secondary btn-sm">
                                <?php the_title(); ?>
                                </button>
                                </a> </div>
                              <?php endforeach; ?>
                              <?php
                              // Reset the global post object so that the rest of the page works correctly.
                              wp_reset_postdata();
                              ?>
                              <?php endif; ?>
                            </div>
                            <p class="text-center">Children</p>
                            <div class="d-flex justify-content-evenly">
                              <?php
                              $children = get_field( 'person_children' );
                              if ( $children ): ?>
                              <?php
                              foreach ( $children as $post ):
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata( $post );
                              ?>
                              <div class="p-2"> <a href="<?php the_permalink(); ?>">
                                <button type="button" class="btn btn-secondary btn-sm">
                                <?php the_title(); ?>
                                </button>
                                </a> </div>
                              <?php endforeach; ?>
                              <?php
                              // Reset the global post object so that the rest of the page works correctly.
                              wp_reset_postdata();
                              ?>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-2"> <a href="<?php the_permalink(); ?>">
                    <button type="button" class="btn btn-warning text-white">More Info</button>
                    </a> </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
          
          <!-- Pagination -->
          <div>
            <?php bootscore_pagination(); ?>
          </div>
          </main>
          <!-- #main --> 
        </div>
      </div>
      <!-- col --> 
      
    </div>
    <!-- row --> 
    
  </div>
  <!-- #primary --> 
</div>
<!-- #content -->

<?php
get_footer();
