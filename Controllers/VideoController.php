<?php

namespace App\Controllers;

use App\Models\Video;
use App\Models\Playlist;
use App\Models\User;

class VideoController extends BaseController {

    public static function index() {
        $videoModel = new Video();
        $videos = $videoModel->all(); // Fetch all videos
        var_dump($videos);
        exit();

        self::loadView('/videos', [
            'title' => 'Videos',
            'videos' => $videos
        ]);
    }

    public static function create() {
        $userModel = new User();
        $users = $userModel->all(); // Fetch all users for dropdown if needed

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_FILES['video']['name'];
            $from = $_FILES['video']['tmp_name'];
            $to_folder = BASE_DIR . '/public/videos/';
            $uuid = uniqid() . '_' . $name;
            move_uploaded_file($from, $to_folder . $uuid);

            $thumbnailName = $_FILES['thumbnail']['name'];
            $thumbnailFrom = $_FILES['thumbnail']['tmp_name'];
            $thumbnailUuid = uniqid() . '_' . $thumbnailName;
            $thumbnailToFolder = BASE_DIR . '/public/thumbnails/';
            move_uploaded_file($thumbnailFrom, $thumbnailToFolder . $thumbnailUuid);

            $videoModel = new Video();
            $data = [
                'title'       => $_POST['title'],
                'description' => $_POST['description'],
                'duration'    => $_POST['duration'],
                'upload_date' => date('Y-m-d H:i:s'),
                'thumbnail'   => $thumbnailUuid,
                'user_id'     => $_POST['user_id']
            ];

            if ($videoModel->create($data)) {
                header('Location: /videos');
                exit();
            } else {
                self::loadView('/create_video', [
                    'title' => 'Create New Video',
                    'users' => $users,
                    'error' => 'Failed to create video. Please try again.'
                ]);
            }
        }

        self::loadView('/create_video', [
            'title' => 'Create New Video',
            'users' => $users
        ]);
    }

    public static function edit($id) {
        $video = Video::find($id);

        if (!$video) {
            throw new \Exception('Video not found');
        }

        $userModel = new User();
        $users = $userModel->all(); // Fetch all users

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_FILES['video']['name'];
            if ($name) {
                $from = $_FILES['video']['tmp_name'];
                $to_folder = BASE_DIR . '/public/videos/';
                $uuid = uniqid() . '_' . $name;
                move_uploaded_file($from, $to_folder . $uuid);
                $video->file_path = $uuid; // Assuming your table has a column for video file path
            }

            $thumbnailName = $_FILES['thumbnail']['name'];
            if ($thumbnailName) {
                $thumbnailFrom = $_FILES['thumbnail']['tmp_name'];
                $thumbnailToFolder = BASE_DIR . '/public/thumbnails/';
                $thumbnailUuid = uniqid() . '_' . $thumbnailName;
                move_uploaded_file($thumbnailFrom, $thumbnailToFolder . $thumbnailUuid);
                $video->thumbnail = $thumbnailUuid;
            }

            $video->title = $_POST['title'];
            $video->description = $_POST['description'];
            $video->duration = $_POST['duration'];
            $video->user_id = $_POST['user_id'];
            $video->save();

            header('Location: /videos');
        }

        self::loadView('/edit_video', [
            'title' => 'Edit Video',
            'video' => $video,
            'users' => $users
        ]);
    }

    public static function delete($id) {
        $video = Video::find($id);
        if ($video) {
            $video->delete();
        }

        header('Location: /videos');
    }

    public static function find($id) {
        $video = Video::find($id);

        if (!$video) {
            self::loadView('/error/404', [
                'title' => 'Video Not Found',
                'message' => 'The video you are looking for does not exist.'
            ]);
            return;
        }

        self::loadView('/find_video', [
            'title' => 'View Video',
            'video' => $video
        ]);
    }
}