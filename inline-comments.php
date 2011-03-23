<div <?php if( is_single() || is_page() ){ echo 'id="comments"'; } ?> class="entry-comments">
<?php if ( post_password_required() ){ return; } ?>
<?php /* Count the number of comments and trackbacks (or pings) */
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
 get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
	<div id="comments-nav-above" class="comments-navigation">
				<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	</div><!-- #comments-nav-above -->
<?php endif; ?> 

<?php if ( have_comments() ) : ?>
<div class="inline-comments-list">
<ul class="commentslist inlinecomments">
	<?php 
		if( is_home() || is_search() || is_archive() ){ $per_page = '&per_page=' . stf_get_setting('stf_homepage_comment_count', 3); } else { $per_page = ''; }
		wp_list_comments('type=comment&callback=stf_comment_inline' . $per_page); 
	?>
</ul>
</div>
<?php endif; ?>

<?php $pc = 0; ?>
<?php if ( stf_show_comment_form() && $pc == 0 && ! post_password_required() ) : ?>
	<?php $pc++; ?>
	<div class="respond-wrap"<?php if ( ! is_singular() ): ?> style="display: none; "<?php endif; ?>>
		<?php
			$p2_comment_args = array(
				'title_reply' => __( 'Reply', 'p2' ),
				'comment_field' => '<div class="form"><textarea id="comment" class="expand50-100" name="comment" cols="45" rows="3"></textarea></div> <label class="post-error" for="comment" id="commenttext_error"></label>',
				'comment_notes_before' => '<p class="comment-notes">' . ( get_option( 'require_name_email' ) ? sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' ) : '' ) . '</p>',
				'comment_notes_after' => '',
				'label_submit' => __( 'Reply', 'p2' ),
				'id_submit' => 'comment-submit',
			);
			comment_form( $p2_comment_args );
		?>
	</div>
<?php endif; ?>
</div>