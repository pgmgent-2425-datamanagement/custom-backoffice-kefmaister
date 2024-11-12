<?php

namespace App\Models;

class Comment extends BaseModel {

    protected $table = 'comments';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        return parent::all();
    }
    public function create ( array $data ) {
        return parent::create($data);
    }

    public function find(int $id) {
        return parent::find($id);
    }

    public function getComments() {
        $sql = "SELECT * FROM comments";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getCommentsByVideo($videoId)
{
    $sql = "SELECT c.*, u.firstname, u.lastname 
            FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.video_id = :video_id
            ORDER BY c.comment_date DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':video_id' => $videoId]);
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
}

    public function save() {
        $sql = "UPDATE comments SET comment = :comment, user_id = :user_id, video_id = :video_id, comment_date = :comment_date WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':comment' => $this->comment,
            ':user_id' => $this->user_id,
            ':video_id' => $this->video_id,
            ':comment_date' => $this->comment_date,
            ':id' => $this->id
        ]);
    }

    public function delete() {
        $sql = "DELETE FROM comments WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id
        ]);
    }

}