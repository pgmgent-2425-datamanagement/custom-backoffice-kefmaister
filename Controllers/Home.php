<?php
namespace App\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Models\Video;


class HomeController extends BaseController {

    public static function index() {
        $userModel = new User();
        $videoModel = new Video();

        $countryModel = new Country();

        $countryUserData = $countryModel->getUserCountsByCountry();

        $countries = [];
        $userCounts = [];
        foreach($countryUserData as $data){
            $countries[] = $data->country;
            $userCounts[] = $data->count;
        }

        // Fetch video counts per genre
        $videoCountsData = $videoModel->getVideoCountsByGenre();
        $genreNames = [];
        $videoCounts = [];
        foreach ($videoCountsData as $data) {
            $genreNames[] = $data->genre_name;
            $videoCounts[] = $data->video_count;
        }


        self::loadView('/home', [
            'title' => 'Home Dashboard',
            'countries' => $countries,
            'userCounts' => $userCounts,
            'genreNames' => $genreNames,
            'videoCounts' => $videoCounts,        ]);
    }

}