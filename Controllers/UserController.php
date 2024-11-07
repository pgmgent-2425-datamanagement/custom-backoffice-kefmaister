<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Playlist;

class UserController extends BaseController {

    public static function index() {
        error_log('UserController@index');
        $users = User::all();

        self::loadView('/users', [
            'title' => 'Users',
            'users' => $users
        ]);


    }

    public static function create() {
        if(isset($_POST['firstname'])){
            $user = new User;
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->email = $_POST['email'];
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user->countries_id = $_POST['country'];
            $user->save();
            header('Location: /users');
        }

        self::loadView('/create_user', [
            'title' => 'Create New User'
        ]);
    }


    public static function edit($id) {
        $user = User::with('playlists')->find($id);

        if(isset($_POST['firstname'])){
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->email = $_POST['email'];
            $user->save();
            header('Location: /users');
        }


        self::loadView('/edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);


    }

    public static function delete($id) {
        $user = User::find($id);
        $user->delete();

        header('Location: /users');
    }

    public static function find($id) {
        $user = User::find($id);

        if(!$user){
            // Redirect to a 404 page or display an error message
            self::loadView('/error/404', [
                'title' => 'User Not Found',
                'message' => 'The user you are looking for does not exist.'
            ]);
            return;
        }

        self::loadView('/find', [
            'title' => 'Find User',
            'user' => $user,

        ]);
    }

    public static function getPlaylistsByUser($userId) {
        $user = User::find($userId);
    
        if (!$user) {
            throw new \Exception('User not found');
        }
    
        // Fetch all playlists associated with this user
        $playlistModel = new Playlist();
        $playlists = $playlistModel->where('user_id', $userId);
    
        self::loadView('/find', [
            'title' => 'User and Playlists',
            'user' => $user,
            'playlists' => $playlists
        ]);
    }

}