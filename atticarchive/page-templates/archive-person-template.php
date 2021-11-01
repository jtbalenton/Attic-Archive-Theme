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
                <div class="w-50">
                  <?php
                  if ( has_post_thumbnail() ):
                    echo '<div class="">' . get_the_post_thumbnail( null, 'medium' ) . '</div>';
                  ?>
                  <?php else :  ?>
                  <img src="<?php echo get_theme_file_uri(); ?> /img/no-photo-icon.png" class="rounded mb-3 img-fluid">
                  <?php endif;?>
                </div>
              </div>
              <div class="col-sm-9">
                <div class="d-flex justify-content-around">
                  <div class="text-center">
                    <div class="d-grid">
                      <h5 class="h6">Born</h5>
                      <?php
                      $birth_date = get_field( 'person_birth' );
                      if ( $birth_date ): 
						
						?>
                      <?php
                      foreach ( $birth_date as $birth_day ):
                        $birthdate = get_field( 'event_date', $birth_day->ID );
					    $event_place = get_field( 'event_city', $birth_day->ID );
                      ?>
                      <div class=""> <?php echo $birthdate; ?> </div>
                      <?php endforeach; ?>
                      <?php else: ?>
                      <p class="text-center">Unknown</p>
                      <?php
                      endif;
                      if ( $event_place ):
                        foreach ( $event_place as $eventplace ):
                          $title = get_the_title( $eventplace->ID );
                      ?>
                      <div class=""><?php echo $title; ?></div>
                      <?php endforeach; else:?>
                      <p class="text-center">?</p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="text-center d-grid">
                    <h5 class="h6">Died</h5>
                    <?php
                    $death_date = get_field( 'person_death' );
                    if ( $death_date ): ?>
                    <?php
                    foreach ( $death_date as $death_day ):
                      $deathdate = get_field( 'event_date', $death_day->ID );
					  $death_place = get_field( 'event_city', $death_day->ID );
                    ?>
                    <div class=""> <?php echo $deathdate; ?> </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="text-center">Unknown</p>
                    <?php endif;
					  if ( $death_place ):
                        foreach ( $death_place as $eventplace ):
                          $title = get_the_title( $eventplace->ID );
					  ?>
					   <div class=""><?php echo $title; ?></div>
                      <?php endforeach; else:?>
                      <p class="text-center">?</p>
                      <?php endif; ?>
                    </div>
                  
                 
                  <div class="text-center">
                    <h5 class="h6">Generation</h5>
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
                  <li class="nav-item border-end border-warning"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="nav-link"><?php echo esc_html( $term->name ); ?></a></li>
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
                            <div class="row row-cols-2 mb-2"> </div>
                            <p class="text-center">Siblings</p>
                            <div class="row row-cols-4 mb-2 d-flex justify-content-evenly"> > </div>
                            <p class="text-center">Children</p>
                            <div class="row row-cols-4 mb-2 d-flex justify-content-evenly"> </div>
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
