<?php
namespace App\Controllers;
use App\Models\Playlist;
use App\Models\User;
use App\Models\Video;
use App\Models\PlaylistVideo;

class PlaylistController extends BaseController {

    public static function index() {
        $playlistModel = new Playlist();
        $playlists = $playlistModel->all();

        self::loadView('/playlist', [
            'title' => 'Playlists',
            'playlists' => $playlists
        ]);
    }

    public static function create() {
        $users = User::all();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $playlist = new Playlist();
            $playlist->name = $_POST['name'];
            $playlist->user_id = $_POST['user_id'];
    
            // Check if the playlist was saved successfully
            if ($playlist->save()) {
                // Redirect to the specific user's page after creating the playlist
                header('Location: /user/id/' . $_POST['user_id']);
                exit;
            } else {
                // Show an error message if save failed
                self::loadView('/playlist_create', [
                    'title' => 'Create Playlist',
                    'users' => $users,
                    'error' => 'Failed to create playlist. Please try again.'
                ]);
            }
        }
    
        self::loadView('/playlist_create', [
            'title' => 'Create Playlist',
            'users' => $users
        ]);
    }
    

    public static function edit($id) {
        $playlist = Playlist::find($id);
        $users = User::all();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $playlist->name = $_POST['name'];
            $playlist->user_id = $_POST['user_id'];
            $playlist->save();
    

            if ($playlist->save()) {
                // Only redirect if the save is successful
                header('Location: /user/id/' . $_POST['user_id']);
                exit;
            } else {
                echo "Failed to save the playlist."; // For debugging
            }
            
        }
    
        self::loadView('/playlist_edit', [
            'title' => 'Edit Playlist',
            'playlist' => $playlist,
            'users' => $users
        ]);
    }
    

    public static function find($id) {
        $playlist = Playlist::find($id);
        $playlistVideoModel = new PlaylistVideo();
        $videos = $playlistVideoModel->getVideosByPlaylist($id);
        $allVideos = Video::all(); // Fetch all available videos for adding to playlist

        self::loadView('/playlist', [
            'title' => 'View Playlist',
            'playlist' => $playlist,
            'videos' => $videos,
            'availableVideos' => $allVideos
        ]);
    }

    public static function delete($id) {
        $playlist = Playlist::find($id);
        
        if ($playlist) {
            $userId = $playlist->user_id; 
            $playlist->delete();
    
            // Redirect to the specific user's page after deletion
            header('Location: /user/id/' . $userId);
            exit();
        } else {
            echo "Playlist not found.";
            exit();
        }
    }
    

    public static function addVideo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $playlistId = $_POST['playlist_id'];
            $videoId = $_POST['video_id'];

            $playlistVideoModel = new PlaylistVideo();
            // Determine the next position for the video in the playlist
            $maxPosition = $playlistVideoModel->getMaxPositionInPlaylist($playlistId);
            $nextPosition = ($maxPosition !== null) ? $maxPosition + 1 : 1;

            $playlistVideoModel->addVideoToPlaylist($playlistId, $videoId, $nextPosition);

            header('Location: /playlist/view/' . $playlistId);
            exit();
        }
    }

    public static function removeVideo($playlistId, $videoId) {
        $playlistVideoModel = new PlaylistVideo();
        $playlistVideoModel->removeVideoFromPlaylist($playlistId, $videoId);

        header('Location: /playlist/view/' . $playlistId);
        exit();
    }
}
