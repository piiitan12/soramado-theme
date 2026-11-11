<?php
/**
 * ★ このファイルは tools/build_theme.py が作っています。直接編集しないこと。
 *   直すのは静的版の index.html。index.html → build_theme.py → ここ、の順で流れます。
 */
defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める
?>
<?php $tu = get_stylesheet_directory_uri(); ?>
<?php get_header(); ?>
<section id="top" style="position:relative;min-height:min(820px,100vh);display:flex;align-items:center;overflow:hidden;background:var(--color-bg);padding-top:96px">
<div style="position:absolute;right:0;top:0;bottom:0;width:min(72vw,1040px);overflow:hidden;-webkit-mask-image:linear-gradient(100deg,transparent 0%,rgba(0,0,0,.25) 16%,rgba(0,0,0,.7) 34%,#000 52%);mask-image:linear-gradient(100deg,transparent 0%,rgba(0,0,0,.25) 16%,rgba(0,0,0,.7) 34%,#000 52%)">
<div class="fv-stack" style="position:absolute;inset:-8% 0;will-change:transform"><i class="fv-slide" data-fv="1"></i><i class="fv-slide" data-fv="2"></i><i class="fv-slide" data-fv="3"></i></div>
</div>
<div class="hero-poly" aria-hidden="true"><i class="hero-poly__shape"></i></div><div class="hero-panel" style="position:absolute;inset:0;z-index:1"></div>
<div style="position:absolute;left:0;top:0;bottom:0;width:clamp(34px,5vw,68px);z-index:3;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:22px;border-right:1px solid var(--color-border);background:rgba(255,255,255,.6)">
<span style="width:4px;height:4px;border-radius:50%;background:var(--color-accent)"></span>
<span style="writing-mode:vertical-rl;font:500 clamp(9px,.95vw,11px)/1 Inter,sans-serif;letter-spacing:.34em;color:var(--color-heading)">FOR SMALL SHOPS</span>
<span style="width:1px;height:clamp(28px,5vh,64px);background:var(--color-border)"></span>
<span style="writing-mode:vertical-rl;font:500 clamp(9px,.95vw,11px)/1 Inter,sans-serif;letter-spacing:.34em;color:var(--color-heading)">CONSULTING</span>
<span style="width:4px;height:4px;border-radius:50%;background:var(--color-border)"></span>
</div>
<div style="position:absolute;right:clamp(14px,2.4vw,40px);top:clamp(120px,18vh,220px);bottom:clamp(80px,12vh,140px);z-index:3;display:flex;flex-direction:column;align-items:center;justify-content:space-between;padding:14px 8px;border-radius:4px;background:rgba(255,255,255,.7);backdrop-filter:blur(4px)">
<span style="width:1px;flex:1;background:linear-gradient(rgba(255,255,255,0),var(--color-border))"></span>
<span style="writing-mode:vertical-rl;margin:20px 0;font:600 clamp(9.5px,1vw,11.5px)/1 Inter,sans-serif;letter-spacing:.32em;color:var(--color-heading)">SEEN. CHOSEN. VISITED.</span>
<span style="writing-mode:vertical-rl;font:600 clamp(9.5px,1vw,11.5px)/1 Inter,sans-serif;letter-spacing:.28em;color:var(--color-text-sub)">2026</span>
<span style="width:1px;flex:1;background:linear-gradient(var(--color-border),rgba(255,255,255,0))"></span>
</div>
<div style="position:relative;z-index:2;width:100%;max-width:1280px;margin:0 auto;padding:clamp(56px,9vh,110px) clamp(48px,7vw,110px) clamp(44px,7vh,96px);display:flex;flex-direction:column;align-items:flex-start;gap:clamp(22px,3vw,34px)"><div style="display:flex;flex-direction:column;align-items:flex-start;gap:clamp(22px,3vw,34px);width:100%;max-width:min(640px,58%)">
<div data-hero-label style="display:flex;align-items:center;flex-wrap:wrap;gap:10px 14px">
<span style="width:6px;height:6px;border-radius:50%;background:var(--color-accent)"></span>
<span style="font:600 clamp(12px,1.3vw,15px)/1.6 'Zen Kaku Gothic New',sans-serif;letter-spacing:.1em;color:var(--color-heading)">地方の小さなお店へ</span>
<span style="width:1px;height:14px;background:var(--color-border)"></span>
<span style="font:500 clamp(12px,1.3vw,15px)/1.6 'Zen Kaku Gothic New',sans-serif;letter-spacing:.08em;color:var(--color-heading)">地図・口コミ・予約の相談</span>
</div>
<h1 data-hero-title style="margin:0;font:700 clamp(32px,5.2vw,64px)/1.45 var(--font-jp);letter-spacing:-.01em;color:var(--color-heading)"><span style="white-space:nowrap"><span>探される、</span></span><br /><span style="white-space:nowrap"><span>通われる。</span></span></h1>
<div data-hero-desc style="display:flex;align-items:flex-start;gap:16px"><span style="width:clamp(24px,4vw,56px);height:1px;margin-top:14px;background:var(--color-accent);flex:none"></span><p style="margin:0;max-width:26em;font:400 clamp(13.5px,1.25vw,15.5px)/2.2 'Noto Sans JP',sans-serif;letter-spacing:.02em;color:var(--color-heading);word-break:keep-all;line-break:strict">飲食店・美容室・雑貨店など、席数も人手も限られたお店のための集客相談です。地図の情報、口コミ、予約の入口のうち、今のお店に効くところから手を入れます。</p></div>
<div data-hero-cta style="display:flex;flex-wrap:wrap;gap:12px;margin-top:4px">
<a href="#contact" style="display:inline-flex;align-items:center;justify-content:center;min-height:58px;padding:0 34px;border-radius:4px;background:var(--color-cta-bg);color:var(--color-cta-text);font:500 15px/1 'Noto Sans JP',sans-serif">メールで相談する</a>
<a href="tel:00000000000" data-fv-tel style="display:inline-flex;align-items:center;gap:12px;min-height:58px;color:var(--color-heading);font:600 17px/1 Inter,sans-serif"><span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-heading)">TEL</span>000-0000-0000</a>
</div>
<div data-hero-tags style="display:flex;flex-wrap:wrap;gap:10px;margin-top:clamp(8px,2vh,20px)">
<span style="display:inline-flex;align-items:center;gap:8px;font:500 12.5px/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)"><span style="width:5px;height:5px;border-radius:50%;background:var(--color-accent)"></span>地図と口コミの整備</span>
<span style="display:inline-flex;align-items:center;gap:8px;font:500 12.5px/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)"><span style="width:5px;height:5px;border-radius:50%;background:var(--color-accent)"></span>予約とLINEの導線</span>
<span style="display:inline-flex;align-items:center;gap:8px;font:500 12.5px/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)"><span style="width:5px;height:5px;border-radius:50%;background:var(--color-accent)"></span>初回チェック 無料</span>
</div>
</div>
</div>
<div style="position:absolute;left:clamp(48px,7vw,110px);bottom:22px;z-index:3;display:flex;align-items:center;gap:12px"><span style="font:500 9.5px/1 Inter,sans-serif;letter-spacing:.26em;color:var(--color-heading)">SCROLL</span><span style="width:clamp(48px,7vw,96px);height:1px;background:linear-gradient(90deg,var(--ink-sub),rgba(70,89,95,0))"></span></div>
</section>

