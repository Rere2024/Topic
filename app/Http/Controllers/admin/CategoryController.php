<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\Common;

class CategoryController extends Controller
{
    use Common;
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }
}
// , compact('categories')