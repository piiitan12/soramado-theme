/* ============================================================
   main.js

   ★ デザイン原稿の動きの指定（data- 属性）を読み取る処理。
     原稿は data-属性でランタイムに動きを付けさせている。
     本番のWordPressに外部ランタイムを持ち込みたくないので、
     同じ属性を見る最小限のJSに置き換えた。属性名は原稿のまま。

   ★★ 動きは「見せる」ためではなく、「読みやすくする」ために使う。
       - フェードアップ（data-reveal） → 読む順番を示す
       - パララックス（data-parallax）  → 奥行きで層を分け、写真の上の文字を読みやすくする
       - ロゴのせり上がり（data-logo-slice） → ページの終わりを知らせる
       発火は1回だけ。同時に動くのは1箇所まで。

   ★ 外部ライブラリは GSAP だけ（2026-08-07 に方針変更）。
     それまでは「使わない」としていた。子テーマ化のとき面倒になるためだったが、
     FVの3枚入れ替えと多角形の浮遊を素のJSで書くと、
     **入れ替えの重なり・往復・途中からの割り込みを全部自前で管理する**ことになり、
     かえって読めないコードになる。GSAPは assets/js/ に置いて同梱する
     （CDNから読まない＝1ファイル版の「外部参照ゼロ」と、オフラインでの見え方を守る）。
     子テーマ化のときは wp_enqueue_script でこの1ファイルを読ませるだけでよい。
   ★ GSAPが読めなかったときは、動きが無いだけで**中身は全部見える**ように書く。
   ★ 「動きを減らす」設定の人には全部止める（design.css 側にも指定あり）。
   ============================================================ */

