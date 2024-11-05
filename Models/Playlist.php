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

    protected function find ( int $id ) {
        return parent::find($id);
    }

    protected function where($column, $value){


        return parent::where($column, $value);

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