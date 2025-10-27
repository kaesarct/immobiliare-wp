<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('add_meta_boxes', 'rem_add_property_metaboxes');
function rem_add_property_metaboxes() {
    add_meta_box(
        'property_details',
        __('Dettagli Proprietà', 'faro-immobiliare'),
        'rem_property_details_callback',
        'property',
        'normal',
        'high'
    );
}

function rem_property_details_callback($post) {
    wp_nonce_field('rem_save_property_meta', 'rem_property_nonce');
    
    $price = get_post_meta($post->ID, '_property_price', true);
    $sqm = get_post_meta($post->ID, '_property_sqm', true);
    $rooms = get_post_meta($post->ID, '_property_rooms', true);
    $bathrooms = get_post_meta($post->ID, '_property_bathrooms', true);
    $address = get_post_meta($post->ID, '_property_address', true);
    $status = get_post_meta($post->ID, '_property_status', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="property_price"><?php _e('Prezzo (€)', 'faro-immobiliare'); ?></label></th>
            <td><input type="number" id="property_price" name="property_price" value="<?php echo esc_attr($price); ?>" /></td>
        </tr>
        <tr>
            <th><label for="property_sqm"><?php _e('Metri Quadri', 'faro-immobiliare'); ?></label></th>
            <td><input type="number" id="property_sqm" name="property_sqm" value="<?php echo esc_attr($sqm); ?>" /></td>
        </tr>
        <tr>
            <th><label for="property_rooms"><?php _e('Camere', 'faro-immobiliare'); ?></label></th>
            <td><input type="number" id="property_rooms" name="property_rooms" value="<?php echo esc_attr($rooms); ?>" /></td>
        </tr>
        <tr>
            <th><label for="property_bathrooms"><?php _e('Bagni', 'faro-immobiliare'); ?></label></th>
            <td><input type="number" id="property_bathrooms" name="property_bathrooms" value="<?php echo esc_attr($bathrooms); ?>" /></td>
        </tr>
        <tr>
            <th><label for="property_address"><?php _e('Indirizzo', 'faro-immobiliare'); ?></label></th>
            <td><input type="text" id="property_address" name="property_address" value="<?php echo esc_attr($address); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="property_status"><?php _e('Stato', 'faro-immobiliare'); ?></label></th>
            <td>
                <select id="property_status" name="property_status">
                    <option value="vendita" <?php selected($status, 'vendita'); ?>><?php _e('In Vendita', 'faro-immobiliare'); ?></option>
                    <option value="affitto" <?php selected($status, 'affitto'); ?>><?php _e('In Affitto', 'faro-immobiliare'); ?></option>
                    <option value="venduto" <?php selected($status, 'venduto'); ?>><?php _e('Venduto', 'faro-immobiliare'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

add_action('save_post', 'rem_save_property_meta');
function rem_save_property_meta($post_id) {
    if (!isset($_POST['rem_property_nonce']) || !wp_verify_nonce($_POST['rem_property_nonce'], 'rem_save_property_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['property_price', 'property_sqm', 'property_rooms', 'property_bathrooms', 'property_address', 'property_status'];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}