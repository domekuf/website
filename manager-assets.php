<?php
require_once __DIR__ . '/config.php';

class ManagerAssets
{
    static public function path($filename) {
        return AB."/$filename";
    }
    static public function url($filename) {
        return RT."/$filename?v=".md5_file(self::path($filename));
    }
    static public function load($filename) {
        return file_get_contents(self::path($filename));
    }
}
