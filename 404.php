<?php get_header(); ?>
    <meta http-equiv="refresh" content="3;url=<?php echo esc_url(home_url('/')); ?>">
    <style>
        .error-page {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0,0,0,0.7)), url("images/hero-bg.png") center/cover no-repeat;
            color: #e0f8f8;
            text-align: center;
            padding: 2rem;
        }
        .error-page h1 {
            font-size: 6rem;
            color: #55d1c9;
        }
        .error-page p {
            font-size: 1.2rem;
            color: #aaa;
            margin-bottom: 2rem;
        }
        .error-page a {
            background: #55d1c9;
            color: var(--color-bg);
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .error-page a:hover {
            background: #3dbbb3;
        }
    </style>

    <div class="error-page">
        <h1>404</h1>
        <p>迷い込んだな、怠け者の天才の領域へ。</p>
        <p>3秒後にトップページへご案内します。</p>
        <a href="<?= home_url(); ?>">トップページへ戻る</a>
    </div>

<?php get_footer(); ?>