<section id="record" data-reveal="1" style="position:relative;overflow:hidden;padding:clamp(76px,10vw,140px) 0">
<span data-ghost style="position:absolute;right:-2vw;top:clamp(28px,5vw,64px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(13,78,89,.07);pointer-events:none">Record</span>
<div data-deco-circle style="position:absolute;left:-14vw;top:24%;width:38vw;height:38vw;border-radius:50%;background:rgba(8,145,178,.06)"></div>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:clamp(36px,5vw,64px)">
<div style="display:flex;flex-direction:column;gap:clamp(18px,2.4vw,26px)">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:var(--color-accent)"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)">実績</span><span style="width:clamp(28px,5vw,80px);height:1px;background:var(--color-border)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">RECORD</span></div>
<h2 data-h2 style="margin:0;max-width:22em;font:600 clamp(26px,3.6vw,46px)/1.5 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading);text-wrap:pretty">席数10の店にも、<br>効く集客があります</h2>
<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">広告は使いません。営業時間、写真、予約の入口といった、お店の手が届くところから直していきます。相談を受けた喫茶店の取り組みは、地域の表彰で紹介されました。</p>
</div>
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,260px),1fr));gap:clamp(28px,3.5vw,56px)">
<div style="max-width:400px;display:flex;flex-direction:column;gap:14px;padding-top:26px;border-top:2px solid #0D4E59"><div style="display:flex;align-items:baseline;gap:10px"><span data-bignum style="font:600 clamp(64px,9vw,120px)/.82 Inter,sans-serif;letter-spacing:-.02em;color:var(--color-heading)">10</span><span style="font:500 15px/1 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">年目</span></div><p style="margin:0;font:400 15px/1.95 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">飲食店・美容室・雑貨店の集客の相談を受けて10年目。</p></div>
</div>
<div data-card="award" style="position:relative;display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr));gap:clamp(28px,3.5vw,56px);padding:clamp(32px,4vw,52px);border-radius:clamp(16px,3vw,40px);background:var(--color-bg-alt);overflow:hidden">
<div data-deco-circle style="position:absolute;right:-8%;bottom:-40%;width:34vw;height:34vw;border-radius:50%;background:rgba(8,145,178,.08)"></div>
<div style="position:relative;display:flex;flex-direction:column;gap:14px">
<span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">AWARD</span>
<div data-award-head>
<div data-award-badge aria-hidden="false">
<svg viewBox="0 0 120 120" role="img" aria-label="地域のWeb活用表彰（架空）2025年度 受賞">
<circle data-badge-ring cx="60" cy="60" r="56"/>
<circle data-badge-ring cx="60" cy="60" r="41" opacity=".45"/>
<circle data-badge-tick cx="60" cy="4" r="2.4"/>
<defs><path id="lpBadgeOrbit" d="M 60,13.5 a 46.5,46.5 0 1,1 -0.01,0"/></defs>
<text data-badge-orbit><textPath href="#lpBadgeOrbit" startOffset="3%">LOCAL WEB AWARD &#183; 2025 (MOCK) &#183;</textPath></text>
<text data-badge-year x="60" y="82" text-anchor="middle">2025</text>
</svg>
</div>
<h3 data-award-name style="margin:0;font:600 clamp(20px,2.3vw,28px)/1.55 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)"><span data-award-kicker style="display:block">地域のWeb活用表彰（架空）</span><span data-award-title style="display:block">2025年度 受賞</span></h3>
</div>
<p style="margin:0;font:400 13px/1.95 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">喫茶店の、地図の情報と写真の見直しの取り組みが選ばれました。</p>
</div>
<div style="position:relative;display:flex;flex-direction:column;gap:20px;min-width:0">
<div data-award-nums style="display:flex;flex-wrap:wrap;align-items:baseline;gap:8px 26px">
<div data-cn="a" style="display:flex;align-items:baseline;gap:6px"><span style="font:600 clamp(38px,4.4vw,58px)/.85 Inter,sans-serif;color:var(--color-heading)">40</span><span style="font:500 13px/1;color:var(--color-text-sub)">店舗の応募</span></div>
<div data-cn="b" style="display:flex;align-items:baseline;gap:6px"><span style="font:600 clamp(38px,4.4vw,58px)/.85 Inter,sans-serif;color:var(--color-heading)">3</span><span style="font:500 13px/1;color:var(--color-text-sub)">店舗が受賞</span></div>
</div>
<p style="margin:0;padding-top:14px;border-top:1px solid var(--color-border);font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)"><span style="display:block;font:600 13px/1.6 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading);margin-bottom:4px">受賞理由</span>お店の人が続けられる手順のまま、来店につながる変化を出したこと。</p>
</div>
</div>
<div style="display:flex;flex-direction:column;gap:16px">
<div style="display:flex;align-items:center;gap:14px"><span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">CLIENTS</span><span style="flex:1;height:1px;background:var(--color-border)"></span></div>
<div data-client-logos style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,150px),1fr));gap:16px;padding-inline:clamp(0px,5vw,84px)">
<div style="height:84px;display:flex;align-items:center;justify-content:center;padding:0 20px;flex:none"><a href="#" target="_blank" rel="noopener noreferrer" data-client-link title="HAIR MIHON（架空）"><img src="<?php echo esc_url( $tu ); ?>/assets/img/client-a.webp" alt="HAIR MIHON" loading="lazy" decoding="async" style="height:36px;width:auto;max-width:200px;object-fit:contain;display:block"></a></div>
<div style="height:84px;display:flex;align-items:center;justify-content:center;padding:0 20px;flex:none"><a href="#" target="_blank" rel="noopener noreferrer" data-client-link title="喫茶 みほん（架空）"><img src="<?php echo esc_url( $tu ); ?>/assets/img/client-b.png" alt="喫茶 みほん" loading="lazy" decoding="async" style="height:44px;width:auto;max-width:200px;object-fit:contain;display:block"></a></div>
<div style="height:84px;display:flex;align-items:center;justify-content:center;padding:0 20px;flex:none"><a href="#" target="_blank" rel="noopener noreferrer" data-client-link title="ベーカリー みほん（架空）"><img src="<?php echo esc_url( $tu ); ?>/assets/img/client-c.png" alt="ベーカリー みほん" loading="lazy" decoding="async" style="height:38px;width:auto;max-width:200px;object-fit:contain;display:block"></a></div>
</div>

