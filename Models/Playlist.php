<?php 

namespace App\Models;

class Playlist extends BaseModel{

    protected $table = 'playlists';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function all () {
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
    

    public function save() {
        if (isset($this->id)) {
            $sql = "UPDATE playlists SET name = :name, user_id = :user_id WHERE id = :id";
            $pdo_statement = $this->db->prepare($sql);
            $result = $pdo_statement->execute([
                ':name' => $this->name,
                ':user_id' => $this->user_id,
                ':id' => $this->id
            ]);
            var_dump($result, $pdo_statement->errorInfo()); // Check execution result and any errors
            return $result;
        } else {
            $sql = "INSERT INTO playlists (name, user_id) VALUES (:name, :user_id)";
            $pdo_statement = $this->db->prepare($sql);
            $result = $pdo_statement->execute([
                ':name' => $this->name,
                ':user_id' => $this->user_id
            ]);
            var_dump($result, $pdo_statement->errorInfo()); // Check execution result and any errors
            return $result;
        }
    }
    
    

    public function delete(){
        $sql = "DELETE FROM playlists WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }
}