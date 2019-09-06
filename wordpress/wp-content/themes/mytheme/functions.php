<?php
// サムネ追加
  add_theme_support('post-thumbnails');
  // 426*426

  // readmore
  function new_excerpt_more($more) {
    return '・・・';
  }
  add_filter('excerpt_more', 'new_excerpt_more');
  function set_meta() {
    $meta = '<title>'.get_bloginfo('name').'</title>'."\n";
    $meta .= '<meta type="description" content="'.get_bloginfo('description').'">';
    echo $meta;
}
  add_filter('wp_head', 'set_meta');
