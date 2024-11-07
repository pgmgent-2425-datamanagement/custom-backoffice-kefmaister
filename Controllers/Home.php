<?php
namespace App\Controllers;

use App\Models\Country;
use App\Models\Playlist;


class HomeController extends BaseController {

    public static function index() {
        $countryModel = new Country();

        $countryUserData = $countryModel->getUserCountsByCountry();

        $countries = [];
        $userCounts = [];
        foreach($countryUserData as $data){
            $countries[] = $data->country;
            $userCounts[] = $data->count;
        }


        $playlistModel = new Playlist();
        $playlistCount = count($playlistModel->all());

        self::loadView('/home', [
            'title' => 'Home Dashboard',
            'countries' => $countries,
            'userCounts' => $userCounts,
            'playlistCount' => $playlistCount,
        ]);
    }

}