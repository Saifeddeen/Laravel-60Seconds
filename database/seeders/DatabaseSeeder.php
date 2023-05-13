<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /*
        //'navbar' name and href content in sub_content field
        DB::table('main_page_contents')->insert([
            'name' => 'logo',
            'type' => 'image',
            'content' => '/view_temp/images/logo.svg',
            'sub_content' => "#",
            'place_in_page' => 'navbar',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'navbar_elm_1',
            'type' => 'navbar_element',
            'content' => 'Home',
            'sub_content' => "#home",
            'place_in_page' => 'navbar',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'navbar_elm_2',
            'type' => 'navbar_element',
            'content' => 'About',
            'sub_content' => "#about",
            'place_in_page' => 'navbar',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'navbar_elm_3',
            'type' => 'navbar_element',
            'content' => 'Features',
            'sub_content' => "#features",
            'place_in_page' => 'navbar',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'navbar_elm_4',
            'type' => 'navbar_element',
            'content' => 'How Work',
            'sub_content' => "#how-work",
            'place_in_page' => 'navbar',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'navbar_elm_5',
            'type' => 'navbar_element',
            'content' => 'Reviews',
            'sub_content' => "#reviews",
            'place_in_page' => 'navbar',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'navbar_elm_6',
            'type' => 'navbar_element',
            'content' => 'Connect',
            'sub_content' => "#contact",
            'place_in_page' => 'navbar',
        ]);
        
        //'home' page static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => 'Best Mobile Apps Showcase',
            'sub_content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
            'place_in_page' => 'home',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'btn_1',
            'type' => 'button',
            'content' => 'Playstore',
            'place_in_page' => 'home',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'btn_2',
            'type' => 'button',
            'content' => 'Appstore',
            'place_in_page' => 'home',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'img_1',
            'type' => 'image',
            'content' => '/view_temp/images/mockup.png',
            'place_in_page' => 'home',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'Likes',
            'type' => 'card',
            'content' => '8,300+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/like.svg',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'Communication',
            'type' => 'card',
            'content' => '3,000+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/comments.svg',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'Advertising',
            'type' => 'card',
            'content' => '103,570+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/noise.svg',
        ]);

        DB::table('main_page_contents')->insert([
            'name' => 'Users',
            'type' => 'card',
            'content' => '123,000+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/user-group.svg',
        ]);

        //'about' page static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => 'About The App',
            'sub_content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
            'place_in_page' => 'about',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'list_1',
            'type' => 'list',
            'content' => 'Reliable and Secure Platform ##Everything is perfectly orgainized for future##Tons of features and easy to use and customize',
            'place_in_page' => 'about',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'img_1',
            'type' => 'image',
            'content' => '/view_temp/images/about.png',
            'place_in_page' => 'about',
        ]);

        //'how work' page static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => "How it's works",
            'sub_content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
            'place_in_page' => 'how_work',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'img_1',
            'type' => 'image',
            'content' => '/view_temp/images/how.png',
            'place_in_page' => 'how_work',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'list_1',
            'type' => 'list_with_sub_content',
            'content' => 'First Step for App##Second Step for App##Third Step for App##Fourth Step for App',
            'sub_content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.##Lorem Ipsum is simply dummy text of the printing and typesetting industry.##Lorem Ipsum is simply dummy text of the printing and typesetting industry.##Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'place_in_page' => 'how_work',
        ]);

        //'features' page static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => "Our Features",
            'sub_content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
            'place_in_page' => 'features',
        ]);

        //'reviews' page static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => "What Our Client's Say",
            'place_in_page' => 'reviews',
        ]);

        //'connect' page static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => "Connect us",
            'place_in_page' => 'connect',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'address_2',
            'type' => 'address',
            'content' => "Contact Information",
            'place_in_page' => 'connect',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'address_3',
            'type' => 'address',
            'content' => "Location :",
            'sub_content' => 'Jurain,Dhaka Bangladesh',
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-map.svg'
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'address_4',
            'type' => 'address',
            'content' => "Email:",
            'sub_content' => 'websitename@gmail.com',
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-mail.svg'
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'address_5',
            'type' => 'address',
            'content' => "Mobile NO.:",
            'sub_content' => '+1234321321',
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-mobile.svg'
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'address_6',
            'type' => 'address',
            'content' => "Phone NO.:",
            'sub_content' => '+1234321321',
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-phone.svg'
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'address_7',
            'type' => 'address',
            'content' => "Contact Form",
            'place_in_page' => 'connect',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'textarea_1',
            'type' => 'input_text',
            'content' => "Full Name",
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-user.svg'
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'textarea_2',
            'type' => 'input_text',
            'content' => "Email",
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-mail.svg'
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'textarea_3',
            'type' => 'input_text',
            'content' => "Write your message here",
            'place_in_page' => 'connect',
        ]);
        DB::table('main_page_contents')->insert([
            'name' => 'btn_1',
            'type' => 'button',
            'content' => "Send",
            'place_in_page' => 'connect',
        ]);

        //'copyr' section static content
        DB::table('main_page_contents')->insert([
            'name' => 'address_1',
            'type' => 'address',
            'content' => "© copyright 2021 all rights reserved",
            'place_in_page' => 'copyr',
        ]);*/

        $this->call([
            MainPageContentSeeder::class
        ]);

    }
}
