<?php
/*
  Plugin Name: Weather in Japan
  Plugin URI: 
  Description: 日本各地の天気を表示するプラグイン
  Version: 1.3.3
  Author: ishikawa
  Author URI: https://www.islog.jp
  License: GPL2
*/

/*  Copyright 2017 ishikawa (email : contact@islog.jp)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
     published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once dirname(__FILE__) . '/lib/WeatherWidget.php';
require_once dirname(__FILE__) . '/lib/WeatherShortCode.php';

function WIJ_get_weather_in_japan ($ids) {
  $htmls = '';
  $datas_ids = @$ids['weatherinjapan'] ? $ids['weatherinjapan'] : @$ids['id'];
  $datas_dates = @$ids['weatherinjapan_date'] ? $ids['weatherinjapan_date']: @$ids['date'] ?: array(1, 2, 3);
  $yes_hide_this1 = in_array('1', $datas_dates) ? "" : "yes_hide_this1";
  $yes_hide_this2 = in_array('2', $datas_dates) ? "" : "yes_hide_this2";
  $yes_hide_this3 = in_array('3', $datas_dates) ? "" : "yes_hide_this3";
  $counts = count(@$datas_dates);

  if ($datas_ids) {

    wp_enqueue_style("weather-in-japan", plugins_url('stylesheets/style.css', __FILE__));

    foreach ($datas_ids as $id) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "http://weather.livedoor.com/forecast/webservice/json/v1?city=" . $id);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 120);
      $json = curl_exec($ch);
      curl_close($ch);

      $jsons[] = json_decode($json, true);
    }

    $htmls = <<<EOM
    <div id="wij_weather_in_japan">
EOM;

      $weathers = array();

      foreach ($jsons as $j) {
        $weathers[] = array(
          'city' => $j['location']['city'],
          'dateLabels' => array(
            @$j['forecasts'][0]['dateLabel'],
            @$j['forecasts'][1]['dateLabel'],
            @$j['forecasts'][2]['dateLabel'],
          ),
          'images' => array(
            @$j['forecasts'][0]['image']['url'],
            @$j['forecasts'][1]['image']['url'],
            @$j['forecasts'][2]['image']['url'],
          ),
          'image_ttls' => array(
            @$j['forecasts'][0]['image']['title'],
            @$j['forecasts'][1]['image']['title'],
            @$j['forecasts'][2]['image']['title'],
          ),
          'temp_maxs' => array(
            @$j['forecasts'][0]['temperature']['max']['celsius'] ?: '--',
            @$j['forecasts'][1]['temperature']['max']['celsius'] ?: '--',
            @$j['forecasts'][2]['temperature']['max']['celsius'] ?: '--',
          ),
          'temp_mins' => array(
            @$j['forecasts'][0]['temperature']['min']['celsius'] ?: '--',
            @$j['forecasts'][1]['temperature']['min']['celsius'] ?: '--',
            @$j['forecasts'][2]['temperature']['min']['celsius'] ?: '--',
          ),
        );
      }

      foreach ($weathers as $w) {

      $htmls .= <<<EOM
      <div id="wij_container" class="count{$counts}">
        <p class="location">{$w['city']}の天気</p>

        <ul>
          <li id="{$yes_hide_this1}">
            <p class="dateLabel">{$w['dateLabels'][0]}</p>
            <img class="panel" src="{$w['images'][0]}" alt="{$w['image_ttls'][0]}">
            <p class="ttl">{$w['image_ttls'][0]}</p>
            <p class="thermometer"><span>{$w['temp_maxs'][0]}℃</span> / <span>{$w['temp_mins'][0]}℃<span></p>
          </li>

          <li id="{$yes_hide_this2}">
            <p class="dateLabel">{$w['dateLabels'][1]}</p>
            <img class="panel" src="{$w['images'][1]}" alt="{$w['image_ttls'][1]}">
            <p class="ttl">{$w['image_ttls'][1]}</p>
            <p class="thermometer"><span>{$w['temp_maxs'][1]}℃</span> / <span>{$w['temp_mins'][1]}℃<span></p>
          </li>

          <li id="{$yes_hide_this3}">
            <p class="dateLabel">{$w['dateLabels'][2]}</p>
            <img class="panel" src="{$w['images'][2]}" alt="{$w['image_ttls'][2]}">
            <p class="ttl">{$w['image_ttls'][2]}</p>
            <p class="thermometer"><span>{$w['temp_maxs'][2]}℃</span> / <span>{$w['temp_mins'][2]}℃<span></p>
          </li>
        </ul>
      </div>
EOM;
    }

$htmls .= <<<EOM
  </div>
EOM;
  }

  return $htmls;
}
