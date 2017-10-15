<?php if ( post_password_required() ) { return; } ?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One comment on %2$s', '%1$s comments on %2$s', get_comments_number(), 'comments title', 'freud' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 32,
				) );
			?>
		</ul><!-- .comment-list -->
		<div class="comment-navigation">
  			<?php paginate_comments_links('prev_text=back&next_text=forward') ?>
 		</div>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'freud' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div><!-- .comments-area -->