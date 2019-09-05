<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function shortcode_weather_in_japan ($atts) {
  if(isset($atts['id']) && !empty($atts['id'])) {
    $ids = explode(',', @$atts['id']);
    $dates = @$atts['date'] ? explode(',', $atts['date']) : array();

    $arr = array(
      'weatherinjapan' => $ids,
      'weatherinjapan_date' => $dates
    );

    return WIJ_get_weather_in_japan($arr);
  }

  else {
    return "idを指定してください";
  }
}
 
add_shortcode('weather-in-japan', 'shortcode_weather_in_japan');
