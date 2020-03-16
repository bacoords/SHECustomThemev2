<?php
/*
Template Name: Page Builder (with Header) Template
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Featured Image Header -->
	<?php
	if ( has_post_thumbnail() ) :
		$posturl = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		?>
		<!-- Feature Slider -->

		<div class="frame she-full-height-div she-blue-background text-center" style="background:url('<?php echo $posturl; ?>') no-repeat center; background-size:cover;" >
			<div class="bit-1">
				<div class="she-feature-header"  data-top-top="transform:translate(0px,0px); opacity:1;" data-top-bottom="transform:translate(0px,200px); opacity:0;" >

					<h1 class="she-trans-blue"> <?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		<div class="she-blue-triangle"></div>



	<?php else : ?>
		<div class="frame">
			<div class="bit-1">
				<div class="">
				<BR><BR>
				<h1 class="uppercase text-center"><?php the_title(); ?></h1>
				<BR><BR></div>
			</div>
		</div>
	<?php endif; ?>

	<!-- Main Content -->   
	<?php if ( FLBuilderModel::is_builder_enabled() ) : ?>
		<article>
			<?php the_content(); ?>
		</article>

	<?php else : ?>

		<article>

			<div class="frame she-white-background">

				<div class="bit-1">
					<div class="box-padding page-defaults">
						<?php the_content(); ?>
					</div>
				</div>

			</div>

		</article>
	<?php endif; ?>

<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>    

    <!-- End Main Content -->
<?php get_footer(); ?>