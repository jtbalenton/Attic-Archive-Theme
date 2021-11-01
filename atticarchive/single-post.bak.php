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
   <?php if ( have_rows( 'post_field_repeater' ) ) : ?>
  <?php while ( have_rows( 'post_field_repeater' ) ) :
    the_row(); ?>
    
    <?php if ( $post_section_text = get_sub_field( 'post_section_text' ) ) : ?>
      <?php echo $post_section_text; ?>
    <?php endif; ?>

    <?php
    $post_repeater_image = get_sub_field( 'post_repeater_image' );
    if ( $post_repeater_image ) : ?>
		  <div class="d-flex justify-content-center mb-2">
      <img src="<?php echo esc_url( $post_repeater_image['url'] ); ?>" alt="<?php echo esc_attr( $post_repeater_image['alt'] ); ?>" />
			  </div>
    <?php endif; ?>

    <?php
    $link = get_sub_field( 'post_repeater_link' );
    if ( $link ) :
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
      <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    <?php endif; ?>

    <?php
    $posts = get_sub_field( 'post_repeater_material' );
    if ( $posts ) : ?>
		  <ul class="nav justify-content-center">
      <?php foreach( $posts as $post) :
			  // Setup this post for WP functions (variable must be named $post).
             global $post;
			  setup_postdata( $post ); ?>
     <li class="nav-item">
         <div class="w-75 d-flex justify-content-center">
			<?php bootscore_post_thumbnail(); ?>
		 </div>  
		 <a href="<?php the_permalink(); ?>" class="nav-link"><?php the_title(); ?></a>
           
        </li>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
     </ul>
    <?php
    $posts = get_sub_field( 'post_repeater_person' );
    if ( $posts ) : ?>
      <?php foreach( $posts as $post) : ?>
        <?php  global $post; setup_postdata( $post ); ?>
        
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    $posts = get_sub_field( 'post_repeater_place' );
    if ( $posts ) : ?>
      <?php foreach( $posts as $post) : ?>
        <?php  global $post; setup_postdata( $post ); ?>
        
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    $posts = get_sub_field( 'post_repeater_event' );
    if ( $posts ) : ?>
      <?php foreach( $posts as $post) : ?>
        <?php  global $post; setup_postdata( $post ); ?>
        
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    $posts = get_sub_field( 'post_repeater_story' );
    if ( $posts ) :  ?>
		  
      <?php foreach( $posts as $post) :
            global $post;
		  setup_postdata($post) ?>
		
      <?php endforeach; 
		  wp_reset_postdata();?>

    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>
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
