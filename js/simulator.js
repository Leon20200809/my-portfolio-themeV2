jQuery(document).ready(function($) {
    let weapon_data = [];

    fetch('/wp-content/themes/my-portfolio-themeV2/weapons.php')
        .then(res => res.json())
        .then(data => {
        weapon_data = data;

        // 全セレクトボックスに武器名を追加
        const weapon_names = weapon_data.map(w => w['武器名']);
        $('.weapon-select').each(function() {
            const select = $(this);
            select.empty();
            weapon_names.forEach(name => {
            select.append(`<option value="${name}">${name}</option>`);
            });
        });

        // ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        // 表示を更新する関数（1回呼ぶ・change時にも使う）
        function updateWeaponDisplay(selectEl) {
            const selected_weapon = $(selectEl).val();
            const weapon_info = weapon_data.find(w => w['武器名'] === selected_weapon);
            const melody_list = $(selectEl).closest('.hunter-card').find('.melodies');
            const special_list = $(selectEl).closest('.hunter-card').find('.special');

            if (!weapon_info) return;

            // 旋律表示
            melody_list.empty();
            for (let i = 1; i <= 8; i++) {
            const melody = weapon_info[`旋律${i}`];
            if (melody && melody !== 'なし') {
                melody_list.append(`<li><span class="icon">🎵</span> ${melody}</li>`);
            }
            }

            // 響玉・特殊旋律表示
            special_list.empty();
            const specials = [
            { value: weapon_info['響玉'] },
            { value: weapon_info['特殊旋律'] }
            ];
            specials.forEach(item => {
            if (item.value && item.value !== 'なし') {
                special_list.append(`<li><span class="icon">✨</span> ${item.value}</li>`);
            }
            });
        }

        // セレクト変更時に呼ぶ
        $('.weapon-select').on('change', function() {
            updateWeaponDisplay(this);
        });

        // 🔥 ページ読み込み時に1回だけ実行（最初の値で）
        $('.weapon-select').each(function() {
            updateWeaponDisplay(this);
        });

        // 🔀 ランダム選出ボタン処理
        $('.btn-random').on('click', function() {
            // シャッフル → 上から4つ取得
            const shuffled = [...weapon_names].sort(() => Math.random() - 0.5);
            const selected_weapons = shuffled.slice(0, 4);

            $('.weapon-select').each(function(index) {
                const weapon_name = selected_weapons[index % selected_weapons.length];
                $(this).val(weapon_name); // セレクトボックスをランダムな武器にセット
                updateWeaponDisplay(this); // 表示を更新
            });
        });

    });

    
});