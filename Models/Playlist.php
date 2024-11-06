<?php 

namespace App\Models;

class Playlist extends BaseModel{

    protected $table = 'playlists';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    protected function all () {
        return parent::all();
    }
    public function getAllPlaylists() {
        return parent::all();
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
        $sql = "UPDATE playlists SET name = :name WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':id' => $this->id
        ]);
    }

    public function delete(){
        $sql = "DELETE FROM playlists WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }
}