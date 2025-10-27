<form role="search" method="get" class="property-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="hidden" name="post_type" value="property">
    
    <div class="search-fields">
        <div class="search-field-group">
            <label for="property-search">
                <span class="screen-reader-text"><?php esc_html_e('Cerca proprietà:', 'agency-theme'); ?></span>
                <input type="search" id="property-search" name="s" placeholder="<?php esc_attr_e('Cerca proprietà, città...', 'agency-theme'); ?>" value="<?php echo get_search_query(); ?>" />
            </label>
        </div>
        
        <div class="search-field-group">
            <label for="property-type-filter"><?php _e('Tipologia:', 'agency-theme'); ?></label>
            <select id="property-type-filter" name="property_type">
                <option value=""><?php _e('Tutte', 'agency-theme'); ?></option>
                <?php
                $types = get_terms(['taxonomy' => 'property_type', 'hide_empty' => false]);
                $selected_type = isset($_GET['property_type']) ? $_GET['property_type'] : '';
                if (!is_wp_error($types) && !empty($types)) {
                    foreach ($types as $type) {
                        printf('<option value="%s" %s>%s</option>', 
                            esc_attr($type->slug), 
                            selected($selected_type, $type->slug, false),
                            esc_html($type->name)
                        );
                    }
                }
                ?>
            </select>
        </div>
        
        <div class="search-field-group">
            <label for="property-status-filter"><?php _e('Stato:', 'agency-theme'); ?></label>
            <select id="property-status-filter" name="property_status">
                <option value=""><?php _e('Tutti', 'agency-theme'); ?></option>
                <?php
                $selected_status = isset($_GET['property_status']) ? $_GET['property_status'] : '';
                $statuses = ['vendita' => 'In Vendita', 'affitto' => 'In Affitto'];
                foreach ($statuses as $value => $label) {
                    printf('<option value="%s" %s>%s</option>', 
                        esc_attr($value), 
                        selected($selected_status, $value, false),
                        esc_html($label)
                    );
                }
                ?>
            </select>
        </div>
        
        <button type="submit" class="search-submit"><?php esc_html_e('Cerca', 'agency-theme'); ?></button>
    </div>
</form>
