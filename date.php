<?php get_header(); ?>

<main class="blog-archive">
    <div class="container">
        <h1 class="blog-title"><?php the_archive_title(); ?></h1>

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
                            'title_li'    => '',
                            'show_count'  => true
                        )); ?>
                    </ul>
                </section>
            </aside>

            <!-- 右カラム：カードグリッド -->
            <section class="blog-main">
                <div class="blog-grid">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="blog-card">
                                <div class="card-meta">
                                    <span class="card-date"><?php echo get_the_date('Y年n月j日'); ?></span>
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
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>記事がありません。</p>
                    <?php endif; ?>
                </div>

                <!-- ページネーション -->
                <div class="pagination">
                    <?php the_posts_pagination(array(
                        'mid_size' => 1,
                        'prev_text' => '« 前へ',
                        'next_text' => '次へ »',
                    )); ?>
                </div>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>
