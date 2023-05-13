<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $headings = ['name_en', 'name_ar', 'comment_en', 'comment_ar', 'rating', 'image'];
        $intersectSize = sizeof(array_intersect($headings,array_keys($row)));
        
        if($intersectSize == sizeof($headings)){
            return new Client([
            
                'name' => ['en'=>$row['name_en'], 'ar'=>$row['name_ar']],
                'comment' => ['en'=>$row['comment_en'], 'ar'=>$row['comment_ar']],
                'rating' => $row['rating'],
                'image' => $row['image'],
                
            ]);

        }else{
            return null;
        }
        
    }
}
