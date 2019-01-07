<?php
require_once __DIR__ . '/manager-curriculum.php'; /* ManagerCurriculum */
require_once __DIR__ . '/manager-assets.php'; /* ManagerAssets */

class ControllerStatic
{
    static public function default($request, $response, $args) {
        return ManagerCurriculum::get();
    }
    static public function home($request, $response, $args) {
        return [
            "intro-bg" => ManagerAssets::url("img/intro-bg.jpg"),
            "skyron-01" => ManagerAssets::url("img/skyron-01.png"),
        ];
    }
}
