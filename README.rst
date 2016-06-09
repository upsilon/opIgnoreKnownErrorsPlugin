opIgnoreKnownErrorsPlugin
=========================

概要
----

OpenPNE3 を PHP 5.6 環境で動作させたときに発生する様々なエラー (E_NOTICE, E_DEPRECATED 等) のうち、
外部ライブラリ等から発生している既知のエラーについて非表示にするプラグインです

非表示にしているエラーは ``config/known_errors.yml`` に定義されています。 PHP 7 で動作しないのはだいたいここが原因。

ライセンス
----------

Apache License Version 2.0

Copyright (c) 2016 Kimura Youichi <yoichi.kimura@tejimaya.com>
