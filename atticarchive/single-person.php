<?php
/*
 * Template Post Type: post
 */
acf_form_head();
get_header();
?>
<div id="content" class="site-content container py-5 mt-4">
  <div class="row">
    <div id="primary" class="content-area col">
      <div class="containter">
        <div class ="row">
          <div class="col-sm-12">
            <p class="Display-1 text-center text-white bg-warning">
              <?php the_Title(); ?>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12  d-grid justify-content-center">
            <header class="entry-header">
              <?php the_post(); ?>
              <?php bootscore_post_thumbnail(); ?>
            </header>
            <div class="p-2">
              <?php
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
              <i class="bi bi-record-fill"></i> <?php echo $birthplace . '<br>';
              else :echo 'No birth info' . '<br>';
              endif;
              ?>
              <?php
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
                  $deathplace = get_the_title( $event_place->ID );
              endforeach;
              else :$deathplace = 'Unknown';
              endif;
              endforeach;
              echo $ddate ?>
              <i class="bi bi-record-fill"></i><?php echo $deathplace;
              else :echo 'No death info';
              endif;
              ?> </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-9">
           <?php /*<div class="container">
              <div class="row">
                <div class="col">
                  <?php
                  $post_templates = get_items();
                  if ( $post_templates ): ?>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php
                    foreach ( $post_templates as $form ):?>
                   
					  <option value="<?php echo $form['template_id']; ?>"><?php echo $templates_options[ $form[ 'template_id' ] ] = esc_html( $form[ 'title' ] ) ?></option>
					  <?php
                  
                    endforeach;
                    ?>
                  </select>
                  <?php endif; ?>
                </div>
              </div>
            </div>*/ ?>
            <div class="container">
              <div class="row">
                <div class="col-sm-12 text-center">
                  <p class='h6'>Bio</p>
                  <?php $bio=get_field('person_bio');?>
                  <?php if ($bio): ?>
                  <?php echo $bio; ?>
                  <?php else: ?>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper. Id aliquet risus feugiat in ante metus dictum at. A cras semper auctor neque vitae tempus. Sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus. Mattis enim ut tellus elementum sagittis vitae. Amet mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Et molestie ac feugiat sed. Ut etiam sit amet nisl purus. Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Ullamcorper malesuada proin libero nunc. Tincidunt dui ut ornare lectus. Libero volutpat sed cras ornare arcu dui vivamus. Lacus vestibulum sed arcu non odio euismod. At varius vel pharetra vel turpis nunc eget. Sodales ut eu sem integer vitae. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc.</p>
                  <p>Faucibus purus in massa tempor nec feugiat nisl. Venenatis cras sed felis eget velit aliquet sagittis. Tellus molestie nunc non blandit massa enim nec dui nunc. Blandit volutpat maecenas volutpat blandit aliquam. Libero volutpat sed cras ornare arcu. Tellus in metus vulputate eu scelerisque felis. Dolor magna eget est lorem ipsum. Sed felis eget velit aliquet sagittis. Tortor id aliquet lectus proin nibh nisl condimentum id venenatis. Etiam tempor orci eu lobortis elementum nibh tellus molestie nunc. Sapien faucibus et molestie ac feugiat sed lectus. Ullamcorper malesuada proin libero nunc consequat interdum. At augue eget arcu dictum varius.</p>
                  <p>Neque ornare aenean euismod elementum nisi. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Eget gravida cum sociis natoque penatibus et. Velit euismod in pellentesque massa placerat duis ultricies lacus. Justo eget magna fermentum iaculis. Sem nulla pharetra diam sit amet nisl suscipit. Amet consectetur adipiscing elit ut aliquam purus. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Id ornare arcu odio ut sem nulla. Quis imperdiet massa tincidunt nunc pulvinar sapien et. Eget mauris pharetra et ultrices neque ornare aenean euismod elementum. Velit laoreet id donec ultrices tincidunt arcu. Semper viverra nam libero justo. Sagittis orci a scelerisque purus. Nibh nisl condimentum id venenatis a.</p>
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
          </div>
          <div class="col-sm-3">
            <div class="d-grid gap-2">
              <p class="h5 text-center">Additional Info</p>
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
    </div>
  </div>
  <div class="row">
    <div class="col">
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
    </div>
  </div>
  <!-- #content Container End--> 
</div>
<?php get_footer(); ?>
