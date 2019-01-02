<?php
function LANG_generate() {
    $lang = explode("-", $_SERVER["HTTP_ACCEPT_LANGUAGE"])[0];
    return $lang;
}
define("APP_ROUTES", "app.php");
define("APP_ENTRY", "home");
define("LANG", LANG_generate());
function RT_generate() {
    $rt = "//".$_SERVER["SERVER_NAME"];
    $req = explode("/", $_SERVER["REQUEST_URI"]);
    foreach ($req as $r) {
        if ($r == APP_ROUTES)
            break;
        if ($r == "")
            continue;
        $rt .= "/$r";
    }
    return "$rt";
}
define("AB", getcwd());
define("RT", RT_generate());
define("TITLE", "Skyron");

