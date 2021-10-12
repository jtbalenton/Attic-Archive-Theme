<?php
/*
 * Template Post Type: post
 */
acf_form_head();
get_header();
?>
<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area"> 
    
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <div class="row">
      <p class="Display-1 text-center text-white bg-warning">
        <?php the_Title(); ?>
      </p>
      <div class="col-sm-12 col-md-4 col-xxl-3">
        <?php
        if ( has_post_thumbnail() ):
          echo '<div class="">' . get_the_post_thumbnail( null, 'medium' ) . '</div>';
        ?>
        <?php else :  ?>
        <img src="<?php echo get_theme_file_uri(); ?> /img/no-photo-icon.png" class="rounded mb-3 img-fluid d-block">
        <?php endif;?>
        <?php if ( is_user_logged_in() ) : ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPerson"> Edit </button>
        <a href="<?php echo wp_logout_url(); ?>">Logout</a>
        <?php endif; ?>
        
        <!-- Modal -->
        <div class="modal fade" id="editPerson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php acf_form(); ?>
                <?php endwhile; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mb-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary mb-2">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editPerson"> Give Feedback </button>
      </div>
      <div class="col-sm-12 col-md-8 col-xxl-9 mt-2">
        <div class="row">
          <div class="col-sm-12 col-md-9 bg-light">
            <div class="d-grid">
				<p class="text-center">Parents</p>
              <?php
              $parents = get_field( 'person_parents' );
              if ( $parents ): ?>
              <ul class="nav justify-content-center">
				
                <?php
                foreach ( $parents as $parent ):
                  $permalink = get_permalink( $parent->ID );
                $title = get_the_title( $parent->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
				<?php else: ?>
				<p>Unknown</p>
              <?php endif; ?>
             <p class="text-center">Siblings</p>
              <?php
              $parents = get_field( 'person_siblings' );
              if ( $parents ): ?>
              <ul class="nav justify-content-center">
				
                <?php
                foreach ( $parents as $parent ):
                  $permalink = get_permalink( $parent->ID );
                $title = get_the_title( $parent->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
				<?php else: ?>
				<p>Unknown</p>
              <?php endif; ?>
            </div>
			  <p class="text-center">Children</p>
              <?php
              $parents = get_field( 'person_children' );
              if ( $parents ): ?>
              <ul class="nav justify-content-center">
				
                <?php
                foreach ( $parents as $parent ):
                  $permalink = get_permalink( $parent->ID );
                $title = get_the_title( $parent->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
				<?php else: ?>
				<p class="text-center">Unknown</p>
              <?php endif; ?>
			  <p class="text-center display-6">Lineages</p>
            <div class="d-flex flex-column">
              <div class="p2">
				  
                <?php
                $terms = get_field( 'person_lineage' );
                if ( $terms ): ?>
                <ul class="nav justify-content-center">
                  <?php foreach( $terms as $term ): ?>
                  <li class="nav-item border-end border-warning"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="nav-link"><?php echo esc_html( $term->name ); ?></a></li>
                  <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <p>Unknown</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 d-grid gap-2 col-2 mx-auto">
            <button class="btn btn-warning text-white" type="button">Places Lived</button>
            <button class="btn btn-warning text-white" type="button">Life Events</button>
            <button class="btn btn-warning text-white" type="button">Materials</button>
            <button class="btn btn-warning text-white" type="button">Photos</button>
            <button class="btn btn-warning text-white" type="button">Research</button>
            <button class="btn btn-warning text-white" type="button">Documentation</button>
            <button class="btn btn-warning text-white" type="button">Notes</button>
            <button class="btn btn-warning text-white" type="button">Bookmarks</button>
            <button class="btn btn-warning text-white" type="button">Tasks</button>
            <button class="btn btn-warning text-white" type="button">Citations</button>
          </div>
        </div>
      </div>
    </div>
    <!-- col --> 
    
  </div>
  <!-- row --> 
  
</div>
<!-- #primary -->
</div>
<!-- #content Container-->

<?php get_footer(); ?>
