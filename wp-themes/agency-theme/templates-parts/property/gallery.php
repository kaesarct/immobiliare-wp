<?php if ( function_exists("get_post_gallery") ) : ?>
      <div class="property-gallery">
<?php
            $images = get_post_meta(get_the_ID(), "property_images", true);
            if ( is_array($images) && !empty($images) ) :
                  foreach ( $images as $img_id ) : ?>
                        <div class="gallery-item"><?php echo wp_get_attachment_image($img_id, "property-gallery"); ?></div>
<?php endforeach;
            else :
                  if ( has_post_thumbnail() ) {
                        echo "<div class=\"gallery-item\">";
                        the_post_thumbnail("property-gallery");
                        echo "</div>";
                  }
            endif;
            ?>
      </div>
<?php endif; ?>
