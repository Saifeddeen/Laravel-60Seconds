<?php

namespace App\Imports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\ToModel;

class AuditsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Audit([
            //'id' => $row[0],
            'user_type' => $row[1],
            'user_id' => $row[2],
            'event' => $row[3],
            'auditable_type' => $row[4],
            'auditable_id' => $row[5],
            'old_values' => $row[6],
            'new_values' => $row[7],
            'url' => $row[8],
            'ip_address' => $row[9],
            'user_agent' => $row[10],
            'tags' => $row[11],
            'created_at' => $row[12],
            'updated_at' => $row[13]

        ]);
    }
}
