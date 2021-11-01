<?php
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
        <div class="card mb-2" >
          <div class="card-header bg-warning">
            <p class="text-white text-center h3">
              <?php the_title(); ?>
            </p>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
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
                  <div class="text-center d-grid">
                    <table class="table table-responsive table-borderless">
                      <thead>
                        <tr class="text-center">
                          <th scope="col" class="flex-fill">Born</th>
                          <th scope="col" class="flex-fill">Died</th>
                      <th scope="col" class="flex-fill">Generation</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <td class="flex-fill"><?php
                          $birth_date = get_field( 'person_birth' );
                          if ( $birth_date ): ?>
                            <?php
                            foreach ( $birth_date as $birth_day ):
                              $birthdate = get_field( 'event_date', $birth_day->ID );
                            if ( $birthdate ):
                              $bdate = $birthdate;
                            else :
                              $bdate = "Unknown";
                            endif;
                            $event_location = get_field( 'event_city', $birth_day->ID );
                            if ( $event_location ):
                              foreach ( $event_location as $event_place ):
                                $birthplace = get_the_title( $event_place->ID );
                            endforeach;
                            else :$birthplace = 'Unknown';
                            endif;
                            endforeach;
                            echo $bdate ?>
                            <br>
                            <?php echo $birthplace . '<br>';
                            else :echo 'No birth info' . '<br>';
                            endif;
                            ?></td>
                          <td class="flex-fill"><?php
                          $death_date = get_field( 'person_death' );
                          if ( $death_date ): ?>
                            <?php
                            foreach ( $death_date as $death_day ):
                              $deathdate = get_field( 'event_date', $death_day->ID );
                            if ( $deathdate ):
                              $ddate = $deathdate;
                            else :
                              $ddate = "Unknown";
                            endif;
                            $death_location = get_field( 'event_city', $death_day->ID );
                            if ( $death_location ):
                              foreach ( $death_location as $death_place ):
                                $deathplace = get_the_title( $death_place->ID );
                            endforeach;
                            else :$deathplace = 'Unknown';
                            endif;
                            endforeach;
                            echo $ddate ?>
                            <br>
                            <?php echo $deathplace;
                            else :echo 'No death info';
                            endif;
                            ?></td>
                          <td class="flex-fill">
                            <?php
                            $term = get_field( 'person_generation' );
                            if ( $term ): ?>
                            <?php echo esc_html( $term->name ); ?>
                            <h6>
                            <?php endif; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class='p-2'>
                      <p class="text-center h4">Family Lines</p>
                      <?php
                      $terms = get_field( 'person_lineage' );
                      if ( $terms ): ?>
                      <ul class="nav justify-content-center">
                        <?php foreach( $terms as $term ): ?>
                        <li class="nav-item "><a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="nav-link"><?php echo esc_html( $term->name ); ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                      <?php else: ?>
                      <p class="text-center">Unknown</p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-inline-flex justify-content-center ">
                    <div class="p-2">
                      <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#familyTree">Family Tree</button>
                      <!-- Button trigger modal -->
                      <div class="modal fade" id="familyTree" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body"> </div>
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
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        
        <!-- Pagination -->
        <div>
          <?php bootscore_pagination(); ?>
        </div>
        </div>
      </main>
      <!-- #main --> 
      
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
