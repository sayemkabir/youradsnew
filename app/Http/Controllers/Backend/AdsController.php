<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAd;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class AdsController extends Controller
{
    public function viewAds()
    {
        $title = "Ads";
        $ads = Ad::with(['adCategory', 'adClicks'])
            ->where('ad_status', 'active')
            ->paginate('2');
//        dd($ads);
        $categories = Category::all();
        return view('backend.layouts.ads.ads', compact('title', 'ads', "categories"));
    }


    public function createAds()
    {
        $title = "AD CREATE FORM";
        $categoriesid = Category::all();
        return view('backend.layouts.ads.adsCreate', compact('title', 'categoriesid'));


    }

    public function adsCreateForm(Request $request)
    {


        Ad::create([

            'ad_name' => $request->adname,
//            'user_id' => auth('user')->user()->id,
            'admin_id' => auth()->user()->id,
            'ad_link' => $request->adlink,
            'ad_content' => $request->adcontent,
            'ad_clicks' => $request->adclicks,
            'ad_duration' => $request->adduration,
            'category_id' => $request->categoryid,
            'ad_price' => $request->adprice,
            'total_price'=>$request->adtotalprice

        ]);

        return redirect()->route('ads.view')->with('success', 'Ad Created Successfully.');

    }




    public function adsSort($id)
    {

//        dd($id);
        $title = "Ads";
        if ($id == 'all') {

            $ads = Ad::paginate('2');
            $categories = Category::all();
        } else {
            $ads = Ad::where('category_id', $id)->paginate('3');

            $categories = Category::all();

        }


        return view('backend.layouts.ads.adsUnderProduct', compact('ads', 'categories', 'title'));


//         dd($ads);
    }


    public function adsDelete($id)
    {

        $ads = Ad::find($id);

        $ads->delete();

        return redirect()->route('ads.view')->with('success', 'Ad Was Thrown Out Of The Project Successfully');
    }


    public function adsPost($id)
    {
        $ad = Ad::find($id);

        $ads = UserAd::where('ad_id', $id)
            ->get();
//dd($ads->count());
        if ($ads->count() < $ad->ad_clicks) {

            $ads = UserAd::where('ad_id', $id)->where('user_id', auth('user')->user()->id)
                ->first();

            if ($ads) {
                // do if data exist

                dd('data exist');
            } else {
                //create data
                UserAd::create([
                    'ad_id' => $id,
                    'user_id' => auth('user')->user()->id
                ]);
                User::find(auth('user')->user()->id)->increment('balance',$ad->ad_price);


                //user balance credit
            }
            return Redirect::to($ad->ad_link);

        } else {
            $ad->update(['ad_status' => 'inactive']);
            return redirect()->back();
        }

    }



    //DASHBOARD

    public function viewAdsCategoryDashboard()
    {

        $adcategories=Category::all();
        return view('userDashboard.layouts.userViewAdsCategory',compact('adcategories'));
    }

    //Category-wise Ads

    public function surfAdsView($id)
    {
        $surfads=Ad::find($id);
        $surfads=Ad::where('category_id',$id)->get();
        return view('userDashboard.layouts.adsCategorywise.surfAds',compact('surfads'));

    }





    public function postAdsDashboard()
    {
        return view('userDashboard.layouts.userPostAds');
    }


    public function advertisesAds()
    {

        $categoriesid=Category::all();
        return view('userDashboard.layouts.userAdsCreate',compact('categoriesid'));
    }


    public function advertisesAdsPost(Request $request)
    {
        $adsPayment=Ad::create([

            'ad_name' => $request->adname,
            'user_id' => auth('user')->user()->id,
//            'admin_id' => auth()->user()->id,
            'ad_link' => $request->adlink,
            'ad_content' => $request->adcontent,
            'ad_clicks' => $request->adclicks,
            'ad_duration' => $request->adduration,
            'category_id' => $request->categoryid,
            'ad_price' => $request->adprice,
            'total_price'=>$request->adtotalprice

        ]);

        User::where('id',$adsPayment->user_id)->decrement('deposit_balance',$adsPayment->total_price);


        return redirect()->back()->with('success', 'Ad Created Successfully.');

    }
}
