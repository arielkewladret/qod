<?php
/**
 * The template for displaying the Archives page.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
   <i class="fas fa-quote-left"></i>		

		<main id="main" class="site-main" role="main">

         <section class="browse-archives">
            <header class="entry-header">
         		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
         	</header><!-- .entry-header -->

            <div class="post-archives clearfix">
               <h2>Quote Authors</h2>
               <ul>
               <?php
                  $posts = get_posts( 'posts_per_page=-1' );
                  foreach( $posts as $post ) : setup_postdata( $post );
               ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
               <?php endforeach; wp_reset_postdata(); ?>
               </ul>
            </div>

            <div class="category-archives clearfix">
               <h2>Categories</h2>
               <ul>
                  <?php wp_list_categories('title_li='); ?>
               </ul>
            </div>

            <div class="tag-archives clearfix">
               <h2>Tags</h2>
               <?php $tags = get_terms( array(
                  'taxonomy' => 'post_tag',
                  'hide_empty' => false,
               )); ?>
               <ul>
               <?php foreach( $tags as $tag ): ?>
                  <li><a href="<?php  echo get_term_link( $tag ); ?>"><?php echo $tag->name; ?></a></li>
               <?php endforeach; ?>
               </ul>





          
               <?php /*wp_tag_cloud( array(
                  'smallest' => 1,
                  'largest' => 1,
                  'unit' => 'rem',
                  'format' => 'list'
               ) );*/ ?>
            </div>
         </section>

         <i class="fas fa-quote-right"></i>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>