(function () {
  "use strict";

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var hasIO  = "IntersectionObserver" in window;

  /* ── 1. スクロールで現れる ───────────────────────
     原稿のランタイムは opacity を0にしてから animation を当てている。同じ手順にする。
     ★ 発火は1回だけ。すでに読んでいる場所は動かさない。 */
  function initReveal() {
    var els = document.querySelectorAll("[data-reveal]");
    if (!els.length) return;

    if (reduce || !hasIO) {                     /* 動かさない場合は最初から見せる */
      els.forEach(function (el) { el.style.opacity = "1"; });
      return;
    }
    /* ★ 出現のしかたは2種類ある（2026-08-11 追加）
         data-reveal="1"    … 下から少し上がりながら現れる（lpFade）
         data-reveal="rise" … **器の下から立ち上がる**（lpRise）。フッターのロゴで使う
       ★ rise は不透明度を触らない。器（overflow:hidden）の外にいるので見えていない。
         ここで opacity を0にすると、立ち上がったあとも透明のままになる。
       ★ **CSSで animation-name だけ差し替える方法は効かない。**
         名前が最初から同じだとブラウザが「同じアニメーションの続き」と見なし、
         あとから duration を足しても**再生し直さない**（2026-08-11 に実際そうなった）。
         名前ごと JS 側で決める。 */
    /* ★★ rise では **器（マスク）の方を監視し、動かすのは中身**。
       IntersectionObserver は **祖先の overflow:hidden によるクリップも計算に入れる。**
       器の外へ隠した要素を監視すると「交差していない」と判定され続け、
       **隠れているから出てこられない**堂々巡りになって永久に発火しない
       （2026-08-11 に実測。初期位置は正しいのにアニメーションが始まらなかった原因）。 */

    els.forEach(function (el) { el.style.opacity = "0"; });

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.style.animation = "lpFade .8s cubic-bezier(.22,.7,.3,1) forwards";
        io.unobserve(e.target);   /* 一度きり。ループしない */
      });
    }, { rootMargin: "0px 0px -10% 0px", threshold: 0.06 });

    els.forEach(function (el) { io.observe(el); });
  }

  /* ── 2. 写真の軽いパララックス ─────────────────────
     追従率は data-parallax の値（原稿は 0.12）。
     scroll ごとに計算せず requestAnimationFrame でまとめて1回だけ書き込む。
     ★ 動かすのは写真の層だけ。文字は動かさない（動かすと読めない）。
     ★ 基準は「画面の中央」。上端基準にすると開いた瞬間に写真がずれて隙間ができる。 */
  function initParallax() {
    var els = document.querySelectorAll("[data-parallax]");
    if (!els.length || reduce) return;
    var ticking = false;

    function update() {
      ticking = false;
      var vh = window.innerHeight;
      els.forEach(function (el) {
        var host = el.parentElement;
        var r = host.getBoundingClientRect();
        if (r.bottom < -240 || r.top > vh + 240) return;   /* 画面外なら計算しない */
        var rate = parseFloat(el.getAttribute("data-parallax")) || 0.2;
        var offset = (r.top + r.height / 2 - vh / 2) * -rate;
        el.style.transform = "translate3d(0," + offset.toFixed(1) + "px,0)";
      });
    }
    function onScroll() {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(update);
    }
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll);
    update();
  }

  /* ── 3. フッター上のロゴがせり上がる ────────────────
     ロゴを10本の縦スライスに切り、左から順に上げる。
     役割＝「ページの終わり」を知らせる。1.6秒と長めだが、締めくくりの余韻なのでよい。
     ★ 既定は窓の下に隠れている。JSが動かないと出てこないので、動かさない設定では戻す。 */
  function initLogo() {
    var slices = document.querySelectorAll("[data-logo-slice]");
    if (!slices.length) return;

    if (reduce || !hasIO) {
      slices.forEach(function (el) { el.style.transform = "none"; });
      return;
    }
    /* ★ 監視するのは**スライスを束ねている器**（フッターへ移したので section ではない）。
       スライス自身は器の下に隠れており、祖先の overflow:hidden でクリップされるため、
       IntersectionObserver からは「交差していない」と判定され続けて永久に発火しない。 */
    var host = slices[0].closest("[data-footer-logomark]") ||
               slices[0].closest("section") || slices[0].parentElement;

    /* ★ 再発火する（2026-08-11 指示）。初版は io.disconnect() で一度きりだった。
       器が画面外へ出たら**瞬時に**初期位置へ戻し、再入場でまた結像させる。
       戻すときに transition は付けない（付けると巻き戻る動きが見えてしまう）。 */
    function reset() {
      slices.forEach(function (el) {
        el.style.animation = "none";
        el.style.transform = "translateY(105%)";
      });
    }
    function play() {
      slices.forEach(function (el, i) {
        el.style.animation =
          "lpRise 1.6s cubic-bezier(.19,.9,.22,1) " + (i * 0.14).toFixed(2) + "s forwards";
      });
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) { e.isIntersecting ? play() : reset(); });
    }, { threshold: 0.25 });
    io.observe(host);
  }

  /* ── 4. ページ内リンク ───────────────────────────
     固定ヘッダーのぶん、飛び先が隠れないようにする。
     キーボード操作の人が迷子にならないよう、移動先にフォーカスを移す。 */
  function initAnchors() {
    var scroller = document.scrollingElement || document.documentElement;
    if (scroller) scroller.style.scrollPaddingTop = "96px";

    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
      a.addEventListener("click", function (e) {
        var id = a.getAttribute("href");
        if (id === "#" || id.length < 2) return;
        var t = document.querySelector(id);
        if (!t) return;
        e.preventDefault();
        t.scrollIntoView({ behavior: reduce ? "auto" : "smooth", block: "start" });
        t.setAttribute("tabindex", "-1");
        t.focus({ preventScroll: true });
      });
    });
  }

  /* ── 5. スマホのメニュー（2026-08-05 追加） ───────────────
     開いているかどうかは header の data-menu-open だけで表す。
     見た目の指定はすべて design.css 側にあり、ここでは「状態を切り替える」だけ。
     ★ ボタンの絵はロゴのアイコン。開くと 90°戻ってロゴの向きになる（CSS側）。 */
  function initMenu() {
    var header = document.querySelector("header");
    var btn    = document.querySelector("[data-menu-toggle]");
    var panel  = document.querySelector("[data-menu-panel]");
    if (!header || !btn || !panel) return;

    function set(open) {
      header.setAttribute("data-menu-open", open ? "true" : "false");
      btn.setAttribute("aria-expanded", open ? "true" : "false");
      btn.setAttribute("aria-label", open ? "メニューを閉じる" : "メニューを開く");
    }
    set(false);

    btn.addEventListener("click", function () {
      set(header.getAttribute("data-menu-open") !== "true");
    });

    /* 行き先を選んだら閉じる。開いたままだと、飛んだ先が隠れて見えない */
    panel.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () { set(false); });
    });

    /* Escape で閉じる。キーボードだけで操作する人のため */
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") set(false);
    });

    /* 画面を広げたときに開いたままだと、PCの並びに混ざって崩れる */
    window.addEventListener("resize", function () {
      if (window.innerWidth > 767) set(false);
    });
  }

  /* ── 6. ヘッダーが「濃い面」の上にいるか（2026-08-05 追加） ──────────
     スマホのヘッダーは白い帯を持たず、ロゴと丸ボタンだけを写真の上に浮かせている。
     そのままだと、濃い色の面（ISSUES / CONTACT / フッター）へ来たときに
     濃い色のロゴが沈んで見えなくなる。
     → 濃い面の上に来たら、ロゴを白に、ボタンを白丸に入れ替える（色の指定は design.css）。
     ★ 白で固定しない。写真の明るいところと白い本文の上で、今度は白が消えるため。 */
  function initHeaderState() {
    var header = document.querySelector("header");
    if (!header) return;
    var darks = document.querySelectorAll("[data-dark]");
    if (!darks.length) return;
    var on = null, ticking = false;

    /* ★ ロゴを引っ込める合図は「少しでもスクロールしたら」。
       ヘッダーは固定なので、スクロールすると大きな見出しがその下を通る。
       写真の上にいる間だけ出す、という判定にすると**見出しとロゴが重なる**
       （2026-08-05 に実際に重なった）。丸ボタンは面を持つので重なっても平気だが、
       ロゴは線なので下の文字と混ざる。動き出したら消す、が唯一きれいに収まる。 */
    var past = null;

    function update() {
      ticking = false;
      var y = header.getBoundingClientRect().height / 2;   /* ヘッダーの高さの真ん中 */
      var next = false;
      darks.forEach(function (el) {
        var r = el.getBoundingClientRect();
        if (r.top <= y && r.bottom >= y) next = true;
      });
      if (next !== on) {                                   /* 変わったときだけ触る */
        on = next;
        header.setAttribute("data-on-dark", next ? "true" : "false");
      }

      /* ★ ファーストビューを過ぎたらロゴを引っ込める。
         白い帯を出さない代わりに、本文がロゴの下を通って**文字が重なる**（実際に重なった）。
         丸ボタンは面を持っているので下の文字を隠せるが、ロゴは線なので隠せない。
         → 写真の上にいる間だけロゴを見せる。それ以外はボタンだけにする。 */
      var nextPast = window.scrollY > 24;
      if (nextPast !== past) {
        past = nextPast;
        header.setAttribute("data-past-fv", nextPast ? "true" : "false");
      }
    }
    function onScroll() {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(update);
    }
    update();
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll);
  }

  /* ── 7. ファーストビューの写真を、引きながら入れ替える ─────────
     2026-08-07 追加。3枚を重ねて置き、上から順に重ねていく。

     ★ なぜ「消してから出す」ではなく「上に重ねる」のか
       消してから出すと、あいだの一瞬だけ**下の白地が見える。**
       新しい1枚を前の1枚の上へ重ねて現すだけなら、途切れる瞬間が無い。
       重なりの順序は z-index を1つずつ足して作る。

     ★ 引き（ズームアウト）の向き
       寄り → 引き にする。逆（引き → 寄り）は「迫ってくる」感じになり、
       落ち着いて読ませたいファーストビューには合わない。
       引きは**入れ替わりの前後をまたいで**続ける。切り替えの瞬間に
       スケールが跳ねると、そこだけが目に付いて文字から目を奪う。

     ★ 動かすのは不透明度とスケールだけ。位置（translate）は触らない。
       位置は視差が外側の .fv-stack に書き込んでいる。同じ要素で両方やると潰し合う。 */
  function initHeroSlides() {
    var stack = document.querySelector(".fv-stack");
    if (!stack) return;
    var slides = stack.querySelectorAll(".fv-slide");
    if (slides.length < 2) return;

    /* 動きを減らす設定の人、GSAPが読めなかった場合は、1枚目を出したまま止める。
       ★ 止まっても「写真が無い」にはならないこと。CSSで1枚目は既に見えている。 */
    if (reduce || typeof window.gsap === "undefined") return;

    var HOLD = 6.0;   /* 1枚を見せている時間（秒） */
    var FADE = 1.8;   /* 重なりながら入れ替わる時間（秒） */
    var ZOOM = 1.08;  /* 出てくるときの寄り具合。1.0が等倍。
                       ★ 1.13 では「拡大されすぎ」と指摘が出た（2026-08-07）。
                         引きの量は、写真の枠が既にかなり切っていることを前提に決める。 */
    var z = 1, i = 0;

    /* 1枚目は既にCSSで見えているので、そのまま引きだけ始める */
    gsap.set(slides[0], { zIndex: z, opacity: 1, scale: ZOOM });
    gsap.to(slides[0], { scale: 1, duration: HOLD + FADE, ease: "none" });

    function next() {
      i = (i + 1) % slides.length;
      var el = slides[i];
      gsap.set(el, { zIndex: ++z, opacity: 0, scale: ZOOM });
      gsap.to(el, { opacity: 1, duration: FADE, ease: "power1.inOut" });
      gsap.to(el, { scale: 1, duration: HOLD + FADE, ease: "none" });

      /* 隠れた1枚を戻しておく。重ねっぱなしにすると、
         3周目以降は全部が不透明度1のまま積み上がり、入れ替えが効かなくなる。 */
      var prev = slides[(i - 1 + slides.length) % slides.length];
      gsap.to(prev, { opacity: 0, duration: 0.01, delay: FADE });

      gsap.delayedCall(HOLD, next);
    }
    gsap.delayedCall(HOLD, next);
  }

  /* ── 8. 多角形をゆっくり漂わせる ────────────────────
     2026-08-07 追加。以前はCSSの @keyframes で動かしていたが、
     ★ @media の中に @keyframes を書いていたため、PCでは登録されず
       「形だけ出て止まる」状態だった。GSAPに寄せて、画面幅によらず同じ動きにする。

     役割：写真と文字のあいだに**ゆっくりした一定の動き**を置くと、
           止まっている文字のほうが読む対象だと分かる。
           速い動き・跳ねる動きは逆効果なので、往復20秒台で直線的に動かす。 */
  function initHeroPoly() {
    var shape = document.querySelector(".hero-poly__shape");
    if (!shape || reduce || typeof window.gsap === "undefined") return;

    gsap.to(shape, {
      x: 34, y: -24, rotation: 2.2,
      duration: 21, ease: "sine.inOut",
      repeat: -1, yoyo: true
    });
  }

  /* ── 9. 読み込みのとき、上から順に現す ────────────────
     2026-08-07 追加。

     ★ 見出しは「窓の中を1行ずつせり上がる」CSSアニメーションを既に持っている。
       文字ごとに割る動きと**同時に走らせると二重になって暴れる。**
       SplitTypeとGSAPが揃ったときだけ、先にCSS側を止めてから割る。
       止められなかった場合は、いままでどおり行ごとの動きが残る（何も見えない、にはしない）。

     ★ 順番と間は仕様どおり。
         見出し … 1文字ずつ opacity 0→1／y 40px→0／rotationX 15°→0
                   duration 1.2 ／ stagger 0.03 ／ ease power4.out
         説明   … 0.4 遅れてフェード
         CTA    … 0.6 遅れて下から
       ★ ちらつき防止のため、**現す対象は最初に opacity:0 にしてから**動かす。
         先に見えている状態で from を当てると、一瞬だけ完成形が映る。 */
  function initHeroIntro() {
    var title = document.querySelector("[data-hero-title]");
    if (!title || reduce || typeof window.gsap === "undefined") return;

    var tl = gsap.timeline();

    /* 写真の面（背景）。0.8秒で静かに入る */
    var stack = document.querySelector(".fv-stack");
    if (stack) tl.from(stack, { opacity: 0, duration: 0.8, ease: "power1.out" }, 0);

    /* 見出し：1文字ずつ */
    if (typeof window.SplitType !== "undefined") {
      var lines = title.querySelectorAll("span > span");
      lines.forEach(function (line) {
        line.style.animation = "none";          /* CSSの行アニメを止める */
        line.style.transform = "none";
        if (line.parentElement) line.parentElement.style.overflow = "visible";
      });
      /* rotationX を効かせるには、親に奥行きが要る */
      title.style.perspective = "800px";

      var split = new SplitType(title, { types: "chars", tagName: "span" });
      if (split.chars && split.chars.length) {
        split.chars.forEach(function (c) { c.style.display = "inline-block"; });
        tl.from(split.chars, {
          opacity: 0, y: 40, rotationX: 15,
          duration: 1.2, stagger: 0.03, ease: "power4.out"
        }, 0.15);
      }
    }

    /* ラベル・説明・CTA・タグ。仕様の 0.4 / 0.6 を基準に、前後を少しずつずらす */
    function fadeUp(sel, at, dist) {
      var el = document.querySelector(sel);
      if (!el) return;
      tl.from(el, {
        opacity: 0, y: dist, duration: 0.9, ease: "power3.out"
      }, at);
    }
    fadeUp("[data-hero-label]", 0.10, 12);
    fadeUp("[data-hero-desc]",  0.40, 16);
    fadeUp("[data-hero-cta]",   0.60, 20);
    fadeUp("[data-hero-tags]",  0.75, 20);
  }

  /* ── 10. スクロールで奥行きを作る ─────────────────
     2026-08-07 追加。見出しは**遅く**、写真は**速く**動かす。
     同じ速さで動くと平らに見える。差があるほど「手前と奥」に分かれる。

     ★ 動かす量は、写真の層に取ってある余裕（design.css の .fv-stack の inset）と
       セットで決める。余裕より大きく動かすと、上端に白い帯が出る。
       いまの余裕は 5%（写真を引いて見せるため小さくした）。動かす量は 3% に抑える。
       **片方だけ変えないこと。**余裕を減らしたのに動かす量を戻すと白い帯が出る。 */
  function initHeroScroll() {
    if (reduce || typeof window.gsap === "undefined"
        || typeof window.ScrollTrigger === "undefined") return;
    gsap.registerPlugin(ScrollTrigger);

    var hero = document.querySelector("section#top");
    if (!hero) return;

    var common = {
      trigger: hero,
      start: "top top",
      end: "bottom top",
      /* ★ scrub:true（スクロール量に直結）から 0.5 に変えた（2026-08-07）。
           true はマウスホイールの「1目盛りずつ飛ぶ」動きをそのまま写すので、
           大きな写真だと**段階的に飛んで見える。**
           0.5 は「0.5秒かけて追いつく」。追いつく途中の値をGSAPが埋めるので、
           ホイールの粗さが均される。慣性のような大きな遅れは付かない。 */
      scrub: 0.5
    };

    var stack = document.querySelector(".fv-stack");
    if (stack) gsap.to(stack, { yPercent: 1.2, ease: "none", scrollTrigger: common });

    var title = document.querySelector("[data-hero-title]");
    if (title) gsap.to(title, { yPercent: 22, ease: "none", scrollTrigger: common });
    /* ↑ 見出しは「遅く」＝写真より**動かない**ように見せたいので、
         下へ流す量を写真より大きくする。画面の中に留まる時間が長くなる。 */

    var poly = document.querySelector(".hero-poly");
    if (poly) gsap.to(poly, { yPercent: 30, ease: "none", scrollTrigger: common });
    /* ↑ 多角形はいちばん奥。3つを違う速さにして、層があることを分からせる */
  }

  /* ── 11. マウス追従 ── **取り下げ（2026-08-07）** ──────────
     仕様には「マウスでわずかに動かす（最大20px）」があり、一度実装した。
     20px → 10px まで下げ、GSAP の quickTo に載せ替えて滑らかにもしたが、
     **それでも「画面がぐらつく」状態が消えなかった。**

     ★ 理由は写真の大きさ。FVの写真は画面の右半分を占める巨大な面で、
       面が大きいほど、同じ移動量でも「揺れ」として認識される。
       小さなカードなら心地よい追従でも、この面積では酔いに近づく。

     ★ もう一つ、副作用があった。
       横に動かすには**左右に余裕（はみ出し）が要る。**
       余裕を取るということは、その分だけ写真を拡大して敷くということ。
       つまり**マウス追従を入れている限り、写真は引けない。**
       「もっと引きたい」と「マウスで動かしたい」は両立しない。引きを取った。

     復活させるなら、動かす対象を写真ではなく**小さな要素**（多角形など）に限ること。 */

  /* ── 12. スクロールに慣性を付ける（Lenis） ─────────────
     2026-08-07 追加。

     ★ なぜこれを入れるのか
       参考サイト（symdirect）の実装を実際に読んだところ、
       gsap / ScrollTrigger に加えて **Lenis** を使っていた。
       あの「高級で落ち着いた感じ」を作っている正体の大半はこれ。

       ふつうのスクロールは、マウスホイールの1目盛りぶん**カクッと飛ぶ。**
       視差や出現をどれだけ丁寧に作っても、土台が飛んでいれば全部が飛んで見える。
       Lenis は目的地までの途中を毎フレーム埋めるので、
       **スクロールに連動する動きが全部まとめて滑らかになる。**

     ★ ScrollTrigger との噛み合わせ（順番を間違えると動かない）
       ① Lenis が動いたら ScrollTrigger に知らせる
       ② Lenis を GSAP のフレームで回す（別のループを作らない。カクつきの原因になる）
       ③ lagSmoothing を切る。重い処理で1フレーム飛んだとき、
          GSAP が「時間をなかったこと」にすると、Lenis と位置がずれる

     ★ 入れない場合
       ・「動きを減らす」設定の人 … 慣性は酔いの原因になる
       ・触る画面（スマホ・タブレット）… 指で弾く動きは端末が最適化しているので、
         上から被せると**指から遅れて付いてくる**不快な感じになる */
  function initSmoothScroll() {
    if (reduce || typeof window.Lenis === "undefined"
        || typeof window.gsap === "undefined") return;
    if (!window.matchMedia("(pointer: fine)").matches) return;

    var lenis = new Lenis({
      duration: 1.05,          /* 目的地まで約1秒かけて追いつく。長いほど"重い"感じになる */
      /* 最後にすっと止まる曲線。等速で止めると「ぶつかって止まった」ように見える */
      easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
      smoothWheel: true,
      touchMultiplier: 1.6
    });

    if (typeof window.ScrollTrigger !== "undefined") {
      lenis.on("scroll", ScrollTrigger.update);          /* ① */
    }
    gsap.ticker.add(function (time) { lenis.raf(time * 1000); });   /* ② */
    gsap.ticker.lagSmoothing(0);                                    /* ③ */

    /* ページ内リンクも Lenis に運ばせる。
       ★ 混ぜると事故る。ブラウザ標準の scrollIntoView と Lenis が
         同時に別の場所へ運ぼうとして、途中で引っかかったように止まる。
         Lenis がいるときは Lenis だけに任せる。 */
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
      a.addEventListener("click", function (e) {
        var id = a.getAttribute("href");
        if (id === "#" || id.length < 2) return;
        var t = document.querySelector(id);
        if (!t) return;
        e.preventDefault();
        e.stopImmediatePropagation();      /* 4.のページ内リンク処理を止める */
        lenis.scrollTo(t, { offset: -96 });        /* 96px＝固定ヘッダーの高さ */
      }, true);                             /* ★ capture。標準の処理より先に受ける */
    });
  }

  /* ══════════════════════════════════════════════════
     ここから下は 2026-08-07 追加の「読ませるための演出」。
     4つとも役割を説明できるものだけに絞っている。

       ① 見出しを行ごとにせり上げる … 「ここから新しい話」を体で分からせる
       ② 数字を回す               … 主張のある数字に目を留めさせる
       ③ 濃い面を幕のように上げる   … 章の変わり目を作る
       ④ 帯の写真をゆっくり引く     … 文章の切れ目に息継ぎを作る

     ★ 共通の約束
       ・GSAPが読めない／動きを減らす設定のときは**何もしない。**
         そのとき中身が消えていてはいけないので、**隠すのはJSが動いたときだけ。**
       ・発火は1回だけ（once）。読み返すたびに動くと、読むことの邪魔になる。
     ══════════════════════════════════════════════════ */
  function motionReady() {
    return !reduce
      && typeof window.gsap !== "undefined"
      && typeof window.ScrollTrigger !== "undefined";
  }

  /* ── 13. ① 見出しを行ごとにせり上げる ──────────────── */
  function initHeadingReveal() {
    if (!motionReady() || typeof window.SplitType === "undefined") return;

    document.querySelectorAll("section h2").forEach(function (h) {
      /* ★ <br> で改行している見出しがある。SplitTypeは<br>も行の区切りとして扱うので
           そのままでよいが、割ったあとに元へ戻せるよう split を保持しておく。 */
      var split = new SplitType(h, { types: "lines", tagName: "span" });
      if (!split.lines || !split.lines.length) return;

      /* 行を1つずつ窓（overflow:hidden）で包む。CSS側の .line-mask がその窓 */
      split.lines.forEach(function (line) {
        var mask = document.createElement("span");
        mask.className = "line-mask";
        line.parentNode.insertBefore(mask, line);
        mask.appendChild(line);
      });

      gsap.from(split.lines, {
        yPercent: 112,             /* 窓の下から。100 だとフォントの下ヅラが覗く */
        duration: 1.0,
        ease: "power4.out",
        stagger: 0.09,             /* 行が続いて上がる。同時だと1枚の板に見える */
        scrollTrigger: { trigger: h, start: "top 84%", once: true }
      });
    });
  }

  /* ── 14. ② 数字を回す ── **取り下げ（2026-08-07）** ────────
     スクロールで 0 から回す演出を入れたが、不要と判断された。
     数字を回すと「数字そのもの」より「回っていること」に目が行く。
     このページの数字は、静かに置いてあるほうが効く。
     拾い方の記録は build_impl.py の ④-7 に残してある。 */

  /* ── 15. ③ 濃い面を幕のように立ち上げる ──────────────
     上を少し隠した状態から、隠れが下りて面が現れる。

     ★★ scrub（スクロール量に直結）は使えない。2026-08-07 に実際に壊した。
       scrub は「セクションの上端が画面の92%→42%へ動くあいだ」で進める作りだった。
       ところが**ページ末尾のセクションは、一番下までスクロールしても
       上端が42%まで上がらない。**スクロールがそこで終わってしまうため。
       → 幕が途中で止まり、フッターの上に**白い帯が残ったまま**になった。

       「スクロール量に結びつける動き」は、
       **その要素より下に十分な余白があるときしか終わらせられない。**
       ページの末尾では必ずこれを疑うこと。

     → 一度きりの再生（once）に変えた。画面に入ったら 0.9 秒で必ず下りきる。
       自分のスクロールで動かす感じは薄れるが、**途中で止まらないことを優先する。**

     ★ clip-path の inset は、終わった状態が inset(0) ＝ 何もしていないのと同じ。
       JSが動かなければ最初から inset(0) のままなので、面が欠けることはない。 */
  function initDarkCurtain() {
    if (!motionReady()) return;

    document.querySelectorAll("[data-dark]").forEach(function (sec) {
      /* ★ 濃い面には「章」と「フッターの部品」の2種類がある。
           幕を掛けたいのは**章の変わり目**だけ。
           フッターのロゴ帯や最下部の1行は、章ではなく建物の土台なので掛けない。
           見分け方は「見出しを持っているか」。持っていれば章。
         ★ ここを分けずに全部へ掛けたのが、フッターに白い帯が出た原因のもう半分。
           **動きは、役割を説明できる相手にだけ掛ける。** */
      if (!sec.querySelector("h2, h3")) return;

      gsap.fromTo(sec,
        { clipPath: "inset(16% 0% 0% 0%)" },
        {
          clipPath: "inset(0% 0% 0% 0%)",
          duration: 0.9,
          ease: "power3.out",
          scrollTrigger: { trigger: sec, start: "top 88%", once: true }
        });
    });
  }

  /* ── 16. ④ つなぎの帯の写真をゆっくり引く ────────────
     FVと同じ「寄りから引きへ」を、章と章のあいだの帯にも掛ける。
     ★ 上下の動きも同じ仕掛けにまとめた。以前はここだけ別の視差処理が動いていて、
       スクロールの土台（Lenis）と噛み合っていなかった。 */
  function initBandPhotos() {
    if (!motionReady()) return;

    document.querySelectorAll("[data-band-photo]").forEach(function (el) {
      var host = el.parentElement || el;
      gsap.fromTo(el,
        { yPercent: -5, scale: 1.12 },
        {
          yPercent: 5, scale: 1.0,
          ease: "none",
          scrollTrigger: {
            trigger: host,
            start: "top bottom",
            end: "bottom top",
            scrub: 0.6
          }
        });
    });
  }

  /* ── 0. 幅ごとの改行 <br> を、いまの幅で効くものだけ残す（2026-08-09）──
     見出しには br.br-pc / br.br-tb / br.br-sp が入っている。
     CSS だけでも display で出し分けできるが、**それだと SplitType が空白を作る。**
     SplitType は <br> を語の区切りとして扱い、割ったあとに語と語を**半角空白でつなぐ**。
     display:none にしても <br> は DOM に残るので、PCで
       「地図検索も、␣SNSも、」
     のように**見出しの真ん中に空白が入る**（2026-08-09 に実際に出た）。
     → SplitType が走る前に、効かない <br> は DOM から外してしまう。
     ★ CSS 側の display 切り替えも残してある。動きを切っている人・JSが落ちた人には
       そちらが効く（そのときは SplitType も走らないので空白の問題は起きない）。
     ★ 幅の境目は CSS の @media と同じ値にすること。ずれると片方だけ改行が消える。 */
  function pruneResponsiveBreaks() {
    var w = window.innerWidth;
    var touched = [];
    document.querySelectorAll("br.br-pc, br.br-tb, br.br-sp").forEach(function (br) {
      var keep = br.classList.contains("br-pc") ? w >= 1024
               : br.classList.contains("br-tb") ? (w >= 768 && w <= 1023)
               : w <= 767;
      if (keep || !br.parentNode) return;
      var parent = br.parentNode;
      parent.removeChild(br);
      if (touched.indexOf(parent) < 0) touched.push(parent);
    });
    /* ★ 消したあと **必ず normalize() する。**
       <br> を外すと、その両側が「隣り合った2つのテキストノード」として残る。
       SplitType はテキストノードを1語として数えるので、**語と語のあいだに半角空白を入れる。**
       結果、PCで「地図検索も、␣SNSも、」と見出しの真ん中が空く（2026-08-09 に実際に出た）。
       normalize() で1つのテキストノードに繋ぐと、1語として扱われて空白は入らない。 */
    touched.forEach(function (el) { el.normalize(); });
  }

  function init() {
    pruneResponsiveBreaks();
    initReveal(); initParallax(); initLogo(); initAnchors(); initMenu(); initHeaderState();
    initHeroSlides(); initHeroPoly();
    initHeroIntro(); initHeroScroll();
    initSmoothScroll();
    initHeadingReveal(); initDarkCurtain(); initBandPhotos();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else { init(); }
})();
