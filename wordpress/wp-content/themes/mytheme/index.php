<?php  get_header();?>
  <main>
    <div class="top-img">
      <img src="<?php echo get_template_directory_uri(); ?>/img/top.jpg" alt="瀬戸内海">
    </div>
    <div class="topics">
      <?php $args = [
        'orderby' => 'date', //並べ替えの方法
        // 'cat'=>'category', //カテゴリーを出力
        'order' => 'DESC', //降順(昇順 ASC)
        'post_status' => 'publish', //記事の公開ステータス
        'post_type' => 'post', //記事のタイプ
        'posts_per_page' => 3, //出力する数。全出力したい場合は-1
      ];?>
    <?php //クエリをセット
      $the_query = new WP_Query($args);?>
    <?php if ($the_query->have_posts()):?>
    <!-- <dl> -->
      <div class="topics__info">
        <h2>更新情報</h2>
        <?php while ($the_query->have_posts()):
          $the_query->the_post();?>
        <dl>
          <dt><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></dt>
          <dd><a href="<?php the_permalink()?>"><h3><?php the_title()?>:</h3><?php the_excerpt(); ?></a></dd>
        </dl>
      <!-- // ここに出力される -->
        <?php endwhile;?>
        <?php else:?>
          <p>まだ記事はありません。</p>
        <?php
        endif;
        wp_reset_postdata();//ループをリセット
        ?>
      </div>
      <div class="topics__weather">
        <!-- <h2>岡山県の天気</h2> -->
        <?php
          if (function_exists('WIJ_get_weather_in_japan')) {
            echo WIJ_get_weather_in_japan(
              array(
                'id' => array('330010'),
                'date' => array(1,2,3) //1=today,2=tomorrow,3=dayaftertomorrow
              )
            );
          }
        ?>
      </div>
    </div>

    <h2 class="desc-title">四つ手小屋とは？</h2>
    <div class="desc">
      <div class="desc__img">
        <img src="<?php echo get_template_directory_uri(); ?>/img/02.jpg" alt="四つ手小屋" width="700">
      </div>
      <div class="desc__text">
        <div class="desc__title"><span>よ</span>うこそ、四つ手小屋 近藤へ
        </div>
        四つ手小屋は、九蟠から升田にかけての防潮堤に設置されています。
        一辺が5～6mの正方形の網の四隅を十文字に組んだ竹の腕木にとめて引き綱で水中に釣り下げ、夕刻に電灯をつけて魚を引き寄せて引き上げ、網の中央の垂れた部分に寄せた魚を長柄の小網ですくい上げる漁法です。
      </div>
    </div>
  </div>
</main>
<?php  get_footer();?>
