<?php
/**
 * @package WordPress
 * @subpackage rynoweb4
 */

add_action( 'after_setup_theme', 'ryno_theme_setup' );
function ryno_theme_setup() {
	global $content_width;
		// set the $content_width for things such as video embeds
		if ( !isset( $content_width ) )
			$content_width = 495;
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	// add additional meta into header
	add_action('wp_head', 'ryno_build_header', '1');
	add_action('wp_head', 'ryno_build_analytics_header', '5');
	// continue to clean up header
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
}

// add additional meta into header
function ryno_build_header() { ?>
<meta name="viewport" content="width=device-width" />
<link rel="dns-prefetch" href="https://www.googletagmanager.com" />
<link rel="dns-prefetch" href="https://fonts.googleapis.com" />
<link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
<!-- global positioning
     GeoTag metadata -->
<meta name="geo.country" content="US" />
<meta name="geo.region" content="US-AZ" />
<meta name="geo.placename" content="Chandler, AZ 85225, USA" />
<meta name="geo.position" content="33.299668,-111.841711" />
<!-- GeoURL metadata -->
<meta name="ICBM" content="33.299668,-111.841711" />
<meta name="DC.title" content="Web Strategy, SEO, WordPress by Chuck Reynolds" />
<!-- Getty Thesaurus of Geographic Names (TGN) metadata -->
<meta name="tgn.id" content="2006646" />
<meta name="tgn.name" content="Chandler" />
<meta name="tgn.nation" content="United States" />
<!-- // end global positioning -->

<?php
}
function ryno_build_analytics_header() {
	if ( is_page(196) ) {
?>
<script type="text/javascript">
function recordOutboundLink(link, category, action) {
try {
var myTracker=_gat._getTrackerByName();
_gaq.push(['myTracker._trackEvent', category , action ]);
setTimeout('document.location = "' + link.href + '"', 100)
}catch(err){}
}
</script>
<?php
	}
}
