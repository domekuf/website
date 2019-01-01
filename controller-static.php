<?php
require_once __DIR__ . '/manager-curriculum.php'; /* ManagerCurriculum */

class ControllerStatic
{
    static public function page_1($request, $response, $args) {
        return ManagerCurriculum::get();
    }
}