</div>
</div>
</section>

<section id="community" data-reveal="1" style="position:relative;overflow:hidden;background:var(--color-bg-alt);padding:clamp(76px,10vw,140px) 0">
<span data-ghost style="position:absolute;left:-2vw;top:clamp(28px,5vw,64px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(13,78,89,.06);pointer-events:none">Community</span>
<div data-deco-circle style="position:absolute;right:-12vw;bottom:-14%;width:36vw;height:36vw;border-radius:50%;background:rgba(8,145,178,.07)"></div>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:clamp(36px,5vw,64px)">

<div style="display:flex;flex-wrap:wrap;align-items:flex-end;gap:clamp(28px,3.5vw,56px)">
<div style="flex:1 1 560px;min-width:0;display:flex;flex-direction:column;gap:clamp(18px,2.4vw,26px)">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:var(--color-accent)"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)">地域の勉強会</span><span style="width:clamp(28px,5vw,80px);height:1px;background:var(--color-border)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">OMISE WEB CLASS</span></div>
<h2 data-h2 style="margin:0;max-width:22em;font:600 clamp(26px,3.6vw,46px)/1.5 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading);text-wrap:pretty">苦手でも、<br>その日のうちに<br class="br-sp">一つ直せる講座</h2>

<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">「おみせのWeb講座」（架空）では、地図の情報の直し方や、写真の撮り方・載せ方を、参加者のスマートフォンで実際に操作しながら説明しています。終わるころには、自分のお店の情報を一か所は直せている形にしています。</p>
<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">その場で答えきれない質問は、次回までの宿題として持ち帰ります。</p>
</div>

