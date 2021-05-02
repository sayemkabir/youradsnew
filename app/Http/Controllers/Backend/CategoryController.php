<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function viewCategory()
    {

        $categories = Category::paginate('3');
        $title = "CATEGORY LIST";
        return view('backend.layouts.category.category', compact('title', 'categories'));
    }

    public function createCategory(Request $request)
    {

        $category_image="";

        if ($request->hasFile('categoryImage')){

           $file=$request->file('categoryImage');

           if ($file->isValid()){

               $category_image=date('Ymdhms').".".$file->getClientOriginalExtension();
               $file->storeAs('categories',$category_image);
           }
}

        Category::create([

            'name' => $request->categoryname,
            'image'=>$category_image,
            'price'=>$request->categoryprice,
            'description' => $request->categorydescription

        ]);

        return redirect()->route('category.name')->with('success','Category Added Successfully');
    }

    public function categoryDelete($id){

        $category=Category::find($id);

        $category->delete();

        return redirect()->route('category.name')->with('danger','Category Was Successfully Thrown Out of the Project');
    }

    public function categoryUpdatePost(Request $request,$id)
    {
        $category=Category::find($id)->update([


            'name' => $request->categoryname,
//            'image'=>$category_image,
            'description' => $request->categorydescription

        ]);
        return redirect()->route('category.name')->with('success','Category Updated Successfully');

    }

    public function categoryUpdateForm($id)
    {

        $title="Category Update Form";
        $category_edit=Category::find($id);

        return view('backend.layouts.category.categoryUpdate',compact('category_edit','title'));
    }
}
