# windows環境でテスト自動化したいの時の注意点
- nodeのモジュールはlocal環境上から入れる
    - 仮想環境上で入れようとするとパスが長いとだめだったり、そもそもインストールにすごい時間がかかってしまうらしい
- localでgulpタスク実行しようとするとパスが解決できずにエラーになるため、仮想環境上で実行させる。
- 仮想環境上でnodeを実行させるときに念のためローカルのnodeのversionと合わせる
- vagrant上でgulp.watchを実行して、ローカルでファイルを編集してもwatchが効いてくれないときの解決方法。原因としては、vagrantのsync folderの設定をしてもファイル変更のイベントをvagrantが発火させてくれないためgulp.watchが反応しない。
https://github.com/floatdrop/gulp-watch/issues/213
- gulp4系でタスクを分割する書き方でよさげなやつ
https://qiita.com/nyawach/items/c4cf2e165d54231ea3ce