<?php 

namespace App\Models;

class PlaylistVideo extends BaseModel {

    protected $table = 'playlist_video';
    protected $pk = 'id';

    public function __construct() {
        parent::__construct();
    }

    // Add a new video to a playlist with a specific position
    public function addVideoToPlaylist($playlistId, $videoId, $position) {
        $sql = "INSERT INTO {$this->table} (playlist_id, video_id, position) VALUES (:playlist_id, :video_id, :position)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':playlist_id' => $playlistId,
            ':video_id' => $videoId,
            ':position' => $position
        ]);
    }

    // Remove a video from a playlist
    public function removeVideoFromPlaylist($playlistId, $videoId) {
        $sql = "DELETE FROM {$this->table} WHERE playlist_id = :playlist_id AND video_id = :video_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':playlist_id' => $playlistId,
            ':video_id' => $videoId
        ]);
    }

    // Get all videos in a specific playlist, ordered by position
    public function getVideosByPlaylist($playlistId) {
        $sql = "
            SELECT v.* 
            FROM videos v
            JOIN {$this->table} pv ON v.id = pv.video_id
            WHERE pv.playlist_id = :playlist_id
            ORDER BY pv.position
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':playlist_id' => $playlistId]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    // Update the position of a video within a playlist
    public function updateVideoPosition($playlistId, $videoId, $newPosition) {
        $sql = "UPDATE {$this->table} SET position = :position WHERE playlist_id = :playlist_id AND video_id = :video_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':position' => $newPosition,
            ':playlist_id' => $playlistId,
            ':video_id' => $videoId
        ]);
    }

    public function getMaxPositionInPlaylist($playlistId) {
        $sql = "SELECT MAX(position) AS max_position FROM {$this->table} WHERE playlist_id = :playlist_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':playlist_id' => $playlistId]);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);

        return $result ? $result->max_position : null;
    }
}
