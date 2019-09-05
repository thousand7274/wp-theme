<?php
// サムネ追加
    add_theme_support('post-thumbnails');
    // 426*426
function new_excerpt_more($more) {
  return '・・・';
}
add_filter('excerpt_more', 'new_excerpt_more');
