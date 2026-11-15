<?php
/**
 * @package Case-Themes
 */

if ( post_password_required() ) {
    return;
    } ?>

    <div id="comments" class="comments-area">

        <?php
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">
                <h2 class="comments-title">
                    <?php
                        $comment_count = get_comments_number();
                        if ( 1 === intval($comment_count) ) {
                            echo esc_html__( '1 Comment', 'kidza' );
                        } else {
                        $formatted_count = ( $comment_count < 10 ) ? '0' . $comment_count : $comment_count;
                        echo esc_html( '(' . $formatted_count . ') ' . __( 'Comment', 'kidza' ) );
                        }
                        
                    ?>
                </h2>
                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'kidza_comment_list',
                            'max_depth'  => 3
                        ) );
                    ?>
                </ul>
                <?php the_comments_navigation(); ?>
                <?php the_comments_navigation(); ?>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kidza' ); ?></p>
            <?php
            endif;

        endif;

        $args = array(
            'id_form'           => 'commentform',
            'id_submit'         => 'submit',
            'title_reply'       => esc_attr__( 'Leave A Comment', 'kidza'),
            'title_reply_to'    => esc_attr__( 'Leave A Comment To ', 'kidza') . '%s',
            'cancel_reply_link' => esc_attr__( 'Cancel Comment', 'kidza'),
            'label_submit'      => esc_attr__( 'Send comments ', 'kidza'),
            'comment_notes_before' => '',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' =>
                    '<div class="author-email-wrapper"><div class="comment-form-author">'.
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30" placeholder="'.esc_attr__('Name', 'kidza').'"/></div>',
                
                'email' =>
                    '<div class="comment-form-email">'.
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30" placeholder="'.esc_attr__('Email', 'kidza').'"/></div></div>',
                    
            )
            ),
            'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Message', 'kidza').'" aria-required="true">' .
            '</textarea></div>',
        );
    comment_form($args); ?>
</div>