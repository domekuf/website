<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller-static.php';
require_once __DIR__ . '/manager-assets.php';

use Slim\Views\PhpRenderer;

$app = new Slim\App();
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./view");
session_start();

$db = json_decode(ManagerAssets::load("db.json"), true);

$registered_routes = [
    ["name" => "Page 1", "controller" => ControllerStatic, "action" => "page_1"],
];

foreach ($db["pages"] as $p) {
    $p["controller"] = ControllerStatic;
    $p["action"] = "page_1";
    $registered_routes[] = $p;
}

function asset($filename) {
    return ManagerAssets::url($filename);
}

foreach ($registered_routes as $r) {
    $n = $r["name"];
    $n_= strtolower(isset($r["url"])? $r["url"] : str_replace(' ', '-', $n));
    $view = isset($r["view"])?$r["view"]:$n_;
    $controller = $r["controller"];
    $action = $r["action"];
    $app->get("/{lang}/$n_", function ($request, $response, $args) use($n, $n_, $view, $controller, $action) {
        $args["current_url"] = $n_;
        if (isset($controller) && isset($action)) {
            $args["data"] = $controller::$action($request, $response, $args);
        }
        $args["title"] = " | $n";
        $args["css"] = [];
        $args["css"][] = asset("css/web.css");
        $args["js"] = [];
        $args["js"][] = asset("js/web.js");

        $this->renderer->render($response, "/head.php", $args);
        $this->renderer->render($response, "/$view.php", $args);
        $this->renderer->render($response, "/foot.php", $args);
        return;
    })->setName($n);
}

$app->run();
