<?php 

namespace App\Models;

class User extends BaseModel{

    protected $table = 'users';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    public static function all () {
        return parent::all();
    }

    protected function find ( int $id ) {
        return parent::find($id);
    }

    public function create ( array $data ) {
        return parent::create($data);
    }

    public function update ( int $id, array $data ) {
        return parent::update($id, $data);
    }

    public function save(){
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':id' => $this->id
        ]);
    }

    public function delete(){
        $sql = "DELETE FROM users WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }
}