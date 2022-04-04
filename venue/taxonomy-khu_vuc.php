<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>

</div>
<div class="primary-tamoxy-villa">
    <div id="primary-tamoxy-villa" <?php astra_primary_class('tamoxy-villa'); ?>>

        <?php astra_primary_content_top(); ?>

        <?php astra_archive_header(); ?>

        <?php  // astra_content_loop(); ?>


        <div class="villa-loop">


            <?php if ( have_posts() ) : ?>
            <?php
					while ( have_posts() ) :
						the_post();
							// Custom Post Type template
							//get_template_part( 'template-parts/content', 'movies' );
						$postid = get_the_ID();

						?>

            <div class="villa-loop-content">
                <div class="villa-loop-content__item">
                    <header>
                        <div class="vill-thumb">
                            <?php the_post_thumbnail('villathumb',$postid); ?>
                        </div>
                        <h3 class="villa-title">
                            <?php the_title(); ?>
                        </h3>
                    </header>
                    <aside>
                        <p class="villa-price">Giá phòng: <?php echo get_field('gia_phong',$postid); ?> VND</p>
                        <div class="villa-link">
                            <button>
                                <a href="<?php echo get_the_permalink(); ?>" "Xem phòng">Xem phòng</a>

                            </button>
                        </div>

                    </aside>
                </div>
            </div>

            <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>


        </div>

        <?php astra_pagination(); ?>

        <?php astra_primary_content_bottom(); ?>

    </div><!-- #primary -->



    <?php get_footer(); ?>