<?php

namespace App\Controllers;

class FileManagerController extends BaseController
{
    public static function index()
    {
        $imageList = array_filter(scandir(BASE_DIR . '/public/images'), function($file) {
            return !in_array($file, ['.', '..']);
        });
        
        $videoList = array_filter(scandir(BASE_DIR . '/public/videos'), function($file) {
            return !in_array($file, ['.', '..']);
        });
    
        self::loadView('/filemanager', [
            'title' => 'Files',
            'images' => $imageList,
            'videos' => $videoList
        ]);
    }

    public static function delete()
{
    // Check if the request method is POST and selected files are present
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_files'])) {
        $files = $_POST['selected_files'];

        foreach ($files as $file) {
            $safeFile = basename(urldecode($file)); // Sanitize input
            $imagePath = BASE_DIR . '/public/images/' . $safeFile;
            $videoPath = BASE_DIR . '/public/videos/' . $safeFile;

            if (is_file($imagePath)) {
                unlink($imagePath);
            } elseif (is_file($videoPath)) {
                unlink($videoPath);
            }
        }
    }

    header('Location: /files');
    exit;
}
}