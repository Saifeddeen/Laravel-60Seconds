<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainPageContent extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'content', 'sub_content'
    ];

    public function asJason($value){
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    //to store the value as json value with en

    //for content field
    public function getContentenAttribute(){
        return $this->getTranslation('content', 'en');
    }
    public function getContentarAttribute(){
        return $this->getTranslation('content', 'ar');
    }

    //for content field
    public function getSubContentenAttribute(){
        return $this->getTranslation('sub_content', 'en');
    }
    public function getSubContentarAttribute(){
        return $this->getTranslation('sub_content', 'ar');
    }

}
