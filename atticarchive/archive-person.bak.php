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
                  <?php else : ?>
                  <img src="<?php echo get_theme_file_uri(); ?> /img/no-photo-icon.png" class="rounded mb-3 img-fluid">
                  <?php endif;?>
                </div>
              </div>
              <div class="col-sm-9">
                <div class="d-flex justify-content-around text-center">
                  <div class="text-center">
                   <div>
                      <?php get_template_part( 'template-parts/components/person', 'summary' ); ?>
                 
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
					    <!-- Button trigger modal --> 
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#familyTree">Family Tree</button>
                  </div>
                <?php get_template_part( 'template-parts/components/family', 'tree' ); ?>
          
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
