    <!-- contact -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <form class="contact-form" action="mail-handler.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>

                <label class="contact-label"></label>
                <div class="radio-group">
                    <label><input type="radio" name="subject" value="お仕事の依頼" required> お仕事の依頼</label>
                    <label><input type="radio" name="subject" value="開発のご相談"> 開発のご相談</label>
                    <label><input type="radio" name="subject" value="その他"> その他の連絡</label>
                </div>

                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </section>