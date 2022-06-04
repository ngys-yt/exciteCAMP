# アプリケーション名
「exciteCAMP」<br>
![top](https://user-images.githubusercontent.com/87395450/171743573-5251a938-9148-4807-8e2f-bf1ab4ada9b9.gif)<br>

## アプリケーション概要
キャンプした内容を投稿、検索できるSNSアプリです。
GoogleMapsApiを使用してGoogleマップの表示、地点検索、ピン表示の機能を搭載しています。<br>

## URL
https://excitecamp.link/<br>
※インフラとセキュリティの知識が浅いため、AWSでhttps通信ができていることを確認したのちEC2とRDSを停止しました。<br>
<img width="507" alt="スクリーンショット 2022-06-04 17 21 03" src="https://user-images.githubusercontent.com/87395450/171991205-dc74bb79-4f29-4b1e-9c3c-ce3e9dde38ad.png"><br>

## 利用方法
ヘッダー右側にあるボタンをクリックでページが遷移します。
また、キャンプ場だけでなく、キャンプ料理やキャンプ道具についてもカテゴリー別に投稿できるようになっています。<br>


## 会員登録
会員登録ページにて登録する名前とGmailアドレスを入力します。
送信ボタンを押すとGmailが届きます。
メール内容に記載されたトークンをクリックするとパスワード登録画面に遷移します。
パスワード登録画面にてパスワードを登録するとトークンが削除され、ハッシュ化されたパスワードがDBに保存されます。<br>

![register](https://user-images.githubusercontent.com/87395450/171991415-ad586f18-660f-4a97-9a11-c4d5975caa5a.gif)
![password](https://user-images.githubusercontent.com/87395450/171991446-d586f4c7-72b9-4175-9a6b-40d62abd7cc4.gif)<br>

ログイン画面にてGmailアドレスとパスワードを入力します。
入力されたGmailとパスワードがDBの値と一致すればtop画面に遷移します。<br>

![top](https://user-images.githubusercontent.com/87395450/171992184-34da7b01-ce81-4254-9b6b-d50ab4b00a16.gif)<br>

## マイページ
サイドメニューの編集ボタンから情報の編集を行えます。


## 投稿
ヘッダーの投稿ボタンをクリックするとカテゴリー別の投稿画面に遷移します。
キャンプを選択するとgooleマップが表示されます。
ここに入力された都道府県と地点名がDBに保存され、投稿に反映されます。<br>
![post_camp](https://user-images.githubusercontent.com/87395450/171993563-b707b05b-654e-486b-82e4-f9ec26c0c7d1.gif)<br>
投稿すると投稿詳細ページに遷移します。<br>
キャンプ以外のFOODとGEARは同じフォーマットを使用して表示方法だけ変更しています。<br>
![post](https://user-images.githubusercontent.com/87395450/171993702-aa3f9b09-1b96-4a3c-86bf-79c81ef44ac4.gif)<br>


## 目指した課題解決
キャンプ場の情報(都道府県、ロケーション)が一つのアプリで取得できるWEBアプリを目指しました。<br>

## 設計図
[WF](https://docs.google.com/presentation/d/1QfBhtwhNY7QdUkE0HdfwP3mfHr6NPh0c-Zdbb_U5llw/edit?usp=sharing)<br>
[DB設計](https://drive.google.com/file/d/1eNJbV7qZhDDmM9zTghluvUTwDuYlMCeO/view?usp=sharing)<br>

## 使用言語・フレームワーク
* HTML/CSS
* JavaScript
* laravel (6)
* PHP (7.4.21)<br>

## 参考文献・参考サイト・参考アプリ
* 侍エンジニア塾  教材
* [laravel](https://readouble.com/laravel/6.x/ja/requests.html)
* [Bootstrap](https://www.w3schools.com/bootstrap/default.asp)
* [GoogleMap](https://developers.google.com/maps/documentation?hl=ja)<br>

### 注意事項
未完成です。
