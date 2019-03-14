Laravelでテストチュートリアル
https://qiita.com/niisan-tokyo/items/264d4e8584ed58536bf4

unit testについて
https://atuweb.net/201612_laravel-test-1ststep/

test用DBの用意
https://cloudpack.media/40004
http://tech.innovation.co.jp/2018/10/12/Laravel-D-B.html

## test用DBの用意
- 開発用とは別にテスト用のDBを作成
- phpunit.xmlファイルの<env>タグを使用して接続先DB情報を指定
- seederを利用してテストデータを投入

## phpUnitのバージョンについて
- Laravel5.8でやってみたが、phpUnitのバージョン7系・8系ともにだめらしい。
https://github.com/orchestral/testbench/issues/238
解決策としては、phpUnitのバージョンを6系に落とすhttps://github.com/Codeception/Codeception/issues/4978
    - setUpメソッドの戻り値にvoid型を指定してあげればテスト可能
## RefreshDatabaseの挙動について
https://qiita.com/FrogWoman/items/6a143af0a042dc853e88