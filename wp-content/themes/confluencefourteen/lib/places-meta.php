<?php

// create places custom meta boxes
function places_meta_box(){
	add_meta_box('places_box', 'Place/Trip Details', 'places_box_callback', 'places', 'normal', 'high');
	// add_meta_box('beer_review_meta_box', 'Beer Review Details', 'display_beer_review_meta_box', 'places', 'normal', 'high');
}
add_action('add_meta_boxes', 'places_meta_box');

function places_box_callback($post){
	wp_nonce_field(basename(__FILE__), 'places_nonce');
	$year_stored_meta = get_post_meta($post->ID);
	$month_stored_meta = get_post_meta($post->ID);
	$memory_stored_meta = get_post_meta($post->ID);
	$beers_stored_meta = get_post_meta($post->ID);
	//$trip_rating = get_post_meta($post->ID);
	$trip_rating = intval( get_post_meta( $post->ID, 'trip_rating', true ) );
    ?>
	<p>
		<label for="meta-text-places" class="places-title">Year</label>
		<input type="text" name="meta-text-places" id="meta-text-places" value="<?php echo $year_stored_meta['meta-text-places'][0]; ?>" />
	</p>
<p>
		<label for="meta-text-two-places" class="month-title">Month</label>
		<input type="text" name="meta-text-two-places" id="meta-text-two-places" value="<?php echo $month_stored_meta['meta-text-two-places'][0]; ?>" />
	</p>
<p>
		<label for="meta-textarea-three-places" class="brewer-title">Favorite Memory</label>
		<input type="textarea" name="meta-textarea-three-places" id="meta-textarea-three-places" value="<?php echo $memory_stored_meta['meta-textarea-three-places'][0]; ?>" />
	</p>
<p>
		<label for="meta-text-four-places" class="brewer-title">Favorite Beers</label>
		<input type="text" name="meta-text-four-places" id="meta-text-four-places" value="<?php echo $beers_stored_meta['meta-text-four-places'][0]; ?>" />
	</p>
	<table>
		<tr>
            <td style="width: 150px"><label for="trip_rating" class="beer"><h4>Trip Rating</h4></label></td>
            <td>
                <select style="width: 100px" name="trip_rating">
                <?php
                // Generate all items of drop-down list
                for ( $rating = 5; $rating >= 1; $rating -- ) {
                ?>
                    <option value="<?php echo $rating; ?>" <?php echo selected( $rating, $trip_rating ); ?>>
                    <?php echo $rating; ?> hops <?php } ?>
                </select>
            </td>
        </tr>
	</table>
	<?php
}

function places_meta_save($post_id){
	//check save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'places_nonce' ]) && wp_verify_nonce( $_POST['places_nonce'], basename(__FILE))) ? 'true' : 'false';
	if ($is_autosave || $is_revision || !$is_valid_nonce){
		return;
	}
	if ( isset($_POST['meta-text-places'])){
		update_post_meta($post_id, 'meta-text-places', sanitize_text_field($_POST['meta-text-places']));
	}
	if ( isset($_POST['meta-text-two-places'])){
		update_post_meta($post_id, 'meta-text-two-places', sanitize_text_field($_POST['meta-text-two-places']));
	}
	if ( isset($_POST['meta-textarea-three-places'])){
		update_post_meta($post_id, 'meta-textarea-three-places', sanitize_text_field($_POST['meta-textarea-three-places']));
	}
	if ( isset($_POST['meta-text-four-places'])){
		update_post_meta($post_id, 'meta-text-four-places', sanitize_text_field($_POST['meta-text-four-places']));
	}
	if ( isset($_POST['trip_rating'])){
		update_post_meta($post_id, 'trip_rating', sanitize_text_field($_POST['trip_rating']));
	}
	
}
add_action('save_post', 'places_meta_save');



