<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use OwenIt\Auditing\Contracts\Auditable;

class Feature extends Model implements Auditable
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'id', 'name', 'content', 'icon', 'created_at', 'updated_at', 'deleted_at'
    ];

    public $translatable = [
        'name', 'content'
    ];

    public function asJason($value){
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    protected $auditInclude = [
        'name', 'content', 'icon'
    ];
    
}
