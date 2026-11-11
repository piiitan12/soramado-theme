# Soramado（WordPress テーマ）

地方の小さなお店（飲食店・美容室・雑貨店など）向けの Web 集客の相談サービス（架空）の LP を、WordPress のテーマにしたもの。

前職で担当した社内新規事業の LP をもとに、社名・業種・人物・実績・数字をすべて架空に置き換えて再構成した版です。実在の同名ブランドとは無関係の架空のサービスです。テーマのコードは、もとの案件で自分が書いたものを、親テーマなしで動く単体のテーマに直しました。

- 担当：要件の整理・構成・コピー初稿・デザイン・実装（技術面は社内の助言あり）
- 画像：写真は Unsplash と Pexels、ロゴはこの作品のために作った架空のもの（出典は `docs/写真とロゴの出典.md`）

## 作り

| ファイル | 役割 | 書き方 |
|---|---|---|
| `header.php` `front-page.php` `footer.php` `inc/style-script.php` `assets/` | LP 本体と CSS・JS の読み込み | **生成物**。静的版の `index.html` から `tools/build_theme.py` で作る |
| `functions.php` | 入口。`inc/` の 4 ファイルを読む | 手書き |
| `inc/setup.php` | テーマの初期設定（`<title>`・アイキャッチ・HTML5） | 手書き |
| `inc/head-meta.php` | 説明文と OGP を `<head>` に出す | 手書き |
| `inc/acf-fields.php` | ACF の項目「ページの説明文」をコードで定義 | 手書き |
| `page.php` `page-thankyou.php` `404.php` `index.php` `page.css` | LP 以外のページ（プライバシーポリシー・送信完了・404） | 手書き |
| `form.css` | お問い合わせフォーム（Contact Form 7）の見た目 | 手書き |

### 静的版から生成する理由

LP は静的な HTML で作り込み、WordPress にはスクリプトで変換しています。手で写すと必ずどこかがずれ、「静的版を直したのに WordPress 側が古い」が起きるためです。スクリプトは次のことをします。

- ヘッダー・本体・フッターに切り分け、`get_header()` / `get_footer()` の形にする
- 画像などのパスを `get_stylesheet_directory_uri()` に書き換える
- ページ内リンク（`#contact` など）を、LP 以外のページからも LP へ戻れる形にする
- 見た目だけのフォームを Contact Form 7 のショートコードに差し替える（id ではなく題名で呼ぶ）

```
python3 tools/build_theme.py <静的版のフォルダ>
```

静的版（正）はこのリポジトリの外（応募フォルダの `soramado-static/`）にあります。リポジトリだけでは再生成できません。

### 気をつけたこと

- **WordPress が自前で足す CSS を外した**：ブロックエディタ用の CSS・絵文字・theme.json の変数など。このテーマはブロックを使わないので、入れたままだと `design.css` と当たって見た目が静かにずれる
- **ACF の項目をコードで持つ**：管理画面で作ると定義がデータベースにしか残らず、別のサイトに入れるたびに作り直しになる
- **文言はテーマに持たない（LP 以外）**：プライバシーポリシーなどの本文は管理画面で書く。文言の直しにテーマの更新が要らない
- **動きのライブラリは同梱**：GSAP・ScrollTrigger・SplitType・Lenis。CDN に頼らず、オフラインでも同じ見え方にする。jQuery は使わない

## 入れ方（Local などで動かす）

1. このフォルダを `wp-content/themes/soramado/` に置き、「外観 → テーマ」で Soramado を有効にする
2. プラグインを入れて有効にする：**Advanced Custom Fields**（ページの説明文）・**Contact Form 7**（お問い合わせ）
3. Contact Form 7 で、題名「ソラマド お問い合わせ」のフォームを作る。中身は `docs/お問い合わせフォーム.txt`
4. 固定ページを作る
   - トップ（本文は空でよい）→「設定 → 表示設定」で「ホームページ」に指定
   - プライバシーポリシー（スラッグ `privacy`）→ 本文は `docs/プライバシーポリシー本文.html`
   - 送信完了（テンプレート「送信完了」）
5. 「設定 → パーマリンク」を「投稿名」にする（`/privacy/` で開けるように）

## 公開するときのセキュリティ

テーマ側でしていること
- すべての PHP の冒頭で、WordPress を通さずに直接開かれたら止める（`defined( 'ABSPATH' ) || exit;`）
- 画面に出す値はエスケープする（URL は `esc_url`、属性は `esc_attr`）
- WordPress の版を `<head>` に出さない（`wp_generator` を外す）
- 外部リンクの `target="_blank"` には `rel="noopener noreferrer"` をつける
- `tools/` と `docs/` には外から読めないようにする `.htaccess` を置いている（Apache の場合）

サーバーに置くときに自分ですること
- **`tools/` `docs/` `README.md` はサーバーに上げない**（開発用。Nginx では `.htaccess` が効かないため）
- **お問い合わせフォームに迷惑メール対策を入れる**：Contact Form 7 の reCAPTCHA 連携か、Akismet などのプラグイン
- WordPress 本体・プラグインを最新に保つ。管理者のパスワードは長いものにし、ユーザー名を `admin` にしない

## 使っている技術

PHP（WordPress テーマ）／HTML／CSS（CSS 変数でトークン管理）／JavaScript（GSAP・ScrollTrigger・Lenis・SplitType）／Advanced Custom Fields／Contact Form 7／Python（静的版からの変換）
