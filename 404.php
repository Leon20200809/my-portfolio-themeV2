<?php get_header(); ?>

    <style>
        .error-page {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0,0,0,0.7)), url("images/hero-bg.png") center/cover no-repeat;
            color: var(--color-text);
            text-align: center;
            padding: 2rem;
        }
        .error-page h1 {
            font-size: 6rem;
            color: var(--color-accent);
        }
        .error-page p {
            font-size: 1.2rem;
            color: var(--color-muted);
            margin-bottom: 2rem;
        }
        .error-page a {
            background: var(--color-accent);
            color: var(--color-bg);
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .error-page a:hover {
            background: var(--color-accent-hover);
        }
    </style>

    <div class="error-page">
        <h1>404</h1>
        <p>迷い込んだな、怠け者の天才の領域へ。</p>
        <a href="<?= home_url(); ?>">トップページへ戻る</a>
    </div>

<?php get_footer(); ?>

