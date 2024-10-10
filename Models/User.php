<?php 

namespace App\Models;

class User extends BaseModel{

    protected $table = 'users';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function all () {
        return parent::all();
    }

    public function find ( int $id ) {
        return parent::find($id);
    }

    public function create ( array $data ) {
        return parent::create($data);
    }

    public function update ( int $id, array $data ) {
        return parent::update($id, $data);
    }

    public function getClassName($class) {
        return parent::getClassName($class);
    }

    public function castToModel($db_items) {
        return parent::castToModel($db_items);
    }

    public function __call($method, $arg) {
        return parent::__call($method, $arg);
    }

    public static function __callStatic ($method, $arg) {
        return parent::__callStatic($method, $arg);
    }
}