<?php

namespace App\Models;

use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $name
 * @property integer $image
 * @property integer $info
 */

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $guarded = [];

    public function days(){
        return $this->hasOne(Day::class);
    }

    public function point(){
        return $this->hasOne(Point::class,'model_id','id')
            ->where('model',Module::class);
    }
}
