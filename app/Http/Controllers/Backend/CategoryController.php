<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Throwable;

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

        $request->validate([

            'categoryname'=>'required',
            'categoryImage'=>'required',
            'categoryprice'=>'required',
            'categorydescription'=>'required',


        ]);

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

        try {
            $category->delete();

            return redirect()->route('category.name')->with('danger','Category Was Successfully Thrown Out of the Project');

        }catch (Throwable $e){

            if ($e->getCode() == '23000'){

                return redirect()->back()->with('danger','This category is not empty. you cannot delete it.');

            }
            return back();

        }
    }

    public function categoryUpdatePost(Request $request,$id)
    {


        $request->validate([

            'categoryname'=>'required',
            'categoryImage'=>'required',
            'categoryprice'=>'required',
            'categorydescription'=>'required',


        ]);

        $category_image="";

        if ($request->hasFile('categoryImage')){

            $file=$request->file('categoryImage');

            if ($file->isValid()){

                $category_image=date('Ymdhms').".".$file->getClientOriginalExtension();
                $file->storeAs('categories',$category_image);
            }
        }


        $category=Category::find($id)->update([

            'name' => $request->categoryname,
            'image'=>$category_image,
            'price'=>$request->categoryprice,
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
