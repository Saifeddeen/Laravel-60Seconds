<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use OwenIt\Auditing\Contracts\Auditable;

class Client extends Model implements Auditable
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'id', 'name', 'rating', 'comment', 'image', 'created_at', 'updated_at', 'deleted_at'
    ];

    public $translatable = [
        'name', 'comment'
    ];

    public function asJason($value){
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    protected $auditInclude = [
        'name', 'rating', 'comment', 'image'
    ];


}
