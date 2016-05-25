<div id="sidebar">

    <?php if ( is_home() ) : // display on home page only ?>
		<h1><a class="logo" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
	<?php endif; ?>
    <?php if ( !is_home() ) : // dont display on home page ?>
		<p><a class="logo" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></p>
	<?php endif; ?>
    <div class="intro">
	<p><?php bloginfo('description'); ?> <br />
		<a href="<?php echo home_url(); ?>/contact/" title="Contact rYnoweb" rel="author">Contact Us</a><br />
		<a href="<?php echo home_url(); ?>/about/" title="About rYnoweb" rel="author">About Rynoweb</a><br />
		Looking for <a href="<?php echo home_url(); ?>/wordpress-plugins/" title="WordPress Plugins by Chuck">WordPress Plugins</a>?</p>
    </div>
    <div class="divider-top"></div>

    <div class="sbar-topics">
        <h2 id="topics"><span>Topics</span></h2>
        <ul><?php wp_list_categories('show_count=0&title_li='); ?></ul>

    </div><!-- END sbar-topics -->

    <div class="sbar-rss">
        <h2 id="subscribe"><span>Subscribe</span></h2>
        	<ul>
				<li><a href="https://facebook.com/rynoweb/" title="Rynoweb on Facebook">Like on Facebook</a></li>
            </ul>
    </div><!-- END sbar-rss -->

    <?php if ( !is_home() ) : // dont display on home page ?>
    <div class="sbar-recent-posts">
        <h2 id="recent-posts"><span>Recent Posts</span></h2>
        <ul><?php
$myposts = get_posts('numberposts=4');  // display lastest posts
foreach($myposts as $key => $post) { ?>
<li class="recent<?php echo $key; ?>"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
            <?php } ?></ul>
    </div><!-- END sbar-recent-posts -->
    <?php endif; // !is_home() ?>


    <?php if ( is_home() ) : // display on home page only ?>
    <div class="sbar-recent-posts">
        <h2 id="recent-posts"><span>Recent Posts</span></h2>
        <ul><?php
$myposts = get_posts('numberposts=4&offset=3');  // display lastest posts
foreach($myposts as $key => $post) { ?>
<li class="recent<?php echo $key; ?>"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
            <?php } ?></ul>
    </div><!-- END sbar-recent-posts -->
    <?php endif; // is_home() ?>


<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : endif; ?>

</div><!-- END sidebar -->
