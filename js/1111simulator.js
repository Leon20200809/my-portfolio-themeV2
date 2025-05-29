jQuery(document).ready(function($) {
    let weapon_data = [];

    // JSON読み込み
    fetch('/wp-content/themes/my-portfolio-themeV2/weapons.php')
    .then(res => res.json())
    .then(data => {
        weapon_data = data;
        console.log(weapon_data);

        // 武器名一覧を生成
        const weapon_names = weapon_data.map(w => w['武器名']);
        console.log(weapon_names);

        // すべてのセレクトに option を追加
        $('.weapon-select').each(function() {
            const select = $(this);
            select.empty(); // いったん初期化

            weapon_names.forEach(name => {
            select.append(`<option value="${name}">${name}</option>`);
            });
        });

        // 武器プルダウン変更イベント登録
        $('.weapon-select').on('change', function() {
        const selected_weapon = $(this).val(); // 選んだ武器名
        console.log(selected_weapon);
        const weapon_info = weapon_data.find(w => w['武器名'] === selected_weapon);
        console.log(weapon_info);

        const hibikidama = weapon_data.find(w => w['響玉'] === selected_weapon);
        const special_melody = weapon_data.find(w => w['特殊旋律'] === selected_weapon);
        

        if (weapon_info) {
            const melody_list = $(this).closest('.hunter-card').find('.melodies');
            melody_list.empty();

            // 旋律1〜旋律8をループで表示
            for (let i = 1; i <= 8; i++) {
            const melody = weapon_info[`旋律${i}`];
            if (melody && melody !== 'なし') {
                melody_list.append(`<li><span class="icon">🎵</span> ${melody}</li>`);
            }
            }
        }
        });
    });
});

