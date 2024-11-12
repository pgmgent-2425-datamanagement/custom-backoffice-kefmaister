<?php
namespace App\Controllers;

use App\Models\Comment;

class CommentController extends BaseController{
    
        public static function index(){
            $commentModel = new Comment();
            $comments = $commentModel->getComments();
    
            self::loadView('/comment', [
                'title' => 'Comments',
                'comments' => $comments
    
            ]);
        }
    
        public static function create()
    {
        $commentModel = new Comment();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'comment' => $_POST['comment'],
                'user_id' => $_POST['user_id'], // Ensure this input exists or handle it accordingly
                'video_id' => $_POST['video_id'],
                'comment_date' => date('Y-m-d H:i:s')
            ];

            if ($commentModel->create($data)) {
                // Redirect to the video's view page with the video ID
                header('Location: /videos/view/' . $_POST['video_id']);
                exit();
            } else {
                // Handle the error (optional)
                header('Location: /videos/view/' . $_POST['video_id'] . '?error=comment_failed');
                exit();
            }
        }
    }
}