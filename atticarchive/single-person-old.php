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
          <header class="entry-header bg-secondary">
            <?php the_post(); ?>
            <?php bootscore_category_badge(); ?>
            <?php the_title('<h1 class="bg-warning text-white text-center">', '</h1>'); ?>
            <div class="d-flex flew-row-sm justify-content-center">
              <div class="p-2">
                <?php bootscore_post_thumbnail(); ?>
                
              </div>
              <div class="p-2 align-self-">
                <table class="table table-sm table-borderless">
                  <tbody>
                    <tr>
                      <th scope="row"> 
					  <td>
					Born:  
					</td>
                      <td>
						<?php
                      $birth_date = get_field( 'person_birth' );
                      if ( $birth_date ):

                        ?>
                      <?php
                      foreach ( $birth_date as $birth_day ):
                        $birthdate = get_field( 'event_date', $birth_day->ID );
                      $event_place = get_field( 'event_city', $birth_day->ID );
                      ?>
                         <?php echo $birthdate?> 
                      <?php endforeach; ?>
                      <?php else: ?>
                      <p class="text-center">Unknown</p>
                      <?php
                      endif;
                      if ( $event_place ):
                        foreach ( $event_place as $eventplace ):
                          $title = get_the_title( $eventplace->ID );
                      ?>
                      <?php echo ' <i class="bi bi-record-fill"></i>  '. $title; ?>
                      <?php endforeach; else:?>
                      <?php echo '<i class="bi bi-record-fill"></i>'. ' ? ' ?>
                      <?php endif; ?>
                      </th>
                    </tr>
                   
                     <tr>
                      <th scope="row"> 
					  <td>
					Died:  
					</td>
                      <td>
						<?php
                      $death_date = get_field( 'person_death' );
                      if ( $death_date ):

                        ?>
                      <?php
                      foreach ( $death_date as $death_day ):
                        $deathdate = get_field( 'event_date', $death_day->ID );
                      $deathplace = get_field( 'event_city', $death_day->ID );
                      ?>
                         <?php echo $deathdate  ?> 
                      <?php endforeach; ?>
                      <?php else: ?>
                     <?php echo '? ' ?>
                      <?php
                      endif;
                      if ( $deathplace ):
                        foreach ( $deathplace as $death_place ):
                          $title = get_the_title( $death_place->ID );
                      ?>
                      <?php echo ' <i class="bi bi-record-fill"></i>  ' . $title; ?>
                      <?php endforeach; else:?>
                      <?php echo '<i class="bi bi-record-fill"></i>'. ' ? ' ?>
                      <?php endif; ?>
                      </th>
                    </tr>
				   <tr>
				<th scope="row">
				<td>
			     <?php if ( is_user_logged_in() ) : ?>
                <!-- Button trigger modal -->
                
                <button type="button" class="btn btn-warning d-block mb-2" data-bs-toggle="modal" data-bs-target="#editPerson"> Edit </button>
                <?php endif; ?>
				</td>
				<td>
					<button type="button" class="btn btn-warning text-white mb-2" > Give Feedback </button>
                  
				</td>
				</th>
				</tr>
                </table>
              </div>
            </div>

          </header>
          <div class="entry-content">
            <div class="row">
              <div class="col-9">
                <div class="row text-center">
                  <div class="d-flex flex-row justify-content-center">
                    <div class="p-2 align-self-center">
						<p class="h4 text-center">Bio</p>
                      <?php
                      $bio = get_field( 'person_bio' );
                      if ( $bio ):
                        echo $bio;
                      else :
                        echo "No Bio Yet";
                      endif;

                      ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="d-flex flex-row justify-content-center">
                    <div class="p-2">
                      <p class="h6 text-center">Parents</p>
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
                    <div class="p-2">
                      <p class="h6 text-center">Siblings</p>
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
                  <div class="d-flex flex-row justify-content-center">
                    <div class="p-2">
                      <p class="h6 text-center">Spouses</p>
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
                    <div class="p-2">
                      <p class="h6 text-center">Children</p>
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
                  <div class="d-flex flex-row justify-content-center">
                    <div class="p-2">
                      <p class="h6 text-center">Generation</p>
						  <?php
                    $term = get_field( 'person_generation' );
                    if ( $term ): ?>
                    <p class="card-text text-center">
                    <?php echo esc_html( $term->name ); ?>
                    <h6>
                    <?php endif; ?>
                    </div>
                    <div class="p-2">
                      <p class="h6 text-center">Relationship to Base Person</p>
						  <?php
                    $term = get_field( 'person_relation' );
                    if ( $term ): ?>
                    <p class="card-text text-center">
                    <?php echo esc_html( $term->name ); ?>
                    <h6>
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
              </div>
              <div class="col-3">
                <div class="d-grid gap-2">
					<P class='h4'> Additional Info</P>
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

<?php get_footer(); ?>
