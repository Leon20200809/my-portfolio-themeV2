<?php
    // ナビメニューの登録
    function mytheme_setup() {
        // メニュー機能の有効化
        add_theme_support('menus');

        register_nav_menus([
            'header-menu' => 'ヘッダーメニュー',
        ]); 
    }
    add_action('after_setup_theme', 'mytheme_setup');

    // テーマでタイトルタグを自動生成
    // タイトルタグのサポートを追加
    add_theme_support('title-tag');

    // ページのサムネイル画像 有効化
    add_theme_support('post-thumbnails');//両方

    // CSS・JSファイルの読み込み
    function my_enqueue_styles(){
        $stylesheet_dir = get_stylesheet_directory_uri();

        wp_enqueue_style('reset', $stylesheet_dir . '/css/reset-light.css', array());
        // <!-- AOS.js（Animate On Scroll） は、まさに**“動き出すHTML”を超簡単に実現する魔法のライブラリ -->
        wp_enqueue_style('aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array('reset'));
        wp_enqueue_style('style', $stylesheet_dir . '/scss/style.css', array('reset', 'aos'));

        wp_enqueue_script('jquery');
        // <!-- AOS.js（Animate On Scroll） は、まさに**“動き出すHTML”を超簡単に実現する魔法のライブラリ -->
        wp_enqueue_script('aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array('jquery'));
        wp_enqueue_script('main', $stylesheet_dir . '/js/main.js', array('jquery', 'aos'));
    }
    add_action('wp_enqueue_scripts', 'my_enqueue_styles');

    // ブログ一覧ページ用CSS読み込み
    function my_blog_styles(){
        if(is_singular('post') || is_archive() || is_home() || is_search()){
            wp_enqueue_style('blog-css', get_template_directory_uri() . '/blog.css', array(), false);
        }
    }
    add_action('wp_enqueue_scripts', 'my_blog_styles');

    // ブログ個別ページ用CSS読み込み
    function my_single_styles(){
        if(is_single()){
            wp_enqueue_style('single-css', get_template_directory_uri() . '/single.css', array(), false);
        }
    }
    add_action('wp_enqueue_scripts', 'my_single_styles');

    // サーチフォームで記事だけ検索対象にする。（固定ページは除外）
    function restrict_search_to_posts($query){
        if ($query->is_main_query() && $query->is_search() && !is_admin()) {
            $s = $query->get('s');
            if ($s === '') {
                // 空検索時は結果ゼロにする
                $query->set('post__in', [0]); // 存在しない投稿IDを指定
            } else {
                $query->set('post_type', 'post'); // 投稿だけ検索対象に
            }
        }
    }
    // 'pre_get_post' クエリの条件を変更するために使用
    add_action('pre_get_posts', 'restrict_search_to_posts');

    // カスタム投稿の追加
    function create_custom_post_type() {
        register_post_type('works', [
        'labels' => [
            'name' => '制作実績',
            'singular_name' => '制作実績',
        ],
        'public' => true, // 管理画面だけではなくサイト上でも表示
        'has_archive' => true, // アーカイブページの有無
        'menu_position' => 5, // メニューの位置
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'works', 'with_front' => false],
        'show_in_rest' => true, // ブロックエディタ対応
        ]);
    }
    add_action('init', 'create_custom_post_type');


    // カスタムフィールドの追加（制作物URL）
    function add_works_custom_fields() {
        add_meta_box(
            'works_url_box',          // ID
            '模写サイトのURL',         // タイトル
            'display_works_url_box',  // コールバック関数
            'works',                  // 投稿タイプ
            'normal', 'default'
        );
    }
    add_action('add_meta_boxes', 'add_works_custom_fields');

    function display_works_url_box($post) {
        $works_url = get_post_meta($post->ID, 'works_url', true);
        echo '<label for="works_url">模写サイトのURLを入力：</label>';
        echo '<input type="text" name="works_url" id="works_url" value="' . esc_attr($works_url) . '" style="width:100%">';
    }

    function save_works_custom_fields($post_id) {
        if (array_key_exists('works_url', $_POST)) {
        update_post_meta($post_id, 'works_url', sanitize_text_field($_POST['works_url']));
        }
    }
    add_action('save_post', 'save_works_custom_fields');
        

    // カリピストンシミュレーター用
    function enqueue_simulator_style() {
        if (is_page_template('simulator-template.php')) {
            wp_enqueue_style('simulator-css', get_template_directory_uri() . '/css/simulator_style.css');
            wp_enqueue_script('simulator-js', get_template_directory_uri() . '/js/simulator.js', ['jquery'], false, true);
        }

        // wp_localize_script() を使って：「PHPで取得した値を JS に教えてやる」
        wp_localize_script('simulator-js', 'themeData',[
        'theme_uri' => get_template_directory_uri()
    ]);
    }
    add_action('wp_enqueue_scripts', 'enqueue_simulator_style');
