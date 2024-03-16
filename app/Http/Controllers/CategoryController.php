<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function viewNewCategory()
    {
       return view("category\categorycreate");
    }

    
public function readCategory()
{
   $cat = \DB::table('category')
   ->select('category.*')
   ->orderBy('id','DESC')
   ->get();
return view("category\categorylist")->with('category',$cat);
}


public function createCategory(Request $request)
{
    $request->validate(
        [
            'name' => 'required|string|min:5',
            'is_active' => 'required|numeric|min:0|max:1'
        ]
        );
        $category = new Category;
        $category->name = $request->name;
        $category->is_active = $request->is_active;
        $category->save();
     
}


public function viewUpdateCategory()
{
    $category = \DB::table('category')
    ->orderBy('id','DESC')
    ->get();
   return view("updateCategory")->with('category',$category);
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
        'name' => 'required|string|min:5',
        'is_active' => 'required|numeric|min:0|max:1'
    ]
    );
    $category->name = $request->name;
    $category->is_active = $request->is_active;
    $category->save();
   
}
}



