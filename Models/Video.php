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

    public function getVideos($search = null, $genreFilter = null, $orderBy = null)
{
    $sql = "SELECT v.*, g.name AS genre_name 
            FROM videos v
            LEFT JOIN genres g ON v.genre_id = g.id
            WHERE 1=1";

    // Add search condition
    if ($search) {
        $sql .= " AND (v.title LIKE :search OR v.description LIKE :search)";
    }

    // Add genre filter
    if ($genreFilter) {
        $sql .= " AND v.genre_id = :genre_filter";
    }

    // Add order-by condition
    if ($orderBy === 'title_asc') {
        $sql .= " ORDER BY v.title ASC";
    } elseif ($orderBy === 'title_desc') {
        $sql .= " ORDER BY v.title DESC";
    } elseif ($orderBy === 'upload_date_asc') {
        $sql .= " ORDER BY v.upload_date ASC";
    } elseif ($orderBy === 'upload_date_desc') {
        $sql .= " ORDER BY v.upload_date DESC";
    }

    $stmt = $this->db->prepare($sql);

    // Bind parameters
    if ($search) {
        $stmt->bindValue(':search', '%' . $search . '%');
    }
    if ($genreFilter) {
        $stmt->bindValue(':genre_filter', $genreFilter, \PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
}


    public function getVideoWithGenre($videoId)
{
    $sql = "SELECT v.*, g.name AS genre_name 
            FROM videos v
            LEFT JOIN genres g ON v.genre_id = g.id
            WHERE v.id = :video_id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':video_id' => $videoId]);
    return $stmt->fetch(\PDO::FETCH_OBJ);
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
