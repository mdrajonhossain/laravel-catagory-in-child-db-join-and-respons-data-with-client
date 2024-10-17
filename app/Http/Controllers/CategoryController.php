<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller{
    //

    public function index(){
        $categories = Category::whereNull('parent_id')->with('children')->get();
        // $categories = Category::whereNull('parent_id')->with('children')->where('id', 1)->get();
        return response()->json($categories);
    }
}


