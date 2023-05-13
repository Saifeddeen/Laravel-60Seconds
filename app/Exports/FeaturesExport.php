<?php

namespace App\Exports;

use App\Models\Feature;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class FeaturesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allFeatures = Feature::all();
        
        $features[0] = ['name_en', 'name_ar', 'content_en', 'content_ar', 'icon'];
        $i = 1;
        foreach($allFeatures as $feature){
            
            $features[$i]['name_en'] = $feature->getTranslation('name', 'en');
            $features[$i]['name_ar'] = $feature->getTranslation('name', 'ar');
            $features[$i]['content_en'] = $feature->getTranslation('content', 'en');
            $features[$i]['content_ar'] = $feature->getTranslation('content', 'ar');
            $features[$i]['icon'] = $feature->icon;
            
            $i++;
        }
        return new Collection($features);
    }
}
