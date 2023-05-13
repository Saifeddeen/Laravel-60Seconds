<?php

namespace App\Imports;

use App\Models\Feature;
use ErrorException;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Psy\Exception\ErrorException as PsyExceptionErrorException;
use Whoops\Exception\ErrorException as ExceptionErrorException;

class FeaturesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $headings = ['name_en', 'name_ar', 'content_en', 'content_ar', 'icon'];
        $intersectSize = sizeof(array_intersect($headings,array_keys($row)));
        
        if($intersectSize == sizeof($headings)){
            return new Feature([
            
                'name' => ['en'=>$row['name_en'], 'ar'=>$row['name_ar']],
                'content' => ['en'=>$row['content_en'], 'ar'=>$row['content_ar']],
                'icon' => $row['icon'],
                
            ]);

        }else{
            return null;
        }
        
    }
}
