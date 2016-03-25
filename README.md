# pico-hatena_counter
Pico Plugins:はてなカウンターを埋め込むプラグイン

はてなカウンターをページの最下部に自動挿入します。
もし、Twig変数hatena_counterでカウンターを挿入するか、すでにはてなカウンター挿入コードがHTMLに含まれている場合、挿入しません。

## 記事に追加する値

なし

##  追加するTwig変数

 * hatena_counter:はてなカウンター挿入コード

##  コンフィグオプション

 * $config['hatenacounter']['name']:はてなユーザー名(TakamiChieなど)
 * $config['hatenacounter']['id']:はてなカウンターのID
