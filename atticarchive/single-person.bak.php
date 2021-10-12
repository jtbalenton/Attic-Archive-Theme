 <div class="row">
      <p class="Display-1 text-center text-white bg-warning">
        <?php the_Title(); ?>
      </p>
      <div class="col-sm-12 col-md-4 col-xxl-3">
        <?php bootscore_post_thumbnail(); ?>
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
              <div class="d-flex flex-column">
                  <div class="p2">Birthplace
				  
				  </div>
                  <div class="p2 text-center">Family Lines
                     
                  <?php
                $terms = get_field( 'person_lineage' );
                if ( $terms ): ?>
                <ul class="nav justify-content-center">
                  <?php foreach( $terms as $term ): ?>
                  <li class="nav-item border-end border-warning"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="nav-link link-warning"><?php echo esc_html( $term->name ); ?></a></li>
                  <?php endforeach; ?>
                </ul>
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