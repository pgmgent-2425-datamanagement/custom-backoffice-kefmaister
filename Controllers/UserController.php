<?php
namespace App\Controllers;
use App\Models\User;

class UserController extends BaseController {

    public static function index () {

        $users = new User;

        self::loadView('/users', [
            'users' => $users->all()
        ]);


    }

    public static function find ($id) {

        $users = new User;

        self::loadView('/edit', [
            'user' => $users->find($id)
        ]);
    }

    public static function update () {

        // Check CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('Invalid CSRF token');
        }

        $user = new User;

        $id = $_POST['id'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ];

        // Validate input data
        if (empty($data['name']) || empty($data['email'])) {
            die('Name and email are required');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            die('Invalid email format');
        }

        // Attempt to update user and handle potential errors
        try {
            $user->update($id, $data);
        } catch (\Exception $e) {
            die('Error updating user: ' . $e->getMessage());
        }

        self::redirect('/users');
    }


}