    <!-- contact -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <form class="contact-form" action="<?= get_theme_file_uri('/mail-handler.php'); ?>" method="post">
                <input type="text" name="name" placeholder="お名前" required>
                <input type="email" name="email" placeholder="メールアドレス" required>

                <label class="contact-label"></label>
                <div class="radio-group">
                    <label><input type="radio" name="subject" value="WEBページの相談・依頼" required> WEB制作のご依頼・ご相談</label>
                    <label><input type="radio" name="subject" value="開発の相談"> 業務システム等開発のご相談</label>
                </div>

                <textarea name="message" placeholder="例）予算○○円で○○みたいなホームページできますか？" required></textarea>
                <button type="submit">Send</button>
            </form>

            <a class="tokushoho" href="https://lazygenius.dev/tokushoho/">特定商取引法に基づく表記</a>
        </div>

    </section>

    <style>
        .tokushoho{
            display: block;
            text-align: center;
            margin-top: 3rem;
            transition: color 0.3s;
        }
        .tokushoho:hover{
            color: #55d1c9;;
        }
    </style>