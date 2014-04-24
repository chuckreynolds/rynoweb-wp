<?php get_header(); ?>

<div id="content">

	<div id="post">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
			<div class="entry">
				<?php the_content('[Read more &rarr;]'); ?>
			</div>

			<div class="clrBoth"></div>

			<?php endwhile; ?>

		<?php else : ?>

			<h2>Not Found</h2>
			<div class="entry">
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_template_part( 'searchform' ); ?>
			</div><!-- END entry -->

		<?php endif; ?>

		</div><!-- END post -->

		<?php get_sidebar(); ?>

<?php get_footer(); ?>