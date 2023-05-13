<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Feature;
use App\Models\MainPageContent;
use Illuminate\Http\Request;

class MainPageContentsController extends Controller
{
    public function index(){
        
        //'navbar' contents
        $nav_addresses = MainPageContent::where('place_in_page', '=', 'navbar')
        ->where('type', '=', 'navbar_element')->get();
        $logo = MainPageContent::where('place_in_page', '=', 'navbar')
        ->where('type', '=', 'image')->first();
        
        //'home' section data
        $home_address = MainPageContent::where('place_in_page', '=', 'home')
        ->where('type', '=', 'address')->first();
        $home_btns = MainPageContent::where('place_in_page', '=', 'home')
        ->where('type', '=', 'button')->get();
        $home_img = MainPageContent::where('place_in_page', '=', 'home')
        ->where('type', '=', 'image')->first();
        $home_cards = MainPageContent::where('place_in_page', '=', 'home')
        ->where('type', '=', 'card')->get();

        //'about' section data
        $about_address = MainPageContent::where('place_in_page', '=', 'about')
        ->where('type', '=', 'address')->first();
        $about_img = MainPageContent::where('place_in_page', '=', 'about')
        ->where('type', '=', 'image')->first();
        $about_list = MainPageContent::where('place_in_page', '=', 'about')
        ->where('type', '=', 'list')->first();
        $about_list_arr = explode('##',$about_list['content']);

        //'how work' section data
        $hw_address = MainPageContent::where('place_in_page', '=', 'how_work')
        ->where('type', '=', 'address')->first();
        $hw_img = MainPageContent::where('place_in_page', '=', 'how_work')
        ->where('type', '=', 'image')->first();
        $hw_list = MainPageContent::where('place_in_page', '=', 'how_work')
        ->where('type', '=', 'list_with_sub_content')->first();

        $hwLista = explode('##', $hw_list['content']);
        $hwListb = explode('##', $hw_list['sub_content']);
        $hwList = [$hwLista, $hwListb];
        //dd($hwList);

        //clients reviews
        $reviews_address = MainPageContent::where('place_in_page', '=', 'reviews')
        ->where('type', '=', 'address')->first();
        $clients = Client::where('comment', '!=', null)->get();

        //features
        $features_address = MainPageContent::where('place_in_page', '=', 'features')
        ->where('type', '=', 'address')->first();
        $features = Feature::get();

        //copyright
        $cpr = MainPageContent::where('place_in_page', '=', 'copyr')
        ->where('type', '=', 'address')->first();

        //connect static content
        $connect_addresses = MainPageContent::where('place_in_page', '=', 'connect')
        ->where('type', '=', 'address')->get();
        $connect_text_inputs = MainPageContent::where('place_in_page', '=', 'connect')
        ->where('type', '=', 'input_text')->get();
        $connect_btn = MainPageContent::where('place_in_page', '=', 'connect')
        ->where('type', '=', 'button')->first();
        

        $addresses = [
            'navbar' => $nav_addresses,
            'home' => $home_address,
            'about' => $about_address,
            'how_work' => $hw_address,
            'reviews' => $reviews_address,
            'features' => $features_address,
            'connect' => $connect_addresses,
            'copyr' => $cpr
        ];

        $images = [
            'navbar' => $logo,
            'home' => $home_img,
            'about' => $about_img,
            'how_work' => $hw_img        
        ];

        $inputs_text = [
            'connect' => $connect_text_inputs
        ];

        $buttons = [
            'home' => $home_btns,
            'connect' => $connect_btn
        ];

        $cards = [
            'home' => $home_cards
        ];

        $lists1 = [
            'about' => $about_list_arr,
            'how_work' => $hwList
        ];

        


        //dd($home_addresses[0]['name']);
        return view('Main.index', compact('addresses','images','inputs_text','buttons','cards','lists1','clients','features'));
    }
}
