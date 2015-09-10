<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Rotary
 * @since Rotary 1.0
 */

get_header(); ?>

<?php
	if ( have_posts() )
		the_post();
?>
			<h1 class="pagetitle"><span><?php echo rotary_get_blog_title();?></span>
			<h2 class="pagesubtitle">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archive %s', 'Rotary' ), '<br /><span>'.get_the_date(). '</span>' ); ?>

<?php elseif ( is_month() ) : ?>
		<?php if (is_post_type_archive('rotary_speakers')) : ?>
				<?php printf( __( 'Monthly Archive %s', 'Rotary' ), '<br /><span>'.date("F", mktime(0, 0, 0, get_query_var('monthnum'), 10)). ' ' .get_query_var('year').'</span>' ); ?> 
		<?php else : ?>
				<?php printf( __( 'Monthly Archive %s', 'Rotary' ), '<br /><span>'.get_the_date('F Y'). '</span>' ); ?>
		<?php endif; ?>	
<?php elseif ( is_year() ) : ?>
	<?php if (is_post_type_archive('rotary_speakers')) : ?>
				<?php printf( __( 'Yearly Archive %s', 'Rotary' ), '<br /><span>'.get_query_var('year'). '</span>' ); ?>
		<?php else : ?>
				<?php printf( __( 'Yearly Archive %s', 'Rotary' ), '<br /><span>'.get_the_date('Y').'</span>' ); ?>
		<?php endif; ?>			
<?php elseif ( is_post_type_archive( 'post' )) : ?>
				<?php _e( 'Blog Archive', 'Rotary' ); ?>
<?php endif; ?>
</h2>
<?php
	rewind_posts(); ?>
<div id="content" role="main">
	<?php if (is_post_type_archive( 'rotary-committees' )) : ?>	
		<?php get_template_part( 'loop', 'archive-committees' ); ?>
	<?php else : ?>
		<?php get_template_part( 'loop', 'archive' ); ?>
	<?php endif; ?>	
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>