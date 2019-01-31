<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller-static.php';
require_once __DIR__ . '/controller-news.php';
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
$forms = [];
$breaks = ["<br />","<br>","<br/>"];
foreach ($db["pages"] as &$r) {
    $url = $r["url"];
    if ($r["menu"]) {
        $menu[] = [
            "type" => "link",
            "link" => "#$url",
            "label" => $r["name"]
        ];
    }
    if (!isset($r["elements"])) continue;
    $elements = $r["elements"];
    $elements[] = ["title"=>"", "content"=>""];
    foreach ($elements as $k => $el) {
        $app->post("/$url/$k", function ($request, $response, $args) use (&$r, $k) {
            global $db;
            $body = $request->getParsedBody();
            $r["elements"][$k]["title"] = $body["title"];
            $r["elements"][$k]["content"] = $body["content"];
            ManagerAssets::write("db.json", str_ireplace(["\\r\\n", "<br\\/>"], "<br/>", json_encode($db, JSON_PRETTY_PRINT)));
            return $response->withRedirect($this->router->pathFor('editor'));
        })->setName("$url-$k");
        $app->post("/$url/delete/$k", function ($request, $response, $args) use (&$r, $k) {
            global $db;
            unset($r["elements"][$k]);
            ManagerAssets::write("db.json", str_ireplace(["\\r\\n", "<br\\/>"], "<br/>", json_encode($db, JSON_PRETTY_PRINT)));
            return $response->withRedirect($this->router->pathFor('editor'));
        })->setName("$url-delete-$k");
        $form = [];
        $form["url"] = $url;
        $form["key"] = $k;
        $form["inputs"]["title"] = $el["title"];
        $form["inputs"]["content"] = str_ireplace($breaks, "\r\n", $el["content"]);
        $forms[] = $form;
    }
}

$app->get("/editor", function ($request, $response, $args){
    global $forms;
    foreach($forms as &$form) {
        $url = $form["url"];
        $k = $form["key"];
        $form["action"] = $this->router->pathFor("$url-$k");
        $form["action_delete"] = $this->router->pathFor("$url-delete-$k");
    }
    $args["forms"] = $forms;
    $this->renderer->render($response, "/editor.php", $args);
})->setName("editor");

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
