<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];

    public function media(){
        return $this->hasMany(Media::class,'model_id','id')
            ->where('model',Product::class);
    }
}
