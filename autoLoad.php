<?php

use classes\exception\pageNotFound;

spl_autoload_register(['loader', 'classes']);

/**
 * クラスのオートロードに関するクラス
 *
 * Class loader
 */
class loader
{
    /**
     * 渡されたクラス名（名前空間含む）を基にそのクラスが存在するファイルをrequireする。
     *
     * @param $class
     *
     * @throws Exception
     */
    public static function classes($class) :void
    {
        // classのnamespaceをpathに置換
        /** TODO $class（呼び出したクラス名）にstr_replace()を使ってファイルパスに成形しているが、
         * よりパフォーマンスが出る方式がないか検討する。*/
        $class = str_replace('\\', '/', $class);

        // TODO is_readableの処理分岐以外に、良いエラーのハンドリング方法が無いか検討（set_error_handlerでのハンドリングは却下）
        if (is_readable(ROOT_PATH . $class . '.php')) {
            require(ROOT_PATH . $class . '.php');
        } else {
            throw new pageNotFound();
        }
    }

}

// TODO このクラス・メソッドはincludeのたびに毎回呼び出されるので可能な限り軽くした方がよい。