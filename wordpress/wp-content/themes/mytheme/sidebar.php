<aside class="sidebar">
        <div class="sidebar__plofile">
          <h2 class="sidebar__title"><i class="far fa-id-badge"></i><span>プロフィール</span></h2>
          <ul class="sidebar__contents">
            <div class="plofile-img">
              <img src="<?php echo get_template_directory_uri(); ?>/img/plofile.png" alt="著者の写真">
            </div>
            <li>名前: ちな</li>
            <li>居住地: 岡山県岡山市</li>
            <li>趣味: 音楽鑑賞、ゲーム</li>
          </ul>
        </div>
        <?php $args = [
          'orderby' => 'date', //並べ替えの方法
          'cat'=>'category', //カテゴリーを出力
          'order' => 'DESC', //降順(昇順 ASC)
          'post_status' => 'publish', //記事の公開ステータス
          'post_type' => 'post', //記事のタイプ
          'posts_per_page' => 3, //出力する数。全出力したい場合は-1
        ];?>

        <?php //クエリをセット
        $the_query = new WP_Query($args);?>
        <?php if ($the_query->have_posts()):?>
        <div class="sidebar__new-article">
          <h2 class="sidebar__title"><i class="fas fa-bell"></i><span>更新記事</span></h2>
          <ul class="sidebar__contents">
            <?php while ($the_query->have_posts()):
          $the_query->the_post();?>
            <li><a href="<?php the_permalink()?>"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?>:</time><?php the_title()?></a></li>
      <?php endwhile;?>
            <?php else:?>
              <p>まだ記事はありません。</p>
            <?php
            endif;
            wp_reset_postdata();//ループをリセット
            ?>
          </ul>
        </div>
        <div class="sidebar__category-list">
          <h2 class="sidebar__title"><i class="fas fa-list"></i><span>カテゴリー別</span></h2>
          <ul class="sidebar__contents">
            <li>カテゴリー１</li>
            <li>カテゴリー２</li>
            <li>カテゴリー３</li>
          </ul>
        </div>
        <div class="sidebar__category-list">
          <h2 class="sidebar__title"><i class="fas fa-list"></i><span>アーカイブ</span></h2>
          <ul class="sidebar__contents">
            <li>カテゴリー１</li>
            <li>カテゴリー２</li>
            <li>カテゴリー３</li>

          </ul>
        </div>
      </aside>
      <!-- /サイドバー -->
