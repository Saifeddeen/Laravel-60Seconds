<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allUsers = User::all();

        $users[0] = ['name', 'email', 'password', 'admin_type'];
        $i = 1;
        foreach($allUsers as $user){
            
            $users[$i]['name'] = $user->name;
            $users[$i]['email'] = $user->email;
            $users[$i]['password'] = $user->password;
            $users[$i]['admin_type'] = $user->admin_type;
            
            $i++;
        }
        return new Collection($users);
    }
    
}
