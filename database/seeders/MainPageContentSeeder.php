<?php

namespace Database\Seeders;

use App\Models\MainPageContent;
use Illuminate\Database\Seeder;

class MainPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        MainPageContent::create([
            'name' => 'logo',
            'type' => 'image',
            'content' => ['en' => '/view_temp/images/logo.svg','ar' => '/view_temp/images/logo.svg'],
            'sub_content' => "#",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_1',
            'type' => 'navbar_element',
            'content' => ['en' => 'Home', 'ar' => 'الرئيسية'],
            'sub_content' => "#home",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_2',
            'type' => 'navbar_element',
            'content' => ['en' => 'About', 'ar' => 'عن التطبيق'],
            'sub_content' => "#about",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_3',
            'type' => 'navbar_element',
            'content' => ['en' => 'Features', 'ar' => 'المزايا'],
            'sub_content' => "#features",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_4',
            'type' => 'navbar_element',
            'content' => ['en' => 'How Work', 'ar' => 'كيفية عمل التطبيق'],
            'sub_content' => "#how-work",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_5',
            'type' => 'navbar_element',
            'content' => ['en' => 'Reviews', 'ar' => 'الآراء'],
            'sub_content' => "#reviews",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_6',
            'type' => 'navbar_element',
            'content' => ['en' => 'Connect', 'ar' => 'اتصل بنا'],
            'sub_content' => "#contact",
            'place_in_page' => 'navbar',
        ]);
        MainPageContent::create([
            'name' => 'navbar_elm_7',
            'type' => 'navbar_element',
            'content' => ['en' => 'AR', 'ar' => 'EN'],
            'place_in_page' => 'navbar',
        ]);

        //'home' page static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => 'Best Mobile Apps Showcase', 'ar' => 'أفضل عرض لتطبيقات الجوال'],
            'sub_content' => ['en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'ar' => "لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. كان لوريم إيبسوم هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ،"],
            'place_in_page' => 'home',
        ]);
        MainPageContent::create([
            'name' => 'btn_1',
            'type' => 'button',
            'content' => ['en' => 'Playstore', 'ar' => 'متجر جوجل بلاي'],
            'place_in_page' => 'home',
        ]);
        MainPageContent::create([
            'name' => 'btn_2',
            'type' => 'button',
            'content' => ['en' => 'Appstore', 'ar' => 'متجر أبل'],
            'place_in_page' => 'home',
        ]);
        MainPageContent::create([
            'name' => 'img_1',
            'type' => 'image',
            'content' => ['en' => '/view_temp/images/mockup.png','ar' => '/view_temp/images/mockup.png'],
            'place_in_page' => 'home',
        ]);
        MainPageContent::create([
            'name' => 'Likes',
            'type' => 'card',
            'content' => ['en' => 'Likes', 'ar' => 'اعجابات'],
            'sub_content' => '8,300+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/like.svg',
        ]);
        MainPageContent::create([
            'name' => 'Communication',
            'type' => 'card',
            'content' => ['en' => 'Communication', 'ar' => 'تواصل'],
            'sub_content' => '3,000+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/comments.svg',
        ]);
        MainPageContent::create([
            'name' => 'Advertising',
            'type' => 'card',
            'content' => ['en' => 'Advertising', 'ar' => 'اعلانات'],
            'sub_content' => '103,570+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/noise.svg',
        ]);
        MainPageContent::create([
            'name' => 'Users',
            'type' => 'card',
            'content' => ['en' => 'Users', 'ar' => 'مستخدمين'],
            'sub_content' => '123,000+',
            'place_in_page' => 'home',
            'icon' => '/view_temp/images/user-group.svg',
        ]);

        //'about' page static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => 'About The App', 'ar' => 'عن التطبيق'],
            'sub_content' => ['en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'ar' => "لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. كان لوريم إيبسوم هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ،"],
            
            'place_in_page' => 'about',
        ]);
        MainPageContent::create([
            'name' => 'list_1',
            'type' => 'list',
            'content' => ['en' => 'Reliable and Secure Platform ##Everything is perfectly orgainized for future##Tons of features and easy to use and customize',
                'ar' => "منصة موثوقة وآمنة ## كل شيء منظم تمامًا للمستقبل ## طن من الميزات وسهلة الاستخدام والتخصيص"],

            'place_in_page' => 'about',
        ]);
        MainPageContent::create([
            'name' => 'img_1',
            'type' => 'image',
            'content' => ['en' => '/view_temp/images/about.png','ar' => '/view_temp/images/about.png'],
            'place_in_page' => 'about',
        ]);

        //'how work' page static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => "How it's works", 'ar' => 'كيف يعمل'],
            'sub_content' => ['en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'ar' => "لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. كان لوريم إيبسوم هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ،"],

            'place_in_page' => 'how_work',
        ]);
        MainPageContent::create([
            'name' => 'img_1',
            'type' => 'image',
            'content' => ['en' => '/view_temp/images/how.png','ar' => '/view_temp/images/how.png'],
            'place_in_page' => 'how_work',
        ]);
        MainPageContent::create([
            'name' => 'list_1',
            'type' => 'list_with_sub_content',
            'content' => ['en' => 'First Step for App##Second Step for App##Third Step for App##Fourth Step for App',
             'ar' => "الخطوة الأولى للتطبيق ## الخطوة الثانية للتطبيق ## الخطوة الثالثة للتطبيق ## الخطوة الرابعة للتطبيق"],

            'sub_content' => ['en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.##Lorem Ipsum is simply dummy text of the printing and typesetting industry.##Lorem Ipsum is simply dummy text of the printing and typesetting industry.##Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'ar' => 'لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. ## لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. ## لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. ## لوريم إيبسوم ببساطة نص وهمي لصناعة الطباعة والتنضيد. '],
             
            'place_in_page' => 'how_work',
        ]);

        //'features' page static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => "Our Features", 'ar' => 'مميزاتنا'],
            'sub_content' => ['en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'ar' => "لوريم إيبسوم هو ببساطة نص شكلي في صناعة الطباعة والتنضيد. كان لوريم إيبسوم هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ،"],
            
            'place_in_page' => 'features',
        ]);

        //'reviews' page static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => "What Our Client's Say", 'ar' => 'آراء عملائنا'],
            'place_in_page' => 'reviews',
        ]);

        //'connect' page static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => "Connect us", 'ar' => 'اتصل بنا'],
            'place_in_page' => 'connect',
        ]);
        MainPageContent::create([
            'name' => 'address_2',
            'type' => 'address',
            'content' => ['en' => "Contact Information", 'ar' => 'معلومات التواصل'],
            'place_in_page' => 'connect',
        ]);
        MainPageContent::create([
            'name' => 'address_3',
            'type' => 'address',
            'content' => ['en' => "Location :", 'ar' => 'الموقع:'],
            'sub_content' => ['en' => 'Jurain,Dhaka Bangladesh', 'ar' => 'جوران, دكا بنغلادش'],
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-map.svg'
        ]);
        MainPageContent::create([
            'name' => 'address_4',
            'type' => 'address',
            'content' => ['en' => "Email:", 'ar' => 'الإيميل:'],
            'sub_content' => ['en' => 'websitename@gmail.com', 'ar' => 'websitename@gmail.com'],
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-mail.svg'
        ]);
        MainPageContent::create([
            'name' => 'address_5',
            'type' => 'address',
            'content' => ['en' => "Mobile NO.:", 'ar' => 'رقم الهاتف المحمول:'],
            'sub_content' => '+1234321321',
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-mobile.svg'
        ]);
        MainPageContent::create([
            'name' => 'address_6',
            'type' => 'address',
            'content' => ['en' => "Phone NO.:", 'ar' => 'رقم الهاتف:'],
            'sub_content' => '+1234321321',
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-phone.svg'
        ]);
        MainPageContent::create([
            'name' => 'address_7',
            'type' => 'address',
            'content' => ['en' => "Contact Form", 'ar' => 'نموذج التواصل:'],
            'place_in_page' => 'connect',
        ]);
        MainPageContent::create([
            'name' => 'textarea_1',
            'type' => 'input_text',
            'content' => ['en' => "Full Name", 'ar' => 'الإسم الكامل'],
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-user.svg'
        ]);
        MainPageContent::create([
            'name' => 'textarea_2',
            'type' => 'input_text',
            'content' => ['en' => "Email", 'ar' => 'الإيميل'],
            'place_in_page' => 'connect',
            'icon' => '/view_temp/images/icon-mail.svg'
        ]);
        MainPageContent::create([
            'name' => 'textarea_3',
            'type' => 'input_text',
            'content' => ['en' => "Write your message here", 'ar' => 'اكتب رسالتك هنا'],
            'place_in_page' => 'connect',
        ]);
        MainPageContent::create([
            'name' => 'btn_1',
            'type' => 'button',
            'content' => ['en' => "Send", 'ar' => 'ارسال'],
            'place_in_page' => 'connect',
        ]);

        //'copyr' section static content
        MainPageContent::create([
            'name' => 'address_1',
            'type' => 'address',
            'content' => ['en' => "© copyright 2021 all rights reserved", 'ar' => "© حقوق الطبع والنشر محفوظة 2021"],
            'place_in_page' => 'copyr',
        ]);

    }
}
