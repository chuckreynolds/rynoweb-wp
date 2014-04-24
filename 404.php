<?php get_header(); ?>

<div id="content">

	<div id="post">
			<h1 id="pagetitle">Easy, tiger. This is a 404 page.</h1>
			<div class="entry">
                <p>You are <em>totally</em> in the wrong place. Do not pass GO; do not collect $200.</p>
                <p>Instead, try one of the following:</p>
                <ul>
                    <li>Hit the "back" button on your browser.</li>
                    <li>Head on over to the <a href="<?php echo home_url(); ?>">front page</a>.</li>
                    <li>Click on a link in the sidebar.</li>
                    <li>and if all else fails... Punt</li>
                </ul>
			</div><!-- END entry -->

			<div class="clrBoth"></div>

		</div><!-- END post -->

		<?php get_sidebar(); ?>

<?php get_footer(); ?>