<figure data-photo-class style="margin:0;flex:0 1 512px;min-width:0;display:flex;flex-direction:column;gap:10px">
<img src="<?php echo esc_url( $tu ); ?>/assets/img/community-class.webp" alt="小さな会議室で開いている勉強会の様子" width="1024" height="473" loading="lazy" decoding="async" style="width:100%;height:auto;display:block;border-radius:clamp(16px,3vw,40px)" />
<figcaption style="margin:0;font:400 11.5px/1.8 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">地域の事業者向けの、小さな勉強会です。</figcaption>
</figure>
</div>
<div data-card="participants" style="position:relative;display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr));gap:clamp(28px,3.5vw,56px);padding:clamp(32px,4vw,52px);border-radius:clamp(16px,3vw,40px);background:var(--color-bg);overflow:hidden">
<div data-deco-circle style="position:absolute;left:-8%;top:-40%;width:34vw;height:34vw;border-radius:50%;background:rgba(8,145,178,.08)"></div>
<div style="position:relative;display:flex;flex-direction:column;gap:14px">
<span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">SCHEDULE</span>
<div style="display:flex;align-items:baseline;gap:10px"><span data-bignum style="font:600 clamp(64px,9vw,120px)/.82 Inter,sans-serif;letter-spacing:-.02em;color:var(--color-heading)">1</span><span style="font:500 15px/1 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">回／月</span></div>
<p style="margin:0;font:400 13px/1.95 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">商工会の会議室で、月に1回開いています（架空）。</p>
</div>
<div style="position:relative;display:flex;flex-direction:column;min-width:0">
<ul style="margin:0;padding:0;list-style:none;display:flex;flex-direction:column;gap:18px">
<li style="display:flex;gap:16px;padding-bottom:18px;border-bottom:1px solid var(--color-border)"><span style="flex:none;font:600 13px/1.9 Inter,sans-serif;color:var(--color-text-sub)">01</span><span style="display:flex;flex-direction:column;gap:5px"><strong style="font:600 15px/1.9 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">直す</strong><span style="font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">古い営業時間や休みの日を、まず正しい情報に。</span></span></li>
<li style="display:flex;gap:16px;padding-bottom:18px;border-bottom:1px solid var(--color-border)"><span style="flex:none;font:600 13px/1.9 Inter,sans-serif;color:var(--color-text-sub)">02</span><span style="display:flex;flex-direction:column;gap:5px"><strong style="font:600 15px/1.9 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">見せる</strong><span style="font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">写真は5枚から。料理や商品、店内、外観の順にそろえます。</span></span></li>
<li style="display:flex;gap:16px"><span style="flex:none;font:600 13px/1.9 Inter,sans-serif;color:var(--color-text-sub)">03</span><span style="display:flex;flex-direction:column;gap:5px"><strong style="font:600 15px/1.9 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">続ける</strong><span style="font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">投稿は週1回で十分。続く形を決めてから始めます。</span></span></li>
</ul>
</div>
</div>
<div style="display:flex;flex-direction:column;gap:18px">
<p style="margin:0;max-width:26em;font:600 clamp(20px,2.6vw,32px)/1.65 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading);text-wrap:pretty">直す順番を決めれば、<br>やることは少なくなります</p>
<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">全部に手をつけると続きません。今のお店の状態を見て、効く順に並べ、そのお店で回せる量に絞ってお渡しします。</p>
<p style="margin:0;font:400 11.5px/1.8 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">※ 架空の講座の例</p>
</div>
</div>
</section>

