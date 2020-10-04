# バレーボールメンバー募集アプリ「V-Life」
---
## 概要
### 「バレーボールをもっと身近に」
#### オンラインの出会いをきっかけにバレーボールを楽しめる方が一人でも増えれば良いと思い作りました。バレーボールをするには場所と人数の確保というハードルがあります。場所は体育館を借りることになりますが、体育館の賃料を少人数で払うと高額になります。したがって人数の確保が不可欠になるのですが、現状は周囲の人脈によって人数を集めることが多いです。人数集めの敷居を下げるべく、このアプリを考えました。
---
## リンク
### https://v-life.herokuapp.com/
---
## 使用技術一覧
- インフラ
  - Heroku
  - AWS(S3で画像を保存)
- バックエンド
  - PHP 7.3
  - Laravel 8.8.0
  - MySQL 5.6.47
- フロントエンド
  - HTML
  - CSS
  - Blade
---
## 機能一覧
- ユーザー登録機能
- 未ログイン時も可
  - イベント一覧表示機能
- ログイン時のみ可
  - イベント詳細表示機能
  - イベント作成機能
  - イベント削除機能
  - イベント編集機能
  - コメント投稿機能
---
#### トップページ
興味のあるイベントを探せます。
<img width="1436" alt="V-Lifeトップページ" src="https://user-images.githubusercontent.com/66059951/95012868-fb7b4700-0676-11eb-82a0-a090da5c5466.png">

---
#### イベント詳細ページ（ログイン時）
興味のあるイベントがあったら積極的に連絡してみよう。
<img width="1436" alt="V-Lifeイベント詳細ページ" src="https://user-images.githubusercontent.com/66059951/95012929-996f1180-0677-11eb-874a-dd5c2fc02861.png">

---
#### イベント作成ページ（ログイン時）
自分でイベントを作ることもできます。
<img width="1437" alt="V-Lifeイベント作成ページ" src="https://user-images.githubusercontent.com/66059951/95012871-046c1880-0677-11eb-9989-e69fe53cf8fc.png">