<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Case-Themes
 * @since kidza 1.0
 */

if(!defined('DEV_MODE')){ define('DEV_MODE', true); }

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
 
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
if ( ! function_exists( 'get_reading_time' ) ) {
    function get_reading_time( $post_id = null ) {
        if ( ! $post_id ) {
            $post_id = get_the_ID();
        }
        $content = get_post_field( 'post_content', $post_id );
        $word_count = str_word_count( wp_strip_all_tags( $content ) );
        $reading_time = ceil( $word_count / 200 );

        return $reading_time;
    }
}


/**
 * Theme Require
*/
//Custom Comment and rate service
// Add field rating to form comment
function add_rating_field_to_comment_form() {
    ?>
    <p class="comment-form-rating2">
        <label for="rating">Star rating:</label>
        <span class="commentratingbox">
            <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                <input type="radio" id="rating-<?php echo esc_attr($i); ?>" name="rating" value="<?php echo esc_attr($i); ?>" />
                <label for="rating-<?php echo esc_attr($i); ?>" class="star">
                    <svg xmlns="http://www.w3.org/2000/svg" class="star-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10.0003 1.66663L12.5753 6.88329L18.3337 7.72496L14.167 11.7833L15.1503 17.5166L10.0003 14.8083L4.85033 17.5166L5.83366 11.7833L1.66699 7.72496L7.42533 6.88329L10.0003 1.66663Z"/>
                    </svg>
                </label>
            <?php endfor; ?>
        </span>
    </p>
    <?php
}
add_action( 'comment_form_logged_in_after', 'add_rating_field_to_comment_form' );
add_action( 'comment_form_after_fields', 'add_rating_field_to_comment_form' );


function save_comment_rating( $comment_id ) {
    if ( isset( $_POST['rating'] ) && $_POST['rating'] != '' ) {
        $rating = intval( $_POST['rating'] );
        add_comment_meta( $comment_id, 'rating', $rating );
    }
}
add_action( 'comment_post', 'save_comment_rating' );
// total comment service
function get_total_comments_service( $post_id ) {
    return get_comments_number_service( $post_id );
}
function show_comment_rating( $comment_text, $comment ) {
    if ( $rating = get_comment_meta( $comment->comment_ID, 'rating', true ) ) {
        $stars = str_repeat( '⭐', $rating );
        $comment_text = '<p class="comment-rating"> ' . $stars . '</p>' . $comment_text;
    }
    return $comment_text;
}
add_filter( 'comment_text', 'show_comment_rating', 10, 2 );


// average service
function get_average_rating( $post_id ) {
    $comments = get_approved_comments( $post_id );
    $total = 0;
    $count = 0;

    foreach ( $comments as $comment ) {
        $rating = get_comment_meta( $comment->comment_ID, 'rating', true );
        if ( $rating ) {
            $total += intval( $rating );
            $count++;
        }
    }

    if ( $count > 0 ) {
        return round( $total / $count, 1 );
    }

    return 0;
}
//end comment custom

kidza()->require_folder('inc');
kidza()->require_folder('inc/classes');
kidza()->require_folder('inc/theme-options');
kidza()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    kidza()->require_folder('woocommerce');
}