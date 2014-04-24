<?php get_header(); ?>

<div id="content">

	<div <?php post_class() ?> id="post">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
			<div class="entry">
				<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				<div class="soc_share">
					<div class="soc_button"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="ChuckReynolds">Tweet</a></div>
					<div class="soc_button"><fb:like href="<?php the_permalink(''); ?>" show_faces="false" width="350" layout="button_count" font="trebuchet ms"></fb:like></div>
				</div>

				<?php the_content(); ?>

				<div class="soc_share">
					<div class="soc_button"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="ChuckReynolds">Tweet</a></div>
					<div class="soc_button"><fb:like href="<?php the_permalink(''); ?>" show_faces="false" width="350" layout="button_count" font="trebuchet ms"></fb:like></div>
				</div>

                <?php wp_link_pages(array('before' => '<p><b>Pages:</b> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

                <p class="postMeta">Posted <span class="postMetaInfo"><?php the_time(get_option('date_format')); ?></span> in <span class="postMetaInfo"><?php the_category(', ') ?>, written by: <a href="http://rynoweb.com/about/" rel="author">Chuck Reynolds</a></span><br />
                <?php the_tags( 'Tags: <span class="postMetaInfo">', ', ', '</span></p>'); ?>
			</div>
			<div class="navigation">
				<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
                <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			</div>

			<div class="clrBoth"></div>

			<?php comments_template(); ?>

		<?php endwhile; else: ?>

			<h2>Not Found</h2>
			<div class="entry">
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_template_part( 'searchform' ); ?>
			</div><!-- END entry -->

		<?php endif; ?>

		</div><!-- END post -->

		<?php get_sidebar(); ?>

<?php get_footer(); ?>