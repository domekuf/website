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
    static public function services($request, $response, $args) {
        $services = $args["elements"];
        foreach ($services as &$s) {
            $s["photo"] = "https://picsum.photos/g/200/200?v=".$s["title"];
        }
        return $services;
    }
    static public function team($request, $response, $args) {
        $team = json_decode(ManagerAssets::load("team.json"), true);
        foreach ($team as &$t) {
            $t["content"] = "Find more on <a target=\"_blank\" href=\"".$t["link"]."\">Linkedin</a>.";
            if (!isset($t["photo"])) $t["photo"] = "https://picsum.photos/g/200/200?v=".$s["title"];
        }
        return $team;
    }
    static public function jobs($request, $response, $args) {
        return $args["elements"];
    }
}
