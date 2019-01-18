<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller-static.php';
require_once __DIR__ . '/manager-assets.php';

use Slim\Views\PhpRenderer;
use Slim\Views\TwigExtension;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\JsonFileLoader;

$app = new Slim\App();
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./view");
session_start();
$db = json_decode(ManagerAssets::load("db.json"), true);

function asset($filename) {
    return ManagerAssets::url($filename);
}

$menu = [];
foreach ($db["pages"] as $r) {
    if ($r["menu"]) {
        $menu[] = [
            "type" => "link",
            "link" => "#".$r["url"],
            "label" => $r["name"]
        ];
    }
}

$one_page = $db["pages"][0];

$app->get("/{lang}/".$one_page["url"], function ($request, $response, $args) use($menu, $db, $one_page) {
    $lang = $args["lang"];
    $translator = new Translator($lang);
    $translator->addLoader('json', new JsonFileLoader());
    $translator->setFallbackLocales(array('en')); //TODO redirect?
    $translator->addResource('json', "i18n/$lang.json", $lang);

    $controller = $one_page["controller"]?:"ControllerStatic";
    $action = $one_page["action"]?:"default";
    $view = $one_page["view"]?:"view-0";
    $args["data"] = $controller::$action($request, $response, $args);
    $args["T"] = $translator;
    $args["menu"] = $menu;
    $args["css"] = [];
    $args["css"][] = asset("css/grayscale.css");
    $args["css"][] = asset("css/timeline.css");
    $args["css"][] = asset("css/srn.css");
    $args["js"] = [];
    $args["js"][] = asset("js/grayscale.js");
    $args["js"][] = asset("js/srn.js");

    $this->renderer->render($response, "/head.php", $args);
    $this->renderer->render($response, "/menu.php", $args);
    foreach ($db["pages"] as $r) {
        $controller = $r["controller"]?:"ControllerStatic";
        $action = $r["action"]?:"default";
        $view = $r["view"]?:"view-0";
        $args["elements"] = $r["elements"];
        $args["data"] = $controller::$action($request, $response, $args);
        $args["id"] = $r["url"];
        $args["title"] = $r["name"];
        $this->renderer->render($response, "/$view.php", $args);
    }
    $this->renderer->render($response, "/foot.php", $args);
})->setName($one_page["name"]);

$app->run();
