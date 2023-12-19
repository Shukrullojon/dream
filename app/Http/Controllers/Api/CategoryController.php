<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get(Request $request){
        $model = $request->model == 'Vocabulary' ? Vocabulary::class : 'Undefined';
        $category = Category::select('category.id','category.name','category.image')
            ->where('model',$model)
            ->where('status',1)
            ->get();
        return response()->json([
            'status' => true,
            'result' => [
                'category' => $category,
            ],
        ], 200);
    }
}
