<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'rem_add_admin_menu');
function rem_add_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=property',
        __('Impostazioni Immobili', 'faro-immobiliare'),
        __('Impostazioni', 'faro-immobiliare'),
        'manage_options',
        'rem-settings',
        'rem_settings_page'
    );
}

function rem_settings_page() {
    if (isset($_POST['submit'])) {
        check_admin_referer('rem_settings_nonce');
        update_option('rem_currency', sanitize_text_field($_POST['currency']));
        update_option('rem_contact_email', sanitize_email($_POST['contact_email']));
        echo '<div class="notice notice-success"><p>' . __('Impostazioni salvate!', 'faro-immobiliare') . '</p></div>';
    }
    
    $currency = get_option('rem_currency', '€');
    $contact_email = get_option('rem_contact_email', get_option('admin_email'));
    ?>
    <div class="wrap">
        <h1><?php _e('Impostazioni Immobili', 'faro-immobiliare'); ?></h1>
        <form method="post">
            <?php wp_nonce_field('rem_settings_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php _e('Valuta', 'faro-immobiliare'); ?></th>
                    <td><input type="text" name="currency" value="<?php echo esc_attr($currency); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Email Contatti', 'faro-immobiliare'); ?></th>
                    <td><input type="email" name="contact_email" value="<?php echo esc_attr($contact_email); ?>" class="regular-text" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

add_filter('manage_property_posts_columns', 'rem_property_columns');
function rem_property_columns($columns) {
    $new_columns = [];
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = $columns['title'];
    $new_columns['property_price'] = __('Prezzo', 'faro-immobiliare');
    $new_columns['property_status'] = __('Stato', 'faro-immobiliare');
    $new_columns['property_type'] = __('Tipologia', 'faro-immobiliare');
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}

add_action('manage_property_posts_custom_column', 'rem_property_column_content', 10, 2);
function rem_property_column_content($column, $post_id) {
    switch ($column) {
        case 'property_price':
            $price = get_post_meta($post_id, '_property_price', true);
            echo $price ? esc_html($price) . ' €' : '-';
            break;
        case 'property_status':
            $status = get_post_meta($post_id, '_property_status', true);
            echo $status ? esc_html(ucfirst($status)) : '-';
            break;
        case 'property_type':
            $terms = get_the_terms($post_id, 'property_type');
            echo $terms ? esc_html($terms[0]->name) : '-';
            break;
    }
}