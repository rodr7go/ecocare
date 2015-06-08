<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package web2feel
 */

get_header(); ?>
<div class="container"> <div class="row"> 
	<section id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="pages-header">
				<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'web2feel' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php bootstrap_pagination();?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div></div>
<?php get_footer(); ?>