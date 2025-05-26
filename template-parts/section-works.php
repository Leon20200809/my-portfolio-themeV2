    <!-- work -->
    <section id="works" class="works-section">
        <div class="container">
            <h2 class="section-title">Works</h2>

            <div class="works-grid">
                
                <div class="work-card" data-aos="fade-right" data-aos-delay="300">
                    <img src="<?= esc_url(get_theme_file_uri('/images/WordPressオリジナルテーマ.png')) ?>" alt="Project 1">
                    <div class="work-info">
                        <h3>WordPressのオリジナルテーマ</h3>
                        <p>このWEBサイトのオリジナルテーマ。HTMLサイトを動的に管理できる。お問い合わせフォームも自作だが「wp_mail()」を使うメールハンドラーPHPを書いている。カスタム投稿・カスタムフィールド対応可。</p>
                    </div>
                </div>

                <div class="work-card" data-aos="fade-right" data-aos-delay="500">
                    <img src="<?= esc_url(get_theme_file_uri('/images/Twitter風のCMS.png')) ?>" alt="Project 1">
                    <div class="work-info">
                        <h3>Twitter風CMS</h3>
                        <p>PHPで構築したTwitter風CMS。画像投稿・ユーザー認証機能あり。データベースへの接続、プリペアードステートメントを理解するのに最適な逸品。</p>
                    </div>
                </div>

                <div class="work-card" data-aos="fade-right" data-aos-delay="700">
                    <img src="<?= esc_url(get_theme_file_uri('/images/ファイルストレージCMS.png')) ?>" alt="Project 2">
                    <div class="work-info">
                        <h3>ファイルストレージCMS</h3>
                        <p>グーグルドライブ（無料版）がすぐいっぱいになって困るというソリューション。WordPressのサブディレクトリとして公開。ブラウザからファイルのアップ、ダウンロードができる。ユーザー認証機能、投稿ユーザー及びファイル種別でのソートが可能。</p>
                    </div>
                </div>
            <!-- 他のプロジェクトも同様に -->
            </div>
        </div>
    </section>
