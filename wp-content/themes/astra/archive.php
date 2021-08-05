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

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<style>
    .ast-separate-container{
        background-color:#ffffff !important;
        
    }
</style>
<script>
      
            let container = document.getElementsByClassName("ast-container")[1];
            container.className = "custom-container";
        
    </script>
<section class="m-herobanner">
        <div class="m-herobanner__wrapper">
            <div class="m-herobanner__container">
                <div class="m-herobanner__img" style="background-image:url(http://qa.motherhuong.org/wp-content/uploads/2021/06/Latest-news_1920x800.jpg)">
                    <div class="m-herobanner__content">
                        <div class="m-herobanner__content-left">
                        </div>
                        <div class="m-herobanner__content-right">
                            <h2>LATEST NEWS</h2>
                            <p>From Camps to FunTrips ,we bring all the buzzing news happening at the center right here to your feed keeping us connected on our mission.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
	<div id="primary" <?php astra_primary_class(); ?>>

       
		<?php astra_primary_content_top(); ?>
		
<!--<img src="<?php bloginfo('template_directory'); ?>/Latest news_1920x800.jpg
" alt="<?php the_title(); ?>" />-->
<?php  ?>

	<!--	<?php astra_archive_header();	?>-->
		
		

		<?php astra_content_loop(); ?>

		<?php astra_pagination(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>



<?php endif ?>

<?php get_footer(); ?>
