<?php  get_header();?>
<?php $args = [
    'orderby' => 'date', //並べ替えの方法
    // 'cat'=>'category', //カテゴリーを出力
    'order' => 'DESC', //降順(昇順 ASC)
    'post_status' => 'publish', //記事の公開ステータス
    'post_type' => 'post', //記事のタイプ
    'posts_per_page' => -1, //出力する数。全出力したい場合は-1
];?>
<main>
  <div class="main">
    <div class="main__container">
      <h2 class="main-title">つらつらと更新してます</h2>
      <div class="list-wrapper">
<?php //クエリをセット
$the_query = new WP_Query($args);
 if ($the_query->have_posts()):
   while ($the_query->have_posts()):
      $the_query->the_post();?>
      <a href="<?php the_permalink()?>"><section class="article-list">
          <div class="article-list__img">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('thumbnail'); ?>
            <?php else: ?>
              <img src="https://placehold.jp/700x394.png" alt="画像がありません" height="394" width="700">
              </div>
            <?php endif; ?>

          <h3 class="article-list__title"><?php the_title()?></h3>
          <div class="article-list__date"><i class="far fa-calendar-alt"></i><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></div>
          <div class="article-list__text"><?php the_excerpt(); ?></div>
          <div class="article-list__more">
            <a href="<?php the_permalink()?>"></a>
          </div>
        </section>
      </a>
        <?php endwhile;?>
      <?php else:?>
        <p>まだ記事はありません。</p>
      <?php
      endif;
      wp_reset_postdata();//ループをリセット
      ?>
      </div>
    </div>
    <?php  get_sidebar();?>
  </div>
</main>



<?php  get_footer();?>
