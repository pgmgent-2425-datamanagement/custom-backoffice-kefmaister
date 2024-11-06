<?php
namespace App\Controllers;
use App\Models\Playlist;
use App\Models\User;

class PlaylistController extends BaseController {

    public static function index () {

        $playlists = Playlist::all();

        self::loadView('/playlists', [
            'title' => 'Playlists',
            'playlists' => $playlists
        ]);

    }    
    


}