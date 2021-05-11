<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function postAdsFetch($id)
    {
        $customer = Category::find($id);
//        $invID = Sale::orderBy('id','desc')->first()->id ?? 1;
//
//        $random=$invID = str_pad($invID, 4, '0', STR_PAD_LEFT);


        return  \response()->json([
            'customer'=>$customer,
//          'invoice_no'=>$random
        ]);
    }
}