<section style="position:relative;overflow:hidden;padding:0 0 clamp(20px,3vw,40px)">
<div style="position:relative;height:clamp(280px,42vw,460px);margin-left:clamp(20px,4vw,60px);border-radius:clamp(16px,3vw,40px) 0 0 clamp(16px,3vw,40px);overflow:hidden;background:var(--color-bg-alt)">
<div data-band-photo style="position:absolute;inset:-14% 0;background-image:url('<?php echo esc_url( $tu ); ?>/assets/img/band-classroom.webp');background-size:cover;background-position:50% 62%;will-change:transform"></div>
<div style="position:absolute;inset:0;background:linear-gradient(95deg,rgba(9,110,133,.8),rgba(8,145,178,.2))"></div>
<!-- 白い英字を沈ませないための沈み。ティールの重ねは右へ行くほど薄く（80%→20%）なるので、
     明るいPC教室の写真だと右端で読めなくなる（実測 3.12:1）。足りない分だけ黒を足す。
     左は既にほぼ足りているので薄く、右を厚く。これ以上は下げない。 -->
<div style="position:absolute;inset:0;background:linear-gradient(95deg,rgba(0,0,0,.08),rgba(0,0,0,.38))"></div>
<div class="band-marquee" aria-hidden="true"><div class="band-marquee__track"><span>Map / Photo / Review / Booking</span><span>Map / Photo / Review / Booking</span><span>Map / Photo / Review / Booking</span><span>Map / Photo / Review / Booking</span></div></div>
</div>
</section>

<section id="cases" data-reveal="1" style="position:relative;overflow:hidden;padding:clamp(76px,10vw,140px) 0">
<span data-ghost style="position:absolute;left:-2vw;top:clamp(24px,4vw,56px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(13,78,89,.07);pointer-events:none">Cases</span>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:clamp(36px,5vw,60px)">
<div style="display:flex;flex-direction:column;gap:clamp(18px,2.4vw,26px)">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:var(--color-accent)"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)">支援の事例</span><span style="width:clamp(28px,5vw,80px);height:1px;background:var(--color-border)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">CASES</span></div>
<h2 data-h2 style="margin:0;max-width:22em;font:600 clamp(26px,3.6vw,46px)/1.5 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading);text-wrap:pretty">まず見るのは、<br class="br-sp">表示と電話の<br>2つの数字</h2>
<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">売上の数字より先に、<br>地図検索での表示の回数と、電話・予約の件数が動いたかを確かめます。<br>下は、ある定食屋（架空）での例です。</p>
</div>
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,250px),1fr));gap:clamp(28px,3.5vw,48px)">
<div style="display:flex;flex-direction:column;gap:12px;padding-top:24px;border-top:2px solid #0D4E59"><div style="display:flex;align-items:baseline;gap:8px"><span data-bignum="metric" style="font:600 clamp(52px,7vw,92px)/.82 Inter,sans-serif;letter-spacing:-.02em;color:var(--color-heading)">2.1</span><span style="font:500 13px/1;white-space:nowrap;color:var(--color-text-sub)">倍</span></div><p style="margin:0;font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">地図検索での表示の回数。相談を始めてから半年の比較です。</p></div>
<div style="display:flex;flex-direction:column;gap:12px;padding-top:24px;border-top:2px solid #0D4E59"><div style="display:flex;align-items:baseline;gap:8px"><span data-bignum="metric" style="font:600 clamp(52px,7vw,92px)/.82 Inter,sans-serif;letter-spacing:-.02em;color:var(--color-heading)">+18</span><span style="font:500 13px/1;white-space:nowrap;color:var(--color-text-sub)">件／月</span></div><p style="margin:0;font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">電話と予約の件数。相談の前後3か月の平均で比べています。</p></div>
<div style="display:flex;flex-direction:column;gap:12px;padding-top:24px;border-top:2px solid #0D4E59"><p style="margin:0;font:600 15px/1.9 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">広告は使っていません</p><p style="margin:0;font:400 14px/1.9 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">営業時間と定休日を直し、料理の写真を入れ替え、口コミに返事を書きました。</p></div>
</div>
</div>
</section>

