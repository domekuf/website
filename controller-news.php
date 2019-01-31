<?php
require_once __DIR__ . '/manager-fb-feed.php'; /* ManagerFbFeed */

class ControllerNews
{
    static public function index($request, $response, $args) {
        return ManagerFbFeed::get('SkyronLab/feed?limit=10&fields=message,created_time,full_picture,permalink_url');
    }
}
