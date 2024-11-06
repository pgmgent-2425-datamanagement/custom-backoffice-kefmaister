<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Playlist;

class UserController extends BaseController {

    public static function index() {

        $users = User::all();

        self::loadView('/users', [
            'title' => 'Users',
            'users' => $users
        ]);


    }

    public static function edit($id) {
        $user = User::with('playlists')->find($id);

        if(isset($_POST['name'])){
            $user->name = $_POST['name'];
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
            throw new \Exception('User not found');
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

    // public static function update () {

    //     // Check CSRF token
    //     if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    //         die('Invalid CSRF token');
    //     }

    //     $user = new User;

    //     $id = $_POST['id'];
    //     $data = [
    //         'name' => $_POST['name'],
    //         'email' => $_POST['email']
    //     ];

    //     // Validate input data
    //     if (empty($data['name']) || empty($data['email'])) {
    //         die('Name and email are required');
    //     }

    //     if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //         die('Invalid email format');
    //     }

    //     // Attempt to update user and handle potential errors
    //     try {
    //         $user->update($id, $data);
    //     } catch (\Exception $e) {
    //         die('Error updating user: ' . $e->getMessage());
    //     }

    //     self::redirect('/users');
    // }


}