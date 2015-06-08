<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package web2feel
 * @since web2feel 1.0
 */

get_header(); ?>

	<header class="wide-entry-header">
	<div class="container_12 cf">
		<div class="grid_12">
			<h1 class="entry-title"><?php the_title(); ?></h1>
	
			<div class="entry-meta">
				<?php web2feel_posted_on(); ?>
			</div><!-- .entry-meta -->
		</div>	
	</div>
	</header><!-- .entry-header -->

<div class="container_12">
		<div id="primary" class="content-area grid_8">
			<div id="content" class="site-content" role="main">
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>