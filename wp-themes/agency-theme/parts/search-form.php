<?php echo esc_url(home_url("/")); ?>">
      <label>
            <span class="screen-reader-text"><?php esc_html_e("Search for:", "agency-theme"); ?></span>
            <input type="search" class="search-field" placeholder="<?php esc_attr_e("Cerca proprietà , città ...", "agency-theme"); ?>" value="<?php echo get_search_query(); ?>" name="s" />
      </label>
      <button type="submit" class="search-submit"><?php esc_html_e("Cerca", "agency-theme"); ?></button>
</form>