<section data-dark="1" id="issues" data-reveal="1" style="position:relative;overflow:hidden;background:var(--color-panel-deep);color:#fff;padding:clamp(76px,10vw,140px) 0">
<div style="position:absolute;inset:0;background-image:url('<?php echo esc_url( $tu ); ?>/assets/img/27452693.webp');background-size:cover;background-position:70% 30%;filter:hue-rotate(-38deg) saturate(1.25) contrast(1.15)"></div>
<div style="position:absolute;inset:0;background:var(--color-accent);mix-blend-mode:color;opacity:.5"></div>
<div style="position:absolute;inset:0;background:linear-gradient(105deg,rgba(9,96,117,.94) 6%,rgba(10,105,128,.72) 52%,rgba(9,120,147,.5) 100%)"></div>
<span data-ghost style="position:absolute;right:-2vw;bottom:clamp(10px,3vw,40px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(255,255,255,.08);pointer-events:none">Issues</span>
<div data-deco-circle style="position:absolute;left:-12vw;top:-18vw;width:44vw;height:44vw;border-radius:50%;background:rgba(255,255,255,.04)"></div>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:clamp(36px,5vw,56px)">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:#7FD6E6"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:#fff">よくあるご相談</span><span style="width:clamp(28px,5vw,80px);height:1px;background:rgba(255,255,255,.3)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:#FFFFFF">ISSUES</span></div>
<p style="margin:0;max-width:30em;font:500 clamp(16px,1.8vw,20px)/1.9 'Zen Kaku Gothic New',sans-serif;color:rgba(255,255,255,.88)">ご相談の多くは、ここから始まります</p><h2 style="margin:0;max-width:20em;font:600 clamp(26px,4vw,52px)/1.5 'Zen Kaku Gothic New',sans-serif;color:#fff;text-wrap:pretty">お店の良さが、<br>画面の上で伝わっていない</h2>
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,260px),1fr));gap:clamp(28px,3.5vw,56px)">
<div style="display:flex;flex-direction:column;gap:14px;padding-top:26px;border-top:1px solid rgba(255,255,255,.3)"><h3 style="margin:0;font:600 clamp(21px,2.5vw,30px)/1.55 'Zen Kaku Gothic New',sans-serif;color:#fff">地図で探しても出てこない</h3><p style="margin:0;font:400 15px/2 'Noto Sans JP',sans-serif;color:#FFFFFF">営業時間が古いままだったり、写真が何年も前の1枚だけだったりするお店が、<span style="white-space:nowrap">少なくありません。</span></p></div>
<div style="display:flex;flex-direction:column;gap:14px;padding-top:26px;border-top:1px solid rgba(255,255,255,.3)"><h3 style="margin:0;font:600 clamp(21px,2.5vw,30px)/1.55 'Zen Kaku Gothic New',sans-serif;color:#fff">一度来た方と、つながっていない</h3><p style="margin:0;font:400 15px/2 'Noto Sans JP',sans-serif;color:#FFFFFF">来店のあとに次の案内を届ける手段がなく、また来てもらえるかが運任せになっています。</p></div>
</div>
</div>
</section>

<section id="service" data-reveal="1" style="position:relative;overflow:hidden;padding:clamp(76px,10vw,140px) 0">
<span data-ghost style="position:absolute;left:-2vw;top:clamp(24px,4vw,56px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(13,78,89,.07);pointer-events:none">Service</span>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:clamp(20px,3vw,32px)">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:var(--color-accent)"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)">できること</span><span style="width:clamp(28px,5vw,80px);height:1px;background:var(--color-border)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">SERVICE</span></div>
<h2 data-h2 style="margin:0;max-width:22em;font:600 clamp(26px,3.6vw,46px)/1.5 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">お受けする相談は、<br class="br-sp">地図と予約の2つ</h2>

<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">広告やチラシの代行はしていません。手を入れるのは、Web上のお店の見え方と、予約の入口です。</p>
</div>

<div style="margin-top:clamp(36px,5vw,64px);display:flex;flex-direction:column;gap:clamp(28px,4vw,56px)">
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(24px,3.5vw,56px);align-items:center;max-width:1280px;margin:0 auto;padding-left:clamp(20px,4vw,60px)">
<div style="display:flex;flex-direction:column;gap:18px;padding-right:clamp(0px,2vw,40px)">
<span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.22em;color:var(--color-text-sub)">SEARCH</span>
<h3 style="margin:0;font:600 clamp(24px,3vw,38px)/1.45 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">地図と口コミの整備</h3>
<p style="margin:0;font:400 15px/2 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">お店の情報・写真・説明文を、探している人が迷わない形に直します。</p>
<p style="margin:0;font:400 15px/2 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">口コミへの返信は、お店の言葉で書けるよう、例文をお渡しします。</p>
<ul style="margin:0;padding:0;list-style:none;display:flex;flex-direction:column;gap:12px;font:400 15px/1.8 'Noto Sans JP',sans-serif;color:var(--color-text-sub)"><li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">営業時間・定休日</li><li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">写真の選び方</li><li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">口コミへの返信</li></ul>
</div>
<div class="sec-photo sec-photo--right" style="height:clamp(220px,30vw,400px);border-radius:clamp(16px,3vw,40px);background:var(--color-bg-alt);margin-right:calc(clamp(20px,4vw,60px) * -1);overflow:hidden"><img src="<?php echo esc_url( $tu ); ?>/assets/img/service-map.webp" alt="画面をのぞき込んで操作を説明している様子" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover;object-position:48% 40%;display:block"></div>
</div>
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(24px,3.5vw,56px);align-items:center;max-width:1280px;margin:0 auto;padding-right:clamp(20px,4vw,60px)">
<div class="sec-photo sec-photo--left" style="height:clamp(220px,30vw,400px);border-radius:clamp(16px,3vw,40px);background:var(--color-bg-alt);margin-left:calc(clamp(20px,4vw,60px) * -1);order:2;overflow:hidden"><img src="<?php echo esc_url( $tu ); ?>/assets/img/service-booking.webp" alt="スマートフォンを操作する手元" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover;object-position:46% 42%;display:block"></div>
<div style="display:flex;flex-direction:column;gap:18px;padding-left:clamp(0px,2vw,40px);order:3">
<span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.22em;color:var(--color-text-sub)">REPEAT</span>
<h3 style="margin:0;font:600 clamp(24px,3vw,38px)/1.45 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">予約とLINEの導線</h3>
<p style="margin:0;font:400 15px/2 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">予約フォームやLINEの登録を、お会計のときに案内できる形に整えます。月額の費用がかかる予約システムは使いません。</p>
<ul style="margin:0;padding:0;list-style:none;display:flex;flex-direction:column;gap:12px;font:400 15px/1.8 'Noto Sans JP',sans-serif;color:var(--color-text-sub)"><li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">予約の入口</li><li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">LINEの登録案内</li><li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">来店後のお知らせ</li></ul>
</div>
</div>
</div>

