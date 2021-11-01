<?php
/*
 * Template Post Type: post
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-4">
<div id="primary" class="content-area"> 
  
  <!-- Hook to add something nice -->
  <?php bs_after_primary(); ?>
  <?php the_breadcrumb(); ?>
  <div class="row">
    <div class="col-md-8 col-xxl-9">
		
      <main id="main" class="site-main">
      <header class="entry-header w-100">
        <?php the_post(); ?>
        <?php bootscore_category_badge(); ?>
        <?php the_title('<h1>', '</h1>'); ?>
        <p class="entry-meta"> <small class="text-muted">
          <?php
          bootscore_date();
          _e( ' by ', 'bootscore' );
          the_author_posts_link();
          bootscore_comment_count();
          ?>
          </small> </p>
        <?php bootscore_post_thumbnail(); ?>
      </header>
      <div class="entry-content">
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
                <div class="row justify-content-center">
                  <div class="col-sm-6 offset-sm-3">
                    <?php $post_repeater_image = get_sub_field( 'post_repeater_image' ); ?>
                    <?php if ( $post_repeater_image ) : ?>
                    <img src="<?php echo esc_url( $post_repeater_image['url'] ); ?>" alt="<?php echo esc_attr( $post_repeater_image['alt'] ); ?>" />
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php $post_repeater_link = get_sub_field( 'post_repeater_link' ); ?>
              <?php if ( $post_repeater_link ) : ?>
              <a href="<?php echo esc_url( $post_repeater_link['url'] ); ?>" target="<?php echo esc_attr( $post_repeater_link['target'] ); ?>"><?php echo esc_html( $post_repeater_link['title'] ); ?></a>
              <?php endif; ?>
              <?php $post_repeater_material = get_sub_field( 'post_repeater_material' ); ?>
              <div class="container">
                <div class="row">
                  <div class="col">
                    <?php if ( $post_repeater_material ) : ?>
                    <?php foreach ( $post_repeater_material as $post ) : ?>
                    <?php setup_postdata ( $post ); ?>
                    <a href="<?php the_permalink(); ?>"> More Info </a>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col"> </div>
                </div>
              </div>
            <div class="container">
			  <div class="row">
				  <div class="col">
					 <?php $post_repeater_person = get_sub_field( 'post_repeater_person' ); ?>
                  <?php if ( $post_repeater_person ) : ?>
			
                  <?php foreach ( $post_repeater_person as $post ) : ?>
                  <?php setup_postdata ( $post ); ?>
                
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
                    <?php foreach ( $post_repeater_story as $post ) : ?>
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
              <?php endwhile; ?>
              <?php else : ?>
              <?php // no rows found ?>
              <?php endif; ?>
            </div>
        
        <footer class="entry-footer clear-both">
          <div class="mb-4">
            <?php bootscore_tags(); ?>
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <?php previous_post_link('%link'); ?>
              </li>
              <li class="page-item">
                <?php next_post_link('%link'); ?>
              </li>
            </ul>
          </nav>
        </footer>
        <?php comments_template(); ?>
        </main>
        <!-- #main --> 
        
      </div>
      <!-- col -->
      <?php get_sidebar(); ?>
    </div>
    <!-- row --> 
    
  </div>
  <!-- #primary --> 
</div>
<!-- #content -->

<?php get_footer(); ?>
