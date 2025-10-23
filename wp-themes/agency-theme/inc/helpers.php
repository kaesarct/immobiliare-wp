<?php
if (!function_exists("agency_trim_words")) {
      function agency_trim_words($text, $words = 20) {
            return wp_trim_words($text, $words, "...");
      }
}
