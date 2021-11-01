 <?php

/**
 * The template for displaying archive pages
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
          <div class="card mb-2" >
            <div class="card-header bg-warning">
              <p class="text-white text-center h3">
                <?php the_title(); ?>
              </p>
            </div>
            <div class="card-body mb-2">
              <div class="row">
                <div class="col-sm-12 col-md-3">
                  <div class="w-50">
                    <?php
                    if ( has_post_thumbnail() ):
                      echo '<div class="">' . get_the_post_thumbnail( null, 'medium' ) . '</div>';
                    ?>
                    <?php else : ?>
                    <img src="<?php echo get_theme_file_uri('/img/no-photo-icon.png'); ?>" class="rounded mb-3 img-fluid">
                    <?php endif;?>
                  </div>
                </div>
                <div class="col-sm-12 col-md-9">
                  <div class="d-flex justify-content-around text-center">
                    <div class="d-grid">
                      <div class="h6">Born </div>
                      <div class="fs-6">
                        <?php
                        $person_birth = get_field( 'person_birth' );
                        if ( $person_birth ): ?>
                        <?php
                        foreach ( $person_birth as $birth_fact ):
                          $birthdate = get_field( 'event_date', $birth_fact->ID );
                        $birth_place = get_field( 'event_city', $birth_fact->ID );
                        if ( $birth_place ):
                          foreach ( $birth_place as $birthplace ):
                            $title = get_the_title( $birthplace->ID );
                        ?>
                        <?php echo $birthdate; ?>
                        <?php endforeach; else: echo 'Unknown';?>
                        <?php
                        endif;
                        ?>
                        <div class="mb-2"> <?php echo $title; ?> </div>
                        <?php endforeach; ?>
                        <?php else: echo 'Unkown'; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="d-grid">
                      <div class="h6">Died </div>
                      <div class="fs-6">
                        <?php
                        $person_death = get_field( 'person_death' );
                        if ( $person_death ): ?>
                        <?php
                        foreach ( $person_death as $death_fact ):
                          $deathdate = get_field( 'event_date', $death_fact->ID );
                        $death_place = get_field( 'event_city', $death_fact->ID );
                        if ( $death_place ):
                          foreach ( $death_place as $deathplace ):
                            $title = get_the_title( $deathplace->ID );
                        ?>
                        <?php echo $deathdate; ?>
                        <?php endforeach; else: echo 'Unknown';?>
                        <?php
                        endif;
                        ?>
                        <div class="mb-2"> <?php echo $title; ?> </div>
                        <?php endforeach; ?>
                        <?php else: echo 'Unkown'; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="d-grid">
                      <div class="h6">Generation </div>
                      <div class="fs-6">
                        <?php
                        $term = get_field( 'person_generation' );
                        if ( $term ): ?>
                        <?php echo esc_html( $term->name ); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-evenly">
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#familyTree">Family Tree</button>
                    <?php get_template_part( 'template-parts/components/family', 'view' ); ?>
                    <a href="<?php the_permalink(); ?>">
                    <button type="button" class="btn btn-warning text-white">More Info</button>
                    </a> </div>
                  <div class="d-flex justify-content-evenly align-items-end">
                    <?php
                    $terms = get_field( 'person_lineage' );
                    if ( $terms ): ?>
                    <ul class="nav justify-content-center">
                      <?php foreach( $terms as $term ): ?>
                      <li class="nav-item"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="nav-link"><?php echo esc_html( $term->name ); ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
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
        </main>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
