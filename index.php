<?php get_header(); ?>

<div id="content">

	<div id="post">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<div class="entry">
				<?php the_content('[Click to Continue...]'); ?>
                <p class="postMeta">Posted <span class="postMetaInfo"><?php the_time(get_option('date_format')); ?></span> in <span class="postMetaInfo"><?php the_category(', ') ?></span> | <?php comments_popup_link('Be First to Comment', '1 Comment', '% Comments'); ?></p>
			</div><!-- END entry -->



			<div class="clrBoth"></div>

			<?php endwhile; ?>

<?php /*			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</div>
*/ ?><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

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