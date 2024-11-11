<?php

namespace App\Models;

class Video extends BaseModel {

    protected $table = 'videos';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    protected function all() {
        return parent::all();
    }

    protected function find(int $id) {
        return parent::find($id);
    }

    public function getVideos(){
        $sql = "SELECT * FROM videos";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function where($column, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':value' => $value]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ); // Fetch all results as objects
    }

    public function save() {
        $sql = "UPDATE videos SET title = :title, description = :description, duration = :duration, 
                upload_date = :upload_date, thumbnail = :thumbnail, user_id = :user_id, file_path = :file_path WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':title' => $this->title,
            ':description' => $this->description,
            ':duration' => $this->duration,
            ':upload_date' => $this->upload_date,
            ':thumbnail' => $this->thumbnail,
            ':user_id' => $this->user_id,
            ':id' => $this->id,
            ':file_path' => $this->file_path
        ]);
    }

    public function delete() {
        $sql = "DELETE FROM videos WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }
}
