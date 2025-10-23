<?php
      $rooms = get_post_meta(get_the_ID(), "rooms", true);
      $area   = get_post_meta(get_the_ID(), "area", true);
      if ( $rooms ) echo "<span class=\"prop-rooms\">" . esc_html($rooms) . " " . esc_html__("rooms", "agency-theme") . "</span>";
      if ( $area ) echo "<span class=\"prop-area\">" . esc_html($area) . " mÂ²</span>";
      ?>
</div>
