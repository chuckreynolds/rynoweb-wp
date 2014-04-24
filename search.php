<?php get_header(); ?>

<div id="content">

	<div id="post">
	<?php if (have_posts()) : ?>

		<h1 id="pagetitle">Your Search Results...</h1>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>

			<div class="entry">
            	<p id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><br />
                <span class="postMeta">Posted <span class="postMetaInfo"><?php the_time(get_option('date_format')); ?></span> in <span class="postMetaInfo"><?php the_category(', ') ?></span></span></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

        <h1 id="pagetitle">Sorry Jim, but I'm only a doctor!</h1>
        <p>I simply didn't find what you were looking for, if you could try again that would be great; or you could just hit the <a href="<?php echo home_url(); ?>">front page</a> and start reading from there!
		<?php // get_template_part( 'searchform' ); ?>

	<?php endif; ?>

	</div>

		<?php get_sidebar(); ?>

<?php get_footer(); ?>