<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>


</div>


<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/slick.theme.css" />

<!-- https://kenwheeler.github.io/slick/slick/slick-theme.css -->

<?php $postid = get_the_ID();  ?>


<script>
$(document).ready(function() {
    $('.webgool-slider').slick();
});
</script>
<div class="top-project">
    <div class="left-top-project">
        <div class="villa-content">
            <?php astra_entry_top(); ?>

            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>

            <div class="box-excerpt">

                <p> Địa chỉ: <?php echo get_field('address_rooms',$postid);  ?> </p>
                <p> Loại Phòng: <?php echo get_field('loai_phong',$postid);  ?> </p>
                <p> Số Giường: <?php echo get_field('so_giuong',$postid);  ?> </p>
                <p> Số Người: <?php echo get_field('so_nguoi',$postid);  ?> </p>
                <p> Điện tích: <?php echo get_field('dien_tich',$postid);  ?> </p>
                <p> Góc nhìn: <?php echo get_field('goc_nhin',$postid);  ?> </p>
                <p> Giá phòng: <?php echo get_field('gia_phong',$postid);  ?> VNĐ </p>


            </div>
            <!-- end .box-excerpt  -->
            <div class="notice-sale">
                <p>Nếu quý khách có nhu cầu về cần tư vấn, quý khách vui lòng liên hệ số điện thoại <a
                        href="tel:0904900240"> 0904900240 </a> để được hỗ trợ tốt nhất</p>
            </div>
            <!-- end notice-sale  -->
        </div>

    </div>
    <div id="slider">

        <?php 

	$images = get_field('gallery',$postid);
	if( $images ): ?>

        <div class="webgool-slider">
            <?php foreach( $images as $image ): ?>

            <!-- <a href="<?php // echo $image['url']; ?>"> -->
            <img src="<?php echo $image['sizes']['villathumb']; ?>" />
            <!-- </a> -->


            <?php endforeach; ?>
        </div>

        <?php endif; ?>


    </div>
</div>

<div class="clear">

</div>

<div class="ast-container villa-details">



    <div id="primary" <?php astra_primary_class(); ?>>

        <?php astra_primary_content_top(); ?>

        <?php // astra_content_loop(); ?>
        <?php astra_entry_before(); ?>

        <article <?php
		echo astra_attr(
			'article-content',
			array(
				'id'    => 'post-' . get_the_id(),
				'class' => join( ' ', get_post_class() ),
			)
		);
		?>>
            <?php astra_entry_top(); ?>


            <div class="entry-content clear" <?php
				echo astra_attr(
					'article-entry-content',
					array(
						'class' => '',
					)
				);
				?>>
                <h2 class="rooms-title">
                    Thông tin Villa
                </h2>
                <?php astra_entry_content_before(); ?>

                <?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						__( 'Continue reading %s', 'astra' ) . ' <span class="meta-nav">&rarr;</span>',
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
			?>
                <div class="single__price-rom">
                    <h2 class="single__price-heading">
                        THÔNG TIN GIÁ PHÒNG
                    </h2>
                    <table class="single__price-table">
                        <tr>
                            <th>Ngày</th>
                            <th>Giá Phòng</th>
                        </tr>
                        <tr>
                            <td>Ngày Thường</td>
                            <td><?php echo get_field('gia_ngaythuong',$postid);  ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td>Ngày Cuối Tuần</td>
                            <td><?php echo get_field('gia_cuoituan',$postid);  ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td>Ngày Lễ</td>
                            <td><?php echo get_field('gia_ngayle',$postid);  ?> VNĐ</td>
                        </tr>
                    </table>
                </div>
                <footer class="entry-footer">
                    <?php astra_entry_footer(); ?>
                </footer><!-- .entry-footer -->

                <?php  astra_entry_bottom(); ?>

        </article><!-- #post-## -->

        <?php astra_entry_after(); ?>


        <?php // astra_primary_content_bottom(); ?>

    </div><!-- #primary -->

    <?php // if ( astra_page_layout() == 'right-sidebar' ) : ?>
    <div id="secondary">
        <div class="widget">

            <?php  dynamic_sidebar('sidebar-villa'); ?>
        </div><!-- .sidebar-main -->
    </div><!-- #secondary -->
</div>
<div class="villa-section">
    <h2 class="rooms-title">
        Tiện ích phòng ở
    </h2>
    <div class="villa-tienich">
        <?php 
	echo get_field('tien_ich',$postid);

				 ?>
    </div>

    <h2 class="rooms-title">
        Quy định
    </h2>
    <?php 
                    $page_id = 410;
                    $page_data = get_page( $page_id );
                    ?>
    <div class="villa-dichvu">
        <p class="villa-dichvu__content">
            <?php echo $page_data->post_content;?>
        </p>
    </div>
    <div class="ralated-villa">
        <?php
                    $postType = 'villa';
                    $taxonomyName = 'khu_vuc';
                    $taxonomy = get_the_terms(get_the_ID(), $taxonomyName);
                    if ($taxonomy){
                    echo '<div class="relatedcat">';
                        $category_ids = array();
                        foreach($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                        $args = array(
                        'post_type' => $postType,
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 5,
                        'tax_query' => array(
                        array(
                        'taxonomy' => $taxonomyName,
                        'field' => 'term_id',
                        'terms' => $category_ids,
                        ),
                        )
                        );
                        $my_query = new wp_query($args);
                        if( $my_query->have_posts() ):
                        echo '<h3 class="rooms-title ralateb-villa__heading">VILLA LIÊN QUAN</h3>
                        <div class="ralated-villa__container">';
                            while ($my_query->have_posts()):$my_query->the_post();
                            echo '<div class="ralated-villa__item">
                            <img src="'.get_the_post_thumbnail_url().'"alt="'.get_the_title().'">
                            <a class="ralated-villa__container-title" href="'.get_the_permalink().'">'.get_the_title().'</a>
                                </div>';
                            endwhile;
                            echo '</div>';
                        endif; wp_reset_query();
                        echo '
                    </div>';
                    }
                    ?>
    </div>
    <?php astra_entry_content_after(); ?>

    <?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
			?>
</div><!-- .entry-content .clear -->
</div>
<?php // endif ?>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/slick/slick.js" type="text/javascript" charset="utf-8">
</script>
<?php get_footer(); ?>