<div style="max-width:1280px;margin:clamp(44px,5vw,72px) auto 0;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:26px">
<p style="margin:0;max-width:40em;padding-top:clamp(28px,3vw,36px);border-top:1px solid var(--color-border);font:400 clamp(15px,1.4vw,17px)/2.1 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">飲食店なら席の数、美容室なら施術の時間。お店ごとに回せる量が違うので、提案はその量に合わせます。</p>
<div style="display:flex;flex-direction:column;align-items:flex-start;gap:14px"><p style="margin:0;max-width:34em;font:400 clamp(15px,1.4vw,17px)/2 'Noto Sans JP',sans-serif;color:var(--color-heading)">初回のチェックで、先に直す1か所をお伝えします。</p><a href="#contact" data-cta-text="1" style="display:inline-flex;align-items:center;gap:12px;font:600 clamp(16px,1.7vw,19px)/1.7 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">相談してみる<span aria-hidden="true" style="font:500 17px/1 Inter,sans-serif;color:var(--color-accent)">→</span></a></div>
</div>
</section>

<section id="profile" data-reveal="1" style="position:relative;overflow:hidden;padding:clamp(76px,10vw,140px) 0">
<span data-ghost style="position:absolute;right:-2vw;top:clamp(24px,4vw,56px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(13,78,89,.07);pointer-events:none">Profile</span>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr));gap:clamp(32px,4.5vw,72px);align-items:center">
<div data-profile-frame style="position:relative;display:flex;justify-content:center">
<div data-deco-circle style="position:absolute;inset:auto;width:min(100%,330px);aspect-ratio:1;border-radius:50%;background:rgba(8,145,178,.1);transform:translate(-14%,14%)"></div>

<div style="position:relative;width:min(100%,520px);aspect-ratio:4/3;border-radius:clamp(16px,3vw,40px);background:var(--color-bg-alt);overflow:hidden"><img src="<?php echo esc_url( $tu ); ?>/assets/img/profile-02.webp" alt="ノートパソコンで作業する手元" decoding="async" style="width:100%;height:100%;object-fit:cover;display:block"></div>
</div>
<div style="display:flex;flex-direction:column;gap:24px;min-width:0">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:var(--color-accent)"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:var(--color-heading)">代表</span><span style="width:clamp(28px,5vw,80px);height:1px;background:var(--color-border)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:var(--color-text-sub)">PROFILE</span></div>
<div style="display:flex;flex-direction:column;gap:10px">
<span style="font:600 clamp(24px,2.8vw,34px)/1.45 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">佐伯 直人<span style="font:500 clamp(13px,1.3vw,15px)/1 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">（さえき なおと）</span></span>
<span style="font:400 14px/1.95 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">株式会社ソラマド 代表取締役<br>これまでに相談を受けたお店 120店舗以上</span>
</div>
<ul style="margin:0;padding:0;list-style:none;display:flex;flex-direction:column;gap:12px;font:400 14.5px/1.8 'Noto Sans JP',sans-serif;color:var(--color-text-sub)">
<li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">地域の情報誌の編集から、お店の集客の相談へ</li>
<li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">相談先の喫茶店が、地域のWeb活用表彰を受賞<span style="white-space:nowrap">（架空）</span></li>
<li style="padding-bottom:12px;border-bottom:1px solid var(--color-border)">「おみせのWeb講座」（架空）講師</li>
</ul>
<p style="margin:0;font:600 clamp(15px,1.7vw,21px)/1.85 var(--font-jp);letter-spacing:.02em;color:var(--color-heading);white-space:nowrap">続けられる量に絞って、お渡しします。</p>
</div>
</div>
</section>

