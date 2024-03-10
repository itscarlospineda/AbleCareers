<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function viewNewCategory()
    {
       return view("createCategory");
    }

    
public function readCategory()
{
 $cat = \DB::table('categories')
 ->select('categories.*')
 ->orderBy('cat_id','DESC')
 ->get();
return view("category")->with('categories',$cat);
}


public function createCategory(Request $request)
{
    $request->validate(
        [
            'cat_name' => 'required|string|min:5',
            'active' => 'required|numeric|min:0|max:1'
        ]
        );
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->active = $request->active;
        $category->save();
        
}


public function viewUpdateCategory()
{
    $category = \DB::table('categories')
    ->orderBy('cat_id','DESC')
    ->get();
   return view("updateCategory")->with('categories',$category);
   }
   
   
public function editCategory($category)
   {
    $category = Category::find($category);
    return view('editCategory',compact('category'));
   }


public function updateCategory(Category $category, Request $request)
   {
   $request->validate(
       
    [
        'cat_name' => 'required|string|min:5',
        'active' => 'required|numeric|min:0|max:1'
    ]
    );
    $category->cat_name = $request->cat_name;
    $category->active = $request->active;
    $category->save();
   
}
}



