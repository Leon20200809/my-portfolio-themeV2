<?php get_header(); ?>

<main class="blog-archive">
    <div class="container">
        <h1 class="blog-title">やらかしメモ 一覧</h1>

        <div class="blog-layout">
            <!-- 左カラム：月別・カテゴリ -->
            <aside class="blog-sidebar">
                <?php get_search_form() ?>
                <section class="widget widget-archive">
                    <h2>月別アーカイブ</h2>
                    <ul>
                        <?php wp_get_archives(array('type' => 'monthly')); ?>
                    </ul>
                </section>

                <section class="widget widget-categories">
                    <h2>カテゴリ</h2>
                    <ul>
                        <?php wp_list_categories(array(
                            'title_li' => '',
                            'show_count' => true
                        )); ?>
                    </ul>
                </section>
            </aside>

            <!-- 右カラム：カードグリッド -->
            <section class="blog-main">
                <div class="blog-grid">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                    ?>
                            <article class="blog-card">
                                <div class="card-meta">

                                    <span class="card-date"><?php echo get_the_date('Y年n月d日'); ?></span>
                                    <span class="card-category">
                                        <?php
                                        $cats = get_the_category();
                                        if (!empty($cats)) {
                                            echo esc_html($cats[0]->name);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="card-link">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-thumb"><?php the_post_thumbnail(); ?></div>
                                    <?php endif; ?>
                                    <div class="card-content">
                                        <h2 class="card-title"><?php the_title(); ?></h2>
                                        <p class="card-excerpt"><?php echo get_the_excerpt(); ?></p>
                                        
                                    </div>
                                </a>
                            </article>
                    <?php
                        endwhile;

                        // 忘れがち！！
                        wp_reset_postdata();

                    else :
                        echo '<p>記事がありません。</p>';
                    endif;
                    ?>
                </div>
            </section>
        </div>
    </div>
    <?php if (!is_home()) echo '<!-- 投稿ページと認識されています -->'; ?>
</main>

<?php get_footer(); ?>