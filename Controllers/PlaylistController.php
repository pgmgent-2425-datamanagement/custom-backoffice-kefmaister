<?php
namespace App\Controllers;
use App\Models\Playlist;

class PlaylistController extends BaseController {

    public static function index () {

        $playlists = Playlist::all();

        self::loadView('/playlists', [
            'title' => 'Playlists',
            'playlists' => $playlists
        ]);

    }

}