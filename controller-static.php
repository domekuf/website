<?php
require_once __DIR__ . '/manager-curriculum.php'; /* ManagerCurriculum */

class ControllerStatic
{
    static public function default($request, $response, $args) {
        return ManagerCurriculum::get();
    }
}
