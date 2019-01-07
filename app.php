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
            "link" => $r["url"],
            "label" => $r["name"]
        ];
    }
}

foreach ($db["pages"] as $r) {
    $n = $r["name"];
    $n_= strtolower($r["url"]?:str_replace(' ', '-', $n));
    $app->get("/{lang}/".$n_, function ($request, $response, $args) use($r, $menu, $n, $n_) {

        $controller = $r["controller"]?:"ControllerStatic";
        $action = $r["action"]?:"default";
        $view = $r["view"]?:"view-0";

        $lang = $args["lang"];
        $translator = new Translator($lang);
        $translator->addLoader('json', new JsonFileLoader());
        $translator->setFallbackLocales(array('en')); //TODO redirect?
        $translator->addResource('json', "i18n/$lang.json", $lang);

        $args["current_url"] = $n_;
        $args["data"] = $controller::$action($request, $response, $args);
        $args["T"] = $translator;
        $args["title"] = " | $n";
        $args["menu"] = $menu;
        $args["css"] = [];
        $args["css"][] = asset("css/web.css");
        $args["js"] = [];
        $args["js"][] = asset("js/web.js");

        $this->renderer->render($response, "/head.php", $args);
        $this->renderer->render($response, "/menu.php", $args);
        $this->renderer->render($response, "/$view.php", $args);
        $this->renderer->render($response, "/foot.php", $args);
        return;
    })->setName($n);
}

$app->run();
