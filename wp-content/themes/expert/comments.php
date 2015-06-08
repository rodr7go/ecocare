<?php
/*
 * The template for displaying Comments.
 */
?>

<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', 'sp_webBusiness'); ?></p>
    
	<?php return; } ?>

<?php if (have_comments()) : ?>
    <h5 id="comments">
			<?php
				printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'sp_webBusiness'),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
			?>
    </h5>

    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=60&type=comment'); ?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249;- Older comments','sp_webBusiness' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments -&#8250;','sp_webBusiness', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks','sp_webBusiness') : $txt = __('Pings&#47;Trackbacks','sp_webBusiness');
?>

    <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'sp_webBusiness' ), $count, $txt, get_the_title() )?></h6>

    <ol class="commentlist">
	
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>


<?php endif; ?>

<?php if (comments_open()) : ?>

    <?php
    $fields = array(
        'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" placeholder="' . __('Name','sp_webBusiness') . '" /></p>',
        'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" placeholder="' . __('E-mail','sp_webBusiness') . '" /></p>',
        'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="' . __('Website','sp_webBusiness') . '" /></p>',
   
   );

    $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields),		'comment_field'        => '<p class="comment-form-comment"> <textarea  placeholder="' . __('Comment','sp_webBusiness') . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
);

    comment_form($defaults);
    ?>


    <?php endif; ?>
