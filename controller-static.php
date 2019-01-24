<?php
require_once __DIR__ . '/manager-curriculum.php'; /* ManagerCurriculum */
require_once __DIR__ . '/manager-assets.php'; /* ManagerAssets */

class ControllerStatic
{
    static function photo(&$object, $size) {
        if (!isset($object["photo"])) {
            if (!isset($object["localphoto"])) {
                $object["photo"] = "https://picsum.photos/g/$size/$size?v=".$object["title"];
            } else {
                $object["photo"] = ManagerAssets::url($object["localphoto"]);
            }
        }
    }
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
            self::photo($s, 200);
        }
        return $services;
    }
    static public function team($request, $response, $args) {
        $team = json_decode(ManagerAssets::load("team.json"), true);
        foreach ($team as &$t) {
            $t["content"] = "Find more on <a target=\"_blank\" href=\"".$t["link"]."\">Linkedin</a>.";
            self::photo($t, 200);
        }
        return $team;
    }
    static public function jobs($request, $response, $args) {
        $jobs = $args["elements"];
        foreach ($jobs as &$j) {
            self::photo($j, 500);
        }
        return $jobs;
    }
}
