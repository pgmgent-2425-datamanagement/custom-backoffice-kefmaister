<?php

namespace App\Models;

class Genres extends BaseModel {

    protected $table = 'genres';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        return parent::all();
    }

    public function find(int $id) {
        return parent::find($id);
    }

    public function getGenres() {
        $sql = "SELECT * FROM genres";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function save() {
        $sql = "UPDATE genres SET name = :name WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':id' => $this->id
        ]);
    }

    public function delete() {
        $sql = "DELETE FROM genres WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }

}
