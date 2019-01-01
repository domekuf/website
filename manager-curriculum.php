<?php
require_once __DIR__ . '/manager-assets.php';

class ManagerCurriculum
{
    static public function get() {
        $cv_string = ManagerAssets::load("cv/cv.json");
        return json_decode($cv_string, true);
    }
}
