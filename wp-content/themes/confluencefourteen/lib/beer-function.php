<?php

// create beer review custom post type
function create_beer_reviews() {
    register_post_type( 'beer_reviews',
        array(
            'labels' => array(
                'name' => 'Beer Reviews',
                'singular_name' => 'Beer Review',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Beer Review',
                'edit' => 'Edit',
                'edit_item' => 'Edit Beer Review',
                'new_item' => 'New Beer Review',
                'view' => 'View',
                'view_item' => 'View Beer Review',
                'search_items' => 'Search Beer Reviews',
                'not_found' => 'No Beer Reviews found',
                'not_found_in_trash' => 'No Beer Reviews found in Trash',
                'parent' => 'Parent Beer Review'
            ),
 			'rewrite' => array('slug' => 'beers'),
            'public' => true,
            'menu_position' => 5,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/hop.jpg', __FILE__ ),
            'has_archive' => true
        )
    );
}

// create beer review custom meta boxes
function beer_meta_box(){
	add_meta_box('beer_box', 'Beer Review Meta Box', 'beer_box_callback', 'beer_reviews');
}
add_action('add_meta_boxes', 'beer_meta_box');

function beer_box_callback($post){
	wp_nonce_field(basename(__FILE__), 'beer_nonce');
	$beer_stored_meta = get_post_meta($post->ID);
	$brewer_stored_meta = get_post_meta($post->ID);
	$style_stored_meta = get_post_meta($post->ID);
	$rating_stored_meta = get_post_meta($post->ID);
	//$beer_rating = get_post_meta($post->ID);
	$beer_rating = intval( get_post_meta( $post->ID, 'beer_rating', true ) );
    ?>
	
	<p>
		<label for="meta-text" class="beer-title">Beer Name Input Field</label>
		<input type="text" name="meta-text" id="meta-text" value="<?php echo $beer_stored_meta['meta-text'][0]; ?>" />
	</p>
<p>
		<label for="meta-text-two" class="brewer-title">Brewer Name Input Field</label>
		<input type="text" name="meta-text-two" id="meta-text-two" value="<?php echo $brewer_stored_meta['meta-text-two'][0]; ?>" />
	</p>
<p>
		<label for="meta-text-three" class="brewer-title">Beer Style Input Field</label>
		<input type="text" name="meta-text-three" id="meta-text-three" value="<?php echo $style_stored_meta['meta-text-three'][0]; ?>" />
	</p>
<p>
		<label for="meta-text-four" class="brewer-title">Beer Rating Input Field</label>
		<input type="text" name="meta-text-four" id="meta-text-four" value="<?php echo $rating_stored_meta['meta-text-four'][0]; ?>" />
	</p>
	<table>
		<tr>
            <td style="width: 150px"><label for="meta-text-rating" class="beer"><h4>Hop Rating</h4></label></td>
            <td>
                <select style="width: 100px" name="beer_rating">
                <?php
                // Generate all items of drop-down list
                for ( $rating = 5; $rating >= 1; $rating -- ) {
                ?>
                    <option value="<?php echo $rating; ?>" <?php echo selected( $rating, $beer_rating ); ?>>
                    <?php echo $rating; ?> hops <?php } ?>
                </select>
            </td>
        </tr>
	</table>
	<?php
}

function beer_meta_save($post_id){
	//check save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'beer_nonce' ]) && wp_verify_nonce( $_POST['beer_nonce'], basename(__FILE))) ? 'true' : 'false';
	if ($is_autosave || $is_revision || !$is_valid_nonce){
		return;
	}
	if ( isset($_POST['meta-text'])){
		update_post_meta($post_id, 'meta-text', sanitize_text_field($_POST['meta-text']));
	}
	if ( isset($_POST['meta-text-two'])){
		update_post_meta($post_id, 'meta-text-two', sanitize_text_field($_POST['meta-text-two']));
	}
	if ( isset($_POST['meta-text-three'])){
		update_post_meta($post_id, 'meta-text-three', sanitize_text_field($_POST['meta-text-three']));
	}
	if ( isset($_POST['meta-text-four'])){
		update_post_meta($post_id, 'meta-text-four', sanitize_text_field($_POST['meta-text-four']));
	}
	if ( isset($_POST['beer_rating'])){
		update_post_meta($post_id, 'beer_rating', sanitize_text_field($_POST['beer_rating']));
	}
	
}
add_action('save_post', 'beer_meta_save');

// create beer review custom meta boxes 2
function my_admin() {
    add_meta_box('beer_review_meta_box', 'Beer Review Details', 'display_beer_review_meta_box', 'places', 'normal', 'high');
}

add_action('add_meta_boxes', 'my_admin');

// createmeta box callbacks
function display_beer_review_meta_box($beer_review){
	wp_nonce_field(basename(__FILE__), 'beer_box_nonce');
	$beer_label_stored_meta = get_post_meta($beer_review->ID);
	$beer_brewer_stored_meta = get_post_meta($beer_review->ID);
	//$beer_rating_stored_meta = get_post_meta($beer_review->ID);
	$brew_rating = intval( get_post_meta( $beer_review->ID, 'brew_rating', true ) );
	?>
	<table>
        <tr>
            <td><label for="meta-text-beer" class="beer"><h4>Beer Label</h4></label></td>
			<td><input type="text" name="meta-text-beer" id="meta-text-beer" value="<?php echo $beer_label_stored_meta['meta-text-beer'][0]; ?>" /></td>
        </tr>
		<tr>
            <td style="width: 100%"><label for="meta-text-brewer" class="beer"><h4>Brewer Label</h4></label></td>
            <td><input type="text" name="meta-text-brewer" id="meta-text-brewer" value="<?php echo $beer_brewer_stored_meta['meta-text-brewer'][0]; ?>" /></td>
        </tr>
		<tr>
            <td style="width: 150px;font-weight:600;color:#D64534;">BEER RATING</td>
            <td>
                <select style="width: 100px" name="brew_rating">
                <?php
                // Generate all items of drop-down list
                for ( $rating = 5; $rating >= 1; $rating -- ) {
                ?>
                    <option value="<?php echo $rating; ?>" <?php echo selected( $rating, $brew_rating ); ?>>
                    <?php echo $rating; ?> hoppy days <?php } ?>
                </select>
            </td>
        </tr>
        
    </table>
<?php
function beer_review_meta_save($post_id){
	//check save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'beer_box_nonce' ]) && wp_verify_nonce( $_POST['beer_box_nonce'], basename(__FILE))) ? 'true' : 'false';
		if ($is_autosave || $is_revision || !$is_valid_nonce){
				return;
			}
			if ( isset($_POST['meta-text-beer'])){
				update_post_meta($post_id, 'meta-text-beer', sanitize_text_field($_POST['meta-text-beer']));
			}
			if ( isset($_POST['meta-text-brewer'])){
				update_post_meta($post_id, 'meta-text-brewer', sanitize_text_field($_POST['meta-text-brewer']));
			}
			//if ( isset($_POST['meta-text-rating'])){
			//	update_post_meta($post_id, 'meta-text-rating', sanitize_text_field($_POST['meta-text-rating']));
			//}
			if ( isset($_POST['brew_rating'])){
				update_post_meta($post_id, 'brew_rating', sanitize_text_field($_POST['brew_rating']));
			}
	}
//add_action( 'save_post', 'display_beer_review_meta_box', 10, 2 );
add_action('save_post', 'beer_review_meta_save');
}