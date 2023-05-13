<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $headings = ['name', 'email', 'password', 'admin_type'];
        $intersectSize = sizeof(array_intersect($headings,array_keys($row)));
        
        if($intersectSize == sizeof($headings)){
            return new User([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
                'admin_type' => $row['admin_type'],
            ]);

        }else{
            return null;
        }

    }
}
