<?php

namespace App\Models;

class Country extends BaseModel{

    protected $table = 'countries';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    protected function all () {
        return parent::all();
    }

    public function countCountriesWithUsers() {
        $sql = "SELECT COUNT(DISTINCT countries.id) AS count 
                FROM countries 
                INNER JOIN users ON countries.id = users.countries_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result->count;
    }

    public function getUserCountsByCountry(){
        $sql= "
            SELECT c.name AS country, COUNT(u.id) AS count 
            FROM countries c 
            LEFT JOIN users u ON c.id = u.countries_id 
            GROUP BY c.name
            HAVING count > 0
            ORDER BY count DESC
        ";

        $stmt= $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $result;

    }

    protected function find ( int $id ) {
        return parent::find($id);
    }

    public function where($column, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':value' => $value]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ); // Fetch all results as objects
    }
    

    public function save(){
        $sql = "UPDATE countries SET name = :name WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':id' => $this->id
        ]);
    }

    public function delete(){
        $sql = "DELETE FROM countries WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }
}