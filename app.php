<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller-static.php';
require_once __DIR__ . '/manager-assets.php';

use Slim\Views\PhpRenderer;
use ControllerCurriculum;

$app = new Slim\App();
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./view");
session_start();

$registered_routes = [
    ["name" => "page-1", "controller" => ControllerStatic, "action" => "page_1"],
];

function asset($filename) {
    return ManagerAssets::url($filename);
}

foreach ($registered_routes as $r) {
	$n = $r["name"];
	$n_=str_replace(' ', '-', $n);
    $controller = $r["controller"];
    $action = $r["action"];
    $app->get("/{lang}/$n_", function ($request, $response, $args) use($n, $n_, $controller, $action) {
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
        $this->renderer->render($response, "/$n_.php", $args);
        $this->renderer->render($response, "/foot.php", $args);
        return;
    })->setName($n);
}

$app->run();
