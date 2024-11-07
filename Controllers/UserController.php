<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Country;

class UserController extends BaseController {

    public static function index() {
        $userModel = new User();
        $users = $userModel->getUsersWithCountries(); // Custom method to fetch users with country info
    
        self::loadView('/users', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    

    public static function create() {

        $countryModel = new Country();
        $countries = $countryModel->all(); // Fetch all countries

       

        //move uploaded file to images folder


        if (isset($_POST['firstname'])) {
            $name = $_FILES['image']['name'];
            $from = $_FILES['image']['tmp_name'];
    
            $to_folder = BASE_DIR . '/public/images/';
    
            $uuid = uniqid() . '_' . $name;
    
            move_uploaded_file($from, $to_folder . $uuid);
            $userModel = new User();
            $data = [
                'firstname'    => $_POST['firstname'],
                'lastname'     => $_POST['lastname'],
                'email'        => $_POST['email'],
                'password'     => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'countries_id' => $_POST['country'],
                'image'        => $uuid
            ];

            if ($userModel->create($data)) {
                header('Location: /users');
                exit();
            } else {
                // Handle creation failure
                self::loadView('/create_user', [
                    'title' => 'Create New User',
                    'countries' => $countries,
                    'error' => 'Failed to create user. Please try again.'
                ]);
            }
        }

        self::loadView('/create_user', [
            'title' => 'Create New User',
            'countries' => $countries
        ]);
    }
    

    public static function edit($id) {
        $user = User::find($id);

        
    
        if (!$user) {
            throw new \Exception('User not found');
        }
    
        // Fetch playlists separately if needed
        $playlistModel = new Playlist();
        $playlists = $playlistModel->where('user_id', $id);

            // Fetch all countries
    $countryModel = new Country(); // Assuming you have a Country model
    $countries = $countryModel->all(); // Fetch all countries
    
        if (isset($_POST['firstname'])) {
            $name = $_FILES['image']['name'];
            if($name){

                $from = $_FILES['image']['tmp_name'];

                $to_folder = BASE_DIR . '/public/images/';

                $uuid = uniqid() . '_' . $name;

                move_uploaded_file($from, $to_folder . $uuid);

                $user->image = $uuid;

            }          
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->email = $_POST['email'];
            $user->countries_id = $_POST['country'];
            $user->save();
            header('Location: /users');
        }
    
        self::loadView('/edit', [
            'title' => 'Edit User',
            'user' => $user,
            'playlists' => $playlists, // Pass playlists if necessary
            'countries' => $countries
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
