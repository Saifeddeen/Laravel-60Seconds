<?php

namespace App\Exports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allClients = Client::all();

        $clients[0] = ['name_en', 'name_ar', 'comment_en', 'comment_ar', 'rating', 'image'];
        $i = 1;
        foreach($allClients as $client){
            
            $clients[$i]['name_en'] = $client->getTranslation('name', 'en');
            $clients[$i]['name_ar'] = $client->getTranslation('name', 'ar');
            $clients[$i]['comment_en'] = $client->getTranslation('comment', 'en');
            $clients[$i]['comment_ar'] = $client->getTranslation('comment', 'ar');
            $clients[$i]['rating'] = $client->rating;
            $clients[$i]['image'] = $client->image;
            
            $i++;
        }
        return new Collection($clients);
    }
}
