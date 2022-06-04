# アプリケーション名
「exciteCAMP」

![top](https://user-images.githubusercontent.com/87395450/171743573-5251a938-9148-4807-8e2f-bf1ab4ada9b9.gif)


## アプリケーション概要
キャンプした内容を投稿、検索できるSNSアプリです。
GoogleMapsApiを使用してGoogleマップの表示、地点検索、ピン表示の機能を搭載しています。



## URL
https://excitecamp.link/
※インフラとセキュリティの知識が浅いため、AWSでhttps通信ができていることを確認したのちEC2とRDSを停止しました。
<img width="507" alt="スクリーンショット 2022-06-04 17 21 03" src="https://user-images.githubusercontent.com/87395450/171991205-dc74bb79-4f29-4b1e-9c3c-ce3e9dde38ad.png">




## 利用方法
ヘッダー右側にあるボタンをクリックでページが遷移します。
また、キャンプ場だけでなく、キャンプ料理やキャンプ道具についてもカテゴリー別に投稿できるようになっています。


## 会員登録
会員登録ページにて登録する名前とGmailアドレスを入力します。
送信ボタンを押すとGmailが届きます。
メール内容に記載されたトークンをクリックするとパスワード登録画面に遷移します。
パスワード登録画面にてパスワードを登録するとトークンが削除され、ハッシュ化されたパスワードがDBに保存されます。

![register](https://user-images.githubusercontent.com/87395450/171991415-ad586f18-660f-4a97-9a11-c4d5975caa5a.gif)
![password](https://user-images.githubusercontent.com/87395450/171991446-d586f4c7-72b9-4175-9a6b-40d62abd7cc4.gif)

ログイン画面にてGmailアドレスとパスワードを入力します。
入力されたGmailとパスワードがDBの値と一致すればtop画面に遷移します。

![top](https://user-images.githubusercontent.com/87395450/171992184-34da7b01-ce81-4254-9b6b-d50ab4b00a16.gif)


## 目指した課題解決
キャンプ場の情報(都道府県、ロケーション)が一つのアプリで取得できるWEBアプリを目指しました。



## 設計図
[WF](https://docs.google.com/presentation/d/1QfBhtwhNY7QdUkE0HdfwP3mfHr6NPh0c-Zdbb_U5llw/edit?usp=sharing)<br>
[DB設計](https://drive.google.com/file/d/1eNJbV7qZhDDmM9zTghluvUTwDuYlMCeO/view?usp=sharing)



## 使用言語・フレームワーク
* HTML/CSS
* JavaScript
* laravel (6)
* PHP (7.4.21)



## 参考文献・参考サイト・参考アプリ
* 侍エンジニア塾  教材
* [laravel](https://readouble.com/laravel/6.x/ja/requests.html)
* [Bootstrap](https://www.w3schools.com/bootstrap/default.asp)
* [GoogleMap](https://developers.google.com/maps/documentation?hl=ja)



### 注意事項
未完成です。
