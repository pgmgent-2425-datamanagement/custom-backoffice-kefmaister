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

        $users = new User;

        $id = $_POST['id'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ];

        $users->update($id, $data);

        header('Location: /users');
    }


}