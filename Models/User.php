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

    public function save() {
        $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, countries_id = :countries_id WHERE id = :id";
        
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':email' => $this->email,
            ':countries_id' => $this->countries_id,
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
    public function getUsersWithCountries() {
        $sql = "
            SELECT u.*, c.name AS country_name
            FROM users u
            LEFT JOIN countries c ON u.countries_id = c.id
        ";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ); // Fetch as objects for consistency
    }
}

