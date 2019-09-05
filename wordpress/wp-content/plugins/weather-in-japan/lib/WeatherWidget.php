<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action(
  'widgets_init',
  create_function('', 'return register_widget("WeatherWidget");')
);

class WeatherWidget extends WP_Widget {
  function __construct() {
	  $widget_ops = array('description' => '日本の天気を表示するウィジェット');
	  $control_ops = array('width' => 400, 'height' => 350);
    parent::__construct(
      false,
      'Weather in Japan',
      $widget_ops,
      $control_ops
    );
  }

  public function widget ($args, $instance) {
    extract( $args );
 
    $checkboxArr = apply_filters('WeatherWidget', empty( $instance ) ? '' : $instance, $instance);
 
    echo <<<EOS
    {$before_widget}
    <div class="textwidget">
    {$checkboxArr}
    </div>
    {$after_widget}
EOS;
  }

  public function form ($instance) {
    $weatherinjapan = @$instance['weatherinjapan'];
    $weatherinjapan_date = @$instance['weatherinjapan_date'] ?: array();
    $f_checkbox_date_id = $this->get_field_id('weatherinjapan_date');
    $f_checkbox_date_name = $this->get_field_name('weatherinjapan_date')."[]";
    $f_checkbox_selected1 = in_array('1', @$weatherinjapan_date) ? "checked" : "";
    $f_checkbox_selected2 = in_array('2', @$weatherinjapan_date) ? "checked" : "";
    $f_checkbox_selected3 = in_array('3', @$weatherinjapan_date) ? "checked" : "";
    $f_checkbox_id = $this->get_field_id('weatherinjapan');
    $f_checkbox_name = $this->get_field_name('weatherinjapan')."[]";

    if ($f_checkbox_selected1 == '' && $f_checkbox_selected2 == '' && $f_checkbox_selected3 == '') {
      $f_checkbox_selected1 = "checked";
      $f_checkbox_selected2 = "checked";
      $f_checkbox_selected3 = "checked";
    }

    $data = array(
      array("稚内","011000",""),
      array("旭川","012010",""),
      array("留萌","012020",""),
      array("網走","013010",""),
      array("北見","013020",""),
      array("紋別","013030",""),
      array("根室","014010",""),
      array("釧路","014020",""),
      array("帯広","014030",""),
      array("室蘭","015010",""),
      array("浦河","015020",""),
      array("札幌","016010",""),
      array("岩見沢","016020",""),
      array("倶知安","016030",""),
      array("函館","017010",""),
      array("江差","017020",""),
      array("青森","020010",""),
      array("むつ","020020",""),
      array("八戸","020030",""),
      array("盛岡","030010",""),
      array("宮古","030020",""),
      array("大船渡","030030",""),
      array("仙台","040010",""),
      array("白石","040020",""),
      array("秋田","050010",""),
      array("横手","050020",""),
      array("山形","060010",""),
      array("米沢","060020",""),
      array("酒田","060030",""),
      array("新庄","060040",""),
      array("福島","070010",""),
      array("小名浜","070020",""),
      array("若松","070030",""),
      array("水戸","080010",""),
      array("土浦","080020",""),
      array("宇都宮","090010",""),
      array("大田原","090020",""),
      array("前橋","100010",""),
      array("みなかみ","100020",""),
      array("さいたま","110010",""),
      array("熊谷","110020",""),
      array("秩父","110030",""),
      array("千葉","120010",""),
      array("銚子","120020",""),
      array("館山","120030",""),
      array("東京","130010",""),
      array("大島","130020",""),
      array("八丈島","130030",""),
      array("父島","130040",""),
      array("横浜","140010",""),
      array("小田原","140020",""),
      array("新潟","150010",""),
      array("長岡","150020",""),
      array("高田","150030",""),
      array("相川","150040",""),
      array("富山","160010",""),
      array("伏木","160020",""),
      array("金沢","170010",""),
      array("輪島","170020",""),
      array("福井","180010",""),
      array("敦賀","180020",""),
      array("甲府","190010",""),
      array("河口湖","190020",""),
      array("長野","200010",""),
      array("松本","200020",""),
      array("飯田","200030",""),
      array("岐阜","210010",""),
      array("高山","210020",""),
      array("静岡","220010",""),
      array("網代","220020",""),
      array("三島","220030",""),
      array("浜松","220040",""),
      array("名古屋","230010",""),
      array("豊橋","230020",""),
      array("津","240010",""),
      array("尾鷲","240020",""),
      array("大津","250010",""),
      array("彦根","250020",""),
      array("京都","260010",""),
      array("舞鶴","260020",""),
      array("大阪","270000",""),
      array("神戸","280010",""),
      array("豊岡","280020",""),
      array("奈良","290010",""),
      array("風屋","290020",""),
      array("和歌山","300010",""),
      array("潮岬","300020",""),
      array("鳥取","310010",""),
      array("米子","310020",""),
      array("松江","320010",""),
      array("浜田","320020",""),
      array("西郷","320030",""),
      array("岡山","330010",""),
      array("津山","330020",""),
      array("広島","340010",""),
      array("庄原","340020",""),
      array("下関","350010",""),
      array("山口","350020",""),
      array("柳井","350030",""),
      array("萩","350040",""),
      array("徳島","360010",""),
      array("日和佐","360020",""),
      array("高松","370000",""),
      array("松山","380010",""),
      array("新居浜","380020",""),
      array("宇和島","380030",""),
      array("高知","390010",""),
      array("室戸岬","390020",""),
      array("清水","390030",""),
      array("福岡","400010",""),
      array("八幡","400020",""),
      array("飯塚","400030",""),
      array("久留米","400040",""),
      array("佐賀","410010",""),
      array("伊万里","410020",""),
      array("長崎","420010",""),
      array("佐世保","420020",""),
      array("厳原","420030",""),
      array("福江","420040",""),
      array("熊本","430010",""),
      array("阿蘇乙姫","430020",""),
      array("牛深","430030",""),
      array("人吉","430040",""),
      array("大分","440010",""),
      array("中津","440020",""),
      array("日田","440030",""),
      array("佐伯","440040",""),
      array("宮崎","450010",""),
      array("延岡","450020",""),
      array("都城","450030",""),
      array("高千穂","450040",""),
      array("鹿児島","460010",""),
      array("鹿屋","460020",""),
      array("種子島","460030",""),
      array("名瀬","460040",""),
      array("那覇","471010",""),
      array("名護","471020",""),
      array("久米島","471030",""),
      array("南大東","472000",""),
      array("宮古島","473000",""),
      array("石垣島","474010",""),
      array("与那国島","474020","")
    );
 
    echo <<<EOS
    <div>
      <p>表示日：</p>
      <label style="display: inline-block; width: 24%;" for="f_checkbox_date_id1">
        <input type="checkbox" name="{$f_checkbox_date_name}" class="checkbox" id="f_checkbox_date_id1" value="1" {$f_checkbox_selected1}>今日
      </label>
      <label style="display: inline-block; width: 24%;" for="f_checkbox_date_id2">
        <input type="checkbox" name="{$f_checkbox_date_name}" class="checkbox" id="f_checkbox_date_id2" value="2" {$f_checkbox_selected2}>明日
      </label>
      <label style="display: inline-block; width: 24%;" for="f_checkbox_date_id3">
        <input type="checkbox" name="{$f_checkbox_date_name}" class="checkbox" id="f_checkbox_date_id3" value="3" {$f_checkbox_selected3}>明後日
      </label>
    </div>

    <div>
      <p>表示地域：</p>
EOS;
    foreach($data as $akey => $d){
      if($weatherinjapan && array_search($d[1], $weatherinjapan) !== false) $d[2] ="checked";
        echo <<<EOS
          <label style="display: inline-block; width: 24%;"for ="{$f_checkbox_id}_{$akey}" >
          <input type="checkbox" name="{$f_checkbox_name}" {$d[2]} class="checkbox" id="{$f_checkbox_id}_{$akey}" value="{$d[1]}" />{$d[0]}
          </label>
EOS;
    }
       echo <<<EOS
    </div>
EOS;

  }

  public function update ($new_instance, $old_instance) {
    return $new_instance;
  }
}

add_filter('WeatherWidget', 'WIJ_show_weather');

function WIJ_show_weather($data) {
  echo WIJ_get_weather_in_japan($data);
}