<section style="position:relative;overflow:hidden;padding:0">
<div style="position:relative;height:clamp(240px,34vw,400px);margin-right:clamp(20px,4vw,60px);border-radius:0 clamp(16px,3vw,40px) clamp(16px,3vw,40px) 0;overflow:hidden;background:var(--color-bg-alt)">
<div data-band-photo style="position:absolute;inset:-14% 0;background-image:url('<?php echo esc_url( $tu ); ?>/assets/img/band-design.webp');background-size:cover;background-position:52% 42%;will-change:transform"></div>
<div style="position:absolute;inset:0;background:linear-gradient(85deg,rgba(8,145,178,.2),rgba(9,110,133,.8))"></div>
<div class="band-marquee band-marquee--reverse" aria-hidden="true"><div class="band-marquee__track"><span>Small shops, steady guests.</span><span>Small shops, steady guests.</span><span>Small shops, steady guests.</span><span>Small shops, steady guests.</span></div></div>
</div>
</section>

<section data-dark="1" id="contact" data-reveal="1" style="position:relative;overflow:hidden;background:var(--color-panel-deep);color:#fff;padding:clamp(76px,10vw,140px) 0">
<div style="position:absolute;inset:0;background-image:url('<?php echo esc_url( $tu ); ?>/assets/img/27452693.webp');background-size:cover;background-position:20% 70%;filter:hue-rotate(-38deg) saturate(1.25) contrast(1.15)"></div>
<div style="position:absolute;inset:0;background:var(--color-accent);mix-blend-mode:color;opacity:.5"></div>
<div style="position:absolute;inset:0;background:linear-gradient(200deg,rgba(9,96,117,.94) 8%,rgba(10,105,128,.74) 54%,rgba(9,120,147,.52) 100%)"></div>
<span data-ghost style="position:absolute;left:-2vw;bottom:clamp(8px,2vw,32px);white-space:nowrap;font:600 clamp(56px,10vw,150px)/0.95 'Inter',sans-serif;color:rgba(255,255,255,.08);pointer-events:none">Contact</span>
<div data-deco-circle style="position:absolute;right:-14vw;top:-16vw;width:46vw;height:46vw;border-radius:50%;background:rgba(8,145,178,.12)"></div>
<div style="position:relative;max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px);display:flex;flex-direction:column;gap:clamp(32px,4vw,52px)">
<div style="display:flex;align-items:center;gap:14px"><span style="width:9px;height:9px;border-radius:50%;background:#7FD6E6"></span><span style="font:600 clamp(13px,1.4vw,15px)/1 'Zen Kaku Gothic New',sans-serif;letter-spacing:.06em;color:#fff">初回チェック</span><span style="width:clamp(28px,5vw,80px);height:1px;background:rgba(255,255,255,.3)"></span><span style="font:500 clamp(9.5px,1vw,11px)/1 Inter,sans-serif;letter-spacing:.2em;color:#FFFFFF">CONTACT</span></div>
<h2 style="margin:0;max-width:20em;font:600 clamp(26px,4vw,52px)/1.5 'Zen Kaku Gothic New',sans-serif;color:#fff;text-wrap:pretty">今のお店の見え方を、<br class="br-sp">一度見てみませんか</h2>
<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:#FFFFFF">お店の名前を教えていただければ、地図検索での今の見え方を確かめ、<span style="white-space:nowrap">直すとよい点</span>を3つまでお伝えします。ここまでは費用はかかりません。</p>
<p style="margin:0;max-width:40em;font:400 clamp(15px,1.4vw,17px)/2.05 'Noto Sans JP',sans-serif;color:#FFFFFF">続けてご相談いただく場合は月ごとの契約で、いつでも止められます。</p>
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr));gap:clamp(28px,3.5vw,56px);padding-top:clamp(28px,3vw,40px);border-top:1px solid rgba(255,255,255,.22)">
<div style="display:flex;flex-direction:column;gap:28px">
<div style="display:flex;flex-direction:column;gap:10px"><span style="font:500 10.5px/1 Inter,sans-serif;letter-spacing:.22em;color:#FFFFFF">TEL</span><a href="tel:00000000000" style="font:600 clamp(30px,4vw,50px)/1.15 Inter,sans-serif;letter-spacing:-.01em;color:#fff">000-0000-0000</a><span style="font:400 13px/1.8 'Noto Sans JP',sans-serif;color:#FFFFFF">受付時間 平日 9:00–18:00</span></div>
<div style="display:flex;flex-direction:column;gap:10px"><span style="font:500 10.5px/1 Inter,sans-serif;letter-spacing:.22em;color:#FFFFFF">MAIL</span><a href="mailto:info@example.com" style="font:500 clamp(16px,1.8vw,21px)/1.5 'Noto Sans JP',sans-serif;color:#fff;word-break:break-all">info@example.com</a></div>
</div>
<div style="display:flex;flex-direction:column;gap:16px;min-width:0">
<?php echo do_shortcode('[contact-form-7 title="ソラマド お問い合わせ"]'); ?>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>
