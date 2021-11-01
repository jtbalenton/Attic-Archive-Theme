<?php
/*
 * Template Post Type: post
 */
acf_form_head();
get_header();
?>
<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">
    <p class="Display-1 text-center text-white bg-warning">
      <?php the_Title(); ?>
    </p>
    <div class="row">
      <div class="col">
        <div class="d-grid gap-2">
          <?php
          if ( has_post_thumbnail() ):
            echo '<div class="w-75">' . get_the_post_thumbnail( null, 'medium' ) . '</div>';
          ?>
          <?php else :  ?>
          <img src="<?php echo get_theme_file_uri(); ?> /img/no-photo-icon.png" class="rounded img-fluid d-block">
          <?php endif;?>
          <button type="button" class="btn btn-warning text-white mb-2" > Give Feedback </button>
          <?php if ( is_user_logged_in() ) : ?>
          <!-- Button trigger modal -->
          
          <button type="button" class="btn btn-warning d-block mb-2" data-bs-toggle="modal" data-bs-target="#editPerson"> Edit </button>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-8 bg-light">
        <div class="row text-center">
          <div class="col">
            <p class="Display-4">About</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
               <?php
                      $birth_date = get_field( 'person_birth' );
                      if ( $birth_date ): ?>
                      <?php
                      foreach ( $birth_date as $birth_day ):
                        $birthdate = get_field( 'event_date', $birth_day->ID );
			                if ($birthdate) :
			                $bdate=$birthdate;
			  				else:
			                $bdate="Unknown";
			                endif;
			  			$event_location = get_field( 'event_city', $birth_day->ID );
			  				if ($event_location):
			              		foreach ( $event_location as $event_place ):
			  					$birthplace = get_the_title($event_place->ID);
			               		endforeach;
			                else : $birthplace ='Unknown';
			                endif;
			           endforeach;
			   echo $bdate ?> <i class="bi bi-record-fill"></i> <?php echo $birthplace . '<br>';
			         else: echo 'No birth info' . '<br>';
					  endif;
                      ?>
			 
			   <?php
                      $death_date = get_field( 'person_death' );
                      if ( $death_date ): ?>
                      <?php
                      foreach ( $death_date as $death_day ):
                        $deathdate = get_field( 'event_date', $death_day->ID );
			                if ($deathdate) :
			                $ddate=$deathdate;
			  				else:
			                $ddate="Unknown";
			                endif;
			  			$death_location = get_field( 'event_city', $death_day->ID );
			  				if ($death_location):
			              		foreach ( $death_location as $death_place ):
			  					$deathplace = get_the_title($event_place->ID);
			               		endforeach;
			                else : $deathplace ='Unknown';
			                endif;
			           endforeach;
			    echo $ddate ?> <i class="bi bi-record-fill"></i><?php echo $deathplace;
			         else: echo 'No death info';
					  endif;
                      ?>
            </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <?php $bio=get_field('person_bio');?>
            <?php if ($bio): ?>
            <?php echo $bio; ?>
            <?php else: ?>
            <p>No Bio Yet</p>
            <?php endif;?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 text-center">
            <div class="d-grid gap-2">
              <p class="h6">Parents</p>
              <?php
              $parents = get_field( 'person_parents' );
              if ( $parents ): ?>
              <ul class="nav flex-column">
                <?php
                foreach ( $parents as $parent ):
                  $permalink = get_permalink( $parent->ID );
                $title = get_the_title( $parent->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
              <p class="text-center">No Parents Lists</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6 text-center">
            <div class="d-grid gap-2">
              <p class="h6">Siblings</p>
              <?php
              $siblings = get_field( 'person_siblings' );
              if ( $siblings ): ?>
              <ul class="nav flex-column">
                <?php
                foreach ( $siblings as $sibling ):
                  $permalink = get_permalink( $sibling->ID );
                $title = get_the_title( $sibling->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
              <p class="text-center">No Siblings Listed</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 text-center">
            <div class="d-grid gap-2">
              <p class="h6">Spouses</p>
              <?php
              $spouses = get_field( 'person_spouse' );
              if ( $spouses ): ?>
              <ul class="nav flex-column">
                <?php
                foreach ( $spouses as $spouse ):
                  $permalink = get_permalink( $spouse->ID );
                $title = get_the_title( $spouse->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
              <p class="text-center">No Spouses Listed</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6 text-center">
            <div class="d-grid gap-2">
              <p class="h6">Children</p>
              <?php
              $children = get_field( 'person_children' );
              if ( $children ): ?>
              <ul class="nav flex-column">
                <?php
                foreach ( $children as $child ):
                  $permalink = get_permalink( $child->ID );
                $title = get_the_title( $child->ID );
                ?>
                <li class="nav-item"> <a href="<?php echo esc_url( $permalink ); ?>" class="nav-link"><?php echo esc_html( $title ); ?></a> </li>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
              <p class="text-center">No Children Listed</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="text-center h3">Lineages</p>
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
                <p class="text-center">Unknown</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="d-grid gap-2">
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
  <!-- #primary END-->
  
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
  
  <!-- #content Container End--> 
</div>
<?php get_footer(); ?>
