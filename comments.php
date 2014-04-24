<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Oh come on - don\'t load this page directly... you know better.  Try the home page: <a href="http://rynoweb.com">rynoweb.com</a>');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected, therefore you'd need to enter the password to view the comments.<p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>
<div class="post-comment-divider"></div>
<h3 id="comment-head"><span>Comments</span></h3>


<?php $i = 0; // start numbering comments ?>
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('No Responses Yet', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

	<?php $i++; // increase comment counter by one each time ?>

		<li class="comment <?php if ($comment->comment_author_email == "chuck@rynoweb.com") echo 'comment-postauthor'; else echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			On <span class="commentMeta"><?php comment_date('jS M Y') ?> at <?php comment_time() ?></span>, <?php comment_author_link() ?> said: <?php edit_comment_link('edit','',''); ?>
			<?php if ($comment->comment_approved == '0') : ?>
				<br /><b><i>Your comment has gone into the moderation queue, once approved it will be posted for all to see.</i></b>
			<?php endif; ?>
			<br />
			<?php echo get_avatar( $comment, 32 ); ?>
			<span class="count"><a href="#comment-<?php comment_ID() ?>"><?php echo $i; // display comment number ?></a></span>
			<?php comment_text() ?>

		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>
	<?php endforeach; /* endforeach $comments as $comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : // If comments are open, but there are no comments ?>
		<?php else : // If comments are closed ?><p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<br /><h3 id="unload-comment"><span>Unload your comment:</span></h3>

<div id="FBbutton" style="clear:all;">
<?php do_action('fbc_display_login_button');  ?>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="3" />
<label for="author"><small>Name <?php if ($req) echo "<span class=\"reqField\">(required)</span>"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="4" />
<label for="email"><small>Mail <i>(kept secret)</i> <?php if ($req) echo "<span class=\"reqField\">(required)</span>"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="5" />
<label for="url"><small>Website <i>(url follow is allowed)</i></small></label></p>

<?php endif; ?>

<p><small class="commentmetadata"><b>XHTML:</b> You can use these tags: <?php echo allowed_tags(); ?></small></p>

<p><textarea name="comment" id="comment" cols="55" rows="10" tabindex="6"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="7" value="Submit Comment" /></p>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
