<?php get_header(); ?>
    <style>
		:root {
			--font-heading: 'Montserrat', sans-serif;
			--font-body: 'Inter', sans-serif;

			--color-bg: #0e0f11;
			--color-bg-alt: #1a1c1f;
			--color-text: #e0f8f8;
			--color-accent: #55d1c9;
			--color-accent-hover: #3dbbb3;
			--color-muted: #aaa;
			--color-border: #2b2f33;
        }
        .thanks-page {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: var(--color-bg-alt);
        color: var(--color-text);
        text-align: center;
        padding: 2rem;
        }
        .thanks-page h1 {
        font-size: 2.5rem;
        color: var(--color-accent);
        margin-bottom: 1rem;
        }
        .thanks-page p {
        font-size: 1.1rem;
        color: var(--color-muted);
        margin-bottom: 2rem;
        }
        .thanks-page a {
        background: var(--color-accent);
        color: var(--color-bg);
        padding: 0.75rem 1.5rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s;
        }
        .thanks-page a:hover {
        background: var(--color-accent-hover);
        }
    </style>

    <div class="thanks-page">
        <h1>Thanks!</h1>
        <p>送信完了。<br>あとは俺に任せろ。</p>
        <a href="<?= home_url() ?>">トップページへ戻る</a>
    </div>

<?php get_footer(); ?>
