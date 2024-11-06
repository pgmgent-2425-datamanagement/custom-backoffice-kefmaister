<?php

namespace App\Controllers;

class HomeController extends BaseController {

    public static function index() {
        $userModel = new \App\Models\User();
        $userCount = count($userModel->getAllUsers());

        $playlistModel = new \App\Models\Playlist();
        $playlistCount = count($playlistModel->getAllPlaylists());

        self::loadView('/home', [
            'title' => 'Home Dashboard',
            'userCount' => $userCount,
            'playlistCount' => $playlistCount,
        ]);
    }

}